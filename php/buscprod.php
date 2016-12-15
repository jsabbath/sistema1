<?php
   include_once('../libs/adodb/adodb.inc.php');
   include_once('conexion.php');
   
   $enlace = conectar();
   
   $cod = $_POST['codigo'];
   
   
   $sql = "select codigo,nombre,credito from producto where codigo='$cod'";
   
   $set = $enlace->Execute($sql);
   
   if($set->RecordCount()){
    $arreglo = array($set->fields('codigo'),$set->fields('nombre'),$set->fields('credito'));
    
    for($i=0;$i<count($arreglo);$i++){
        echo $arreglo[$i]." ";
    }
   }else{
      echo $respuesta = 0;
   }
?>