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
              case 'personal':
                  $qry_accion ="call modifica_personal('$tarjeta','$nombrep','$papp','$sapp','$rfc','$mailp','$telefonop','$cargo','$calle','$numero','$colonia','$cp','$cd','$nseg','$seguro','$fecha','$curp','$telef')";
              break;
          }
          $set = $bd->Execute($qry_accion);
          header("Location:busqueda.php");
      }
?>
<!doctype html>
<html lang="en">
<head>
    <title>Alteracion de Personal</title>
    <link rel="stylesheet" type="text/css" href="../css/mod-per.css"/>
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
            <form action="#" id="formulario" name="formulario" method="post">
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
                        <input type="text" id="nc" name="tarjeta" size="15" value="<?php echo (isset($tarjeta))?$tarjeta:'';?>"/>
                        
                        <label for="nombrep" id="lb">Nombre(s):</label>
                        <input type="text" id="nombrep" name="nombrep" value="<?php echo (isset($nombres))?$nombres:'';?>"/><span id="spnp" name="nombrep">El campo esta vacio</span>
                    </div>
                    
                    <div id="d2">
                        <label for="papp" id="lbpa">Primer Apellido:</label>
                        <input type="text" id="papp" name="papp" value="<?php echo (isset($paterno))?$paterno:'';?>"/><span id="sppap" name="papp">El campo esta vacio</span>
                        
                        <label for="sapp" id="lbsa">Segundo Apellido:</label>
                        <input type="text" id="sapp" name="sapp" value="<?php echo (isset($materno))?$materno:'';?>"/><span id="spsap" name="sapp">El campo esta vacio</span>
                    </div>
                    
                     <div id="d3">
                        <label for="rfc" id="lbrf">RFC:</label>
                        <input type="text" id="rfc" name="rfc" value="<?php echo (isset($rfc))?$rfc:'';?>"/><span id="sprfc" name="rfc">El campo esta vacio</span>
                            
                        <label for="mailp" id="lbem">e-mail:</label>
                        <input type="text" id="mailp" name="mailp" value="<?php echo (isset($correo))?$correo:'';?>"/><span id="spmailp" name="mailp">vacio</span>
                            
                        <label for="telefonop" id="lbt">Telefono:</label>
                        <input type="text" id="telefonop" name="telefonop" value="<?php echo (isset($telefono))?$telefono:'';?>"/><span id="sptelp" name="telefonop">El campo esta vacio</span>
                            
                        <label for="cargo" id="lboc">Puesto:</label>
                        <input type="text" id="cargo" name="cargo" value="<?php echo (isset($puesto))?$puesto:'';?>"/><span id="spcar" name="cargo">El campo esta vacio</span>
                    </div>
                </div>
                
                 <div id="dd">
                    <div id="tdd">
                        <h2>Domicilio</h2>
                    </div>
                    
                    <div id="dc1">
                        <label for="calle" id="lbca">Calle:</label>
                        <input type="text" id="calle" name="calle" value="<?php echo (isset($calle))?$calle:'';?>"/><span id="spcall" name="calle">El campo esta vacio</span>
                          
                        <label for="numero" id="lbnm">Numero:</label>
                        <input type="text" id="numero" name="numero" size="10" value="<?php echo (isset($numero))?$numero:'';?>"/><span id="spnum" name="numero">El campo esta vacio</span>
                    </div>
                    
                    <div id="dc2">
                        <label for="colonia" id="lbco">Colonia:</label>
                        <input type="text" id="colonia" name="colonia" value="<?php echo (isset($colonia))?$colonia:'';?>"/><span id="spcol" name="colonia">El campo vacio</span>
                          
                        <label for="cp" id="lbcp">C.P:</label>
                        <input type="text" id="cp" name="cp" value="<?php echo (isset($postal))?$postal:'';?>"/><span id="spcp" name="cp">El campo esta vacio</span>
                          
                        <label for="cd" id="lbcd">Ciudad:</label>
                        <input type="text" id="cd" name="cd" value="<?php echo (isset($ciudad))?$ciudad:'';?>"/><span id="spcd" name="cd">El campo esta vacio</span>
                    </div>
                </div>
                 
                 
                 <div id="dc">
                    <div id="tdc">
                        <h2>Afiliacion</h2>
                    </div>
                    
                    <div id="dcc">
                        <label for="nseg" id="lbcn">Numero de Seguro Social:</label>
                        <input type="text" id="nseg" name="nseg" value="<?php echo (isset($seguro))?$seguro:'';?>"/><span id="spnseg" name="nseg">campo vacio</span>
                            
                        <label for="seguro" id="lbpacn">Unidad Medica:</label>
                        <input type="text" id="seguro" name="seguro" value="<?php echo (isset($unidad))?$unidad:'';?>"/><span id="spum" name="seguro">El campo esta vacio</span>
                            
                        <label for="fecha" id="lbsacn">Nacimiento:</label>
                        <input type="date" id="fecha" name="fecha" value="<?php echo (isset($nacimiento))?$seguro:'';?>"/>
                    </div>
                    
                     <div id="dcc1">
                        <label for="curp" id="lbemcn">Curp:</label>
                        <input type="text" id="curp" name="curp" value="<?php echo (isset($curp))?$curp:'';?>"/><span id="spcurp" name="curp">El campo esta vacio</span>
                            
                        <label for="telef" id="lbtcn">Contrase&ntilde;a:</label>
                        <input type="text" id="telef" name="telef" value="<?php echo (isset($nacionalidad))?$nacionalidad:'';?>"/><span id="sptel" name="telef">El campo esta vacio</span>
                            
                        <label for="contra" id="lboc">Nacionalidad:</label>
                        <input type="text" id="contra" name="contra"/><span id="spcontra" name="contra">El campo esta vacio</span>
                    </div>
                </div>
                 
                 <div id="enviar">
                    <input type="submit" value="Editar!!" id="ed" name="edita"/>
                    <input type="hidden" value="<?php print (isset($variable))? $variable:'x';?>" id="escondida" name="variable"/>
                    <input type="submit" value="Modificar!!" id="mod" name="alta"/>
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
