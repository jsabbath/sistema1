<?php
 
 require('../libs/fpdf/fpdf.php');
 include_once('../libs/adodb/adodb.inc.php');
 include_once('conexion.php');
 
 foreach($_GET as $campo=>$valor){
   $swap=$campo;
   $$swap=$valor;
 }
 
 
  class PDF extends FPDF
{
// Cabecera de página
  function Header()
  {
     $this->Image("../imagenes/logo.png",0,10,70,20);//a w es un ancho
     $this->Setfont('Arial','B',10);//la B es en negrita
     $this->SetXY(84,10);
     $this->Cell(80,10,'Tecnoventa S.A DE C.V');//cell o multicell esta dentro de docs
     
     $this->SetXY(10,20);
     $this->Cell(192,8,'Informacion De Cliente',0,1,'C');
  }

  function Footer()
  {
      $this->SetY(-10);
      $this->SetFont('Arial','',8);
      $this->Cell(192,4,'Tecnoventa S.A DE C.V','LR',0,'C');
      $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
}
 
 
 
 
 $pdf = new PDF();
 $pdf->AliasNbPages();
 $pdf->AddPage();

 $pdf->SetXY(10,40);
 $pdf->Setfont('Arial','B',8);
 $pdf->Cell(192,10,'Id Cliente: ');
 $pdf->Ln(15);
 
 $pdf->Cell(192,10,'Nombre: '. ucwords($nombre));
 $pdf->Ln(15);
 
 $pdf->Cell(192,10,'Apellido Paterno: '. ucwords($paterno));
 $pdf->Ln(15);
 
 $pdf->Cell(192,10,'Apellido Materno: '. ucwords($materno),0,1,'L');
 $pdf->Ln(5);
 
 $pdf->Cell(192,10,'Direccion: '. $calle,0,1,'L');
 $pdf->Ln(5);
 
 $pdf->Cell(192,10,'Telefono: '. $telefono,0,1,'L');
 $pdf->Ln(5);
 
 $pdf->Cell(192,10,'Ocupacion: '. $ocupacion,0,1,'L');
 $pdf->Ln(5);
 
 $pdf->Cell(192,10,'Colonia: '. $colonia,0,1,'L');
 $pdf->Ln(5);
 
 $pdf->Cell(192,10,'Numero: '. $numero,0,1,'L');
 $pdf->Ln(5);
 
 $pdf->Cell(192,10,'Ciudad: '. $ciudad,0,1,'L');
  
  
  
  $pdf->Output();
?>