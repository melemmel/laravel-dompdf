<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class PDFController extends Controller
{
    //
    public function generatePDF()
    {
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // // return $pdf->stream(); // View First
        // return $pdf->download(); // Directly Download


        // $pdf = Pdf::loadView('index'); // To Directly Download
        // return $pdf->download('index.pdf');
        // return $pdf->download('index.pdf'); // View First
 
        $name = 'Hello World!';
        $email = 'test@example.com';
        $pdf = Pdf::loadView('index', ['name' => $name, 'email' => $email])->setPaper('a4', 'portrait')->save(public_path('invoice.pdf'));
        // return $pdf->download('email.pdf'. time() .  rand('9999', '99999999'). Str::random('10') . '.pdf');
        return $pdf->download();

        $path = public_path(). '/laravel.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $image = 'data:image/'. $type . ';base64,' . base64_encode($data);

    }
}
