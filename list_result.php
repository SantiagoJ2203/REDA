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
    <link rel="stylesheet" href="css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" href="icons/reda4.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/ddefb55be1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/list_result.css">
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
    <nav class="navbar navbar-expand-lg navbar-light" id="header">
        <div class="navbar-collapse reda_image">
            <img src="icons/reda2.png" alt="">
            <li class="nav-item py-4">
                <h3 id="title"> Registro Digital del Aprendiz</h3>
            </li>
        </div>
    </nav>
    <p class="display-4 text-center first_line">Resultados totales: <span class="second_line"><?php echo $num; ?> </span></p>
    <div class="container-fluid">
        <table class="table table-hover table-responsive-xl text-center">
            <thead>
                <tr>
                    <th scope="col">Número de ficha</th>
                    <th scope="col">Nombre del programa</th>
                    <th scope="col">Visualización</th>
                    <th scope="col">Descarga al sistema</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <?php echo $list; ?> </td>
                    <td> <?php echo $name; ?> </td>
                    <td><a href="#" class="view"><i class="fa fa-eye fa-lg"></i></a></td>
                    <td><a href="#" class="down"><i class="fas fa-download fa-lg"></i></a></td>
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
        echo "<p><a href='system.php' id='go_back'>Volver al inicio</a></p>";
    // Si en vez del caso anterior, el usuario está usando el sistema como administrador, se le redireccionará, en este caso, al archivo 'system_admin.php' debido a la diferencia de funcionalidades entre cargos:
    } elseif ($_SESSION['rol'] == 'Administrador') {
        echo "<p><a href='system_admin.php' id='go_back'>Volver al inicio</a></p>";
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