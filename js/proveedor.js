bordes();
textos();

var provedor = document.getElementById("regprov");

var fm = document.getElementById("formulario");

provedor.onclick = function(){
        fm.addEventListener("submit",validar);
}

function validar(e) {
    inp(e);
    email(e);
    radios(e);
    telefono(e);
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
    var mail = document.getElementById("mailc");
    if( (/\w{1,}[@][\w\-]{1,}([.]([\w\-]{1,})){1,3}$/.test(mail.value)) ) {
        
    }else{
        mail.style.border="2px solid red";
        mail.focus();
        mail.select();
        e.preventDefault();
        mensaje();
    }
}

function radios(e) {
    var rad = document.getElementsByName("radio");
    var lb = document.getElementById("lbrad");
    var ban = false;
    for(var i=0;i<rad.length;i++){
        if (rad[i].checked) {
            ban = true;
            break;
        }else{
            lb.innerHTML="Porfavor, seleccione una opcion";
            lb.style.color = "red";
            e.preventDefault();
        }
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

function fondo(e) {
    var fon = document.getElementById("fondo");
    if( (isNaN(fon.value) )) {
        fon.style.border="2px solid red";
        fon.focus();
        fon.select();
        e.preventDefault();
        mensaje();
    }else{
        
    }
}

function numero(e) {
    var num = document.getElementById("numero");
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