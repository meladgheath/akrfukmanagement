<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use Mpdf\MpdfException;


class UserController extends Controller
{
    //
    /**
     * @throws MpdfException
     */
    public function exportPdf()
    {
//        $userIds = $request->query('ids', []);
//        print_r($request);
//        print_r($userIds);
//          $users = User::where('id', $id)->first();

        $users = User::all();
//        $users = User::query()->whereIn('id', $userIds)->get();
//        $users = User::all()->where('id','=',$id)->first();
//        dd($users);

        // Generate the PDF
//        $pdf = Pdf::loadView('exports.users-pdf', compact('users'));
//        $pdf = Pdf::loadView('export.users.pdf', compact('users'));
//        return $pdf->download('users-list.pdf');

        $html = view('exports.users-pdf', compact('users'))->render();

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'default_font' => 'amiri', // Use a font that supports Arabic
        ]);

        $mpdf->WriteHTML($html);
        $mpdf->Output('users-list.pdf', 'D');
    }
}
