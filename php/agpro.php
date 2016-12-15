<?php
  include_once('conexion.php');
  include_once('../libs/adodb/adodb.inc.php');
  
    if(isset($_POST['codi']) ){
        foreach($_POST as $txt=>$valor){
             $swap = $txt;
             $$swap=$valor;
          }
            $imagen = addslashes(file_get_contents($_FILES['archivo']['tmp_name']));
            $cliente = new cliente();
            $cliente->producto("$codi","$producto","$descrip","$categoria","$contado","$credito","$cantidad","$proveedor","$modelo","$color",$imagen);
      }
  
  
   class cliente {
      function producto($cod,$prod,$des,$cat,$con,$cred,$cant,$prov,$mod,$col,$im){
        $enlace = conectar();
        
        $qry_agrega = "call agrega_producto('$cod','$prod','$des','$cat','$con','$cred','$cant','$prov','$mod','$col','$im')";
        $rst_cliente = $enlace->Execute($qry_agrega);
        
        if($rst_cliente == false){
          die("fallo");
        }
        else{
          ?>
            <script type="text/javascript">
              alert("Se agrego nuevo producto");
              this.close();
              //history.go(-1);
            </script>
          <?php
        }
      }
      
   }
?>