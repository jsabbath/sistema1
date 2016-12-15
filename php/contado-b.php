<?php
  session_start();
  
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');
  
if(isset($_SESSION['admin']) && $_SESSION['admin']=='tecnoventa,$%a-dmin'){
  
     //if($rec->RecordCount()){
     //      
     //    $rec->MoveFirst();
     //     while(!$rec->EOF){
     //       
     //     $rec->MoveNext();
     //   }
     // }
?>
<!doctype html>

<html lang="en">
<head>
    <title>Venta al Contado</title>
    <link rel="stylesheet" type="text/css" href="../css/contado-css.css"/>
    <script type="text/javascript" language="javascript" src="../js/operacion-v.js"></script>
</head>
<body>
     <!--   <div id="encabezado">
              <br/><br/><br/>
              <br/><br/><br/>
        </div>-->
    <div id="cuerpo">
        <div id="datos">
            <div id="f1">
                <div id="tit">
                    <h2 style="color: #ffffff; text-align: center">Datos de la venta:</h2>
                </div>
                <div id="msj">
                      <h3>Los campos marcados no estan llenados correctamente</h3>
                </div> 
                <form id="formulario" name="formulario" method="post" action="venta_contado.php">  
                   <div id="dv">
                        <div id="fol">
                            <label>Folio de Venta:</label>
                            <input type="text" id="foli" readonly="readonly" value="<?php echo rand(3200150,6200150); ?>" name="folio"/>
                        </div>
                        <div id="fec">
                            <label>Fecha:</label>
                            <input type="text" id="fech" name="fecha" readonly="readonly" value="<?php echo date("d/m/y") ?>"/>
                       </div>
                      <div id="prec">
                          <label for="costo">Precio:</label>
                          <input type="text" id="costo" name="pr"/>
                      </div>
                      <div id="arti">
                         <label for="art">Articulo:</label>
                         
                           <select id="codig" name="productos1">
                              <option value="" selected="selected">--seleccione Articulo--</option>
                              <optgroup label="Televisores">
                               <?php
                                  $bd = conectar();
                                  $sql = "SELECT codigo,nombre,contado FROM producto where categoria='televisores'";
                                  $rst = $bd->Execute($sql);
                                  
                                  if($rst->RecordCount()){
                                    echo $respuesta = 0;
                                    $rst->MoveFirst();
                                    while(!$rst->EOF){
                                      $valor= $rst->fields('codigo');
                                      $nombre = $rst->fields('nombre');
                                      echo "<option value=".$valor.">".$nombre."</option>\n";
                                      $rst->MoveNext();
                                    }
                                  }
                                ?>
                              </optgroup>
                              <optgroup label="Celulares">
                               <?php
                                  $bd = conectar();
                                  $sql = "SELECT codigo,nombre,contado FROM producto where categoria='celulares'";
                                  $rst = $bd->Execute($sql);
                                  
                                  if($rst->RecordCount()){
                                    $rst->MoveFirst();
                                    while(!$rst->EOF){
                                      $valor= $rst->fields('codigo');
                                      $nombre = $rst->fields('nombre');
                                      echo "<option value=".$valor.">".$nombre."</option>\n";
                                      $rst->MoveNext();
                                    }
                                  }
                                ?>
                              </optgroup>
                            </select>
                       </div>
                      <div id="cant">
                          <label for="cnt">Cantidad:</label>
                          <input type="text" id="cnt" name="canti"/>
                      </div>
                      <div id="tot">
                         <label for="t">Total:</label>
                          <input type="text" id="t" name="total"/>
                       </div>
                      <div id="cambio">
                         <label for="cam">Pago:</label>
                          <input type="text" id="cam" name="cambio"/>
                       </div>
                    </div>
                    <div id="bv">
                          <input type="submit" value="Realizar Venta" id="vnt" name="vender"/>
                     </div>
                </form>
            </div><!--aqui esta el form venta_contado.php-->
        </div>
        
        <div id="f2" style="overflow: scroll;">
          <table>
                <thead>
                    <tr>
                        <?php
                        $bd = new mysqli("localhost", "root", "", "tecnoventa");
                         $consulta = "select codigo,nombre,precio,cantidad,total from ticket";
                         if($set = $bd->query($consulta)){
                               while($info = $set->fetch_field()){
                                  ?>
                                     <th><?php echo $info->name ?></th>
                                  <?php
                           }
                           }else{
                              ?>
                                <tr>
                                   <td>No Existen Columnas</td> 
                                </tr>
                               <?php
                          }
                        ?>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                         $bd = conectar();
                         $consulta = "select codigo,nombre,precio,cantidad,total from ticket ";
                         $set = $bd->Execute($consulta);
                         if($set->RecordCount()){
                               $set->MoveFirst();
                            while(!$set->EOF){
                              ?>
                              <tr>
                               <td><?php echo $set->fields('codigo');?></td>
                               <td><?php echo $set->fields('nombre');?></td>
                               <td><?php echo $set->fields('precio');?></td>
                               <td><?php echo $set->fields('cantidad');?></td>
                               <td><?php echo $set->fields('total');?></td>
                               </tr>
                             <?php
                              $set->MoveNext();
                           }
                         }
                      ?>
                </tbody>
                
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
    <!--<div id="pie">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>-->
</body>
<script type="text/javascript" language="javascript" src="../js/pagos.js"></script>
</html>
<?php
}else{
?>
  <p>Inicie sesion para ver esta Interfaz</p>     
<?php
}
?>