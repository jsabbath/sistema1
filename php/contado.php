<?php
  session_start();
  
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');
  
  if(isset($_GET['id'])){
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
    <title>Venta al Contado</title>
    <link rel="stylesheet" type="text/css" href="../css/contado.css"/>
    <script type="text/javascript" language="javascript" src="../js/operacion-v.js"></script>
</head>
<body>
   <!--     <div id="encabezado">
              <br/><br/><br/>
              <br/><br/><br/>
        </div>-->
    <div id="cuerpo">
        <div id="datos">
            <div id="f1">
                <div id="tit">
                    <h2 style="color: #ffffff; text-align: center">Datos del Cliente:</h2>
                </div>
                <div id="msj">
                      <h3>Los campos marcados no estan llenados correctamente</h3>
                </div> 
                <form id="formulario" name="formulario" method="post" action="venta_contado.php">  
                   <div id="dv">
                        <div id="fol">
                            <label>Folio de Venta:</label>
                            <input type="text" id="foli" readonly="readonly" value="<?php echo rand(3200150,6200150); ?>" name="folio"/>
                        </div>
                        <div id="fec">
                            <label>Fecha:</label>
                            <input type="text" id="fech" name="fecha" readonly="readonly" value="<?php echo date("d/m/y") ?>"/>
                       </div>
                    </div>
                  
                    <div id="dacl">
                        <div id="rfc">
                            <label for="rfc">Rfc:</label>
                            <input type="text" id="rfcc" name="rfc"/>
                        </div>
                        <div id="nom">
                            <label for="nb">Nombre:</label>
                            <input type="text" id="nb" name="nombre"/>
                        </div>
                        <div id="ap">
                            <label for="apll">Apellidos</label>
                            <input type="text" id="apll" name="apellido"/>
                        </div>
                        <div id="dir">
                            <label for="dir">Direccion:</label>
                            <input type="text" id="dire" name="direccion"/>
                        </div>
                        <div id="tel">
                            <label for="tl">Telefono:</label>
                            <input type="text" id="tl" name="telefono"/>
                        </div>
                    </div>
                    
                <div id="fp">
                    <div id="tfp">
                        <h2 style="color: #ffffff;">Datos del Articulo</h2>
                    </div>
                     <div id="codart">
                         <label for="art">Articulo:</label>
                         <input type="text" id="art" name="articulo" value="<?php echo isset($id)? $id : '' ?>"/>
                         <label for="prec">Precio:</label>
                         <input type="text" id="prec" name="pr" value="<?php echo isset($precio)? $precio : '' ?>"/>
                     </div>
                     <div id="cant">
                         <label for="cnt">Cantidad:</label>
                         <input type="text" id="cnt" name="canti"/>
                         <input type="button" value="Agregar" id="ag" name="cantidad"/>
                      </div>
                      <div id="tot">
                         <label for="t">Total:</label>
                          <input type="text" id="t" name="total"/>
                       </div>
                      <div id="bv">
                          <input type="submit" value="Realizar Venta" id="vnt" name="vender"/>
                      </div>
                </div>
                </form>
            </div><!--aqui esta el form-->
        </div>
<!--         <div id="f2">
            <br/><br/><br/>
            <br/><br/><br/>
        </div>-->
    </div>
    <!--<div id="pie">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>-->
</body>
<script type="text/javascript" language="javascript" src="../js/pagos.js"></script>
</html>
<?php
}else{
?>
  <p>Inicie sesion para ver esta Interfaz</p>     
<?php
}
?>