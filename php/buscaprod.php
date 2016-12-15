<?php
   $valor = $_POST['producto'];
   include_once('../libs/adodb/adodb.inc.php');
   $conn=ADONewConnection('mysqli');
   $conn->Connect('localhost','root','','tecnoventa');
   
   $qry_verifica = "SELECT id from proveedores where id='$valor'";
   
   $rst_verifica = $conn->Execute($qry_verifica);
   
   $respuesta = ($rst_verifica->RecordCount()) ? 1 : 0;
   echo $respuesta;
?>