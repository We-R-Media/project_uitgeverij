<?php

namespace App\Http\Controllers;

use App\Http\Traits\SearchableModelTrait;
use App\Events\ApproveOrder;
use App\Events\OrderCreated;
use App\Models\Order;
use App\Models\Advertiser;
use App\Models\Project;
use App\Models\Contact;
use App\Models\User;
use App\Models\Publisher;
use App\Services\SearchService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    protected $searchService;

    private static $page_title_section = 'Orders';

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;


        $this->subpages = [
            'Ordergegevens' => 'orders.edit',
            'Print' => 'orders.print',
            'Klachten' => 'orders.complaints',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchQuery = $request->input('search');

        $user_id = Auth::user()->id;

        $this->subpages = [
            'Openstaand' => 'orders.index',
            'Goedgekeurd' => 'orders.seller.certified',
            'Akkoord' => 'orders.advertiser.certified',
            'Geannuleerd' => 'orders.deactivated',
        ];

        if (Gate::allows('isSeller')) {
            unset($this->subpages['Akkoord']);

            $orders = Order::query()
                ->latest()
                ->where('user_id', $user_id)
                ->whereNull('deactivated_at')
                ->whereNull('administration_approved_at')
                ->whereNull('seller_approved_at')
                ->when($searchQuery, function ($query) use ($searchQuery) {
                    $this->searchService->search($query, $searchQuery, [
                        'id',
                        'advertiser.name',
                        'advertiser.city',
                        'advertiser.email',
                    ]);
                })
                ->paginate(12);
        } else {
            $orders = Order::latest()
                ->whereNull('deactivated_at')
                ->whereNull('administration_approved_at')
                ->whereNull('seller_approved_at')
                ->when($searchQuery, function ($query) use ($searchQuery) {
                    $this->searchService->search($query, $searchQuery, [
                        'id',
                        'advertiser.name',
                        'advertiser.city',
                        'advertiser.email',
                    ]);
                })
                ->paginate(12);
        }

        return view('pages.orders.index', compact('orders'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpagesData' => $this->getSubpages(),
            ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function deactivated(Request $request)
    {
        $searchQuery = $request->input('search');

        $orders = Order::whereNotNull('deactivated_at')
            ->paginate(12);    

        


        $this->subpages = [
            'Openstaand' => 'orders.index',
            'Goedgekeurd' => 'orders.seller.certified',
            'Akkoord' => 'orders.advertiser.certified',
            'Geannuleerd' => 'orders.deactivated',
        ];

        if (Gate::allows('isSeller')) {
            unset($this->subpages['Akkoord']);
        }

        return view('pages.orders.index', compact('orders'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpagesData' => $this->getSubpages(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $advertiser_id)
    {
        $advertiser = Advertiser::findOrFail($advertiser_id);
        $publishers = Publisher::has('projects', '>', 0)->get();
    
        $projects = Project::where('user_id', Auth::user()->id)
            ->get();
    
        return view('pages.orders.create', compact('advertiser', 'projects', 'publishers'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
            ]);
    }
    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request, string $advertiser_id)
    {
        $order_id = null;

        try {
            DB::transaction(function () use($request, $advertiser_id, &$order_id) {


                $contact_id = $request->input('contact');
                $contact = Contact::findOrFail($contact_id);

                $publisher_id = $request->input('publisher');
                $publisher = Publisher::findOrFail($publisher_id);

                $user_id = Auth::user()->id;
                $user = User::findOrFail($user_id);

                $advertiser = Advertiser::findOrFail($advertiser_id);

                $token = Str::random(60);

                $order = Order::create([
                    'advertiser_id' => $advertiser_id,
                    'user_id' => $user_id,
                    'order_date' => now(),
                    'order_total_price' => 0.0,
                    'validation_token' => $token,
                ]);

                $order_id = $order->id;


                $order->user()->associate($user);
                $order->contact()->associate($contact);
                $order->advertiser()->associate($advertiser);
                $order->publisher()->associate($publisher);
                $order->save();
            });

            Alert::toast('De order is successvol aangemaakt', 'success');

            return redirect()->route('orders.edit', $order_id);
        } catch (\Exception $e){
            Alert::toast('Er is iets fout gegaan', 'error');
            return redirect()->route('orders.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $order_id)
    {
        // $order = Order::findOrFail($order_id);

        $order = Order::with('orderLines')->findOrFail($order_id);
        $orderlines = $order->orderLines()
            ->withTrashed()
            ->paginate(12);



        $projects = Project::where('user_id', $order->user_id)
            ->where('publisher_id', $order->publisher_id)
            ->get();

        $selectedOrder = Order::with('orderLines.project')->find($order_id);



        return view('pages.orders.edit', compact('order','selectedOrder', 'projects', 'orderlines'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'pageTitle' => $order->title,
                'subpagesData' =>  $this->getSubpages($order_id)
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $order_id)
    {

        try {

            $order = Order::findOrFail($order_id);

            $method_approval = $request->input('method_approval', []);
            $all_selected_approval = in_array('email', $method_approval) && in_array('post', $method_approval);
            $order_method_approval = $all_selected_approval ? 'all' : implode(',', $method_approval);

            $method_invoice = $request->input('method_invoice', []);
            $all_selected_invoice = in_array('email', $method_invoice) && in_array('post', $method_invoice);
            $order_method_invoice = $all_selected_invoice ? 'all' : implode(',', $method_invoice);


            $file = $request->file('order_file');

            $file_2 = $request->file('order_file_2');

            DB::transaction(function () use ($request, $order_id, $order_method_approval, $order_method_invoice, $file, $file_2, $order) {


                $file_name = null;
                $file_name_2 = null;

                if ($file) {
                    $file_name = time() . '.' . $file->extension();
                    $file->move(public_path('images/uploads/orders'), $file_name);
                }

                if ($file_2) {
                    $file_name_2 = time() . '_2' . '.' .  $file_2->extension();
                    $file_2->move(public_path('images/uploads/orders'), $file_name_2);
                }



                Order::where('id', $order_id)->update([
                    // 'order_date' => $request->input('order_date'),
                    'administration_approved_at' => $request->input('approved_at') == 1 ? now() : null,
                    'email_sent_at' => $request->input('approved_at') == 1 ? now() : null,
                    'order_method_approval' => $order_method_approval,
                    'order_method_invoice' => $order_method_invoice,
                    'order_file' => $file_name,
                    'order_file_2' => $file_name_2,
                    'material_received_at' => $request->input('material_received_at') == 1 ? now() : null,
                    'deactivated_at' => $request->input('canceldate') ? now() : null,

                ]);
            });

            Alert::toast('De order is succesvol bijgewerkt', 'success');

            return redirect()->route('orders.index');
        } catch (\Exception $e) {
            Alert::toast('Er is iets fout gegaan', 'error');

            return redirect()->route('orders.index');
        }
    }

    public function seller__approve(string $order_id) 
    {
        // // $notifications = Auth::user()->unreadNotifications;

        // foreach($notifications as $notification) {
        // }

        $order = Order::findOrFail($order_id);

        Order::where('id', $order_id)->update([
            'notification_sent_at' => now(),
        ]);

        event(new OrderCreated($order));

        Alert::toast('Notificatie verzonden', 'success');
        Log::info('OrderCreated event dispatched', ['order_id' => $order_id]);
        
        return redirect()->route('orders.index');
    }

    public function preview(string $order_id) 
    {
        $order = Order::findOrFail($order_id);

        $pdf = Pdf::loadView('pages.pdf.preview', compact('order'));

        return $pdf->stream();
    }

    public function seller__approved(Request $request, $order_id)
    {
        try {
            DB::transaction(function () use ($order_id) {
                Order::where('id', $order_id)->update([
                    'seller_approved_at' => now(),
                ]);
            });

            $user = Auth::user();


            foreach ($user->unreadNotifications as $notification) {
                $notification->markAsRead();
            }

            
            Alert::toast('Order is goedgekeurd', 'success');
            return redirect()->route('orders.index');
        } catch (\Exception $e) {
            dd($e);
            Alert::toast('Er is iets fout gegaan', 'error');
            return redirect()->route('orders.index');
        }
    }
    
    public function approved__page() {
        $orders = Order::whereNotNull('seller_approved_at')  
            ->paginate(12)
            ->latest();

        return view('orders.index', compact('orders'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'pageTitle' => $order->title,
                'subpagesData' => $this->getSubpages($order_id),
            ])
        ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $order_id)
    {
        $order = Order::find($order_id);

        if ($order) {
            $order->delete();

            Alert::toast('De order is verwijderd.', 'info');
        }

        return redirect()->route('orders.edit', $order_id);
    }

    public function print(string $order_id)
    {
        $order = Order::findOrFail($order_id);

        return view('pages.orders.print')->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $order->title,
            'subpagesData' => $this->getSubpages($order_id),
        ]);
    }

    public function articles(string $order_id)
    {
        $order = Order::findOrFail($order_id);

        return view('pages.orders.articles')->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $order->title,
            'subpagesData' => $this->getSubpages($order_id),
        ]);
    }
    public function complaints(string $order_id)
    {
        $order = Order::findOrFail($order_id);

        return view('pages.orders.complaints')->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $order->title,
            'subpagesData' => $this->getSubpages($order_id),
        ]);
    }

    public function seller__certified() {

        $orders = Order::whereNotNull('seller_approved_at')
            ->latest()
            ->whereNull('administration_approved_at')
            ->paginate(12);

        $this->subpages = [
            'Openstaand' => 'orders.index',
            'Goedgekeurd' => 'orders.seller.certified',
            'Akkoord' => 'orders.advertiser.certified',
            'Geannuleerd' => 'orders.deactivated',
        ];

        if (Gate::allows('isSeller')) {
            unset($this->subpages ['Akkoord']);
        }

        return view('pages.orders.index', compact('orders'))->with([
            'pageTitleSection' => self::$page_title_section,
            'subpagesData' => $this->getSubpages(),
        ]);
    }

    public function administration__certified() {
        $orders = Order::whereNotNull('administration_approved_at')
            ->latest()
            ->whereNotNull('seller_approved_at')
            ->paginate(12);
            $this->subpages = [
                'Openstaand' => 'orders.index',
                'Goedgekeurd' => 'orders.seller.certified',
                'Akkoord' => 'orders.advertiser.certified',
                'Geannuleerd' => 'orders.deactivated',
            ];

            return view('pages.orders.index', compact('orders'))->with([
                'pageTitleSection' => self::$page_title_section,
                'subpagesData' => $this->getSubpages(),
            ]);
    }

}
