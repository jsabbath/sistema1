<?php
 
 require('../libs/fpdf/fpdf.php');
 include_once('../libs/adodb/adodb.inc.php');
 include_once('conexion.php');
 
  if(isset($_GET['folio'])){
    foreach($_GET as $cm=>$val){
        $intercambio=$cm;
        $$intercambio=$val;
   }
 }
 
  $bd = conectar();
  $sql = "SELECT folio,fecha,rfc,nombre,direccion,telefono FROM contado WHERE folio='$folio'";
  $rst = $bd->Execute($sql);

  class PDF extends FPDF {
    function Header(){
          $this->Image("../imagenes/logo.png",0,10,70,20);
          $this->Setfont('Arial','B',10);
          $this->SetXY(100,10);
          $this->Cell(100,10,'Tecnoventa');
          $this->Ln();
          
          $this->SetXY(90,20);
          $this->Cell(80,10,'Tecnoventa Suc. Delicias');
          $this->Ln();
          
          $this->SetXY(104,30);
          $this->Cell(80,10,'Recibo De Compra');
          $this->Ln(10);
          
          $this->SetXY(35,70);
          $this->Cell(30,5,'codigo',1,0,'C');
          $this->Cell(30,5,'Cantidad',1,0,'C');
          $this->Cell(30,5,'Producto',1,0,'C');
          $this->Cell(30,5,'Precio Unitario',1,0,'C');
          $this->Cell(30,5,'Total',1,1,'C');
     }
     function Footer(){
       $this->SetY(-30);
       $this->SetFont('Arial','',8);
       $this->SetTextColor(0,0,255);
       $this->Cell(192,4,'Hoy es un buen dia con Tecnoventa, Cd Delicias Chihuahua ','LR',0,'C');
     }
  }
 
 
 $pdf = new PDF();
 $pdf->AliasNbPages();
 $pdf->AddPage();
 
 $pdf->SetFont('Arial','B',10);
 $pdf->SetXY(10,40);
 $pdf->Cell(192,10,'Folio: '.$rst->fields('folio'),'TBL',0);
 $pdf->SetXY(55,40);
 $pdf->Cell(192,10,'Nombre: '.ucwords($rst->fields('nombre')),'TBL',0);
 $pdf->Ln(9);
           
 $pdf->SetXY(105,40);
 $pdf->Cell(192,10,'RFC: '.$rst->fields('rfc'),'TBL',1,'L');
           
 $pdf->SetXY(150,40);
 $pdf->Cell(192,10,'Telefono: '.$rst->fields('telefono'),'TBLR',1,'L');
           
 $pdf->Cell(192,10,'Direccion: '.$rst->fields('direccion'),'TBL',1);
 $pdf->Ln(15);
           
 $pdf->SetXY(95,50);
 $pdf->Cell(192,10,'Fecha:'.date('d').'/'.date('m').'/'.date('Y'),'TBLR',1,'L');
 $pdf->Ln(5);                
    //
    //$pdf->SetXY(55,70);
    //$pdf->Cell(30,5,$rst->fields('cantidad'),1,0,'C');
    //$pdf->Cell(30,5,$rst->fields('codigo'),1,0,'C');
    //$pdf->Cell(30,5,$rst->fields('contado'),1,0,'C');
    //$pdf->Cell(30,5,$rst->fields('total'),1,0,'C');
 
 
  $cnn = conectar();
  $cons = "SELECT codigo,nombre,precio,cantidad,total FROM ticket WHERE folio='$folio'";
  $rst1 = $cnn->Execute($cons);

  if($rst1->RecordCount()){
     $rst1->MoveFirst();
    $pdf->SetXY(55,75);
    while(!$rst1->EOF){
     $pdf->SetX(35);
      //$pdf->Cell(25,5,'',30,20,'C');
      $pdf->Cell(30,5,$rst1->fields('codigo'),1,0,'C');
      $pdf->Cell(30,5,$rst1->fields('cantidad'),1,0,'C');
      $pdf->Cell(30,5,$rst1->fields('nombre'),1,0,'C');
      $pdf->Cell(30,5,$rst1->fields('precio'),1,0,'C');
      $pdf->Cell(30,5,$rst1->fields('total'),1,1,'C');  
      $rst1->MoveNext();
    }
    $pdf->Ln();
     
    $cnn2 = conectar();
    $cons2 = "SELECT total,pago FROM contado WHERE folio='$folio'";
    $rst2 = $cnn2->Execute($cons2);
    
    $to = (int) $rst2->fields('total');
    $pag = (int) $rst2->fields('pago');
    
    $resta = $pag - $to;
    $pdf->SetXY(155,87);
    $pdf->Cell(30,5,'total: '.$to,1,2,'C');
    $pdf->Cell(30,5,'pago: '.$pag,1,2,'C');
    $pdf->Cell(30,5,'su cambio: '.$resta,1,1,'C');  
     
    //cantidad,codigo,contado,total 
     $pdf->Output();
  }
?>