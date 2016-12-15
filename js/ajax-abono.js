function abonar(cliente,folio,total) {
            nabono = document.getElementById('NoAbono');
            importe = document.getElementById('Importe');
            
            numero = nabono.value;
            imp =importe.value;
            
            resta = parseInt(total) - parseInt(importe.value);
            
            function xhrBuscar() {
                     return (window.XMLHttpRequest)?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
            }
            
            var xhr = xhrBuscar();
            
            xhr.onreadystatechange = function(){
                if (xhr.readyState == 4 && xhr.status == 200) {
                   if (xhr.responseText == 1) {
                     alert('No es posible Realizar Accion');
                   }
                   else {
                      alert('La accion se Realizo correctamente');
                      window.opener.location.reload();
                      window.close();
                   }
                }
            }
            
            xhr.open("POST","realiza-abono.php",true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            datos="&nabono="+numero+"&cliente="+cliente+"&folio="+folio+"&anterior="+total+"&importe="+imp+"&saldo="+resta;
            xhr.send(datos);
}