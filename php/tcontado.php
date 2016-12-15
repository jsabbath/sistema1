<?php
session_start();
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');

  if(isset($_SESSION['admin']) && $_SESSION['admin']=='tecnoventa,$%a-dmin'){
?>
<!doctype html>

<html lang="en">
<head>
    <title>Ventas al Contado</title>
    <link rel="stylesheet" type="text/css" href="../css/tablavc.css"/>
</head>
<body>
    <div id="encabezado">
        
    </div>
    
    <div id="cuepo">
        <div id="tit">
            <h1 style="text-align: center;">Ventas al Contado</h1>
        </div>
        
        <div id="t1">
            <table>
                <thead>
                    <tr>
                    <?php
                        $bd = new mysqli("localhost", "root", "", "tecnoventa");
                         $consulta = "select folio,fecha,nombre,apellido,telefono,articulo,cantidad,total from contado";
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
                         $consulta = "select * from contado";
                         $set = $bd->Execute($consulta);
                         if($set->RecordCount()){
                               $set->MoveFirst();
                            while(!$set->EOF){
                              ?>
                              <tr>
                               <td><?php echo $set->fields('folio');?></td>
                               <td><?php echo $set->fields('fecha');?></td>
                               <td><?php echo $set->fields('nombre');?></td>
                               <td><?php echo $set->fields('apellido');?></td>
                               <td><?php echo $set->fields('telefono');?></td>
                               <td><?php echo $set->fields('articulo');?></td>
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
                    <tr>
                        <td colspan="8">
                            Tabla de Historial de Ventas
                            &nbsp;&nbsp;&nbsp;
                            <a href="rcontado.php" id="rpv" target="_BLANK">Realizar un Reporte de Venta</a>
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
