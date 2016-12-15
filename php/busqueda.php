<?php
  session_start();
  
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');
  
if(isset($_SESSION['admin']) && $_SESSION['admin']=='tecnoventa,$%a-dmin'){
  if(isset($_GET['tipo'])){           
        foreach($_GET as $cm=>$val){
          $intercambio=$cm;
          $$intercambio=$val;
     }
  }
?>
<!doctype html>

<html lang="en">
<head>
    <title>Busqueda</title>
    <link rel="stylesheet" type="text/css" href="../css/busqueda.css"/>
    <script type="text/javascript" src="../js/ventana.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/ventana.css"/>
</head>
<body>
    <div id="encabezado">
      <!--<a href="pAdmin.php">Atras</a>-->
    </div>
    <div id="contenido">
        <div id="b">
            
            <div id="titb">
                <h2 style="text-align: center;">Busqueda</h2>
            </div>
            
            <form id="formulario" name="formulario" action="#" method="get">
                <div id="iden">
                    <label id="lab">Nombre: </label>
                    <input type="hidden" name="busqueda" value="buscar"/>
                    <input type="text" id="identi" name="<?php echo(isset($tipo) && $tipo == "clientes")?"clientes":'';echo(isset($tipo) && $tipo == "productos")?"productos":'';echo(isset($tipo) && $tipo == "personal")?"personal":'';echo(isset($tipo) && $tipo == "proveedores")?"proveedores":'' ?>" size="15" required/>
                </div>
                <div id="botones">
                    <input type="submit" id="bt1" name="busca" value="Buscar!"/>
                    <input type="button" value="Eliminar" id="bt2" name="elimina"/>
                </div>
            </form>
        </div>
        
        <div id="table">
          <table>
               <thead>
                  <tr>
                      <?php
                      if(isset($_GET['busqueda'])){
                        foreach($_GET as $cm=>$val){
                            $intercambio=$cm;
                            $$intercambio=$val;
                          }
                          if(isset($clientes) && $_GET['clientes']){
                            $bd = new mysqli("localhost", "root", "", "tecnoventa");
                                      $consulta = "select id,nombre,paterno,materno,telefono,ocupacion,calle,numero,colonia,ciudad  from clientes";
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
                          }else if(isset($productos) && $_GET['productos']){
                            $bd = new mysqli("localhost", "root", "", "tecnoventa");
                                      $consulta = "select codigo,nombre,descripcion,categoria,contado,credito,cantidad,color,proveedor,marca from producto";
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
                          }else if(isset($personal) && $_GET['personal']){
                             $bd = new mysqli("localhost", "root", "", "tecnoventa");
                                      $consulta = "select tarjeta,nombres,paterno,materno,rfc,telefono,puesto,calle,numero,colonia,ciudad  from personal";
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
                          }else if(isset($proveedores) && $_GET['proveedores']){
                             $bd = new mysqli("localhost", "root", "", "tecnoventa");
                                      $consulta = "select id,sucursal,persona,comercial,linea,rfc,ciudad,contacto,telefono,correo from proveedores";
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
                          }else{}
                        }else{
                          //echo "la variable no esta creada";
                        }
                        ?>
                    </tr>
               </thead>
               <tbody>
                  <?php
                        if(isset($_GET['busqueda'])){
                          foreach($_GET as $cm=>$val){
                            $intercambio=$cm;
                            $$intercambio=$val;
                          }
                          if(isset($clientes) && $_GET['clientes']){
                                     $bd = conectar();
                                     $consulta = "select * from clientes where nombre= '$clientes'";
                                     $set = $bd->Execute($consulta);
                                     if($set->RecordCount()){
                                        $set->MoveFirst();
                                        while(!$set->EOF){
                                            ?>
                                              <tr>
                                                <td><a href="modifica_cliente.php?id=<?php echo $set->fields('id');?>&nombre=<?php echo $set->fields('nombre');?>&paterno=<?php echo $set->fields('paterno');?>&materno=<?php echo $set->fields('materno');?>&rfc=<?php echo $set->fields('rfc');?>&contra=<?php echo $set->fields('password');?>&telefono=<?php echo $set->fields('telefono');?>&ocupacion=<?php echo $set->fields('ocupacion');?>&calle=<?php echo $set->fields('calle');?>&numero=<?php echo $set->fields('numero');?>&correo=<?php echo $set->fields('correo');?>&colonia=<?php echo $set->fields('colonia');?>&postal=<?php echo $set->fields('postal');?>&ciudad=<?php echo $set->fields('ciudad');?>&referencia=<?php echo $set->fields('referencia');?>&paternor=<?php echo $set->fields('paternor');?>&maternor=<?php echo $set->fields('maternor');?>&correor=<?php echo $set->fields('correor');?>&telefonor=<?php echo $set->fields('telefonor');?>&ocupacionr=<?php echo $set->fields('ocupacionr');?>&variable=sis"><?php echo $set->fields('id');?></a></td>
                                                <td><?php echo $set->fields('nombre');?></td>
                                                <td><?php echo $set->fields('paterno');?></td>
                                                <td><?php echo $set->fields('materno');?></td>
                                                <td><?php echo $set->fields('telefono');?></td>
                                                <td><?php echo $set->fields('ocupacion');?></td>
                                                <td><?php echo $set->fields('calle');?></td>
                                                <td><?php echo $set->fields('numero');?></td>
                                                <td><?php echo $set->fields('colonia');?></td>
                                                <td><?php echo $set->fields('ciudad');?></td>
                                              </tr>
                                            
                                              <tr>
                                                <td colspan="10"><a href="clientes-informacion.php?nombre=<?php echo $set->fields('nombre');?>&paterno=<?php echo $set->fields('paterno');?>&materno=<?php echo $set->fields('materno');?>&telefono=<?php echo $set->fields('telefono');?>&ocupacion=<?php echo $set->fields('ocupacion');?>&calle=<?php echo $set->fields('calle');?>&numero=<?php echo $set->fields('numero');?>&colonia=<?php echo $set->fields('colonia');?>&ciudad=<?php echo $set->fields('ciudad');?>">Imprime Informacion</a>&nbsp;&nbsp;&nbsp;<a href="eliminacion.php?tipo=clientes&identi=<?php echo $set->fields('id'); ?>">Eliminar</a></td>
                                              </tr>
                                            <?php
                                            $set->MoveNext();
                                        }
                                     }else{
                                        ?>
                                         <!--<tr>
                                           <td>No Existen Registros</td> 
                                         </tr>-->
                                        <?php
                                     }
                          }else if(isset($productos) && $_GET['productos']){
                            $bd = conectar();
                                     $consulta = "select * from producto where nombre= '$productos'";
                                     $set = $bd->Execute($consulta);
                                     
                                     if($set->RecordCount()){
                                        $set->MoveFirst();
                                        while(!$set->EOF){
                                            ?>
                                              <tr>
                                                <td><a href="modifica_prod.php?codigo=<?php echo $set->fields('codigo');?>&nombre=<?php echo $set->fields('nombre');?>&descripcion=<?php echo $set->fields('descripcion');?>&categoria=<?php echo $set->fields('categoria');?>&contado=<?php echo $set->fields('contado');?>&credito=<?php echo $set->fields('credito');?>&cantidad=<?php echo $set->fields('cantidad');?>&color=<?php echo $set->fields('color');?>&proveedor=<?php echo $set->fields('proveedor');?>&marca=<?php echo $set->fields('marca');?>&variable=tecno"><?php echo $set->fields('codigo');?></a></td>
                                                <td><?php echo $set->fields('nombre');?></td>
                                                <td><?php echo $set->fields('descripcion');?></td>
                                                <td><?php echo $set->fields('categoria');?></td>
                                                <td><?php echo $set->fields('contado');?></td>
                                                <td><?php echo $set->fields('credito');?></td>
                                                <td><?php echo $set->fields('cantidad');?></td>
                                                <td><?php echo $set->fields('color');?></td>
                                                <td><?php echo $set->fields('proveedor');?></td>
                                                <td><?php echo $set->fields('marca');?></td>
                                              </tr>
                                              <tr>
                                                <td colspan="10"><a href="eliminacion.php?tipo=articulo&identi=<?php echo $set->fields('codigo'); ?>">Eliminar</a></td>
                                              </tr>
                                            <?php
                                            $set->MoveNext();
                                        }
                                     }else{
                                        ?>
                                         <!--<tr>
                                           <td>No Existen Registros</td> 
                                         </tr>-->
                                        <?php
                                     }
                          }else if(isset($personal) && $_GET['personal']){
                            $bd = conectar();
                                     $consulta = "select * from personal where nombres= '$personal'";
                                     $set = $bd->Execute($consulta);
                                     
                                     if($set->RecordCount()){
                                        $set->MoveFirst();
                                        while(!$set->EOF){
                                            ?>
                                              <tr>
                                                <td><a href="modifica_personal.php?tarjeta=<?php echo $set->fields('tarjeta');?>&nombres=<?php echo $set->fields('nombres');?>&paterno=<?php echo $set->fields('paterno');?>&materno=<?php echo $set->fields('materno');?>&rfc=<?php echo $set->fields('rfc');?>&telefono=<?php echo $set->fields('telefono');?>&puesto=<?php echo $set->fields('puesto');?>&correo=<?php echo $set->fields('correo');?>&calle=<?php echo $set->fields('calle');?>&numero=<?php echo $set->fields('numero');?>&colonia=<?php echo $set->fields('colonia');?>&ciudad=<?php echo $set->fields('ciudad');?>&postal=<?php echo $set->fields('postal');?>&seguro=<?php echo $set->fields('seguro');?>&unidad=<?php echo $set->fields('unidad');?>&nacimiento=<?php echo $set->fields('nacimiento');?>&curp=<?php echo $set->fields('curp');?>&password=<?php echo $set->fields('password');?>&nacionalidad=<?php echo $set->fields('nacionalidad');?>&variable=personal"><?php echo $set->fields('tarjeta');?></a></td>
                                                <td><?php echo $set->fields('nombres');?></td>
                                                <td><?php echo $set->fields('paterno');?></td>
                                                <td><?php echo $set->fields('materno');?></td>
                                                <td><?php echo $set->fields('rfc');?></td>
                                                <td><?php echo $set->fields('telefono');?></td>
                                                <td><?php echo $set->fields('puesto');?></td>
                                                <td><?php echo $set->fields('calle');?></td>
                                                <td><?php echo $set->fields('numero');?></td>
                                                <td><?php echo $set->fields('colonia');?></td>
                                                <td><?php echo $set->fields('ciudad');?></td>
                                              </tr>
                                              <tr>
                                                <td colspan="11"><a href="eliminacion.php?tipo=personal&identi=<?php echo $set->fields('tarjeta'); ?>">Eliminar</a></td>
                                              </tr>
                                            <?php
                                            $set->MoveNext();
                                        }
                                     }else{
                                        ?>
                                         <!--<tr>
                                           <td>No Existen Registros</td> 
                                         </tr>-->
                                        <?php
                                     }
                          }else if(isset($proveedores) && $_GET['proveedores']){
                            $bd = conectar();
                                     $consulta = "select * from proveedores where comercial= '$proveedores'";
                                     $set = $bd->Execute($consulta);
                                     
                                     if($set->RecordCount()){
                                        $set->MoveFirst();
                                        while(!$set->EOF){
                                            ?>
                                              <tr>
                                                <td><a href="modifica_provedor.php?id=<?php echo $set->fields('id');?>&sucursal=<?php echo $set->fields('sucursal');?>&persona=<?php echo $set->fields('persona');?>&razonsocial=<?php echo $set->fields('razonsocial');?>&comercial=<?php echo $set->fields('comercial');?>&linea=<?php echo $set->fields('linea');?>&tipo=<?php echo $set->fields('tipo');?>&rfc=<?php echo $set->fields('rfc');?>&curp=<?php echo $set->fields('curp');?>&iva=<?php echo $set->fields('iva');?>&fondo=<?php echo $set->fields('fondo');?>&calle=<?php echo $set->fields('calle');?>&numero=<?php echo $set->fields('numero');?>&colonia=<?php echo $set->fields('colonia');?>&ciudad=<?php echo $set->fields('ciudad');?>&contacto=<?php echo $set->fields('contacto');?>&apellido=<?php echo $set->fields('apellido');?>&telefono=<?php echo $set->fields('telefono');?>&correo=<?php echo $set->fields('correo');?>&variable=prov"><?php echo $set->fields('id');?></a></td>
                                                <td><?php echo $set->fields('sucursal');?></td>
                                                <td><?php echo $set->fields('persona');?></td>
                                                <td><?php echo $set->fields('comercial');?></td>
                                                <td><?php echo $set->fields('linea');?></td>
                                                <td><?php echo $set->fields('rfc');?></td>
                                                <td><?php echo $set->fields('ciudad');?></td>
                                                <td><?php echo $set->fields('contacto');?></td>
                                                <td><?php echo $set->fields('telefono');?></td>
                                                <td><?php echo $set->fields('correo');?></td>
                                              </tr>
                                              <tr>
                                                <td colspan="10"><a href="eliminacion.php?tipo=proveedor&identi=<?php echo $set->fields('id'); ?>">Eliminar</a></td>
                                              </tr>
                                            <?php
                                            $set->MoveNext();
                                        }
                                     }else{
                                        ?>
                                         <!--<tr>
                                           <td>No Existen Registros</td> 
                                         </tr>-->
                                        <?php
                                     }
                          }else{}
                        }else{
                           
                        }
                      ?>
               </tbody>
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