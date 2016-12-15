<?php
  include_once('../libs/adodb/adodb.inc.php');
    include_once('conexion.php');
        
    if(isset($_GET['rnc']) ){
       foreach($_GET as $txt=>$valor){
           $swap = $txt;
            $$swap=$valor;
                
           $campo = $_GET['rnc'];
           $user = $_GET['val'];
         }

        $pass = sha1($campo);
        $bd = conectar();
        $sql = "UPDATE personal SET password='$pass' WHERE tarjeta='$user'";
        $set = $bd->Execute($sql);
        header("Location:configuracionp.php");
    }
    //$sql = "UPDATE clientes SET pass='$repite' WHERE id='$usuario'";
    //$real = $enlace->Execute($sql);
    //header("Location:configuracion.php");
?>