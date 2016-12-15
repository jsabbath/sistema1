window.onload = function(){
    var ventana = document.getElementById("ventana");
    var txt = document.getElementById("enc");
    var can = document.getElementById("can");
    var no = document.getElementById("no"); 
    var elim = document.getElementById("bt2");
            
     var fm = document.getElementById("formulario");
         elim.onclick = function(){
            txt.innerHTML = "¿Esta Seguro que desea Eliminar?";
             ventana.style.visibility="visible";
        }
     no.onclick = function(){
          txt.innerHTML = "";
          ventana.style.visibility="hidden";  
     }
              
     can.onclick = function(){
          txt.innerHTML = "";
           ventana.style.visibility="hidden";  
     }
}