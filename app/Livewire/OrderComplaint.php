<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Complaint;
use App\Models\OrderLine;
use App\Models\Order;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class OrderComplaint extends Component
{
    public $orderline;
    public $order;
    // public $type;
    // public $description;
    public $displayComplaint = false;

    protected $listeners = ['showComplaint'];

    public function mount($orderline)
    {
        $this->orderline = $orderline;
    }

    public function showComplaint()
    {
        $this->displayComplaint = true;
    }

    // public function submitForm()
    // {
    //         $orderline = OrderLine::findOrFail($this->orderline->id);
    //         $order = Order::findOrFail($this->order->id);
    
    //         $complaint = Complaint::create([
    //             'complaint_date' => Carbon::now(),
    //             'type' => $this->type,
    //             'description' => $this->description,
    //         ]);

    //         $complaint->orderline()->associate($orderline);
    //         $complaint->order()->associate($order);
    //         $complaint->save();
    
    //         return redirect()->route('orders.edit', $order->id);
    // }
    
    

    public function render()
    {
        return view('livewire.order-complaint');
    }
}
