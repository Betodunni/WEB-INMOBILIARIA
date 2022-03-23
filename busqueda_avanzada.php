


<style>

    article{
    width: 100%;
    height: 280px;
    padding: 5px;
    margin-top: 5px;
    margin-bottom: 10px;
    background-color: rgb(54, 145, 153, 0.8);
    color: white;
    font-size: 18px;
}

article img{
    float: left;
    width: 300px;
    height: 250px;
    margin: 10px 20px 10px 10px;
}

h2{
    text-align: center;
}

</style>


<?php 

//*************************CONEXION BASE DE DATOS*********************

$miconexion=mysqli_connect("localhost", "id18267539_betodunni", "K8Fzq*gq!g!+p7p(", "id18267539_inmobiliaria");

//Comprobar conexion

if(!$miconexion){

    echo "la conexion ha fallado: " . mysqli_error();

    exit();


}

//*************************ASIGNAR VARIABLES (METODO POST)*********************

$precio_min = $_POST['precio_min'];
$precio_max = $_POST['precio_max'];
$habitaciones = $_POST['habitaciones'];
$fecha = $_POST['fecha_construct'];

//*************************CONDICIONALES DE BUSQUEDA*********************

if($precio_min !== "" & $precio_max !== "" & $habitaciones == "" & $fecha == ""){
    $consulta = "SELECT * FROM viviendas WHERE (precio BETWEEN '$precio_min' AND '$precio_max') ORDER BY precio ASC";
}

if($precio_min !== "" & $precio_max !== "" & $habitaciones !== "" & $fecha == ""){
    $consulta = "SELECT * FROM viviendas WHERE (precio BETWEEN '$precio_min' AND '$precio_max') AND (numero_habitaciones='$habitaciones') ORDER BY precio ASC";
}
if($precio_min !== "" & $precio_max !== "" & $habitaciones !== "" & $fecha !== ""){
    $consulta="SELECT * FROM viviendas WHERE (precio BETWEEN '$precio_min' AND '$precio_max') AND (numero_habitaciones='$habitaciones') AND (fecha_construccion='$fecha') ORDER BY precio ASC";
}
if($precio_min == "" & $precio_max == "" & $habitaciones !== "" & $fecha == ""){
    $consulta="SELECT * FROM viviendas WHERE numero_habitaciones='$habitaciones' ORDER BY precio ASC";
}
if($precio_min == "" & $precio_max == "" & $habitaciones == "" & $fecha !== ""){
    $consulta="SELECT * FROM viviendas WHERE fecha_construccion='$fecha' ORDER BY precio ASC";
}
if($precio_min !== "" & $precio_max !== "" & $habitaciones == "" & $fecha !== ""){
    $consulta="SELECT * FROM viviendas WHERE (precio BETWEEN '$precio_min' AND '$precio_max') AND (fecha_construccion='$fecha') ORDER BY precio ASC";
}

if($precio_min == "" & $precio_max == "" & $habitaciones !== "" & $fecha !== ""){
    $consulta="SELECT * FROM viviendas WHERE numero_habitaciones='$habitaciones'AND(fecha_construccion='$fecha') ORDER BY precio ASC";
}

if($precio_min == "" & $precio_max == "" & $habitaciones == "" & $fecha == ""){
    $consulta = "SELECT * FROM viviendas";
}

//*************************RESULTADOS DE BUSQUEDA*********************

    $resultado=mysqli_query($miconexion, $consulta) or die( mysqli_error($miconexion));

//*************************CONTAR REGISTROS*********************

    $num_filas = mysqli_num_rows($resultado);
    
    if($num_filas > 0){
        echo "<h2> " . $num_filas . " Resultado(s) Encontrado(s): </h2>";
    }else{
        echo "<h2>No hay registros con el filtro selecionado</h2>";
    }
    
//*************************BUCLE DE IMPRESION REGISTROS*********************

    while($registro=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){

        echo "<article>";
        echo "<img src='imagenes/" . $registro['imagen'] . "' width='300px' />";
        echo "<h3>" . "Precio: " .  $registro['precio'] . "€" . "</h3>";
        echo "<p>" . "M<sup>2</sup>: " . $registro['m2'] . " m<sup>2</sup>" . "</p>";
        echo "<p>" . "Habitaciones: " . $registro['numero_habitaciones'] . " hab." . "</p>";
        echo "<p>" . "Fecha Construcción: " . $registro['fecha_construccion'] . "</p>";
        echo "<p>" . "¿Amueblado?: " . $registro['amueblado'] . "</p>";
        echo "<p>" . "Datos propietario: " . $registro['datos_propietario'] . "</p>";
        echo "</article>";


    }

    mysqli_close($miconexion);


?>
