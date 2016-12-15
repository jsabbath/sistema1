<?php
  session_start();

  include_once('../libs/adodb/adodb.inc.php');
  include_once('conexion.php');
   if(isset($_POST['numero'])){
    
   foreach($_POST as $campo=>$valor){
        $swap=$campo;
        $$swap=$valor;
   }
   
   $pass = sha1($contra); 
    
  $enlace = conectar();
  
  $qry_usuario="call iniciar_sesion('$numero','$pass')";
  $rst_usuario=$enlace->Execute($qry_usuario);
  
  if($rst_usuario->RecordCount()){
    $_SESSION['id']=$rst_usuario->fields('id');
    //$_SESSION['password']=$rst_usuario->fields('password');
    $_SESSION['autorizado']='08$5%123';
   
     }else
     {
         $_SESSION['autorizado']='no';
     }
     
   }
 if(isset($_SESSION['autorizado']) && $_SESSION['autorizado']=='08$5%123'){
    header ("Location: pUsuario.php");
 }else{
?>

<!doctype html>
<html lang="en">
<head>
    <title>Iniciar Sesion</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="../css/login.css"/>
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/font-awesome.css"/>
    <meta name="viewport" content="widht=device-width,user-scalable=no,initial-scale=1.0,maxinum-scale=1.0,minimum-scale=1.0"/>
</head>
<body>
    <div class="todo">
        <div class="l1">
            <h1>Bienvenido</h1>
              <div id="img">
                <img src="../imagenes/cUsuario.png"/>
              </div>
              
            <form action="#" method="post">
                <span class="fa fa-user" id="us"></span><label for="usuario" id="l1">Usuario</label>
                <input type="text" id="usuario" name="numero"/>
                
                
                <span class="fa fa-lock" id="lock"></span><label for="pass" id="l2">Password</label>
                <input type="password" id="pass" name="contra"/>
                
                <input type="submit" value="Iniciar Sesion" id="iniciar"/>
                <span><a href="#">Recordar Contrase&ntilde;a</a>|<a href="#">Entrar como Invitado</a></span>
            </form>
        </div>
    </div>
</body>
</html>
<?php
 }
 ?>
