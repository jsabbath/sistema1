<?php
   include_once('../libs/adodb/adodb.inc.php');
   include_once('conexion.php');
   
    if(isset($_POST['folio']) ){
        foreach($_POST as $txt=>$valor){
             $swap = $txt;
             $$swap=$valor;
          }
            
            $venta = new venta();
            $venta->vender("$folio","$fecha","$codigo","$articulo","$precio","$cantidad","$pago","$cliente");
      }
      
      class venta{
        function vender($fol,$fe,$cod,$art,$prec,$canti,$pag,$clien){
            $enlace = conectar();
            
            $qry_agrega = "call venta_online('$fol','$fe','$cod','$art','$prec','$canti','$pag','$clien')";
            $rst_cliente = $enlace->Execute($qry_agrega);
            
            if($rst_cliente == false){
              die("fallo");
            }
            else{
              ?>
                <script type="text/javascript">
                  alert("La venta se Realizo Con Exito");
                  history.go(-1);
                </script>
              <?php
            }
        }
      }
?>