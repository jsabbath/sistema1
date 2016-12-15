bordes();
textos();

var personal = document.getElementById("regpr");

var fm = document.getElementById("formulario");

personal.onclick = function(){
        fm.addEventListener("submit",validar);
}

function validar(e) {
    inp(e);
    precioco(e);
    preciocr(e);
    cantidad(e);
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

function precioco(e) {
    var num = document.getElementById("contado");
    if( (isNaN(num.value) )) {
        num.style.border="2px solid red";
        num.focus();
        num.select();
        e.preventDefault();
        mensaje();
    }else{
        
    }
}

function preciocr(e) {
    var num = document.getElementById("credito");
    if( (isNaN(num.value) )) {
        num.style.border="2px solid red";
        num.focus();
        num.select();
        e.preventDefault();
        mensaje();
    }else{
        
    }
}

function cantidad(e) {
    var num = document.getElementById("cantidad");
    if( (isNaN(num.value) )) {
        num.style.border="2px solid red";
        num.focus();
        num.select();
        e.preventDefault();
        mensaje();
    }else{
        
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


function archivo(evt) {
      var files = evt.target.files; 

      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('image.*')) {
                continue;
           }
       
           var reader = new FileReader();
           
           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la imagen.
                      document.getElementById("list").innerHTML = ['<img width="230" height="230" id="nuevo" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
}

document.getElementById('fil').addEventListener('change', archivo, false);