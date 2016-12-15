<?php
    include_once('../libs/adodb/adodb.inc.php');
    $conn=ADONewConnection('mysqli');
    $conn->Connect('localhost','root','','tecnoventa');
   
        if(isset($_POST['nabono'])){
            foreach($_POST as $campo=>$valor){
                 $swap = $campo;
                 $$swap=$valor;
             }

             $sql = "call abonar('$nabono','$cliente','$folio','$anterior','$importe','$saldo')";
             $set = $conn->Execute($sql);
             $respuesta = ($set->RecordCount()) ? 1 : 0;

             echo $respuesta;
         }
?>