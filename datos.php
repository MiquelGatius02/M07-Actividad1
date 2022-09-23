<?php
$nombre = $_GET['nombre'];
$descripcion = $_GET['descripcion'];
$cantidad = $_GET['cantidad'];
$precio = $_GET['precio'];

$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "actividad1";

$con = mysqli_connect($servidor, $usuario, $password, $bd);

if (!$con) {
    die("No se ha podido realizar la conexión_" . mysqli_connect_error());
} else {

    mysqli_set_charset($con, "utf8");
    echo " Se ha hecho la conexion correctamente";
    $sql = "INSERT INTO `productos`(`Id`, `Nombre`, `Descripción`, `Cantidad`, `Precio`) 
    VALUES (NULL,'$nombre','$descripcion','$cantidad','$precio')";
    $consulta = mysqli_query($con, $sql);
}
header('Location: formulario.html');
exit;
?>
