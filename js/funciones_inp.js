bordes();
textos();

var fm = document.getElementById("formulario");


function validar(e) {
    inp(e);
}

function textos() {
    var form = document.getElementById("formulario");
    var txt = document.getElementsByTagName("input");
    for(var i=0;i<txt.length;i++){
        if (txt[i].type == "text") {
            foco(txt[i].id);
            desel(txt[i].id);
        }
    }
}
function bordes() {
    var form = document.getElementById("formulario");
    var txt = document.getElementsByTagName("input");
    for(var i=0;i<txt.length;i++){
        if (txt[i].type == "text") {
            txt[i].style.border = "2px solid black";
        }
    }
}


function desel(elem) {
    var el = document.getElementById(elem);
        
    el.onblur=function(){
       el.style.border = "2px solid black";
    }
}

function foco(elem) {
    var el = document.getElementById(elem);
        
    el.onfocus=function(){
         el.style.border = "2px solid blue";
     }
}

function inp(e) {
    var txt = document.getElementsByTagName("input");
    for(var i=0;i<txt.length;i++){
        if (txt[i].type == "text") {
            if (txt[i].value == "") {
                txt[i].style.border ="solid red";
                mensaje();
                e.preventDefault();
            }
        }
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