window.onload = function(){
    var ruta = window.location.pathname;
    
     switch(ruta){
        case '/sistema_tecnoventa/php/credito.php':
             txt = document.getElementById('Nc');
             txt.onchange = function(){
                bc(txt.value);
             }
            break;
     }
    
    datos();       
}

function bc(id) {
        function xhrBuscar() {
                return (window.XMLHttpRequest)?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
         }
        
            var xhr = xhrBuscar();
            
            xhr.onreadystatechange = function(){
                if (xhr.readyState == 4 && xhr.status == 200) {
                   var lbnumc = document.getElementById("numc");
                   var inp = document.getElementById("Nc");
                   if (xhr.responseText == 0) {
                      lbnumc.style.color = "#f00";
                      inp.select();
                      alert("el cliente no existe");
                   }
                   else {
                      lbnumc.style.color = "#00f";
                      nom = document.getElementById('c');
                      nom.value = xhr.responseText;
                   }
                }
            }
            
            xhr.open("POST","busclventa.php",true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("cliente="+id);
    }

function art(codigo) {
        function xhrBuscar() {
                return (window.XMLHttpRequest)?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
         }
        
            var xhr = xhrBuscar();
            
            xhr.onreadystatechange = function(){
                if (xhr.readyState == 4 && xhr.status == 200) {
                   var lbnumc = document.getElementById("numc");
                   var inp = document.getElementById("Nc");
                   
                   if (xhr.responseText == 0) {
                      
                   }
                   else {
                       var arreg = xhr.responseText.split(" ");
                       //alert(arreg);
                       if (arreg.length == 4) {
                         if (document.getElementById("c1").innerHTML =="" && document.getElementById("c2").innerHTML =="" && document.getElementById("c3").innerHTML =="0") {
                            document.getElementById("c1").innerHTML = arreg[0];
                            document.getElementById("c2").innerHTML = arreg[1];
                            document.getElementById("c3").innerHTML = arreg[2];
                         }
                         else if (document.getElementById("c4").innerHTML =="" && document.getElementById("c5").innerHTML =="" && document.getElementById("c6").innerHTML =="0"){
                            document.getElementById("c4").innerHTML = arreg[0];
                            document.getElementById("c5").innerHTML = arreg[1];
                            document.getElementById("c6").innerHTML = arreg[2];
                         }else if (document.getElementById("c7").innerHTML =="" && document.getElementById("c8").innerHTML =="" && document.getElementById("c9").innerHTML =="0"){
                            document.getElementById("c7").innerHTML = arreg[0];
                            document.getElementById("c8").innerHTML = arreg[1];
                            document.getElementById("c9").innerHTML = arreg[2];
                         }else{
                            alert("imposible agregar mas!");
                         }
                         
                       }
                   }
                }
            }
            
            xhr.open("POST","buscprod.php",true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("codigo="+codigo);
    }
    
    
    function datos() {
        var env = document.getElementById('ir');
        var folio = document.getElementById('Nf');
        var ncliente = document.getElementById('Nc');
        var cliente = document.getElementById('c');
        var abono = document.getElementById('cab');
        var tiempo = document.getElementsByName('abonos');
        
        m1 = document.getElementById("c1");
        m2 = document.getElementById("c4");
        m3 = document.getElementById("c7");
        //var c1,c4,c7;
        
        if (m1.innerHTML != ""){
            c1 = m1.innerHTML;
        }
        if( m2.innerHTML != ""){
            c4 = m2.innerHTML;
        }
        
       if( m3.innerHTML != ""){
           c7 = m3.innerHTML;
       }
       
        m4 = document.getElementById("c3");
        m5 = document.getElementById("c6");
        m6 = document.getElementById("c9");
        
        
        n1 = parseInt(m4.innerHTML);
        n2 = parseInt(m5.innerHTML);
        n3 = parseInt(m6.innerHTML);
        
        env.onclick = function(){
            //realizar(parseInt(m4.innerHTML),parseInt(m5.innerHTML),parseInt(m6.innerHTML));
            for(var i=0; i<tiempo.length;i++){
                if (tiempo[i].checked) {
                    //realizar(abono.value);
                    realizar(folio.value,ncliente.value,cliente.value,c1.innerHTML,c4.innerHTML,c7.innerHTML,tiempo[i].value,parseInt(m4.innerHTML),parseInt(m5.innerHTML),parseInt(m6.innerHTML),abono.value);
                    //realizar(folio.value,ncliente.value,cliente.value,c1.innerHTML,c4.innerHTML,c7.innerHTML,tiempo[i].value,parseInt(m4.innerHTML),parseInt(m5.innerHTML),parseInt(m6.innerHTML),abono.value);
                }
            }       
            //realizar(tiempo[i]);
            //realizar(folio.value,ncliente.value,cliente.value,c1.innerHTML,c4.innerHTML,c7.innerHTML,abono.value,tiempo.value);
        }
    }
    
    function realizar(fol,nc,c,ca1,ca4,ca7,tm,t1,t2,t3,ab) {
        var prod = ca1+","+ ca4 +"," +ca7;
        total = t1+t2+t3;
        
        campo_total = document.getElementById('tot');
        campo_abono = document.getElementById('cab');
        
        totales = total/tm;
        
        campo_total.value = total;
        campo_abono.value = totales;
       
        //alert(ca4);
        //alert(ca7);
       
        	function xhrBuscar() {
                return (window.XMLHttpRequest)?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
            }
        
            var xhr = xhrBuscar();
            
            xhr.onreadystatechange = function(){
                if (xhr.readyState == 4 && xhr.status == 200) {
                   var lbnumc = document.getElementById("numc");
                   var inp = document.getElementById("Nc");
                   if (xhr.responseText == 0) {
                      alert("ocurrio un problema con la compra");
                   }
                   else {
                      alert("compra realizada con exito");
                   }
                }
            }
            
            xhr.open("POST","venta_credito.php",true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("nf="+fol+"&cliente="+nc+"&nomc="+c+"&prod="+prod+"&suma="+total+"&abono="+tm+"&monto="+totales);
    }
    
    
    
    