<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;


class FillPDFController extends Controller
{
   public function process(Request $request){
    $nama  ='Wahyu Tqgdiluyl Nasution Raja Guk Guk';
    $outputfile = public_path().'dcc.pdf';
    $this->fillPDF(public_path().'/master/dcc.pdf',$outputfile,$nama);
    return response()->file($outputfile);


   }

   public function fillPDF($file,$outputfile, $nama){
     $fpdi = new FPDI ;
     $fpdi->setSourceFile($file);
     $template = $fpdi->importPage(1);
     $size = $fpdi->getTemplateSize($template);
     $fpdi->AddPage($size['orientation'],array($size['width'],$size['height']));
     $fpdi->useTemplate($template);
     $top =98;
     $right = 80;
     $name  = $nama;
     if(str_word_count($name)>3){
      $right = $right - (str_word_count($name)*5);
     }
     $fpdi->SetFont("helvetica","",30);
     
     $fpdi->SetTextColor(25,26,25);
     $fpdi->Text($right,$top,$name);
     return $fpdi->Output($outputfile,'F');
   }
}
