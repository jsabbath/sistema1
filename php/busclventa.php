<?php
   include_once('../libs/adodb/adodb.inc.php');
   include_once('conexion.php');
   
   $enlace = conectar();
   
   $id = $_POST['cliente'];
   
   
   $sql = "select id,nombre from clientes where id='$id'";
   
   $set = $enlace->Execute($sql);
   
   if($set->RecordCount()){
    echo $respuesta = $set->fields('nombre');
   }else{
      echo $respuesta = 0;
   }
?>