<?php
  session_start();
  
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');
  if(isset($_GET['id'])){
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
    <title>Ventas a Credito</title>
    <link rel="stylesheet" type="text/css" href="../css/credito.css"/>
    <script type="text/javascript" src="../js/validventas.js"></script>
</head>
<body>
    <div id="encabezado">
        <div id="sd">
            <!--<span>Bienvenido: </span><br/>
            <span>Regresar</span>-->
        </div>
    </div>
    
    <div id="contenido">
        <div id="venta">
            <form id="credito" name="credito" action="venta_credito.php" method="post">
                <fieldset>
                    <legend>Productos a Credito</legend>
                    <div id="g1">
                        <label for="Nf">No Folio:</label>
                        <input type="text" maxlength="10" size="10" disabled="disabled" id="Nf" name="nf" value="<?php echo rand(7200150,9200150); ?>"/>
                    </div>
                    <div id="g2">
                        <label for="Nc" id="numc">No Cliente:</label>
                        <input type="text" maxlength="10" size="10" id="Nc" name="cliente" value="<?php echo isset($id)? $id : '' ?>"/>
                    </div>
                    <div id="g3">
                        <label for="c">Nombre de Cliente:</label>
                        <input type="text" maxlength="10" id="c" readonly="readonly" name="nomc" value="<?php echo isset($nombre)? $nombre : ''?>"/>
                    </div>
                    <div id="g4">
                        <label for="p">Producto:</label>
                        <input type="text" maxlength="10" id="p" name="prod"/>
                        <input type="button" value="Agregar" onclick="art(document.getElementById('p').value)" name="ag" id="bt"/>
                    </div>
                </fieldset>
            
            
            <div id="tb">
                <table>
                    <thead>
                        <tr>
                            <th>Codigo Producto</th>
                            <th>Decripcion</th>
                            <th>precio Credito</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="c1"></td>
                            <td id="c2"></td>
                            <td id="c3">0</td>
                        </tr>
                        <tr>
                            <td id="c4"></td>
                            <td id="c5"></td>
                            <td id="c6">0</td>
                        </tr>
                        <tr>
                            <td id="c7"></td>
                            <td id="c8"></td>
                            <td id="c9">0</td>
                        </tr>
                    </tbody>
                </table>
            </div><!--fin de la tabla-->
            <div id="ab">
              <fieldset>
                <legend>Abono De Compra</legend>
                <div id="g1a">
                    <label for="tot">Total</label>
                    <input type="text" maxlength="10" size="11" id="tot" name="tot"/>
                </div>
                <div id="g2a">
                     <input type="radio" name="abonos" id="r1" value="12"/>
                      <label>Mes</label><br/>
                      <input type="radio" name="abonos" id="r2" value="24"/>
                      <label>Quincena</label><br/>
                      <input type="radio" name="abonos" id="r2" value="48"/>
                      <label>Semana</label><br/>
                  </div>
                 <div id="g3a">
                      <label for="tot">Abono:</label>
                      <input type="text" maxlength="10" size="10" id="cab" name="abono"/>
                </div>
                  <div id="g4a">
                     <input type="button" value="Realizar Compra" id="ir" name="ir"/>
                  </div>
                </fieldset>
            </div>
            
          </form>
            
        </div><!-- aqui termina el div form-->
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