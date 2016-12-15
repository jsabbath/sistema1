<?php
 
 require('../libs/fpdf/fpdf.php');
 include_once('../libs/adodb/adodb.inc.php');
 include_once('conexion.php');
 
 foreach($_GET as $campo=>$valor){
   $swap=$campo;
   $$swap=$valor;
 }
 
  $bd = conectar();
  $sql = "SELECT folio,fecha,nombre,apellido,telefono,articulo,cantidad,total FROM contado";
  $rst = $bd->Execute($sql);
 
  class PDF extends FPDF
{
// Cabecera de página
  function Header()
  {
     $this->Image("../imagenes/logo.png",0,10,70,20);//a w es un ancho
     $this->Setfont('Arial','B',16);//la B es en negrita
     $this->SetXY(70,10);
     $this->Cell(80,10,'Tecnoventa S.A DE C.V');//cell o multicell esta dentro de docs
     
     $this->SetXY(10,30);
     $this->Cell(192,8,'Concentrado De ventas',0,1,'C');
     
     $this->Setfont('Arial','B',8);
     $this->SetXY(30,50);
     $this->Cell(20,5,'Folio:','BTLR',0,'C');
     $this->Cell(20,5,'Fecha:','BTLR',0,'C');
     $this->Cell(35,5,'nombre:','BTLR',0,'C');
     $this->Cell(20,5,'apellido:','BTLR',0,'C');
     $this->Cell(20,5,'Telefono:','BTLR',0,'C');
     $this->Cell(20,5,'articulo:','BTLR',0,'C');
     $this->Cell(20,5,'total:','BTLR',0,'C');
     $this->Cell(20,5,'cantidad:','BTLR',1,'C');
  }

  function Footer()
  {
      $this->SetY(-10);
      $this->SetFont('Arial','',8);
      $this->Cell(192,4,'Todos los derechos reservados'.date('Y'),'LR',0,'C');
      $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
}
 
 
 
 
 $pdf = new PDF();
 $pdf->AliasNbPages();
 $pdf->AddPage();
 if($rst->RecordCount()){
   $pdf->SetFont('Arial','',8);
  
  while(!$rst->EOF){
   $pdf->Cell(20,60,'',0,0);
   //$pdf->SetXY(30,60);
   
   $pdf->Cell(20,5,$rst->fields('folio'),'BTLR',0,'C');
   
   $pdf->Cell(20,5,ucwords($rst->fields('fecha')),'BLR',0,'C');
   
   $pdf->Cell(35,5,ucwords($rst->fields('nombre')),'BTLR',0,'C');
   
   $pdf->Cell(20,5,$rst->fields('apellido'),'BTLR',0,'C');
   
   $pdf->Cell(20,5,$rst->fields('telefono'),'BTLR',0,'C');
   
   $pdf->Cell(20,5,$rst->fields('articulo'),'BTLR',0,'C');
   
   $pdf->Cell(20,5,$rst->fields('cantidad'),'BTLR',0,'C');
   
   $pdf->Cell(20,5,$rst->fields('total'),'BTLR',1,'C');
   $rst->MoveNext();
  }
  
  
  
  $pdf->Output();
 }
?>