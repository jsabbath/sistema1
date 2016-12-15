<?php
  session_start();

  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');
   if(isset($_POST['usuario'])){
    
   foreach($_POST as $cm=>$val){
        $intercambio=$cm;
        $$intercambio=$val;
   }
    
  $enc = sha1($pass);
  $bd = conectar();
  $consulta="call sesion_admin('$usuario','$enc')";
  $set=$bd->Execute($consulta);
  
  if($set->RecordCount()){
    $_SESSION['usuario']=$set->fields('tarjeta');
    //$_SESSION['pass']=$set->fields('password');
    $_SESSION['admin']='tecnoventa,$%a-dmin';
   
     }
     else
     {
         $_SESSION['admin']='no';
     }
     
   }
 if(isset($_SESSION['admin']) && $_SESSION['admin']=='tecnoventa,$%a-dmin'){
    header ("Location: pAdmin.php");
 }else{
?>
<!doctype html>

<html lang="en">
<head>
    <title>Administrador</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="../css/admin.css"/>
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/font-awesome.css"/>
</head>
<body>
    <div class="todo">
        <div class="l1">
              <div id="img">
                <h1>Solo Personal Autorizado</h1>
              </div>
              
            <form action="#" method="post" id="personal" name="personal">
                <span class="fa fa-user" id="us"></span><label for="usuario" id="l1">Usuario</label>
                <input type="text" id="usuario" name="usuario"/>
                
                
                <span class="fa fa-lock" id="lock"></span><label for="pass" id="l2">Password</label>
                <input type="password" id="pass" name="pass"/>
                
                <input type="submit" value="Iniciar Sesion" id="iniciar"/>
            </form>
        </div>
    </div>
</body>
</html>
<?php
 }
 ?>
