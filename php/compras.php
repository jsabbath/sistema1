<?php
  session_start();

  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');
if(isset($_SESSION['autorizado']) && $_SESSION['autorizado']=='08$5%123'){
     $enlace = conectar();
     
     $user = $_SESSION['id'];
?>
<!doctype html>

<html lang="en">
<head>
    <title>Mis Compras</title>
    <link rel="stylesheet" type="text/css" href="../css/compras.css"/>
</head>
<body>
    <div id="encabezado">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
    <div id="cuerpo">
        <div id="catalago">
          <div id="tit">
            <h2 style="text-align: center; color: #ffffff;">Mis Compras Recientes</h2>
          </div>
          
          <div id="spr">
            
            <div id="todas">
                <?php
                    include_once('../libs/adodb/adodb.inc.php');
            
                    $conn=ADONewConnection('mysqli');
                    $conn->Connect('localhost','root','','tecnoventa');
                    
                    $consulta = "select imagen from producto cross join online where producto.codigo=online.codigo and online.cliente='$user'";
                    $ejecuta = $conn->Execute($consulta);
                    
                    if($ejecuta->RecordCount()){
                    $ejecuta->MoveFirst();
                    while (!$ejecuta->EOF) {
                        ?>
                          <tr>
                           <!--  <td><img height="170" width="200" src="<?php //echo $ejecuta->fields('imagen'); ?>"/></td> -->
                           <td><img height="160" width="160" src="data:image/jpg;base64,<?php echo base64_encode($ejecuta->fields('imagen'));?>"/></td> 
                          </tr>
                        <?php
                        $ejecuta->MoveNext();
                     }
                   }
                ?>
                <!--<img src="../imagenes/m1.jpg" width="200" height="150"/>
                <img src="../imagenes/m1.jpg" width="200" height="150"/>
                <img src="../imagenes/m1.jpg" width="200" height="150"/>
                <img src="../imagenes/m1.jpg" width="200" height="150"/>
                <img src="../imagenes/m1.jpg" width="200" height="150"/>
                <img src="../imagenes/m1.jpg" width="200" height="150"/>-->
            </div>
              
              <div id="f1">
                <div id="in1">
                     <label><a href="#">Nombre del producto</a></label>
                 </div>
                
                  <div id="in2">
                     <label><a href="#">Nombre del producto</a></label>
                 </div>
                  
                 <div id="in3">
                     <label><a href="#">Nombre del producto</a></label>
                 </div>
                 
                 <div id="in4">
                     <label><a href="#">Nombre del producto</a></label>
                 </div>
                 
                  <div id="in5">
                     <label><a href="#">Nombre del producto</a></label>
                 </div>
                  
                   <div id="in6">
                     <label><a href="#">Nombre del producto</a></label>
                 </div>
              </div>
              
          </div>
        </div>
    </div>
    <div id="pie">
        <br/><br/><br/>
        <br/><br/><br/>
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