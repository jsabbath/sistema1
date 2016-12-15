<?php
  session_start();
  include_once('../../libs/adodb/adodb.inc.php');
   $conn=ADONewConnection('mysqli');
  $conn->Connect('localhost','root','','tecnoventa');
  if(isset($_SESSION['autorizado']) && $_SESSION['autorizado']=='08$5%123'){
?>
<!doctype html>

<html lang="en">
<head>
    <title>Laptops</title>
    <link rel="stylesheet" href="laptops.css" type="text/css" />
</head>
<body>
    <div id="image">
        <?php
            include_once('../../libs/adodb/adodb.inc.php');
    
            $conn=ADONewConnection('mysqli');
            $conn->Connect('localhost','root','','tecnoventa');
            
            $consulta = "select imagen from producto";
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
        <!-- <img height=160 width=160 src="imagen.png"/>
         
         <img height=160 width=160 src="imagen.png"/>
         
         <img height=160 width=160 src="imagen.png"/>
         
         <img height=160 width=160 src="imagen.png"/>
         
         <img height=160 width=160 src="imagen.png"/>
         
         <img height=160 width=160 src="imagen.png"/>-->
         
    </div>
    
    <div id="btn">
        <form id="fm" name="fav" action="../agfavoritos.php" method="get" enctype="multipart/form-data">
          <div id="d1">
            <input type="submit" value="favoritos" name="envia"/>
            <input type="button" value="comprar" onclick="location.href='../ventaonline.php?numero=1'"/>
          </div>
          
           <div id="d2">
            <input type="button" value="favoritos"/>
            <input type="button" value="comprar"/>
          </div>
           
          <div id="d3">
            <input type="hidden" value="../imagenes/favoritos/samsung.jpg" id="uno" name="uno">
            <input type="hidden" value="1" id="un" name="img1">
            <input type="submit" value="favoritos" name="enviaf"/>
            <input type="button" value="comprar"/>
          </div>
          
          <div id="d4">
            <input type="button" value="favoritos"/>
            <input type="button" value="comprar"/>
          </div>
          
          <div id="d5">
           <input type="button" value="favoritos"/>
          <input type="button" value="comprar"/>
          </div>
            
          <div id="d6">
            <input type="button" value="favoritos"/>
            <input type="button" value="comprar"/>
          </div>
        
         <input type="hidden" name="cliente" id="cliente" value="<?php echo $_SESSION['id']?>">  
        </form>
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