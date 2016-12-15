<?php
  include_once('conexion.php');
  include_once('../libs/adodb/adodb.inc.php');
  
    if(isset($_POST['nc']) || isset($_POST['tarjeta']) ){
        foreach($_POST as $txt=>$valor){
             $swap = $txt;
             $$swap=$valor;
          }
          
           $sha1 = sha1($contrasena); 
            
            $cliente = new cliente();
            $cliente->altac("$nc","$nombrec","$segundoac","$primerac","$rfc","$sha1","$telefono","$ocupacion","$calle","$numero","$mail","$colonia","$cp","$cd","$aval","$appaval","$seapaval","$mailcn","$telcn","$occn");
            //$cliente->altap($tarjeta,"$nombrep","$papp","$sapp","$rfc","$mailp",$telefonop,$cargo,"$calle",$numero,"$colonia","$cp","$cd","$nseg","$seguro","$fecha","$curp","$telef","$contra");
      }
  
  
   class cliente {
      function altac($nc,$nombre,$ap,$ap2,$rfc,$pass,$tel,$ocup,$calle,$num,$mail,$col,$cp,$cd,$nr,$ar,$apr2,$mailr,$telr,$ocupr){
        $enlace = conectar();
        
        $qry_agrega = "call agrega_cliente('$nc','$nombre','$ap','$ap2','$rfc','$pass','$tel','$ocup','$calle','$num','$mail','$col','$cp','$cd','$nr','$ar','$apr2','$mailr','$telr','$ocupr','$nombre')";
        $rst_cliente = $enlace->Execute($qry_agrega);
        
        if($rst_cliente == false){
          die("fallo");
        }
        else{
          ?>
            <script type="text/javascript">
              alert("Se agrego un nuevo cliente");
              history.go(-1);
            </script>
          <?php
        }
      }
      
      function altap($tar,$nombre,$ap,$ap2,$rfc,$mail,$tel,$ocup,$calle,$num,$col,$cp,$cd,$seg,$unidad,$naci,$cur,$nac,$pass){
        $enlace = conectar();
        
        $qry_agrega = "call agrega_personal($tar,'$nombre','$ap','$ap2','$rfc','$mail',$tel,'$ocup','$calle',$num,'$col',$cp,'$cd','$seg','$unidad','$naci','$cur',$nac,$pass)";
        $rst_cliente = $enlace->Execute($qry_agrega);
        
        if($rst_cliente == false){
          die("fallo");
        }
        else{
          ?>
            <script type="text/javascript">
              alert("Se agrego nuevo personal");
              history.go(-1);
            </script>
          <?php
        }
      }
      
   }
?>