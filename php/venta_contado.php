<?php
  include_once('conexion.php');
  include_once('../libs/adodb/adodb.inc.php');
  
    if(isset($_POST['folio']) ){
        foreach($_POST as $txt=>$valor){
             $swap = $txt;
             $$swap=$valor;
          }
            
            //$telefono = (int)$telefono;
            $pag = (int)$cambio;
            $venta = new ventas();
            $venta->contado("$folio","$fecha","tecnoventa14586","publico en general","sn","delicias",1245,"$productos1","$canti","$total",$pag);
      }
  
  
   class ventas {
      function contado($fol,$fech,$rf,$nom,$ape,$dir,$tel,$art,$cant,$tot,$pag){
        $venta = conectar();
        
        $consulta = "call venta_contado('$fol','$fech','$rf','$nom','$ape','$dir',$tel,'$art','$cant','$tot',$pag)";
        $set_venta = $venta->Execute($consulta);
        
        if($set_venta == false){
          die("fallo");
        }
        else{
          //echo $respuesta = $art;
          header ("Location: factura-pdf.php?folio=$fol");
          
          
        }
      }
      
   }
?>