window.onload = function(){
var form = document.getElementById("formulario");
var txt = document.getElementsByTagName("input");
    
    for(var i=0;i<txt.length;i++){
        if (txt[i].type == "text") {
            foco(txt[i].id);
            desel(txt[i].id);
        }
    }
    //form.addEventListener("submit",validar);
}

function validar(e) {
    email(e);
    curp(e);
    radios(e);
    inp(e);
}

function desel(elem) {
        var el = document.getElementById(elem);
        
    el.onblur=function(){
       el.style.border = "solid black";
    }
}

function foco(elem) {
    var el = document.getElementById(elem);
        
    el.onfocus=function(){
         el.style.border = "solid blue";
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


function radios(e) {
    var rad = document.getElementsByName("grupo1");
    var lb = document.getElementById("msjl");
    var ban = false;
    for(var i=0;i<rad.length;i++){
        if (rad[i].checked) {
            ban = true;
            break;
        }else{
            lb.innerHTML="Por favor, seleccione una de las opciones";
            lb.style.color = "red";
            e.preventDefault();
        }
    }
}

function email(e) {
    var mail = document.getElementById("rf");
    if( (/\w{1,}[@][\w\-]{1,}([.]([\w\-]{1,})){1,3}$/.test(mail.value)) ) {
        
    }else{
        mail.style.border="solid red";
        mail.focus();
        mail.select();
        e.preventDefault();
        mensaje();
    }
}

function curp(e) {
     var edad = document.getElementById("curp");
    
        if (edad.value>=18) {
            
            //alert("eres mayor de edad");
        }
        else {
            edad.style.border="solid red";
            edad.focus();
            edad.select();
            e.preventDefault();
            mensaje();
            //alert("no eres mayor de edad");
        }
}

function mensaje() {
        var letrero = document.getElementById("msj");
    
        function aparece() {
            //letrero.style.display = "none";
            letrero.style.display = "block";
            
        }
        
        function desaparece() {
            letrero.style.display = "none";
            //setTimeout(desaparece,4000);
        }
        
        setTimeout(aparece,1000);
        setTimeout(desaparece,4000);
        //setInterval(aparece,2000);
        //desaparece();
        //setInterval(desaparece,2000);
}
