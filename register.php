<?php

// Se inicia o reanuda una sesión en caso de que un usuario ya haya ingresado al sistema por medio del log in o inicio de sesión:
session_start();

// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include 'ACTION_conexionBD.php';

// Se verifica con 'isset' si alguna de las tres sesiones disponibles existe en el momento con alguno de los cargos en el sistema (instructor, personal administrativo o administrador):
if (isset($_SESSION['instructor']) || isset($_SESSION['personal']) || isset($_SESSION['administrador'])) {
    // En caso de estar en una sesión, el siguiente código para configurar el registro de la asistencia de los aprendices será ejecutado:
    ?>

<!DOCTYPE html>

<head lang="es">
    <title>Registrar asistencia - REDA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link rel="icon" href="icons/reda4.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/ddefb55be1.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" id="header">
        <div class="navbar-collapse reda_image">
            <img src="icons/reda2.png" alt="">
            <li class="nav-item py-4">
                <h3 id="title"> Registro Digital del Aprendiz</h3>
            </li>
        </div>
    </nav>
    <p class="display-4 text-center first_line">Registrar
        asistencia de <span class="second_line">los aprendices</span></p>
        <form action="list_register.php" method="POST">
    <div class="container-fluid justify-content-around">
        <div class="card-group text-center">
            <div class="card">
                <div class="course">
                    <i class='fas fa-users'></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center font-weight-bold">Seleccionar ficha</h5>
                    <select name=ficha>
                        <option>1828182</option>
                        <option>1254868</option>
                        <option>1985428</option>
                    </select>
                </div>
            </div>
            <div class="card">
                <div class="date"> 
                    <i class="far fa-calendar-alt"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center font-weight-bold">Fecha actual</h5>
                    <input type="date" class="form-control text-center" id="current_pass" required>
                </div>
            </div>
            <div class="card">
                <div class="clock_ini">
                    <i class="far fa-clock"></i>
                </div> 
                <div class="card-body">
                    <h5 class="card-title text-center font-weight-bold">Hora de inicio</h5>
                    <input type="time" class="form-control text-center" id="current_pass" required>
                </div>
            </div>
            <div class="card">
                <div class="clock_fin"> 
                    <i class="fas fa-clock"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center font-weight-bold">Hora de finalización</h5>
                    <input type="time" class="form-control text-center" id="current_pass" required>
                </div>
            </div>
            <div class="card">
                <div class="verify">
                    <i class="far fa-check-circle"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center font-weight-bold">Verificar funcionamiento del huellero</h5>
                    <button type="buttons" class="btn btn-primary btn-block" id="txt_button">
                        <h5 class="text-light font-weight-bold">Verificar</h5>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <button type="submit" name="registrar" class="btn btn-primary btn-lg btn-block" id="txt_button">Comenzar registro</button>
    </div>
    </form>
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