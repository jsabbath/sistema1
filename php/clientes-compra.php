<?php
 
 require('../libs/fpdf/fpdf.php');
 include_once('../libs/adodb/adodb.inc.php');
 
 $pdf = new FPDF();
 $pdf->AddPage();
 
 $pdf->Setfont('Arial','B',10);
 $pdf->SetXY(100,10);
 $pdf->Cell(100,10,'Tecnoventa');
 $pdf->Ln();
 
 $pdf->SetXY(90,20);
 $pdf->Cell(80,10,'Tecnoventa Suc. Delicias');
 $pdf->Ln();
 
 $pdf->SetXY(95,30);
 $pdf->Cell(80,10,'Recibo de Compra');
 $pdf->Ln(10);
 
 $pdf->SetFont('Arial','B',10);
 $pdf->Cell(192,10,'Folio:','TBL',0);
 
 $pdf->SetXY(55,40);
 $pdf->Cell(192,10,'Nombre:','TBL',0);
 $pdf->Ln(9);
 
 $pdf->SetXY(105,40);
 $pdf->Cell(192,10,'RFC:','TBL',1,'L');
 
 $pdf->SetXY(150,40);
 $pdf->Cell(192,10,'Telefono:','TBLR',1,'L');
 
 $pdf->Cell(192,10,'Direccion:','TBL',1);
 $pdf->Ln(15);
 
 $pdf->SetXY(95,50);
 $pdf->Cell(192,10,'Fecha:'.date('d').'/'.date('m').'/'.date('Y'),'TBLR',1,'L');
 $pdf->Ln(5);
 
 

 
 $pdf->SetY(-30);
 $pdf->SetFont('Arial','',8);
 $pdf->SetTextColor(0,0,255);
 $pdf->Cell(192,4,'Hoy es un buen dia con Tecnoventa.' .date('Y'),'LR',0,'C');
 $pdf->Output();
?>