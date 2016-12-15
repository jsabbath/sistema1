<!doctype html>

<html lang="en">
<head>
    <title>Reportes De Venta</title>
    <link rel="stylesheet" type="text/css" href="../css/reporte.css"/>
</head>
<body>
    <div id="encabezado">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
    <div id="cuerpo">
        <div id="forms">
            <div id="p">
                <div id="tv">
                    <label>Periodo de venta:</label>
                </div>
                
                <div id="pv">
                   <form>
                      <div id="pv1">
                        <input type="checkbox">
                        <label>Todas Las Ventas</label>  
                      </div>
                      <div id="pvf">
                        <label>De:</label>
                        <input type="date">
                        
                        <label>A:</label>
                        <input type="date">
                      </div>
                   </form>
                </div>
                
                <div id="tf">
                    <label id="fil">Filtrar por:</label>
                </div>
                
                <div id="fv">
                    <form>
                      <div id="or">
                        <label>Ordenar Por:</label> 
                        <select name="ordenar">
                            <option>Folio de Venta</option>
                            <option>Numero de Factura</option>
                        </select>
                      </div>
                      
                      <div id="agr">
                        <label>Agrupar Por:</label> 
                          <select name="ag">
                              <option>Numero de Cliente</option>
                              <option>Precio</option>
                          </select>
                      </div>
                      
                      <div id="ord">
                         <label>Ordenar:</label> 
                          <select name="or">
                              <option>De Mayor a Menor</option>
                              <option>De Menor a Mayor</option>
                          </select>
                      </div>
                      
                       <div id="dt">
                        <input type="checkbox">
                        <label>Mostrar Detalle de Produtos</label>  
                      </div>
                       
                       <div id="bg">
                        <input type="submit" value="Generar!">
                      </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
    <div id="pie">
        <br/><br/><br/>
        <br/><br/><br/>
    </div>
</body>
</html>
