<?php
  include_once('conexion.php');
  include_once('../libs/adodb/adodb.inc.php');
  
    if(isset($_POST['idpr']) ){
        foreach($_POST as $txt=>$valor){
             $swap = $txt;
             $$swap=$valor;
          }
            
            $cliente = new cliente();
            $cliente->altaprov("$idpr","$sucursal","$radio","$razon","$comercio","$rfc","$curp","$iva","$fondo","$linea","$clase","$calle","$numero","$colonia","$cd","$contacto","$apcon","$telefono","$mailc");
      }
  
  
   class cliente {
      function altaprov($id,$suc,$rad,$raz,$come,$r,$cu,$iv,$fon,$lin,$clas,$call,$num,$col,$cdp,$con,$app,$tel,$mail){
        $enlace = conectar();
        
        $qry_agrega = "call agrega_proveedor('$id','$suc','$rad','$raz','$come','$r','$cu','$iv','$fon','$lin','$clas','$call','$num','$col','$cdp','$con','$app','$tel','$mail')";
        $rst_cliente = $enlace->Execute($qry_agrega);
        
        if($rst_cliente == false){
          die("fallo");
        }
        else{
          ?>
            <script type="text/javascript">
              alert("Se agrego nuevo proveedor");
              history.go(-1);
            </script>
          <?php
        }
      }
      
   }
?>