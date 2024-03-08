<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FPDF;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function generatePdf(){
        return view('pdf.index');
    }

    public function showPdf(Request $request){

        require_once(app_path() . '/Libraries/fpdf/fpdf.php');

        $data = $request->all();
        
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();

        $pdf->SetLineWidth(0.5); 
        $pdf->Line(10, 15, 200, 15); 
        $pdf->Line(10, 16, 200, 16);
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'User Profile Card', 0, 1, 'C'); 

        $pageWidth = $pdf->GetPageWidth();

        $tableWidth = $pageWidth * 0.5;

        $tableX = ($pageWidth - $tableWidth) / 2;

        $imageWidth = 50; 
        $imageX = $tableX + ($tableWidth - $imageWidth) / 2;
        $pdf->Image('https://cdn.iconscout.com/icon/premium/png-512-thumb/account-1889694-1597768.png', $imageX, $pdf->GetY(), $imageWidth);
        
        $pdf->Ln(50);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell($imageX -10, 10, '', 0, 0, 'C');
        $pdf->Cell(25, 10, 'Name', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell($tableX, 10, ': '.$data['name'], 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell($imageX -10, 10, '', 0, 0, 'C');
        $pdf->Cell(25, 10, 'Phone', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell($tableX, 10, ': '.$data['phone'], 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell($imageX -10, 10, '', 0, 0, 'C');
        $pdf->Cell(25, 10, 'Email', 0, 0, 'RL');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell($tableX, 10, ': '.$data['email'], 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell($imageX -10, 10, '', 0, 0, 'C');
        $pdf->Cell(25, 10, 'Age', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell($tableX, 10, ': '.$data['age'], 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell($imageX -10, 10, '', 0, 0, 'C');
        $pdf->Cell(25, 10, 'Birth Date', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell($tableX, 10, ': '.$data['birth_date'], 0, 1, 'L');

        return response($pdf->Output('S'), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="generated.pdf"'
        ]);
    }
}
