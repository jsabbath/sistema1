<?php
include_once('../libs/adodb/adodb.inc.php');
if(isset($_GET['img1'])){
    
    foreach($_GET as $campo=>$valor){
          $swap = $campo;
          $$swap = $valor;
          
        switch($campo){
            case 'uno':
                    foreach($_GET as $campo=>$valor){
                        $swap = $campo;
                        $$swap = $valor;
                    }
                    $conecta= new conectar();
                    $conecta->favoritos($img1,$cliente,$uno);
                break;
            case 'dos':
                    $conecta= new conectar();
                    $conecta->favoritos("b",$mar);
                break;
         }
    }  
 }else{
    echo "la variable no esta creada";
}   
    
    
    class conectar {
        
        public $cl;
        
        function favoritos($cl,$num,$im){
            //$numero = $cl;
           
           $conn=ADONewConnection('mysqli');
           $conn->Connect('localhost','root','','tecnoventa');
           
           $qry_agrega = "INSERT INTO favoritos (cliente,numero,imagen) values ('$num','$cl','$im')";
           $rst_agrega = $conn->Execute($qry_agrega);
           
           if($rst_agrega == false){
              die("fallo");
           }else{
            ?>
            <?php
              echo "el Articulo fue agregado a favoritos";
           }
        }
    }

?>