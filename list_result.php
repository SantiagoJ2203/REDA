<?php

// Se inicia o reanuda una sesión en caso de que un usuario ya haya ingresado al sistema por medio del log in o inicio de sesión:
session_start();

// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include 'ACTION_conexionBD.php';

// Se verifica con 'isset' si alguna de las tres sesiones disponibles existe en el momento con alguno de los cargos en el sistema (instructor, personal administrativo o administrador):
if (isset($_SESSION['instructor']) || isset($_SESSION['personal']) || isset($_SESSION['administrador'])) {
    // En caso de estar en una sesión, el siguiente código para ver el resultado de las fichas buscadas será ejecutado:
    ?>

<!DOCTYPE html>

<head lang="es">
    <title>Resultado de listados - REDA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/reda_system.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" href="icons/reda4.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php

    if (isset($_POST['buscar'])) {

        $fichanombre = $_POST['fichanombre'];

        $con = mysqli_connect("localhost", "root", "", "reda");
        $query = mysqli_query($con, "SELECT * FROM tbl_ficha WHERE numero_ficha = '$fichanombre';");
        $row = mysqli_fetch_array($query);
        $list = $row['numero_ficha'];
        $name = $row['nombre_ficha'];
        $num = mysqli_num_rows($query);

    }

    ?>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #11b6a0; border-radius: 0%;">
        <div class="navbar-collapse">
            <img src="icons/reda2.png" class="d-inline-block align-top" alt="">
            <div class="col-6">
                <h3 id="title"> Registro Digital del Aprendiz</h3>
            </div>
        </div>
    </nav>
    <p class="display-4 text-center" style="color: rgb(225, 115, 35); background-color: rgb(255, 255, 255);">Resultados
        totales:  <span style="color:rgb(35, 130, 118);"><?php echo $num; ?> </span></p>
    <div class="container-fluid">
        <table class="table text-center">
            <thead style="color: #fff; background-color: rgba(35, 130, 117);">
                <tr>
                    <th scope="col">Número de ficha</th>
                    <th scope="col">Nombre del programa</th>
                    <th scope="col">Visualización</th>
                    <th scope="col">Descarga al sistema</th>
                </tr>
            </thead>
            <tbody style="background-color: rgba(128, 128, 128, 0.103);">
                <tr>
                    <td> <?php echo $list; ?> </td>
                    <td> <?php echo $name; ?> </td>
                    <td class="view"><a href="#" class="view"><img src="icons/view.png" width="25em"></a></td>
                    <td class="download"><a href="#" class="down"><img src="icons/download.png" width="25em"></a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div class="modal-footer">
    <?php
// Con este condicional, se verifica si el usuario esta en una sesión con el rol de instructor o de personal administrativo:
if ($_SESSION['rol'] == 'Instructor' || $_SESSION['rol'] == 'Personal administrativo') {
        // En caso de estar con alguno de los dos cargos anteriores, se le redireccionará al archivo 'system.php' en caso de que haga click en el siguiente enlace: 
        echo "<p><a style='color: black;' href='system.php'>Volver al inicio</a></p>";
    // Si en vez del caso anterior, el usuario está usando el sistema como administrador, se le redireccionará, en este caso, al archivo 'system_admin.php' debido a la diferencia de funcionalidades entre cargos:
    } elseif ($_SESSION['rol'] == 'Administrador') {
        echo "<p><a style='color: black;' href='system_admin.php'>Volver al inicio</a></p>";
    }
    ?>
    </div>
</body>

</html>
 <?php
} else {
    // En caso de no haber ninguna sesión iniciada, se le redireccionará al usuario al archivo 'index.php' (página inicial) para indicarle con una alerta bootstrap que debe de iniciar sesión para usar las funcionaldiades del sistema:
    header("location: index.php?failone=true");

}

?>