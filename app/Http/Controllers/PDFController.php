<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layout;
use PDF;
// use Dompdf\Dompdf;
// use Dompdf\Options;

class PDFController extends Controller
{

    public function PDFgenerate() {

        $layouts = Layout::find(1);


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




        $pdf = PDF::loadView('pages.pdf', ['layouts' => $layouts]);
        // return $pdf->download('data.pdf');

        return $pdf->stream('layouts.pdf');
    }
 
  
}
