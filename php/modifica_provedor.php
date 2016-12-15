<?php
  session_start();
  
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');
  
if(isset($_SESSION['admin']) && $_SESSION['admin']=='tecnoventa,$%a-dmin'){
   foreach($_GET as $cm=>$val){
        $intercambio=$cm;
        $$intercambio=$val;
   }
    
    $bd = conectar();
    if(isset($_POST['variable']) && $_POST['variable']!='X'){
         //$_POST!='X' arriba en el if va esto
           foreach($_POST as $campo=>$valor){
              $swap = $campo;
              $$swap=$valor;
          }
          
          switch($variable){
              case 'prov':
                  $qry_accion ="call modifica_proveedores('$idpr','$sucursal','$radio','$razon','$comercio','$linea','$clase','$rfc','$curp','$iva','$fondo','$calle','$numero','$colonia','$cd','$contacto','$apcon','$telefono','$mailc')";
              break;
          }
          $set = $bd->Execute($qry_accion);
          header("Location:busqueda.php");
      }
    
?>
<!doctype html>

<html lang="en">
<head>
    <title>Alteracion de Proveedor</title>
    <link rel="stylesheet" type="text/css" href="../css/prov-mod.css"/>
    <script type="text/javascript" language="javascript" src="../js/funcion_validar.js"></script>
</head>
<body>
    <div id="encabezado">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
    
    <div id="cuerpo">
        <div id="tit">
            <h1 style="text-align: center;">BIENVENIDO</h1>
       </div>

        <div id="datos">
         <form action="#" id="formulario" name="formulario" method="post">
             <div id="msj">
                <h3>Los campos marcados no estan llenados correctamente</h3>
            </div>
             <div id="d1">
                <div id="prov">
                     <label for="idpr" id="lbpr">ID Proveedor:</label>
                     <input type="text" id="idpr" name="idpr" size="12" value="<?php echo (isset($id))?$id:'';?>"/>
                         
                     <label for="sucursal" id="lbsc">Sucursal:</label>
                     <input type="text" id="sucursal" name="sucursal" value="<?php echo (isset($sucursal))?$sucursal:'';?>"/><span id="spsuc" name="sucursal">El campo esta vacio</span>
                 </div>
             </div>
             
             <div id="dp">
                 
                  <div id="td">
                     <h2>Tipo de Empresa</h2>
                 </div>
                  
                 <div id="f1">
                     <label for="rs" id="lbrs">Tipo de Persona:</label>
                         
                     <input type="radio" name="radio" id="rm" value="M"/>
                     <label for="rm">Moral</label>
                         
                     <input type="radio" name="radio" id="rf" value="F"/>
                     <label for="rf">Fisica</label><label id="lbrad"></label>
                 </div>
                  
                  <div id="f2">
                     <label for="razon" id="lbrs">Razon Social:</label>
                     <input type="text" id="razon" name="razon" value="<?php echo (isset($razonsocial))?$razonsocial:'';?>"/><span id="sprazon" name="razon">El campo esta vacio</span>
                         
                     <label for="comercio" id="lbc">Nombre Comercial:</label>
                     <input type="text" id="comercio" name="comercio" value="<?php echo (isset($comercial))?$comercial:'';?>"/><span id="spcomercio" name="comercio">El campo esta vacio</span>
                 </div>
                  
                  <div id="f3">
                     <label for="rfc" id="lbr">Rfc:</label>
                     <input type="text" id="rfc" name="rfc" value="<?php echo (isset($rfc))?$rfc:'';?>"/><span id="sprfc" name="rfc">El campo esta vacio</span>
                         
                     <label for="curp" id="lbcu">Curp:</label>
                     <input type="text" id="curp" name="curp" value="<?php echo (isset($curp))?$curp:'';?>"/><span id="spcurp" name="curp">campo vacio</span>
                         
                     <label for="iva" id="lbiv">Iva:</label>
                     <input type="text" id="iva" name="iva" value="<?php echo (isset($iva))?$iva:'';?>"/><span id="spiva" name="iva">El campo esta vacio</span>
                         
                     <label for="fondo" id="lbfg">Fondo de Garantia:</label>
                     <input type="text" id="fondo" name="fondo" size="13" value="<?php echo (isset($fondo))?$fondo:'';?>"/><span id="spfondo" name="fondo" >El campo esta vacio</span>
                 </div>
                  
                   <div id="f4">
                     <label for="linea" id="lblm">Linea de Mercancia:</label>
                     <input type="text" id="linea" name="linea" value="<?php echo (isset($linea))?$linea:'';?>"/><span id="splinea" name="linea">El campo esta vacio</span>
                         
                     <label for="clase" id="lbcm">Tipo:</label>
                     <input type="text" id="clase" name="clase" value="<?php echo (isset($tipo))?$tipo:'';?>"/><span id="spclase" name="clase">El campo esta vacio</span>
                 </div>
                  
             </div>
             
             <div id="ip">
                  <div id="tip">
                     <h2>Localidad</h2>
                 </div>
                  
                  <div id="ip1">
                     <label for="calle" id="lbcll">Calle:</label>
                     <input type="text" id="calle" name="calle" value="<?php echo (isset($calle))?$calle:'';?>"/><span id="spcalle" name="calle">El campo esta vacio</span>
                         
                     <label for="numero" id="lbnmc">Numero:</label>
                     <input type="text" id="numero" name="numero" size="5" value="<?php echo (isset($numero))?$numero:'';?>"/><span id="spnum" name="numero">campo vacio</span>
                         
                     <label for="colonia" id="lbcol">Colonia:</label>
                     <input type="text" id="colonia" name="colonia" value="<?php echo (isset($colonia))?$colonia:'';?>"/><span id="spcol" name="colonia">El campo esta vacio</span>
                         
                     <label for="cd" id="lbcd">Ciudad:</label>
                     <input type="text" id="cd" name="cd" value="<?php echo (isset($ciudad))?$ciudad:'';?>"/><span id="spcd" name="cd">El campo esta vacio</span>
                 </div>
                  
                  <div id="ip2">
                     <label for="contacto" id="lbcon">Contacto:</label>
                     <input type="text" id="contacto" name="contacto" value="<?php echo (isset($contacto))?$contacto:'';?>"/><span id="spconta" name="contacto">El campo esta vacio</span>
                         
                     <label for="apcon" id="lbac">Apellido:</label>
                     <input type="text" id="apcon" name="apcon" value="<?php echo (isset($apellido))?$apellido:'';?>"/><span id="spcon" name="apcon">El campo esta vacio</span>
                         
                     <label for="telefono" id="lbtcon">Telefono:</label>
                     <input type="text" id="telefono" name="telefono" value="<?php echo (isset($telefono))?$telefono:'';?>"/><span id="sptel" name="telefono">El campo esta vacio</span>
                         
                     <label for="emc" id="lbem">email:</label>
                     <input type="text" id="mailc" name="mailc" value="<?php echo (isset($correo))?$correo:'';?>"/><span id="spcmailc" name="mailc">El campo esta vacio</span>
                 </div>
             </div>
             
                <div id="boton">
                    <input type="submit" value="Editar!!" id="ed"/>
                    <input type="hidden" value="<?php print (isset($variable))? $variable:'x';?>" id="escondida" name="variable"/>
                    <input type="submit" value="Modificar!!" id="mod"/>
                 </div>
            </form>
        </div>
    </div>
    
    <div id="pie">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
</body>
<script type="text/javascript" language="javascript" src="../js/proveedor.js"></script>
</html>
<?php
}else{
?>
  <p>Inicie sesion para ver esta Interfaz</p>     
<?php
}
?>