<!doctype html>

<html lang="en">
<head>
    <title>Contactanos</title>
    <link rel="stylesheet" type="text/css" href="../css/contacto.css"/>
</head>
<body>
    <div id="encabezado">
        
    </div>
    
    <div id="contenido">
        <div id="tit">
            <h1 style="color: #ffffff; text-align: center;">Escribenos:</h1>
        </div>
        
        <div id="fcont">
            <form id="contact_form" action="#" method="POST" enctype="multipart/form-data">
                <div class="row r1">
                    <label for="name">Tu nombre:</label><br />
                    <input id="name" class="input" name="name" type="text" value="" size="30" /><br />
                </div>
                <div class="row r2">
                    <label for="email">Tu email:</label><br />
                    <input id="email" class="input" name="email" type="text" value="" size="30" /><br />
                    <label for="tel" id="l2">Tu Telefono:</label><br />
                    <input id="tel" class="input" name="telefono" type="text" value="" size="30" /><br />
                </div>
                <div class="row r3">
                    <label for="message">Tu mensaje:</label><br />
                    <textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />
                </div>
                <input id="submit_button" type="submit" value="Enviar email" />
            </form>
        </div>
    </div>

    <div id="pie">
        
    </div>
</body>
</html>
