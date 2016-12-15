<?php
session_start();
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');

  if(isset($_SESSION['admin']) && $_SESSION['admin']=='tecnoventa,$%a-dmin'){
?>
<!doctype html>

<html lang="en">
<head>
    <title>Inventario</title>
    <link rel="stylesheet" type="text/css" href="../css/tablainventario.css"/>
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/font-awesome.css"/>
</head>
<body>
    <div id="encabezado">
        
    </div>
    
    <div id="cuerpo">
        <div id="tit">
            <h1 style="text-align: center;">Tabla Inventario</h1>
        </div>
        
        <div id="t1">
            <table>
                <thead>
                    <tr>
                        <?php
                        $bd = new mysqli("localhost", "root", "", "tecnoventa");
                         $consulta = "select codigo,nombre,descripcion,categoria,contado,cantidad,marca,proveedor from producto";
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
                         $consulta = "select * from producto";
                         $set = $bd->Execute($consulta);
                         if($set->RecordCount()){
                               $set->MoveFirst();
                            while(!$set->EOF){
                              ?>
                              <tr>
                               <td><?php echo $set->fields('codigo');?></td>
                               <td><?php echo $set->fields('nombre');?></td>
                               <td><?php echo $set->fields('descripcion');?></td>
                               <td><?php echo $set->fields('categoria');?></td>
                               <td><?php echo $set->fields('contado');?></td>
                               <td><?php echo $set->fields('cantidad');?></td>
                               <td><?php echo $set->fields('marca');?></td>
                               <td><?php echo $set->fields('proveedor');?></td>
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
                            Tabla de Inventario
                            &nbsp;&nbsp;&nbsp;
                            <a href="#"><i class="icono izquierda fa fa-print"></i>Imprimir</a>
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