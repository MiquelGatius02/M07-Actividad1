
<?php
$nombre = $_GET['nombre'];
$descripcion = $_GET['descripcion'];
$cantidad = $_GET['cantidad'];
$precio = $_GET['precio'];

$servidor = "localhost";
$usuario = "root";
$password = "usbw";
$bd = "actividad1";

$con = mysqli_connect($servidor,$usuario,$password,$bd);

if(!$con){
    die("No se ha podido realizar la conexión_" . mysqli_connect_error());
}else{

    mysqli_set_charset($con,"utf8");
    echo" Se ha hecho la conexion correctamente";
    $sql = "INSERT INTO `productos`(`id`, `nombre`, `descripcion`, `cantidad`, `precio`) 
    VALUES (NULL,'$nombre','$descripcion','$cantidad','$precio')";
    $consulta = mysqli_query($con,$sql); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>prueba</title>
</head>
<body class="bg-secondary">
    <div class= "container bg-white">
    <table class="table table table-striped">
        <td scope="col" class="table-dark">id</td>
        <td scope="col" class="table-dark">nombre</td>
        <td scope="col" class="table-dark">descripcion</td>
        <td scope="col" class="table-dark">cantidad</td>
        <td scope="col" class="table-dark">precio</td>

        <?php
        $servidor = "localhost";
        $usuario = "root";
        $password = "usbw";
        $bd = "actividad1";
        
        $con = mysqli_connect($servidor,$usuario,$password,$bd);

        if(!$con){
            die("No se ha podido realizar la conexión_" . mysqli_connect_error());
        }else{
        
            mysqli_set_charset($con,"utf8");
            echo"Conexion joya";
            $sql2="SELECT * FROM `productos`";
            $consulta=mysqli_query($con,$sql2);
            while($fila=$consulta->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$fila["id"]."</td>";
                echo "<td>".$fila["nombre"]."</td>";
                echo "<td>".$fila["descripcion"]."</td>";
                echo "<td>".$fila["cantidad"]."</td>";
                echo "<td>".$fila["precio"]."</td>";
                echo "</tr>";
            }
        }
           
        ?>
    </table>
    </div>
</body>
</html>
</html>