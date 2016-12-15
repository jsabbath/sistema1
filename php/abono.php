<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <title>Abono</title>
   <link rel="stylesheet" type="text/css" href="../css/abono.css"/>
</head>
<body>
    
    <div id="encabezado">
        
    </div>
    
    <div id="cuerpo">
         <div id="contenido">
            <h1>Datos Abono</h1>
            <form action="" method="get">
                <div id="c1">
                    <label for="NoAbono" class="cajatexto" >No Abono</label>
                    <input type="text" id="NoAbono" name="NoAbono" maxlength=10 size=15 class="cajatexto id"/>
                </div>
               
                <div id="c2">
                    <label for="id Cliente" class="cajatexto">id Cliente</label>
                    <input type="text" id="id Cliente" name="id Cliente" maxlength=10 size=15 class="cajatexto id"/>
                </div>
                
                <div id="c3">
                  <label for="fecha" class="cajatexto">Fecha</label>
                  <input type="text" id="fecha" name="fecha" maxlength=50 class="cajatexto letras"/>
                </div>
                
                <div id="c4">
                    <label for="Importe" class="cajatexto">Importe</label>
                    <input type="text" id="Importe" name="Importe" maxlength=50 class="cajatexto letras"/>
                </div>
                
                <div id="c5">
                   <label for="producto" class="cajatexto">Poducto</label>
                  <input type="text" id="producto" name="producto" maxlength=50 class="cajatexto letras"/>
                </div>
                
                <button id="sub" type="submit">Modificar Saldo</button>
            </form>
        </div>
    </div>
    
    <div id="pie">
        
    </div>
    
</body>
</html>