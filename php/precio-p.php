<?php
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');
   if(isset($_POST['codigo'])){
        foreach($_POST as $cm=>$val){
            $intercambio=$cm;
            $$intercambio=$val;
       }
   }
    
        $cnn = conectar();
        
        $sql2 = "SELECT contado from producto where codigo='$codigo'";
        $set2 = $cnn->Execute($sql2);
        $tmp = $set2->fields('contado');
        
        echo $tmp;
?>