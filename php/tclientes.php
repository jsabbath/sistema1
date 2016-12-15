<?php
session_start();
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');

  if(isset($_SESSION['admin']) && $_SESSION['admin']=='tecnoventa,$%a-dmin'){
?>
<!doctype html>

<html lang="en">
<head>
    <title>Concentrado de Clientes</title>
    <link rel="stylesheet" type="text/css" href="../css/tablaclientes.css"/>
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/font-awesome.css"/>
</head>
<body>
    <div id="encabezado">
        
    </div>
    
    <div id="cuerpo">
        <div id="tit">
            <h1 style="text-align: center;">Concentrado de clientes</h1>
        </div>
        
        <div id="t1">
            <table>
                <thead>
                    <tr>
                        <?php
                        $bd = new mysqli("localhost", "root", "", "tecnoventa");
                         $consulta = "select id,nombre,paterno,rfc,telefono,ocupacion,calle,ciudad from clientes";
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
                         $consulta = "select * from clientes";
                         $set = $bd->Execute($consulta);
                         if($set->RecordCount()){
                               $set->MoveFirst();
                            while(!$set->EOF){
                              ?>
                              <tr>
                               <td><?php echo $set->fields('id');?></td>
                               <td><?php echo $set->fields('nombre');?></td>
                               <td><?php echo $set->fields('paterno');?></td>
                               <td><?php echo $set->fields('rfc');?></td>
                               <td><?php echo $set->fields('telefono');?></td>
                               <td><?php echo $set->fields('ocupacion');?></td>
                               <td><?php echo $set->fields('calle');?></td>
                               <td><?php echo $set->fields('ciudad');?></td>
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
                            <a href="imprime-todos-clientes.php" target="_blank"><i class="icono izquierda fa fa-print"></i>Imprimir</a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="#"><i class="icono izquierda fa fa-print"></i>XML</a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="#"><i class="icono izquierda fa fa-print"></i>CSV</a>
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