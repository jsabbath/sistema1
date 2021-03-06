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
    <title>Registro de Cliente</title>
    <link rel="stylesheet" type="text/css" href="css/styleacount.css"/>
    <script type="text/javascript" language="javascript" src="js/script.js"></script>
</head>
<body>
    <div id="encabezado">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
    <div id="cuerpo">
        <div id="tit">
            <h1 style="text-align: center;">Bienvenido</h1>
       </div>
       <div id="form">
          <div id="msj">
                <h3>Los campos marcados no estan llenados correctamente</h3>
          </div>
          <form action="agregar.php" id="formulario" name="formulario" method="post">
            <div id="tnc">
                <h1 style="text-align: center;">Informacion de Cliente</h1>
             </div>
            <div id="dp">
                <div id="tdp">
                    <h2>Datos Personales</h2>
                </div>
                
                <div id="d1">
                    <label for="nc" id="lbc">Numero de Cliente:</label> 
                    <input type="text" id="nc" name="nc" size="15" readonly="readonly" value="<?php echo rand(1000,18000); ?>"/>
                    
                    <label for="nombrec" id="lbnc">Nombre(s):</label>
                    <input type="text" id="nombrec" name="nombrec"/> <span id="spnomc" name="nombrec">El campo esta vacio</span>
                </div>
                
                <div id="d2">
                    <label for="segundoac" id="lbsa">Segundo Apellido:</label>
                    <input type="text" id="segundoac" name="segundoac"/><span id="ssegapc" name="segundoac">El campo esta vacio</span>
                    
                    <label for="primerac" id="lbpa">PrimerApellido:</label>
                    <input type="text" id="primerac" name="primerac"/><span id="sprimapc" name="primerac">El campo esta vacio</span>
                    
                    <label for="rf" id="lbrf">RFC:</label>
                    <input type="text" id="rf" name="rfc"/><span id="sprf" name="rfc">El campo esta vacio</span>
                </div>
                
                 <div id="d3">
                    <label for="contrasena" id="lbem">Contrase&ntilde;a:</label>
                    <input type="text" readonly="readonly" id="contrasena" name="contrasena" value="<?php echo substr( md5(microtime()), 1, 8); ?>"/><span id="spcontra" name="contrasena">vacio</span>
                        
                    <label for="telefono" id="lbt">Telefono:</label>
                    <input type="text" id="telefono" name="telefono"/><span id="sptel" name="telefono">vacio</span>
                    
                    <label for="ocupacion" id="lboc">Ocupacion:</label>
                    <input type="text" id="ocupacion" name="ocupacion"/><span id="spocupa" name="ocupacion">vacio</span>
                </div>
            </div>
            
             <div id="dd">
                <div id="tdd"><!--titulo de datos de domicilio-->
                    <h2>Domicilio</h2>
                </div>
                
                <div id="dc1">
                    <label for="calle" id="lbca">Calle:</label>
                    <input type="text" id="calle" name="calle"/><span id="spcall" name="calle">El campo esta vacio</span>
                      
                    <label for="numero" id="lbnm">Numero:</label>
                    <input type="text" id="numero" name="numero" size="10"/><span id="spnum" name="numero">El campo esta vacio</span>
                      
                    <label for="mail" id="lbma">e-mail:</label>
                    <input type="text" id="mail" name="mail"/><span id="spmail" name="mail">vacio</span>
                </div>
                
                <div id="dc2">
                    <label for="colonia" id="lbco">Colonia:</label>
                    <input type="text" id="colonia" name="colonia"/><span id="spcol" name="colonia">El campo esta vacio</span>
                      
                    <label for="cp" id="lbcp">C.P:</label>
                    <input type="text" id="cp" name="cp"/><span id="spcp" name="cp">El campo esta vacio</span>
                      
                    <label for="cd" id="lbcd">Ciudad:</label>
                    <input type="text" id="cd" name="cd"/><span id="spcd" name="cd">El campo esta vacio</span>
                </div>
            </div>
             
             
             <div id="dc">
                <div id="tdc"><!--titulo de datos de conocido-->
                   <h2>Referencia</h2>
                </div>
                
                <div id="dcc">
                    <label for="avanl" id="lbcn">Nombre(s):</label>
                    <input type="text" id="avanl" name="aval"/><span id="spnaval" name="aval">El campo esta vacio</span>
                        
                    <label for="appaval" id="lbpacn">Primer Apellido:</label>
                    <input type="text" id="appaval" name="appaval"/><span id="spapaval" name="appaval">El campo esta vacio</span>
                        
                    <label for="seapaval" id="lbsacn">Segundo Apellido:</label>
                    <input type="text" id="seapaval" name="seapaval"/><span id="spsapaval" name="seapaval">El campo esta vacio</span>
                </div>
                
                 <div id="dcc1">
                    <label for="mailcn" id="lbemcn">e-mail:</label>
                    <input type="text" id="mailcn" name="mailcn"/><span id="spmailcn" name="mailcn">El campo esta vacio</span>
                        
                    <label for="telcn" id="lbtcn">Telefono:</label>
                    <input type="text" id="telcn" name="telcn"/><span id="sptelcn" name="telcn">El campo esta vacio</span>
                        
                    <label for="occn" id="lboc">Ocupacion:</label>
                    <input type="text" id="occn" name="occn"/><span id="spcoccn" name="occn">El campo esta vacio</span>
                </div>
            </div>
             
             <div id="enviar">
                <!--<input type="submit" value="Editar!!" id="ed" name="edit"/>-->
                <input type="submit" value="Registrar!!" id="regc" name="cliente"/>
                <!--<input type="submit" value="Modificar!!" id="mod" name="modi"/>-->
             </div>
          </form>
       </div>
    </div>
    <div id="pie">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
</body>
<script type="text/javascript" language="javascript" src="../js/clientes.js"></script>
</html>
<?php
}else{
?>
  <p>Inicie sesion para ver esta Interfaz</p>     
<?php
}
?>