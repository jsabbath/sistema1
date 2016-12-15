window.onload = function(){
    var txt = document.getElementById('cnt');
    var txtp = document.getElementById('costo');
    var bt = document.getElementById('ag');
    var tot = document.getElementById('t');
    var cmb = document.getElementById('codig');
    
    var vnt1 = document.getElementById('vnt');
    var formul = document.getElementById('formulario');
    
    var arti = document.getElementById('art');
    
    
    
    txt.onblur = function(){
        var txtp1 = document.getElementById('costo');
        var txtc = document.getElementById('cnt');
        var tot1 = document.getElementById('t');
        var foli = document.getElementById('foli');
        var cambio = document.getElementById('cam');
        var temporal = 0;
        var op = 0;
        
        temporal = txt.value;
        op = txtp.value * temporal;
            
        t.value = op;
        
        function xhrBuscar() {
                     return (window.XMLHttpRequest)?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
            }
        
            var xhr = xhrBuscar();
            
            xhr.onreadystatechange = function(){
                //alert(xhr.responseText);
                if (xhr.readyState == 4 && xhr.status == 200) {
                   if (xhr.responseText == 1) {
                     alert('No es posible Realizar Accion');
                   }
                   else {
                    //alert(xhr.responseText);
                      //window.opener = '';
                      //window.close();
                   }
                }
            }
            
            xhr.open("POST","ticket.php",true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            datos="folio="+foli.value+"&codigo="+cmb.options[cmb.selectedIndex].value+"&articulo="+cmb.options[cmb.selectedIndex].text+"&precio="+txtp1.value+"&cantidad="+txtc.value+"&total="+tot1.value;
            xhr.send(datos);
            
        //addRow('dataTable',cmb.options[cmb.selectedIndex].value,cmb.options[cmb.selectedIndex].text,txtp1.value,txtc.value,tot1.value);
    }
    
    cmb.onchange = function(){
        //txtp.value = cmb.options[cmb.selectedIndex].value;
        
        envc(cmb.options[cmb.selectedIndex].value);
    }
    
    
    tot.onblur = function(){
         var a = document.getElementById('t');
        var foli = document.getElementById('foli');
        
           function xhrBuscar() {
                     return (window.XMLHttpRequest)?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
            }
        
            var xhr = xhrBuscar();
            
            xhr.onreadystatechange = function(){
                //alert(xhr.responseText);
                if (xhr.readyState == 4 && xhr.status == 200) {
                   if (xhr.responseText == 1) {
                     alert('No es posible Realizar Accion');
                   }
                   else {
                     a.value = xhr.responseText;
                     //alert(xhr.responseText);
                      //window.opener = '';
                      //window.close();
                   }
                }
            }
            
            xhr.open("POST","total.php",true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            datos="folio="+foli.value;
            xhr.send(datos);
        
        //addRow('dataTable',cmb.options[cmb.selectedIndex].value,cmb.options[cmb.selectedIndex].text,txtp1.value,txtc.value,tot1.value);
    }
    
    //vnt1.onclick = function(){
    //    formul.addEventListener("submit",tabla);
    //}
    //var temporal = 0;
    //var op = 0;
    //
    //bt.onclick = function(){
    //    temporal = txt.value;
    //    op = txtp.value * temporal;
    //    
    //    t.value = op;
    //    
    //    resta(arti.value,txt.value);
    //}
}



function tabla() {
    var tab = document.getElementById('dataTable');
    var td = tab.getElementsByTagName('TD');
    var fecha = document.getElementById('fech');
    var foli = document.getElementById('foli');
    
    //var c1 = td[0].innerHTML;
    //var c2 = td[3].innerHTML;
    
     var c1 = td[0].text;
    var c2 = td[3].text;
    
    var fol = foli.value;
    var f = fecha.value;
    
    alert(c1);
    alert(c2);
    //alert(fol);
    //alert(f);
    
    //for(var i=0;i<td.length;i++){
    //    alert(td[0].innerHTML);
    //    alert(td[3].innerHTML);
    //}
    
          function xhrBuscar() {
                     return (window.XMLHttpRequest)?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
            }
    
            var xhr = xhrBuscar();
            
            xhr.onreadystatechange = function(){
                //alert(xhr.responseText);
                if (xhr.readyState == 4 && xhr.status == 200) {
                   if (xhr.responseText == 1) {
                     alert('No es posible Realizar Accion');
                   }
                   else {
                    alert(xhr.responseText);
                      //window.opener = '';
                      //window.close();
                   }
                }//fin de if status y readystate
            }//fin de funcion onreadystatechange
            
            xhr.open("POST","venta_contado.php",true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            datos="folio="+fol+"&fecha="+f+"&prod="+c1.value+"&cant="+c2.value;
            xhr.send(datos);
}


        var mostrarValor = function(x){
           var txtp = document.getElementById('prec');
           txtp.value=x;
        }

            function addRow(tableID,cod1,nom,prec,cant,tot) {

                  var table = document.getElementById(tableID);
   
                  var rowCount = table.rows.length;
   
                  var row = table.insertRow(rowCount);
   
                  var cell1 = row.insertCell(0);
                  cell1.innerHTML = cod1 ;
                  //var element1 = document.createElement("input");
                  //
                  //element1.type = "checkbox";
                  //
                  //cell1.appendChild(element1);
   
                  var cell2 = row.insertCell(1);
                  cell2.innerHTML = nom;
                  
                  var cell3 = row.insertCell(2);
                  cell3.innerHTML = prec;
                  
                  var cell4 = row.insertCell(3);
                  cell4.innerHTML = cant;
                  
                  var cell5 = row.insertCell(4);
                  cell5.innerHTML = tot;
                  //var element2 = document.createElement("input");
                  //
                  //element2.type = "text";
                  //
                  //cell2.appendChild(element2);
             }

function envc(cod) {
            function xhrBuscar() {
                     return (window.XMLHttpRequest)?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
            }
    
            var xhr = xhrBuscar();
            
            xhr.onreadystatechange = function(){
                //alert(xhr.responseText);
                if (xhr.readyState == 4 && xhr.status == 200) {
                   if (xhr.responseText == 1) {
                     alert('No es posible Realizar Accion');
                   }
                   else {
                     var precio = document.getElementById('costo');
                     precio.value = xhr.responseText;
                      //window.opener = '';
                      //window.close();
                   }
                }//fin de if status y readystate
            }//fin de funcion onreadystatechange
            
            xhr.open("POST","precio-p.php",true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            datos="codigo="+cod;
            xhr.send(datos);
}


function resta(art,cant) {
            function xhrBuscar() {
                     return (window.XMLHttpRequest)?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
            }
    
            var xhr = xhrBuscar();
            
            xhr.onreadystatechange = function(){
                //alert(xhr.responseText);
                if (xhr.readyState == 4 && xhr.status == 200) {
                   if (xhr.responseText == 1) {
                     alert('No es posible Realizar Accion');
                   }
                   else {
                      //window.opener = '';
                      //window.close();
                   }
                }//fin de if status y readystate
            }//fin de funcion onreadystatechange
            
            xhr.open("POST","resta-producto.php",true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            datos="codigo="+art+"&cantidad="+cant;
            xhr.send(datos);
}