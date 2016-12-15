window.onload = function(){
    esconder();
    var fm = document.getElementById("formulario");
    
    var capa_ppal = fm.querySelectorAll("form#formulario > div");
    
    var suma = 0;
    
    for(var i=0;i<capa_ppal.length;i++){
        for(var j=0;j<capa_ppal[i].querySelectorAll("div").length;j++){
            for(var k=0;k<capa_ppal[i].querySelectorAll("div")[j].childNodes.length;k++){
                
                if (capa_ppal[i].querySelectorAll("div")[j].childNodes[k].nodeName == "INPUT" && capa_ppal[i].querySelectorAll("div")[j].childNodes[k].type == "text") {
                    //alert(capa_ppal[i].querySelectorAll("div")[j].childNodes[k].name);
                    if (capa_ppal[i].querySelectorAll("div")[j].childNodes[k].value == "") {
                        comprueba(capa_ppal[i].querySelectorAll("div")[j].childNodes[k].id);
                    }
                }
            }
        }
    }
    //fm.addEventListener("submit",validar);
} 
    function comprueba(elem){
            var inp = document.getElementById(elem);
            var hermano = inp.nextSibling;

            inp.onblur = function(){
            if (inp.value == "") {
                bien(elem);
                while(hermano){
                    if (hermano.nodeName == "SPAN" && inp.name==hermano.getAttribute('name')) {
                        var letrero = document.getElementById(hermano.id);
                        letrero.style.visibility = "visible";
                        //letrero.innerHTML = "El campo esta vacio";
                    }
                    hermano = hermano.nextSibling;
                }
            }else{
                 bien(elem);
            }
         }
    }
    
    function bien(elem){
            var inp = document.getElementById(elem);
            var par = inp.parentNode;
            var hermano = inp.nextSibling;
            
            var cuan=0;
            
            inp.onfocus = function(){
                while(hermano){
                    if (hermano.nodeName == "SPAN" && inp.name==hermano.getAttribute('name')) {
                        //alert("el campo: "+inp.name+ " esta vacio " + "su hermano es: "+hermano.getAttribute('name'));
                        var letrero = document.getElementById(hermano.id);
                           letrero.style.visibility = "hidden";
                            //letrero.innerHTML = " ";
                            comprueba(elem);
                    }
                    hermano = hermano.nextSibling;
                }
         }
    }
//aqui terminaba el onload

function esconder() {
    var sp = document.getElementsByTagName("span");
    for(var i=0;i<sp.length;i++){
        sp[i].style.visibility = "hidden";
    }
    var msj = document.getElementById("msj");
    msj.style.visibility = "hidden";
}

function comprobar(valor) {
           function xhrBuscar() {
                return (window.XMLHttpRequest)?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
             }
        
            var xhr = xhrBuscar();
            
            xhr.onreadystatechange = function(){
                if (xhr.readyState == 4 && xhr.status == 200) {
                   var prov = document.getElementById("prov");
                   var inp = document.getElementById("proveedor");
                   
                   if (xhr.responseText == 1) {
                      prov.style.color = "#00f";
                   }
                   else {
                      prov.style.color = "#f00";
                      inp.select();
                   }
                }//fin de if status y readystate
            }//fin de funcion onreadystatechange
            
            xhr.open("POST","buscaprod.php",true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("producto="+valor);
}


//aqui comienza la validacion por separado funcion para encontrar a los input:
