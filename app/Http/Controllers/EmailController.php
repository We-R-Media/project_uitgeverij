<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ApprovalMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use PDF;

class EmailController extends Controller
{
    public function approval($id, Request $request) {

        $order = Order::findOrFail($id);
        $pdf = PDF::loadView('pages.pdf.approval', compact('order'));
        
        Mail::to('algemeen@wermedia.nl')->send(new ApprovalMail($order, $pdf));

        return "Akkoord successvol!";
    }
}
