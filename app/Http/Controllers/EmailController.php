<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ApprovalMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function approval($id, Request $request) {

        $order = Order::findOrFail($id);
        // $email = $order->advertiser->email;

        // dd($email);

        Mail::to('rolniels@gmail.com')->send(new ApprovalMail($order));

        return "Akkoord successvol!";
    }
}
