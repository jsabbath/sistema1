<?php
    require('../libs/fpdf/fpdf.php');
    include_once('../libs/adodb/adodb.inc.php');
    include_once('conexion.php');
    
     if(isset($_POST['folio'])){
       foreach($_POST as $cm=>$val){
           $intercambio=$cm;
           $$intercambio=$val;
      }
    }
    
    $bd = conectar();
    $sql = "SELECT sum(total) as suma from ticket where folio='$folio'";
    $rst = $bd->Execute($sql);
    
    $suma = (int)$rst->fields('suma');
    
    echo $suma;
?>