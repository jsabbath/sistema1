<?php
  include_once('conexion.php');
  include_once('../libs/adodb/adodb.inc.php');
  
    if(isset($_POST['tarjeta']) ){
        foreach($_POST as $txt=>$valor){
             $swap = $txt;
             $$swap=$valor;
          }
            $pass = sha1($telef);
            $cliente = new cliente();
            $cliente->altap("$tarjeta","$nombrep","$papp","$sapp","$rfc","$mailp","$telefonop","$cargo","$calle","$numero","$colonia","$cp","$cd","$nseg","$seguro","$fecha","$curp","$pass","$contra");
      }
  
  
   class cliente {
      function altap($tar,$nom,$ap,$am,$rfcp,$mail,$tel,$car,$call,$num,$col,$cpp,$cdp,$nms,$seg,$fe,$cur,$nac,$pas){
        $enlace = conectar();
        
        $qry_agrega = "call agrega_personal('$tar','$nom','$ap','$am','$rfcp','$tel','$car','$mail','$call','$num','$col','$cdp','$cpp','$seg','$nms','$fe','$cur','$nac','$pas','$nom')";
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