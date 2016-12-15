bordes();
textos();

var clientes = document.getElementById("regc");

var fm = document.getElementById("formulario");

clientes.onclick = function(){
        fm.addEventListener("submit",validar);
}

function validar(e) {
    inp(e);
    email(e);
    emailr(e);
    contra(e);
    telefono(e);
    telcn(e);
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
                txt[i].style.border ="2px solid red";
                mensaje();
                e.preventDefault();
            }
        }
    }
}

function email(e) {
    var mail = document.getElementById("mail");
    if( (/\w{1,}[@][\w\-]{1,}([.]([\w\-]{1,})){1,3}$/.test(mail.value)) ) {
        
    }else{
        mail.style.border="2px solid red";
        mail.focus();
        mail.select();
        e.preventDefault();
        mensaje();
    }
}

function emailr(e) {
    var mail = document.getElementById("mailcn");
    if( (/\w{1,}[@][\w\-]{1,}([.]([\w\-]{1,})){1,3}$/.test(mail.value)) ) {
        
    }else{
        mail.style.border="2px solid red";
        mail.focus();
        mail.select();
        e.preventDefault();
        mensaje();
    }
}

function contra(e) {
    var contrasena = document.getElementById("contrasena");
    if( (/^\w+$/.test(contrasena.value)) ) {
        
    }else{
        contrasena.style.border="2px solid red";
        contrasena.focus();
        contrasena.select();
        e.preventDefault();
        mensaje();
    }
}

function telefono(e) {
    var tel = document.getElementById("telefono");
    if( (isNaN(tel.value) )) {
        tel.style.border="2px solid red";
        tel.focus();
        tel.select();
        e.preventDefault();
        mensaje();
    }else{
        
    }
}
function telcn(e) {
    var tel = document.getElementById("telcn");
    if( (isNaN(tel.value) )) {
        tel.style.border="2px solid red";
        tel.focus();
        tel.select();
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