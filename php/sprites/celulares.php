<!doctype html>

<html lang="en">
<head>
    <title>Laptops</title>
    <link rel="stylesheet" href="celulares.css" type="text/css" />
</head>
<body>
    <div id="image">
        <?php
            include_once('../../libs/adodb/adodb.inc.php');
    
            $conn=ADONewConnection('mysqli');
            $conn->Connect('localhost','root','','tecnoventa');
            
            $consulta = "select imagen from producto where categoria='celulares'";
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
      <div id="d1">
        <input type="button" value="Credito"/>
        <input type="button" value="comprar" onclick='window.showModalDialog("../contado.php?id=7378&precio=5000","","dialogWidth=600px;dialogHeight:570px")'/>
      </div>
      
       <div id="d2">
        <input type="button" value="favoritos"/>
        <input type="button" value="comprar" onclick='window.showModalDialog("../contado.php?id=12785&precio=8000","","dialogWidth=600px;dialogHeight:570px")'/>
      </div>
       
      <div id="d3">
        <input type="button" value="favoritos"/>
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
    </div>
</body>
</html>
