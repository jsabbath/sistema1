<?php
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');
  
   if(isset($_GET['tipo'])){
        foreach($_GET as $cm=>$val){
              $intercambio=$cm;
              $$intercambio=$val;
              
            $campo = $_GET['tipo'];
            $user = $_GET['identi'];
        }
        
        switch($campo){
           case 'clientes':
                $bd = conectar();
                $consulta = "call elimina_cliente('$user')";
            break;
            case 'personal':
                 $bd = conectar();
                 $consulta = "call elimina_personal('$user')";
              break;
            case 'proveedor':
                $bd = conectar();
                $consulta = "call elimina_proveedor('$user')";
              break;
            case 'articulo':
                 $bd = conectar();
                $consulta = "call elimina_producto('$user')";
              break;
        }
        $set = $bd->Execute($consulta);
        header("Location: busqueda.php");
   }
?>