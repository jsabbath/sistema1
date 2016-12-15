<?php
  session_start();
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');

if(isset($_SESSION['autorizado']) && $_SESSION['autorizado']=='08$5%123'){
      $enlace = conectar();
    if(isset($_GET['numero'])){           
        foreach($_GET as $cm=>$val){
         $intercambio=$cm;
         $$intercambio=$val;
      }
    }
     $sql = "SELECT codigo,nombre,contado from producto where numero='$numero'";
     $set = $enlace->Execute($sql);
     
     if($set->RecordCount()){
        
     }else{
        echo "sin datos del producto";
     }
?>
<!doctype html>

<html lang="en">
<head>
    <title>Venta Online</title>
    <link rel="stylesheet" type="text/css" href="../css/ventaonline.css"/>
</head>
<body>
        <div id="encabezado">
        </div>
    <div id="cuerpo">
        <div id="datos">
            <div id="f1">
                
            <form action="online.php" name="fm" id="fm" method="post">
               <div id="tit">
                    <h2 style="color: #ffffff; text-align: center">Comprar <br/> Online</h2>
                </div>
                
                <div id="dv">
                    <div id="fol">
                        <label>Folio de Venta:</label>
                        <input type="text" id="fol" readonly="readonly" name="folio" value="<?php echo rand(5000,25000) ?>"/>
                    </div>
                    <div id="fec">
                      <label>Fecha:</label>
                      <input type="text" id="fol" readonly="readonly" name="fecha" value="<?php echo date('d/m/y'); ?>"/>
                    </div>
                </div>
                
                   <div id="dacl">
                       <div id="rfc">
                         <label for="rfc">Codigo</label>
                         <input type="text" id="rfc" name="codigo" readonly="readonly" value="<?php echo $set->fields('codigo');?>"/>
                        </div>
                       
                        <div id="nom">
                          <label for="nb">Articulo</label>
                          <input type="text" id="nb" name="articulo" readonly="readonly" value="<?php echo $set->fields('nombre');?>"/>
                        </div>
                        
                        <div id="ap">
                            <label for="apll">Cantidad</label>
                            <input type="text" id="apll" name="cantidad"/>
                        </div>
                        
                        <div id="dir">
                            <label for="dir">Precio</label>
                            <input type="text" id="dir" name="precio" readonly="readonly" value="<?php echo $set->fields('contado');?>"/>
                        </div>
                        
                        <div id="tel">
                            <label for="tl">Tarjeta de Credito</label>
                            <input type="text" id="tl" name="pago"/>
                        </div>
                    </div>
                   
                   <div id="bc">
                     <input type="hidden" name="cliente" id="cliente" value="<?php echo $_SESSION['id']?>">
                     <input type="submit" value="Realizar compra!" id="enviar" name="compra"/>
                   </div>
                   
                </form>
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