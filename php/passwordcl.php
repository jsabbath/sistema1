<?php
    include_once('../libs/adodb/adodb.inc.php');
    include_once('conexion.php');
        
    if(isset($_GET['repite']) ){
       foreach($_GET as $txt=>$valor){
           $swap = $txt;
            $$swap=$valor;
                
           $campo = $_GET['repite'];
           $user = $_GET['val'];
         }

        $bd = conectar();
        $sql = "UPDATE clientes SET password='$campo' WHERE id='$user'";
        $set = $bd->Execute($sql);
        header("Location:configuracion.php");
    }
    //$sql = "UPDATE clientes SET pass='$repite' WHERE id='$usuario'";
    //$real = $enlace->Execute($sql);
    //header("Location:configuracion.php");
?>