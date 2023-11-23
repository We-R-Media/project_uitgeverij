<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ApprovalMail;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class EmailController extends Controller
{
    /**
     * Handle the approval of an order.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approval($id, Request $request) {
        try {
            $order = Order::findOrFail($id);
            $pdf = Pdf::loadView('pages.pdf.approval', compact('order'));

            Mail::to('algemeen@wermedia.nl')->send(new ApprovalMail($order, $pdf));

            Log::info('Mail voor goedkeuring succesvol verstuurd: ' . $order->id);
            Alert::toast('Mail voor goedkeuring succesvol verstuurd', 'success');
        } catch (ModelNotFoundException $e) {
            Log::error('Order not found: ' . $id);
            Alert::toast('Order niet gevonden', 'error');
        } catch (\Exception $e) {
            Log::error('Foutmelding tijdens het versturen van de e-mail voor goedkeuring: ' . $e->getMessage());
            Alert::toast('Foutmelding tijdens het versturen van de e-mail voor goedkeuring', 'error');
        }

        return redirect()->back();
    }
}
