<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
     public function viewConformacao()
    {
        $data = [
            'foo' => 'bar'
        ];
 
        $pdf = PDF::loadView('pdf.document', $data);
 
        return $pdf->stream('document.pdf');
    }
}
