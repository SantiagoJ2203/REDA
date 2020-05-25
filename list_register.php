<?php

// Se inicia o reanuda una sesión en caso de que un usuario ya haya ingresado al sistema por medio del log in o inicio de sesión:
session_start();

// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include 'ACTION_conexionBD.php';

// Se verifica con 'isset' si alguna de las tres sesiones disponibles existe en el momento con alguno de los cargos en el sistema (instructor, personal administrativo o administrador):
if (isset($_SESSION['instructor']) || isset($_SESSION['personal']) || isset($_SESSION['administrador'])) {

    if (isset($_POST['registrar'])) {
        $ficha = $_POST['ficha'];
        $date = date("Y-m-d");

        $con = mysqli_connect("localhost", "root", "", "reda");
        $resultado = mysqli_query($con, "INSERT INTO tbl_registro_asistencia (fecha_registroA , numero_ficha) VALUES ('$date', '$ficha');");

    }
    // En caso de estar en una sesión, el siguiente código registrar la asistencia de los aprendices será ejecutado:
    ?>

<!DOCTYPE html>

<head lang="es">
    <title>Registro de asistencia - REDA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" href="icons/reda4.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/list_register.css">

    <script type="text/javascript">
    setTimeout("document.location=document.location", 9000);
    </script>
</head>

<body>
<?php
$fecha = date("Y-m-d");
    $query = mysqli_query($con, "SELECT * FROM register WHERE fecha_registroA = '$fecha';");
    $row = mysqli_fetch_array($query);
    $num = mysqli_num_rows($query);

    ?>
    <nav class="navbar navbar-expand-lg navbar-light" id="header">
        <div class="navbar-collapse reda_image">
            <img src="icons/reda2.png" alt="">
            <li class="nav-item py-4">
                <h3 id="title"> Registro Digital del Aprendiz</h3>
            </li>
        </div>
    </nav>
    <p class="display-4 text-center course_number">Número de ficha: 1828182</p>
    <div class="container-fluid">
        <table class="table table-hover table-responsive-xl text-center">
            <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Nombre Aprendiz</th>
                    <th scope="col">Hora llegada</th>
                    <th scope="col">Visualización de huella dactilar</th>
                </tr>
            </thead>
            <?php
$i = 0;
    $query = mysqli_query($con, "SELECT * FROM register WHERE fecha_registroA = '$fecha';");
    while ($i < $num) {
        $i += 1;
        $row = mysqli_fetch_array($query);
        $documento = $row['documento_aprendiz'];
        $date = $row['fecha_registroA'];
        $hora = $row['hora_registro'];
        $query1 = mysqli_query($con, "SELECT * FROM tbl_aprendiz WHERE documento_aprendiz = '$documento';");
        $row2 = mysqli_fetch_array($query1);
        $name1 = $row2['nombre1_aprendiz'];
        $name2 = $row2['nombre2_aprendiz'];
        $apellido1 = $row2['apellido1_aprendiz'];
        $apellido2 = $row2['apellido2_aprendiz'];
        $nombre = $name1 . " " . $name2 . " " . $apellido1 . " " . $apellido2;
        ?>
            <tbody>
                <tr>
                    <td> <?php echo $date; ?></td>
                    <td> <?php echo $nombre; ?> </td>
                    <td> <?php echo $hora; ?> </td>
                    <td><a href="#" class="view"><i class="fa fa-eye fa-lg"></i></a></td>
                </tr>
            </tbody>
            <?php
}
    ?>
        </table>

    </div>
    <div class="modal-footer">
        </div>
        <div class="container">
        <a href="PHPMAILER/ACTION_Correo.php"><button type="button" class="btn btn-primary btn-lg btn-block" id="txt_button">Finalizar registro</button></a>
    </div>
    <div class="footer">
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