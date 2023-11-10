<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Layout;
use PDF;
// use Dompdf\Dompdf;
// use Dompdf\Options;

class PDFController extends Controller
{

    public function approval($id) {

        $order = Order::findOrFail($id);


        // $options = new Options();
        // $options->set('isHtml5ParserEnabled', true);
        // $options->set('isPhpEnabled', true);

        // $dompdf = Dompdf($options);

        // $html = view('pages.pdf', ['layouts' => $layouts])->render();
        // $css = file_get_contents(public_path('css/pdf_style.css'));

        // $dompdf->loadHtml($html);
        // $dompdf->loadHtml($css, true);

        // $dompdf->render();

        // return $dompdf->stream('layouts.pdf');

        // $layouts = Layout::all();




        $pdf = PDF::loadView('pages.pdf.approval', compact('order'));
        // return $pdf->download('data.pdf');

        return $pdf->stream('approval.pdf');
    }
 
  
}
