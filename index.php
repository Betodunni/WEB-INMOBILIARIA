<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Formulario Post</title>
</head>


<body>
    <h1>¡La casa de sus sueños a pocos pasos!</h1>
    <div id="caja">
        <form action="busqueda_avanzada.php" method="POST" enctype="multipart/form-data">
            <h2>Busqueda Avanzada</h2>
            <span id="span1">Minimo</span>
            <span id="span2">Máximo</span>
            <label>Precio: <select name="precio_min" id="min">
                <option value="">Indiferente</option>
                <option value="100.000">100.000</option>
                <option value="150.000">150.000</option>
                <option value="200.000">200.000</option>
                <option value="400.000">400.000</option>
                <option value="500.000">500.000</option>
                <option value="600.000">600.000</option>
            </select>
            <select name="precio_max" id="max">
                <option value="">Indiferente</option>
                <option value="100.000">100.000</option>
                <option value="200.000">200.000</option>
                <option value="400.000">400.000</option>
                <option value="600.000">600.000</option>
                <option value="800.000">800.000</option>
                <option value="900.000">900.000</option>
            </select><br>
            
            <label>Habitaciones: <select name="habitaciones" id="habitaciones">
                <option value="">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select></label><br>
            <label>Fecha Construcción: <input type="text" name="fecha_construct" id="construct" placeholder="año"></input></label><br>
            
                <input id="enviar2" type="submit" name="busqueda2" value="Buscar">
        </form>
    </div>
</body>
</html>