<?php
  session_start();
  
  include_once('../libs/adodb/adodb.inc.php');
  
  if(isset($_POST['oc'])){
    foreach($_GET as $cm=>$val){
        $intercambio=$cm;
        $$intercambio=$val;
   }
    
    $bd = conectar();
  }

if(isset($_SESSION['admin']) && $_SESSION['admin']=='tecnoventa,$%a-dmin'){
?>
<!doctype html>

<html lang="en">
<head>
    <title>Nuevo Proveedor</title>
    <link rel="stylesheet" type="text/css" href="../css/provedor.css"/>
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
         <form action="agproveedor.php" id="formulario" name="formulario" method="post">
             <div id="msj">
                <h3>Los campos marcados no estan llenados correctamente</h3>
            </div>
             <div id="d1">
                <div id="prov">
                     <label for="idpr" id="lbpr">ID Proveedor:</label>
                     <input type="text" id="idpr" disabled="disabled" name="idpr" size="12" value="<?php echo rand(30000,38000); ?>"/>
                         
                     <label for="sucursal" id="lbsc">Sucursal:</label>
                     <input type="text" id="sucursal" name="sucursal"/><span id="spsuc" name="sucursal">El campo esta vacio</span>
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
                     <input type="text" id="razon" name="razon"/><span id="sprazon" name="razon">El campo esta vacio</span>
                         
                     <label for="comercio" id="lbc">Nombre Comercial:</label>
                     <input type="text" id="comercio" name="comercio"/><span id="spcomercio" name="comercio">El campo esta vacio</span>
                 </div>
                  
                  <div id="f3">
                     <label for="rfc" id="lbr">Rfc:</label>
                     <input type="text" id="rfc" name="rfc"/><span id="sprfc" name="rfc">El campo esta vacio</span>
                         
                     <label for="curp" id="lbcu">Curp:</label>
                     <input type="text" id="curp" name="curp"/><span id="spcurp" name="curp">campo vacio</span>
                         
                     <label for="iva" id="lbiv">Iva:</label>
                     <input type="text" id="iva" name="iva"/><span id="spiva" name="iva">El campo esta vacio</span>
                         
                     <label for="fondo" id="lbfg">Fondo de Garantia:</label>
                     <input type="text" id="fondo" name="fondo" size="13"/><span id="spfondo" name="fondo" >El campo esta vacio</span>
                 </div>
                  
                   <div id="f4">
                     <label for="linea" id="lblm">Linea de Mercancia:</label>
                     <input type="text" id="linea" name="linea"/><span id="splinea" name="linea">El campo esta vacio</span>
                         
                     <label for="clase" id="lbcm">Tipo:</label>
                     <input type="text" id="clase" name="clase"/><span id="spclase" name="clase">El campo esta vacio</span>
                 </div>
                  
             </div>
             
             <div id="ip">
                  <div id="tip">
                     <h2>Localidad</h2>
                 </div>
                  
                  <div id="ip1">
                     <label for="calle" id="lbcll">Calle:</label>
                     <input type="text" id="calle" name="calle"/><span id="spcalle" name="calle">El campo esta vacio</span>
                         
                     <label for="numero" id="lbnmc">Numero:</label>
                     <input type="text" id="numero" name="numero" size="5"/><span id="spnum" name="numero">campo vacio</span>
                         
                     <label for="colonia" id="lbcol">Colonia:</label>
                     <input type="text" id="colonia" name="colonia"/><span id="spcol" name="colonia">El campo esta vacio</span>
                         
                     <label for="cd" id="lbcd">Ciudad:</label>
                     <input type="text" id="cd" name="cd"/><span id="spcd" name="cd">El campo esta vacio</span>
                 </div>
                  
                  <div id="ip2">
                     <label for="contacto" id="lbcon">Contacto:</label>
                     <input type="text" id="contacto" name="contacto"/><span id="spconta" name="contacto">El campo esta vacio</span>
                         
                     <label for="apcon" id="lbac">Apellido:</label>
                     <input type="text" id="apcon" name="apcon"/><span id="spcon" name="apcon">El campo esta vacio</span>
                         
                     <label for="telefono" id="lbtcon">Telefono:</label>
                     <input type="text" id="telefono" name="telefono"/><span id="sptel" name="telefono">El campo esta vacio</span>
                         
                     <label for="emc" id="lbem">email:</label>
                     <input type="text" id="mailc" name="mailc"/><span id="spcmailc" name="mailc">El campo esta vacio</span>
                 </div>
             </div>
             
                <div id="boton">
                    <!--<input type="submit" value="Editar!!" id="ed"/>-->
                    <input type="submit" value="Registrar!!" id="regprov" name="prov"/>
                    <!--<input type="submit" value="Modificar!!" id="mod"/>-->
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