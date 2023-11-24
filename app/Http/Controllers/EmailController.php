<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ApprovalMail;
use Carbon\Carbon;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Swift_TransportException;

class EmailController extends Controller
{
    /**
     * Handle the approval of an order.
     *
     * @param  int  $order_id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approval($order_id, Request $request)
    {
        try {
            $order = Order::findOrFail($order_id);

            $pdf = Pdf::loadView('pages.pdf.approval', compact('order'));

            Mail::to('algemeen@wermedia.nl')->send(new ApprovalMail($order, $pdf));

            Order::where('id', $order_id)->update([
                'email_sent_at' => now(),
            ]);


            Log::info('Mail voor goedkeuring succesvol verstuurd: ' . $order->id);
            Alert::toast('Mail voor goedkeuring succesvol verstuurd', 'success');
        } catch (ModelNotFoundException $e) {
            Log::error('Order not found: ' . $order_id);
            Alert::toast('Order niet gevonden', 'error');
        } catch (Swift_TransportException $e) {
            Log::error('Failed to send approval email for order ' . $order_id . ': ' . $e->getMessage());
            Alert::toast('Fout tijdens het versturen van de goedkeuringsmail', 'error');
        } catch (\Exception $e) {
            Log::error('Foutmelding tijdens het versturen van de e-mail voor goedkeuring: ' . $e->getMessage());
            Alert::toast('Foutmelding tijdens het versturen van de e-mail voor goedkeuring', 'error');
        }

        return redirect()->back();
    }
}
