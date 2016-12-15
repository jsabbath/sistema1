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
    <title>Registro de Personal</title>
    <link rel="stylesheet" type="text/css" href="../css/personal.css"/>
    <script type="text/javascript" src="../js/funcion_validar.js"></script>
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
        
       <div id="form">
            <form action="agpersonal.php" id="formulario" name="formulario" method="post">
                <div id="msj">
                    <h3>Los campos marcados no estan llenados correctamente</h3>
                </div>
                
                <div id="tnc">
                    <h3 style="text-align: center;">Informacion de Empleado</h3>
                </div>
                
                <div id="dp">
                    <div id="tdp">
                        <h2>Datos Personales</h2>
                    </div>
                    
                    <div id="d1">
                        <label for="nc" id="lbc">Numero de Tarjeta:</label>
                        <input type="text" id="nc" name="tarjeta" readonly="readonly" size="15" value="<?php echo rand(5000,25000); ?>"/>
                        
                        <label for="nombrep" id="lb">Nombre(s):</label>
                        <input type="text" id="nombrep" name="nombrep"/><span id="spnp" name="nombrep">El campo esta vacio</span>
                    </div>
                    
                    <div id="d2">
                        <label for="papp" id="lbpa">Primer Apellido:</label>
                        <input type="text" id="papp" name="papp"/><span id="sppap" name="papp">El campo esta vacio</span>
                        
                        <label for="sapp" id="lbsa">Segundo Apellido:</label>
                        <input type="text" id="sapp" name="sapp"/><span id="spsap" name="sapp">El campo esta vacio</span>
                    </div>
                    
                     <div id="d3">
                        <label for="rfc" id="lbrf">RFC:</label>
                        <input type="text" id="rfc" name="rfc"/><span id="sprfc" name="rfc">El campo esta vacio</span>
                            
                        <label for="mailp" id="lbem">e-mail:</label>
                        <input type="text" id="mailp" name="mailp"/><span id="spmailp" name="mailp">vacio</span>
                            
                        <label for="telefonop" id="lbt">Telefono:</label>
                        <input type="text" id="telefonop" name="telefonop"/><span id="sptelp" name="telefonop">El campo esta vacio</span>
                            
                        <label for="cargo" id="lboc">Puesto:</label>
                        <input type="text" id="cargo" name="cargo"/><span id="spcar" name="cargo">El campo esta vacio</span>
                    </div>
                </div>
                
                 <div id="dd">
                    <div id="tdd">
                        <h2>Domicilio</h2>
                    </div>
                    
                    <div id="dc1">
                        <label for="calle" id="lbca">Calle:</label>
                        <input type="text" id="calle" name="calle"/><span id="spcall" name="calle">El campo esta vacio</span>
                          
                        <label for="numero" id="lbnm">Numero:</label>
                        <input type="text" id="numero" name="numero" size="10"/><span id="spnum" name="numero">El campo esta vacio</span>
                    </div>
                    
                    <div id="dc2">
                        <label for="colonia" id="lbco">Colonia:</label>
                        <input type="text" id="colonia" name="colonia"/><span id="spcol" name="colonia">El campo vacio</span>
                          
                        <label for="cp" id="lbcp">C.P:</label>
                        <input type="text" id="cp" name="cp"/><span id="spcp" name="cp">El campo esta vacio</span>
                          
                        <label for="cd" id="lbcd">Ciudad:</label>
                        <input type="text" id="cd" name="cd"/><span id="spcd" name="cd">El campo esta vacio</span>
                    </div>
                </div>
                 
                 
                 <div id="dc">
                    <div id="tdc">
                        <h2>Afiliacion</h2>
                    </div>
                    
                    <div id="dcc">
                        <label for="nseg" id="lbcn">Numero de Seguro Social:</label>
                        <input type="text" id="nseg" name="nseg"/><span id="spnseg" name="nseg">campo vacio</span>
                            
                        <label for="seguro" id="lbpacn">Unidad Medica:</label>
                        <input type="text" id="seguro" name="seguro"/><span id="spum" name="seguro">El campo esta vacio</span>
                            
                        <label for="fecha" id="lbsacn">Nacimiento:</label>
                        <input type="date" id="fecha" name="fecha"/>
                    </div>
                    
                     <div id="dcc1">
                        <label for="curp" id="lbemcn">Curp:</label>
                        <input type="text" id="curp" name="curp"/><span id="spcurp" name="curp">El campo esta vacio</span>
                            
                        <label for="telef" id="lbtcn">Nacionalidad:</label>
                        <input type="text" id="telef" name="telef" readonly="readonly" value="<?php echo substr( md5(microtime()), 1, 8); ?>"/><span id="sptel" name="telef">El campo esta vacio</span>
                            
                        <label for="contra" id="lboc">Contrase&ntilde;a:</label>
                        <input type="text" id="contra" name="contra"/><span id="spcontra" name="contra">El campo esta vacio</span>
                    </div>
                </div>
                 
                 <div id="enviar">
                    <!--<input type="submit" value="Editar!!" id="ed" name="alta"/>-->
                    <input type="submit" value="Registrar!!" id="regp" name="alta"/>
                    <!--<input type="submit" value="Modificar!!" id="mod" name="alta"/>-->
                 </div>
            </form>
            
       </div>
  </div>
    <div id="pie">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
</body>
<script type="text/javascript" src="../js/personal.js"></script>
</html>
<?php
}else{
?>
  <p>Inicie sesion para ver esta Interfaz</p>     
<?php
}
?>
