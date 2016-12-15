<?php
  session_start();
  
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');

if(isset($_SESSION['admin']) && $_SESSION['admin']=='tecnoventa,$%a-dmin'){
  
?>
<!doctype html>

<html lang="en">
<head>
    <title>Nuevo Producto</title>
    <link rel="stylesheet" type="text/css" href="../css/producto.css"/>
    <script type="text/javascript" language="javascript" src="../js/funcion_validar.js"></script>
</head>
<body>
    <div id="encabezado">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
    
    <div id="cuerpo">
        
        <div id="imp">
           <output id="list"></output>
        </div>
        
        <form action="agpro.php" id="formulario" name="formulario" method="post" enctype="multipart/form-data">
            <div id="msj">
                <h3>Los campos marcados no estan llenados correctamente</h3>
            </div>
            <div id="fp">
                
                <div id="tfp">
                    <h1 style="text-align: center">Nuevo Producto</h1>
                </div>
                
                <div id="fp1">
                    <label for="cod" id="c">Codigo:</label>
                    <input type="text" id="cod" name="codi" size="15" readonly="readonly" value="<?php echo rand(6000,24000); ?>"/>
                        
                    <label for="producto" id="no">Nombre:</label>
                    <input type="text" id="producto" name="producto"/><span id="spprod" name="producto">El campo esta vacio</span>
                        
                    <label for="descrip" id="ds">Descripcion:</label>
                    <input type="text" id="descrip" name="descrip" size="45"/><span id="spdescr" name="descrip">El campo esta vacio</span>
                </div>
                
                 <div id="fp2">
                    <label for="categoria" id="cg">Categoria:</label>
                    <input type="text" id="categoria" name="categoria"/><span id="spcat" name="categoria" >El campo esta vacio</span>
                        
                    <label for="contado" id="ppc">Precio de Contado:</label>
                    <input type="text" id="contado" name="contado" size="15"/><span id="spcont" name="contado">campo vacio</span>
                        
                    <label for="credito" id="lbpac">Precio a Credito:</label>
                    <input type="text" id="credito" name="credito" size="15"/><span id="spcred" name="credito">El campo esta vacio</span>
                        
                    <label for="cantidad" id="cpn">Cantidad:</label>
                    <input type="text" id="cantidad" name="cantidad"/><span id="spcant" name="cantidad">vacio</span>
                </div>
                 
                 <div id="fp3">
                    <label for="proveedor" id="prov">Proveedor:</label>
                    <input type="text" id="proveedor" name="proveedor" onchange="comprobar(this.value)"/><span id="spprov" name="proveedor">El campo esta vacio</span>
                        
                    <label for="modelo" id="mp">Modelo:</label>
                    <input type="text" id="modelo" name="modelo" size="30"/><span id="spmod" name="modelo">vacio</span>
                        
                    <label for="color" id="cpn">Color:</label>
                    <input type="text" id="color" name="color"/><span id="spcolor" name="color">El campo esta vacio</span>
                </div>
                 
                 <div id="enviar">
                    <!--<input type="submit" value="Editar!!" id="ed"/>-->
                    <input type="submit" value="Registrar!!" id="regpr" name="art"/>
                    <input type="hidden" value="<?php print (isset($variable))? $variable:'x' ; ?>" name="accion"/>
                    <!--<input type="submit" value="Modificar!!" id="mod" name="modific"/>-->
                </div>
                 
            </div>
            
            <div id="fl">
               <input type="file" id="fil" name="archivo"/>
            </div>
        </form>
        
    </div>
    
    <div id="pie">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
</body>
<script type="text/javascript" language="javascript" src="../js/producto.js"></script>
</html>
<?php
}else{
?>
  <p>Inicie sesion para ver esta Interfaz</p>     
<?php
}
?>