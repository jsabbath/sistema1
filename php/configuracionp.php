<?php
  session_start();
  
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');

if(isset($_SESSION['admin']) && $_SESSION['admin']=='tecnoventa,$%a-dmin'){
     $enlace = conectar();
     $usuario = $_SESSION['usuario'];
     $consulta = "select * from personal where tarjeta = '$usuario'";
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
           $sql = "UPDATE personal SET nombres='$nombres',paterno='$ap',nick='$nick',calle='$direccion',puesto='$cel',telefono='$cargo',seguro='$sss' WHERE tarjeta='$usuario'";
           $real = $enlace->Execute($sql);
           header("Location:configuracionp.php");
        }
     }
?>

<!doctype html>

<html lang="en">
<head>
    <title>Configuracion</title>
    <link rel="stylesheet" type="text/css" href="../css/configuracionper.css"/>
     <meta http-equiv="Content-Type" content="text/html" charset="UTF-8"/>
     <script type="text/javascript" language="javascript" src="../js/funcion_validar_perfil.js"></script>
</head>
<body>
    <div id="encabezado">
        
    </div>
    <div id="cuerpo">
        <div id="foto">
            <br/><br/><br/>
            <br/><br/><br/>
        </div>
        <div id="fm1">
            <div id="tit">
                <h4 style="text-align: center; color: #ffffff;">Informacion Personal</h4>
             </div>
            <div id="objetos">
                <form id="formulario" name="formulario" method="post" action="#">
                <div id="msj">
                    <h3>Los campos marcados no estan llenados correctamente</h3>
                </div> 
                <div id="hp1">
                    <div id="o1">
                        <label>Numero de Tarjeta:</label>
                        <input type="text" size="11" maxlength="10" disabled="disabled" id="nt" name="nt" value="<?php echo $set->fields('tarjeta');?>"/>
                    </div>
                    <div id="o2">
                        <label for="ni">Nick:</label>
                        <input type="text" maxlength="16" id="ni" name="nick" value="<?php echo $set->fields('nick');?>"/><span id="spn" name="nick">El campo esta vacio</span>
                    </div>
                    <div id="o3">
                        <label for="n">Nombres:</label>
                        <input type="text" size="25" maxlength="30" id="n" name="nombres" value="<?php echo $set->fields('nombres');?>"/><span id="spnm" name="nombres">El campo esta vacio</span>
                    </div>
                    <div id="o4">
                        <label for="a">Apellidos:</label>
                        <input type="text" maxlength="60" id="a" name="ap" value="<?php echo $set->fields('paterno');?>"/><span id="spap" name="ap">El campo esta vacio</span>
                    </div>
                </div>
                
                <div id="hp2">
                    <div id="o5">
                        <label for="d">Direccion:</label>
                        <input type="text" maxlength="60" id="d" name="direccion" value="<?php echo $set->fields('calle');?>"/><span id="spdir" name="direccion">El campo esta vacio</span>
                    </div>
                    <div id="o6">
                        <label for="t">Celular:</label>
                        <input type="text" maxlength="10" id="t" name="cargo" value="<?php echo $set->fields('telefono');?>"/><span id="spcar" name="cargo">El campo esta vacio</span>
                    </div>
                    <div id="o7">
                        <label for="c">Cargo:</label>
                        <input type="text" maxlength="10" id="c" name="cel" value="<?php echo $set->fields('puesto');?>"/><span id="spce" name="cel">El campo esta vacio</span>
                    </div>
                    <div id="o8">
                        <label for="o">No Seguro Social:</label>
                        <input type="text" maxlength="20" id="o" name="sss" value="<?php echo $set->fields('seguro');?>"/><span id="spss" name="sss">El campo esta vacio</span>
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
                <h4 style="text-align: center; color: #ffffff;">Cambiar Contraseña</h4>
            </div>
            <div id="fc">
                <form id="formulario1" name="fmcontra" action="passwordper.php" method="get">
                    <div id="fc1">
                        <label for="cact">Contraseña Actual:</label>
                        <input type="password" maxlength="20" id="cact" name="cna"/><span id="spn" name="cna">El campo esta vacio</span>
                    </div>
                    <div id="fc2">
                        <label for="nvc">Nueva Contraseña:</label>
                        <input type="password" maxlength="20" id="nvc" name="nvc"/><span id="spn" name="nvc">El campo esta vacio</span>
                    </div>
                    <div id="fc3">
                        <label for="rnvc">Repite Nueva contraseña:</label>
                        <input type="password" maxlength="20" id="rnvc" name="rnc"/><span id="spn" name="nick" name="rnc">El campo esta vacio</span>
                    </div>
                    <div id="btcont">
                        <input type="submit" value="Editar" id="ced" name="ced"/>
                        <input type="hidden" id="escondida" name="val" value="<?php echo $_SESSION['usuario'];?>"/>
                        <input type="submit" value="Modificar!" id="cmo" name="mod"/>
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
<script type="text/javascript" language="javascript" src="../js/perfiles-p.js"></script>
</html>
<?php
}else{
?>
  <p>Inicie sesion para ver esta Interfaz</p>     
<?php
}
?>