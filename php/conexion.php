<?php

function conectar(){
    include_once('../libs/adodb/adodb.inc.php');
    
    $cnn = ADONewConnection('mysqli');
    
    if(empty($cnn)){
       ?>
        <script type="text/javascript">
           alert("Existen Problemas al Realizar la conexion");
        </script>
       <?php
    }
    if(!$cnn->Connect('localhost','root','','tecnoventa')){
       ?>
        <script type="text/javascript">
           alert("Existen Problemas al Realizar la conexion con la base de datos");
        </script>
       <?php
       die;
    }
    return $cnn;
}
?>