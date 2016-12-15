<?php
     session_start();
  
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');
  
if(isset($_SESSION['admin']) && $_SESSION['admin']=='tecnoventa,$%a-dmin'){
  if(isset($_GET['folio'])){           
        foreach($_GET as $cm=>$val){
          $intercambio=$cm;
          $$intercambio=$val;
     }
     
     //$ab = (int)$abono;
     //$t = (int)$total;
     //$sal = $ab - $t;
     //
     //$con = conectar();
     //$consulta = "UPDATE credito SET total='$sal' WHERE folio='$folio')";
     //$recor = $con->Execute($consulta);
  }
?>
<!doctype html>
<head>
    <title>Abono</title>
   <link rel="stylesheet" type="text/css" href="../css/abono-modal.css"/>
   <script type="text/javascript" src="../js/ajax-abono.js"></script>
</head>
<body>
    
    <div id="cuerpo">
         <div id="contenido">
            <h1>Datos Abono</h1>
            <form action="" method="get">
                <div id="c1">
                    <label for="NoAbono" class="cajatexto" >No Abono</label>
                    <input type="text" id="NoAbono" name="NoAbono" value="<?php echo rand(14000,3671890)?>" maxlength=10 size=15 class="cajatexto id"/>
                </div>
               
                <div id="c2">
                    <label for="id Cliente" class="cajatexto">id Cliente</label>
                    <input type="text" id="id Cliente" name="id Cliente" value="<?php echo (isset($cliente))?$cliente:''; ?>" maxlength=10 size=15 class="cajatexto id"/>
                </div>
                
                <div id="c3">
                  <label for="fecha" class="cajatexto">Folio</label>
                  <input type="text" id="fecha" name="fecha" value="<?php echo (isset($folio))?$folio:''; ?>" maxlength=50 class="cajatexto letras"/>
                </div>
                
                <div id="c4">
                    <label for="Importe" class="cajatexto">Importe</label>
                    <input type="text" id="Importe" name="Importe" maxlength=50 class="cajatexto letras"/>
                </div>
                
                <div id="c5">
                   <label for="producto" class="cajatexto">Total</label>
                  <input type="text" id="producto" name="producto" value="<?php echo (isset($total))?$total:''; ?>" maxlength=50 class="cajatexto letras"/>
                </div>
                
                <button id="sub" type="button" onclick="abonar('<?php echo (isset($cliente))?$cliente:'' ?>','<?php echo (isset($folio))?$folio:'' ?>','<?php echo (isset($total))?$total:''; ?>');" name="abona">Modificar Saldo</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php
}else{
?>
  <p>Inicie sesion para ver esta Interfaz</p>     
<?php
}
?>