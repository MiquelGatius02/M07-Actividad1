<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Filtro</title>
</head>

<body class="bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <label class="navbar-brand">Menu</label>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lista.php">Lista</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="filtrar.php">Filtro <span class="sr-only">(actual) </span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="login.html">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.html">Register</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container bg-white">
        <table class="table table table-striped ">
            <tr>
                <td scope="col" class="table-dark">Id</td>
                <td scope="col" class="table-dark">Nombre</td>
                <td scope="col" class="table-dark">Descripción</td>
                <td scope="col" class="table-dark">Cantidad</td>
                <td scope="col" class="table-dark">Precio</td>
                <td scope="col" class="table-dark">Edit</td>
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
            //datos base de datos
            $servidor = "localhost";
            $usuario = "root";
            $password = "";
            $bd = "actividad1";
            //Variables
            $valor  = $_GET["select"];
            $filtro = $_GET["filtro"];

            $con = mysqli_connect($servidor, $usuario, $password, $bd);

            if (!$con) {
                die("No se ha podido realizar la conexión_" . mysqli_connect_error());
            } else {
                mysqli_set_charset($con, "utf8");
                $sql2 = "SELECT * FROM `productos` WHERE $valor LIKE '$filtro%' ";
                $consulta = mysqli_query($con, $sql2);
                while ($fila = $consulta->fetch_assoc()) {
                    echo "<tr>";
                    if (str_starts_with($fila[$valor], $filtro)) {
                        echo "<td>" . $fila["Id"] . "</td>";
                        echo "<td>" . $fila["Nombre"] . "</td>";
                        echo "<td>" . $fila["Descripción"] . "</td>";
                        echo "<td>" . $fila["Cantidad"] . "</td>";
                        echo "<td>" . $fila["Precio"] . "</td>";
                        echo "<td>  <form action='borrar.php?id=" . $fila["Id"] . "'method='post'>
                        <input type='submmit' class='btn btn-danger' name = 'borrar' value = 'Borrar'>
                        </form></td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
        </table>
    </div>
</body>

</html>