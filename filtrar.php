<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>prueba</title>
</head>

<body class="bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <label class="navbar-brand">Menu</label>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="formulario.html">Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lista.php">Lista</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="filtrar.php">Filtro <span class="sr-only">(actual) </span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container bg-white">
        <table class="table table table-striped ">
            <tr>
                <td scope="col" class="table-dark">id</td>
                <td scope="col" class="table-dark">nombre</td>
                <td scope="col" class="table-dark">descripcion</td>
                <td scope="col" class="table-dark">cantidad</td>
                <td scope="col" class="table-dark">precio</td>
                <form action="" method="get">
                    <div class="input-group mb-2">
                        <select name="select" default="Nombre">
                            <option value="Nombre" selected>Nombre</option>
                            <option value="Descripción">Descripción</option>
                            <option value="Cantidad">Cantidad</option>
                            <option value="Precio">Precio</option>
                        </select>
                        <span class="input-group-text" id="inputGroup-sizing-default">Filtro</span>
                        <input type="text" class="form-control" name="filtro" aria-describedby="inputGroup-sizing-default">
                    </div>
                </form>

            </tr>
            <?php
            $valor  = $_GET["select"];
            $filtro = $_GET["filtro"];
            $servidor = "localhost";
            $usuario = "root";
            $password = "";
            $bd = "actividad1";

            $con = mysqli_connect($servidor, $usuario, $password, $bd);

            if (!$con) {
                die("No se ha podido realizar la conexión_" . mysqli_connect_error());
            } else {
                mysqli_set_charset($con, "utf8");
                echo $valor;
                echo  $filtro;
                $sql2 = "SELECT * FROM `productos` WHERE $valor LIKE '$filtro%' ";
                echo $valor;
                echo  $filtro;
                $consulta = mysqli_query($con, $sql2);
                echo $valor;
                echo  $filtro;
                while ($fila = $consulta->fetch_assoc()) {
                    echo "<tr>";
                    if (str_starts_with($fila[$valor], $filtro)) {
                        echo "<td>" . $fila["Id"] . "</td>";
                        echo "<td>" . $fila["Nombre"] . "</td>";
                        echo "<td>" . $fila["Descripción"] . "</td>";
                        echo "<td>" . $fila["Cantidad"] . "</td>";
                        echo "<td>" . $fila["Precio"] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
        </table>
    </div>
</body>

</html>