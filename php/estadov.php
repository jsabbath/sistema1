<!doctype html>

<html lang="en">
<head>
    <title>Estado de Venta</title>
    <link rel="stylesheet" type="text/css" href="../css/estadov.css"/>
</head>
<body>
    <div id="encabezado">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
    <div id="cuerpo">
        <div id="foto">
            <br/><br/><br/>
            <br/><br/><br/>
        </div>
        <div id="fm1">
            <div id="tit">
                <h3 style="text-align: center; color: #ffffff;">Situacion de la Venta</h3>
             </div>
            <div id="objetos">
                <form>
                    <div id="o1">
                        <label>Numero de Producto:</label>
                        <input type="text" size="11" maxlength="10" disabled="disabled"/>
                    </div>
                    <div id="o2">
                        <label>Descripcion:</label>
                        <input type="text" maxlength="16" id="des" size="25" disabled="disabled"/>
                    </div>
                    <div id="o3">
                        <label>Categoria:</label>
                        <input type="text" size="25" maxlength="30" disabled="disabled" id="cat"/>
                    </div>
                    <div id="o4">
                        <label>Precio:</label>
                        <input type="text" maxlength="11" id="prec" size="11" disabled="disabled"/>
                    </div>
                    <div id="o5">
                        <label>Fecha de Compra:</label>
                        <input type="text" maxlength="60" id="fc" disabled="disabled"/>
                    </div>
                    <div id="o6">
                        <label>Folio de Venta:</label>
                        <input type="text" maxlength="10" id="ppx" disabled="disabled"/>
                    </div>
                    <div id="o7">
                        <label>Estado:</label>
                        <input type="text" maxlength="10" id="edo" disabled="disabled"/>
                    </div>
                    <div id="sub">
                        <!--<input type="submit" value="Buscar!" id="reg" name="volver"/>-->
                    </div>
                </form>
             </div><!--aqui termina el div objetos-->
        </div>
    </div>
    <div id="pie">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
</body>
</html>
