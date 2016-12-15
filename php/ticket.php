<?php
  include_once('conexion.php');
  include_once('../libs/adodb/adodb.inc.php');
  $enlace = conectar();
    if(isset($_POST['codigo'])){
        foreach($_POST as $txt=>$valor){
             $swap = $txt;
             $$swap=$valor;
          }

          $cod = (int)$codigo;
          $prec= (int)$precio;
          $cant = (int)$cantidad;
          $tot = (int)$total;
         $qry_agrega = "INSERT INTO ticket (folio,codigo,nombre,precio,cantidad,total) values('$folio',$cod,'$articulo',$prec,$cant,$tot)";
         $rst_cliente = $enlace->Execute($qry_agrega);
      }
?>