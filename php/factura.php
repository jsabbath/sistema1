<!doctype html>

<html lang="en">
<head>
    <title>Ticket</title>
    <link rel="stylesheet" type="text/css" href="../css/factura.css"/>
    <script type="text/javascript" language="javascript">
        
       window.onload = function(){ 
            var txt = document.getElementById('nft');
            var msj = document.getElementById('msj');
            var letrero = document.getElementById('lv');
            var fm = document.getElementById('fm');
            var sub = document.getElementById('cons');
            
            sub.onclick = function(){
                fm.addEventListener("submit",validar);
            }
            
            function validar(e) {
                condicion(e);
                condicion1(e);
                mensaje();
            }
            
            function condicion(e) {
                if (txt.value == "") {
                    letrero.style.visibility = "visible";
                    txt.style.border =  "2px solid red";
                    mensaje();
                    e.preventDefault();
                }
            }
            
            function condicion1(e) {
                if (isNaN(txt.value)) {
                    letrero.style.visibility = "visible";
                    txt.style.border =  "2px solid red";
                    mensaje();
                    e.preventDefault();
                }
            }
            
            function mensaje() {
                var letrero = document.getElementById("msj");
            
                function aparece() {
                    letrero.style.visibility = "visible";
                }
                
                function desaparece() {
                    letrero.style.visibility = "hidden";
                }
                
                setTimeout(aparece,1000);
                setTimeout(desaparece,4000);
            }
       }
    </script>
</head>
<body>
        <div id="msj">
            <h5>Los campos marcados no estan llenados correctamente</h5>
        </div>
        <div id="fm">
            <form action="factura-pdf.php" method="get" id="form" target="_blank">
                <label id="tit">Ingrese el Folio de La Compra:</label >
                    <div id="nf">
                        <label for="f">Folio:</label>
                        <input type="text" id="nft" maxlength="12" name="folio"/>
                        <label id="lv" style="visibility:hidden;">El campo esta vacio</label>
                        <input type="submit" value="Consultar" id="cons" name="consultar"/>
                    </div>
            </form>
        </div>
    <div id="pie">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
</body>
</html>
