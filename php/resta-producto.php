<?php
    include_once('../libs/adodb/adodb.inc.php');
    include_once('conexion.php');
     $cnn = conectar();
     $cnn1 = conectar();
        if(isset($_POST['codigo'])){
           foreach($_POST as $campo=>$valor){
                 $swap = $campo;
                 $$swap=$valor;
             }
        }
        
        $sql2 = "SELECT cantidad from producto where codigo='$codigo'";
        $set2 = $cnn->Execute($sql2);
        $tmp = 0;
        
        $tmp = (int)$set2->fields('cantidad');
        
        $resta = $tmp - $cantidad;
        
        if($cantidad > $tmp){
            echo $respuesta = 1;
        }else{
            $sql = "UPDATE producto SET cantidad='$resta' WHERE codigo='$codigo'";
            $set = $cnn->Execute($sql);
            
            //$respuesta =  $tmp;     
            echo $resta;
        }
?>