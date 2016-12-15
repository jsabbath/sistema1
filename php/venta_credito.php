<?php
      session_start();
      
      include_once('conexion.php');
      include_once('../libs/adodb/adodb.inc.php');
      
    if(isset($_SESSION['admin']) && $_SESSION['admin']=='tecnoventa,$%a-dmin'){
        if(isset($_POST['nf']) ){
            foreach($_POST as $txt=>$valor){
                 $swap = $txt;
                 $$swap=$valor;
            }
               $nf = (int)$nf;
               $mon = (int)$monto;
               
               $venta = new ventas();
              $venta->contado($nf,"$cliente","$nomc","$prod",$suma,"$abono",$mon);
          }
      
      }else{
      ?>
        <p>Inicie sesion para ver esta Interfaz</p>     
      <?php
    }
      
       class ventas {
          function contado($fol,$cli,$nom,$pro,$tl,$abon,$ab){
            $venta = conectar();

            $consulta = "call venta_credito($fol,'$cli','$nom','$pro',$tl,$abon,$ab)";
            $set_venta = $venta->Execute($consulta);
            
            if($set_venta == false){
              echo 0;
            }
            else{
              echo $set_venta;
            }
          }
          
       }
?>