<?php
  session_start();
  
  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');

if(isset($_SESSION['admin']) && $_SESSION['admin']=='tecnoventa,$%a-dmin'){
    foreach($_GET as $cm=>$val){
        $intercambio=$cm;
        $$intercambio=$val;
    }
    
    $bd = conectar();
      if(isset($_POST['variable']) && $_POST['variable']!='X'){
         //$_POST!='X' arriba en el if va esto
           foreach($_POST as $campo=>$valor){
              $swap = $campo;
              $$swap=$valor;
          }
          
          $imagen = addslashes(file_get_contents($_FILES['fil']['tmp_name']));
          
          switch($variable){
              case 'tecno':
                  $qry_accion ="call modifica_producto('$producto','$descrip','$categoria','$contado','$cantidad','$color','$proveedor','$modelo','$codi','$credito','$imagen')";
              break;
          }
          $set = $bd->Execute($qry_accion);
           header("Location:busqueda.php");
      }
      
      $sql = "select imagen from producto where codigo='$codigo'";
      $set2 = $bd->Execute($sql);
      if($set2->RecordCount()){
      }else{
        echo"sin imagen";
      }
  
?>
<!doctype html>

<html lang="en">
<head>
    <title>Alteracion De producto</title>
    <link rel="stylesheet" type="text/css" href="../css/prod-mod.css"/>
    <script type="text/javascript" language="javascript" src="../js/funcion_validar.js"></script>
</head>
<body>
    <div id="encabezado">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
    
    <div id="cuerpo">
              <div id="imp">
                <output id="list"><img width="230" height="230" src="data:image/jpg;base64,<?php echo base64_encode($set2->fields('imagen'));?>"/></output>
              </div>
        
        <form action="#" id="formulario" name="formulario" method="post">
            <div id="msj">
                <h3>Los campos marcados no estan llenados correctamente</h3>
            </div>
            <div id="fp">
                
                <div id="tfp">
                    <h1 style="text-align: center">Nuevo Producto</h1>
                </div>
                
                <div id="fp1">
                    <label for="cod" id="c">Codigo:</label>
                    <input type="text" id="cod" name="codi" size="15" value="<?php echo (isset($codigo))?$codigo:''; ?>"/>
                        
                    <label for="producto" id="no">Nombre:</label>
                    <input type="text" id="producto" name="producto" value="<?php echo (isset($nombre))?$nombre:''; ?>"/><span id="spprod" name="producto">El campo esta vacio</span>
                        
                    <label for="descrip" id="ds">Descripcion:</label>
                    <input type="text" id="descrip" name="descrip" size="45" value="<?php echo (isset($descripcion))?$descripcion:''; ?>"/><span id="spdescr" name="descrip">El campo esta vacio</span>
                </div>
                
                 <div id="fp2">
                    <label for="categoria" id="cg">Categoria:</label>
                    <input type="text" id="categoria" name="categoria" value="<?php echo (isset($categoria))?$categoria:''; ?>"/><span id="spcat" name="categoria" >El campo esta vacio</span>
                        
                    <label for="contado" id="ppc">Precio de Contado:</label>
                    <input type="text" id="contado" name="contado" size="15" value="<?php echo (isset($contado))?$contado:''; ?>"/><span id="spcont" name="contado">campo vacio</span>
                        
                    <label for="credito" id="lbpac">Precio a Credito:</label>
                    <input type="text" id="credito" name="credito" size="15" value="<?php echo (isset($credito))?$credito:''; ?>"/><span id="spcred" name="credito">El campo esta vacio</span>
                        
                    <label for="cantidad" id="cpn">Cantidad:</label>
                    <input type="text" id="cantidad" name="cantidad" value="<?php echo (isset($cantidad))?$cantidad:''; ?>"/><span id="spcant" name="cantidad">vacio</span>
                </div>
                 
                 <div id="fp3">
                    <label for="proveedor" id="prov">Proveedor:</label>
                    <input type="text" id="proveedor" name="proveedor" value="<?php echo (isset($proveedor))?$proveedor:''; ?>"/><span id="spprov" name="proveedor">El campo esta vacio</span>
                        
                    <label for="modelo" id="mp">Modelo:</label>
                    <input type="text" id="modelo" name="modelo" size="30" value="<?php echo (isset($marca))?$marca:''; ?>"/><span id="spmod" name="modelo">vacio</span>
                        
                    <label for="color" id="cpn">Color:</label>
                    <input type="text" id="color" name="color" value="<?php echo (isset($color))?$color:''; ?>"/><span id="spcolor" name="color">El campo esta vacio</span>
                </div>
                 
                 <div id="enviar">
                    <input type="submit" value="Editar!!" id="ed"/>
                    <input type="hidden" value="<?php print (isset($variable))? $variable:'x';?>" id="escondida" name="variable"/>
                    <input type="submit" value="Modificar!!" id="mod" name="modific"/>
                </div>
                 
            </div>
            
            <div id="fl">
               <input type="file" id="fil" name="fil"/>
            </div>
        </form>
        
    </div>
    
    <div id="pie">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
</body>
<script type="text/javascript" language="javascript" src="../js/modifica-prod.js"></script>
</html>
<?php
}else{
?>
  <p>Inicie sesion para ver esta Interfaz</p>     
<?php
}
?>