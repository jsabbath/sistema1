<?php
  session_start();
  
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');
  
if(isset($_SESSION['admin']) && $_SESSION['admin']=='tecnoventa,$%a-dmin'){
  if(isset($_GET['busca'])){           
        foreach($_GET as $cm=>$val){
          $intercambio=$cm;
          $$intercambio=$val;
     }
  }
?>
<!doctype html>

<html lang="en">
<head>
    <title>Lista De Abono</title>
    <link rel="stylesheet" type="text/css" href="../css/abona-folio.css"/>
    <script type="text/javascript" src="../js/ventana.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/ventana.css"/>
</head>
<body>
    <div id="encabezado">
      <a href="pAdmin.php">Atras</a>
    </div>
    <div id="contenido">
        <div id="b">
            
            <div id="titb">
                <h2 style="text-align: center;">Buscar Credito</h2>
            </div>
            
            <form id="formulario" name="formulario" action="#" method="get">
                <div id="iden">
                    <label>Folio de Credito: </label>
                    <input type="text" id="identi" name="folio" size="15" required/>
                </div>

                <div id="botones">
                    <input type="submit" id="bt1" name="busca" value="Buscar!"/>
                </div>
            </form>
        </div>
        
        <div id="table">
          <table>
               <thead>
                   <tr>
                      <?php
                      if(isset($busca)){
                          $bd = new mysqli("localhost", "root", "", "tecnoventa");
                           $consulta = "select folio,cliente,nombre,producto,total,abonos,abono from credito";
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
                          }else{
                            
                          }
                        ?>
                    </tr>
               </thead>
               <tbody>
                   <?php
                        if(isset($busca)){
                            $bd = conectar();
                            $consulta = "select folio,cliente,nombre,producto,total,abonos,abono from credito where folio='$folio'";
                            $set = $bd->Execute($consulta);
                            if($set->RecordCount()){
                                  $set->MoveFirst();
                               while(!$set->EOF){
                                 ?>
                                 <tr>
                                  <td><span onclick="window.showModalDialog('abono-modal.php?folio=<?php echo $set->fields('folio');?>&cliente=<?php echo $set->fields('cliente');?>&total=<?php echo $set->fields('total');?>&abono=<?php echo $set->fields('abono');?>','','dialogHeight:600px;dialogWidth:430px')"><?php echo $set->fields('folio');?></span></td>
                                  <td><?php echo $set->fields('cliente');?></td>
                                  <td><?php echo $set->fields('nombre');?></td>
                                  <td><?php echo $set->fields('producto');?></td>
                                  <td><?php echo $set->fields('total');?></td>
                                  <td><?php echo $set->fields('abonos');?></td>
                                  <td><?php echo $set->fields('abono');?></td>
                                  </tr>
                                <?php
                                 $set->MoveNext();
                              }
                            }
                        }else{
                           
                        }
                      ?>
               </tbody>
               
               <tfoot>
                   <tr>
                    <?php
                     if(isset($busca)){
                        ?>
                         <td colspan="8">
                              Enviar a:
                              &nbsp;&nbsp;&nbsp;
                              <a href="reporte.html">PDF</a>
                               &nbsp;&nbsp;&nbsp;
                              <a href="reporte.html">XML</a>
                               &nbsp;&nbsp;&nbsp;
                              <a href="reporte.html">CSV</a>
                          </td>
                         
                         <?php
                        }else{
                          
                        }
                       ?>
                    </tr>
               </tfoot>
          </table>
        </div><!--fin del contenedor de la tabla-->
        
    </div><!--este es el fin del contenido-->
    
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