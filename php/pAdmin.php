<?php
  session_start();
  
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');
  if(isset($_POST['oc'])){
    foreach($_POST as $cm=>$val){
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
    <title>Administrador</title>
    <link rel="stylesheet" type="text/css" href="../css/padmin.css"/>
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/font-awesome.css"/>
</head>
<body>
    <div id="encabezado">
        <div id="mensaje">
            <span style="color: #ffffff;">Bienvenido:<?php echo $_SESSION['usuario']?></span><br/>
            <span><a href="configuracionp.php" id="pf" target="muestra">Perfil</a></span><br/>
            <span><a href="salir-admin.php" id="cs">Cerrar Sesion</a></span>
            <input type="hidden" id="oc" name="oc"/>
        </div>
    </div>
   <!-- <div id="izquierdo">
        <div id="cmi">
            <ul id="lat">
               <li><a href="#"><i class="icono izquierda fa fa-user-secret"></i>Perfil <i class="icono derecha fa fa-chevron-down"></i></a>
                   <ul>
                     <li><a href="configuracionp.php" target="muestra">Configuracion</a></li>
                     <li><a href="#">Cambiar Contrase&ntildea</a></li>
                   </ul>
               </li>
               <li><a href="#"><i class="icono izquierda fa fa-star"></i>Proveedores<i class="icono derecha fa fa-chevron-down"></i></a>
                   <ul>
                     <li><a href="Altaprovedores.php">Agregar Proveedor</a></li>
                     <li><a href="busqueda.php?tipo=proveedores" target="muestra">Consultar Proveedor</a></li>
                     <li><a href="busqueda.php">Eliminar Proveedor</a></li>
                   </ul>
               </li>
               <li><a href="#"><i class=" icono izquierda fa fa-share-alt"></i>Informacion<i class="icono derecha fa fa-chevron-down"></i></a>
                  <ul>
                     <li><a href="#"></i>Nosotros</a></li>
                   </ul>
               </li>
            </ul>
        </div>
    </div>-->
    <div class="contenidos">
        <div id="menu">
            <div id="cm">
                <ul id="menu1">
                    <li><a href="#">Clientes</a>
                        <ul>
                           <li><a href="Altac.php" target="muestra">Alta</a></li>
                           <li><a href="busqueda.php?tipo=clientes" target="muestra">Consulta</a></li>
                           <li><a href="tclientes.php" target="muestra">Listar Clientes</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Proveedores</a>
                        <ul>
                           <li><a href="Altaprovedores.php" target="muestra">Alta</a></li>
                           <li><a href="busqueda.php?tipo=proveedores" target="muestra">Consulta</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Productos</a>
                         <ul>
                           <li><a href="tinventario.php" target="muestra">Inventario</a></li>
                           <li><a href="altaproducto.php" target="muestra">Alta</a></li>
                           <li><a href="busqueda.php?tipo=productos" target="muestra">Consultar</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Personal</a>
                        <ul>
                           <li><a href="altapersonal.php" target="muestra">Alta</a></li>
                           <li><a href="busqueda.php?tipo=personal" target="muestra">Consulta</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Crear</a>
                        <ul>
                           <li><a href="contado-b.php" target="muestra">Venta</a></li>
                           <li><a href="factura.php" target="muestra">Recibo</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Ventas</a>
                        <ul>
                           <li><a href="tcontado.php" target="muestra">Contado</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
   <!-- <iframe id="fr" name="muestra" scrolling="auto">

	</iframe>-->
    <div id="muestra" name="muestra">
      <iframe style="border-style: none;" id="fr" name="muestra" scrolling="auto">

	  </iframe>
    </div>
    <div id="pie">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="../js/codigo.js"></script>
</body>
</html>
<?php
}else{
?>
  <p>Inicie sesion para ver esta Interfaz</p>     
<?php
}
?>
