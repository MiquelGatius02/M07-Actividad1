<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Listar</title>
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
                    <a class="nav-link" href="lista.php">Lista <span class="sr-only">(actual)</span></a>
                </li>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="login.html">Login <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.html">Register</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container bg-white">
        <table class="table table table-striped">
            <td scope="col" class="table-dark">id</td>
            <td scope="col" class="table-dark">nombre</td>
            <td scope="col" class="table-dark">descripcion</td>
            <td scope="col" class="table-dark">cantidad</td>
            <td scope="col" class="table-dark">precio</td>
            <form action="filtrar.php" method="get">
                <div class="input-group mb-2">
                    <select name="select" default="Nombre">
                        <option value="Nombre" selected>Nombre</option>
                        <option value="Descripci??n">Descripci??n</option>
                        <option value="Cantidad">Cantidad</option>
                        <option value="Precio">Precio</option>
                    </select>
                    <span class="input-group-text" id="inputGroup-sizing-default">Filtro</span>
                    <input type="text" class="form-control" name="filtro" aria-describedby="inputGroup-sizing-default">
                </div>
            </form>

            </tr>
            <?php
            $servidor = "localhost";
            $usuario = "root";
            $password = "";
            $bd = "actividad1";

            $con = mysqli_connect($servidor, $usuario, $password, $bd);

            if (!$con) {
                die("No se ha podido realizar la conexi??n_" . mysqli_connect_error());
            } else {

                mysqli_set_charset($con, "utf8");
                $sql2 = "SELECT * FROM `productos`";
                $consulta = mysqli_query($con, $sql2);
                while ($fila = $consulta->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila["Id"] . "</td>";
                    echo "<td>" . $fila["Nombre"] . "</td>";
                    echo "<td>" . $fila["Descripci??n"] . "</td>";
                    echo "<td>" . $fila["Cantidad"] . "</td>";
                    echo "<td>" . $fila["Precio"] . "</td>";
                    echo "</tr>";
                }
            }

            ?>
        </table>
    </div>
</body>

</html>