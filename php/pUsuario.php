<?php
  session_start();
  
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');
  if(isset($_POST['var'])){
    // creacion de variables recibidas del formulario
    foreach($_POST as $campo=>$valor){
        $swap=$campo;
        $$swap=$valor;
        
    }
   $enlace = conectar();
  }

if(isset($_SESSION['autorizado']) && $_SESSION['autorizado']=='08$5%123'){
?>
<!doctype html>

<html lang="en">
<head>
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="../css/perfil.css"/>
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/font-awesome.css"/>
</head>
<body>
    <div id="contenedor">
        <div id="encabezado">
          <?php echo "Bienvenido: ".$_SESSION['id'];?>
          <br/><a href="salir.php">Cerrar Sesion</a>
        </div>
        <div id="izquierdo">
            <div id=menu>
                <ul>
                    <li><a href="Inicio.php" target="vista1" title="Inicio"><i class="icono izquierda fa fa-home"></i></a></li>
                    <li><a href="compras.php" target="vista1" title="Mis Compras"><i class="icono fa fa-cart-arrow-down"></i></a></li>
                    <li><a href="catalogo.php" target="vista1" title="Comprar"><i class="icono fa fa-cart-plus"></i></a></li>
                    <li><a href="favoritos.php" target="vista1" title="Mis Deseos"><i class="icono fa fa-star"></i></a></li>
                    <li><a href="configuracion.php" target="vista1" title="Configuracion"><i class="icono fa fa-cogs"></i></a></li>
                </ul>
            </div>
            <input type="hidden" id="var" name="var"/>
        </div>
        
        <iframe name="vista1" id="ifr"></iframe>
        
        <div id=pie>
            <br/><br/><br/>
            <br/><br/><br/>
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
