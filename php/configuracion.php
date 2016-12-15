<?php
  session_start();
  
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');
  
if(isset($_SESSION['autorizado']) && $_SESSION['autorizado']=='08$5%123'){
     $enlace = conectar();
     $usuario = $_SESSION['id'];
     $consulta = "select * from clientes where id = '$usuario'";
     $set = $enlace->Execute($consulta);
     
     if($set->RecordCount()){
        
     }
     else{
        echo "no hay datos que mostrar";
     }
     
     if(isset($_POST['val'])){
        foreach($_POST as $campo=>$valor){
           $swap=$campo;
           $$swap=$valor;
        }
        if($_POST['val'] == "primero"){
           $sql = "UPDATE clientes SET nombre='$nombres',paterno='$apellido',nick='$nick',calle='$direccion',telefono='$telefono',ocupacion='$ocupacion' WHERE id='$usuario'";
           $real = $enlace->Execute($sql);
           header("Location:configuracion.php");
        }
        if($_POST['val'] == "segundo"){
           $sql = "UPDATE clientes SET pass='$repite' WHERE id='$usuario'";
           $real = $enlace->Execute($sql);
           header("Location:configuracion.php");
        }
     }
?>
<!doctype html>

<html lang="en">
<head>
    <title>Configuracion</title>
    <link rel="stylesheet" type="text/css" href="../css/configuracion.css"/>
     <meta http-equiv="Content-Type" content="text/html" charset="UTF-8"/>
     <script type="text/javascript" language="javascript" src="../js/funcion_validar_perfil.js"></script>
</head>
<body>
    <div id="encabezado">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
    <div id="cuerpo">
        <div id="foto">
            <br/><br/><br/>
            <br/><br/><br/>
        </div>
        <div id="fm1">
            <div id="tit">
                <h2 style="color: #ffffff;">Informacion Personal</h2>
             </div>
            <div id="objetos">
                <form id="formulario" name="formulario" method="post" action="#">
                  <div id="h1">
                   <div id="msj">
                      <h3>Los campos marcados no estan llenados correctamente</h3>
                   </div>   
                    <div id="o1">
                        <label>Numero de Cliente:</label>
                        <input type="text" size="11" maxlength="10" disabled="disabled" id="cliente" name="numero" value="<?php echo $set->fields('id');?>"/>
                    </div>
                    <div id="o2">
                        <label for="ni">Nick:</label>
                        <input type="text" maxlength="16" id="ni" name="nick" value="<?php echo $set->fields('nick');?>"/><span id="spn" name="nick">El campo esta vacio</span>
                    </div>
                    <div id="o3">
                        <label for="n">Nombres:</label>
                        <input type="text" size="25" maxlength="30" id="n" name="nombres" value="<?php echo $set->fields('nombre');?>"/><span id="spno" name="nombres" >El campo esta vacio</span>
                    </div>
                    <div id="o4">
                        <label for="a">Apellidos:</label>
                        <input type="text" maxlength="60" id="a" name="apellido" value="<?php echo $set->fields('paterno');?>"/><span id="spap" name="apellido">El campo esta vacio</span>
                    </div>
                    
                </div>
                  
                <div id="h2">  
                    <div id="o5">
                        <label for="d">Direccion:</label>
                        <input type="text" maxlength="60" id="direccion" name="direccion" value="<?php echo $set->fields('calle');?>"/><span id="spdire" name="direccion">El campo esta vacio</span>
                    </div>
                    <div id="o6">
                        <label for="t">Telefono:</label>
                        <input type="text" maxlength="10" id="t" name="telefono" value="<?php echo $set->fields('telefono');?>"/><span id="sptel" name="telefono">El campo esta vacio</span>
                    </div>
                    <div id="o7">
                        <label for="c">Celular:</label>
                        <input type="text" maxlength="10" id="c" name="celular"/><span id="spcel" name="celular">El campo esta vacio</span>
                    </div>
                    <div id="o8">
                        <label for="o">Ocupacion:</label>
                        <input type="text" maxlength="20" id="o" name="ocupacion" value="<?php echo $set->fields('ocupacion');?>"/><span id="spoc" name="ocupacion">El campo esta vacio</span>
                    </div>
                    <div id="sub">
                        <input type="submit" value="Editar" id="bed" name="editar"/>
                        <input type="hidden" id="escondida" name="val" value="primero"/>
                        <input type="submit" value="Modificar!" id="bmo" name="modificar"/>
                    </div>
                </div>
                </form>
             </div><!--aqui termina el div objetos-->
        </div>
        <div id="bsel">
            <input type="file" id="sel" name="modificar"/>
        </div>
        
        <div id="contra">
            <div id="tc">
                <h2 style="color: #ffffff;">Cambio de Contraseña</h2>
            </div>
            <div id="fc">
                <form id="formulario1" name="formcontra" action="passwordcl.php" method="get">
                    <div id="hc1">
                        <div id="fc1">
                            <label for="cact">Contraseña Actual:</label>
                            <input type="password" maxlength="20" id="cact" name="actual"/><span id="pca" name="actual">El campo esta vacio</span>
                        </div>
                        <div id="fc2">
                            <label for="nvc">Nueva Contraseña:</label>
                            <input type="password" maxlength="20" id="nvc" name="nueva"/><span id="spnv" name="nueva">El campo esta vacio</span>
                        </div>
                        <div id="fc3">
                            <label for="rnvc">Repite Nueva contraseña:</label>
                            <input type="password" maxlength="20" id="rnvc" name="repite"/><span id="sprep" name="repite">El campo esta vacio</span>
                        </div>
                        <div id="btcont">
                            <input type="submit" value="Editar" id="ced" name="editar"/>
                            <input type="hidden" id="escondida" name="val" value="<?php echo $_SESSION['id'];?>"/>
                            <input type="submit" value="Modificar!" id="cmo" name="alterar"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="pie">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
</body>
<script type="text/javascript" language="javascript" src="../js/perfiles.js"></script>
</html>
<?php
}else{
?>
  <p>Inicie sesion para ver esta Interfaz</p>     
<?php
}
?>
