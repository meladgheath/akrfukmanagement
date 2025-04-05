<?php

namespace App\Http\Controllers;

use App\Models\Hotels;
use App\Models\User;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class HotelsController extends Controller
{
    public function exportPdf($id)
    {

          $model = Hotels::where('id', $id)->first();
          $model = Hotels::where('bills', $model->bills )->get();

        // Generate the PDF
//        $pdf = Pdf::loadView('exports.users-pdf', compact('users'));
//        $pdf = Pdf::loadView('export.users.pdf', compact('users'));
//        return $pdf->download('users-list.pdf');

        $html = view('exports.hotels-pdf', compact('model'))->render();

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'default_font' => 'amiri', // Use a font that supports Arabic
        ]);

        $mpdf->WriteHTML($html);
        $mpdf->Output('users-list.pdf', 'D');
    }
}
