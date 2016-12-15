<?php
  session_start();
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');
if(isset($_SESSION['admin']) && $_SESSION['admin']=='tecnoventa,$%a-dmin'){
?>
<!doctype html>

<html lang="en">
<head>
    <title>Ventas a Credito</title>
    <link rel="stylesheet" type="text/css" href="../css/tablavcr.css"/>
</head>
<body>
    <div id="encabezado">
        
    </div>
    
    <div id="cuerpo">
        <div id="tit">
            <h1 style="color: #cdcdcd; text-align: center;">Ventas a Credito</h1>
        </div>
        
        <div id="t1">
            <table>
                <thead>
                    <tr>
                      <?php
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
                        ?>
                    </tr>
                </thead>
                
                <tbody>
                     <?php
                         $bd = conectar();
                         $consulta = "select * from credito";
                         $set = $bd->Execute($consulta);
                         if($set->RecordCount()){
                               $set->MoveFirst();
                            while(!$set->EOF){
                              ?>
                              <tr>
                               <td><a href="#"><span><?php echo $set->fields('folio');?></span></a></td>
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
                      ?>
                </tbody>
                
                <tfoot>
                    <tr>
                        <td colspan="8">
                            Tabla de Historial de Ventas a Credito
                            &nbsp;&nbsp;&nbsp;
                            <a href="reporte.php">Realizar un Reporte de Venta</a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="xml.php">Realizar un XML</a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="csv.php">Realizar un CSV</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    
    <div id="pie">
        
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