<?php

// Se inicia o reanuda una sesión en caso de que un usuario ya haya ingresado al sistema por medio del log in o inicio de sesión:
session_start();

// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include 'ACTION_conexionBD.php';

// Se verifica con 'isset' si alguna de las tres sesiones disponibles existe en el momento con alguno de los cargos en el sistema (instructor, personal administrativo o administrador):
if (isset($_SESSION['instructor']) || isset($_SESSION['personal']) || isset($_SESSION['administrador'])) {

    // En caso de estar en una sesión, el siguiente código para gestionar los listados de asistencia será ejecutado:
    ?>


<!DOCTYPE html>

<head lang="es">
    <!-- Título de la pestaña: -->
    <title>Eliminar ficha - REDA</title>
    <!-- Codifiación de caracteres 'UTF-8' para evitar errores de escritura al mostrar el texto en la pantalla: --> 
    <meta charset="utf-8">
    <!-- Uso de la etique meta viewport para mostrar los elementos de manera responsive u ordenada dependiendo del tamaño de la pantalla del dispositivo: -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Se colocan los 3 scripts que permiten que el framework Bootstrap en su versión 4.0 funcione correctamente con este documento. Desde sus estilos hasta las acciones o eventos realizados con funciones de JavaScript: -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <!-- Se colocan unos links del Framework Boostrap que contienen estilos predeterminados -->
    <link rel="stylesheet" href="css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Archivo CSS (hoja de estilos) de la vista en cuestión: -->
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <!-- Icono de la pestaña: -->
    <link rel="icon" href="icons/reda4.png">
    <!-- Kit de Font Awesome para utilizar sus iconos: -->
    <script src="https://kit.fontawesome.com/ddefb55be1.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Se crea una barra de navegación que ocupa todo el ancho del contenedor: -->
    <nav class="navbar navbar-expand-lg navbar-light" id="header">
        <!-- Se usa la clase 'navbar-collapse' para beneficiar el comportamiento de la barra de navegación al mostrarse en dispositivos con diferentes resoluciones de pantalla: -->
        <div class="navbar-collapse reda_image">
            <!-- Se asigna, en este caso, el logo del sistema REDA como elemento principal de la barra de navegación: -->
            <img src="icons/reda2.png" alt="">
            <!-- Se muestra un texto con el nombre del sistema en cuestión, este texto cuenta con un espaciamiento interno al usar la utilidad espaciadora de Bootstrap 'py':  -->
            <li class="nav-item py-4">
                <h3 id="title"> Registro Digital del Aprendiz</h3>
            </li>
        </div>
    </nav>
    <!-- Se usa el elemento p para mostrar el título del módulo-->
    <p class="display-4 text-center first_line">Eliminar
        <!-- Se emplea un span para darle un color de letra diferente a la parte final del título-->
        <span class="second_line">usuario</span>
    </p>

    <!-- Se crea un tipo de formulario -->
    <form action="ACTION_eliminar_usuarios.php" method="POST">
    <!-- Se crea un contenedor fluido de Bootstrap que adapta su tamaño automaticamente a la resolución de la pantalla: --> 
    <div class="container-fluid justify-content-around col-2">
    <!-- Se indica, con una clase Bootstrap, que el elemento a añadir hace para de un formulario: -->
    <div class="form-group">
                            <!-- Se crea el input o campo en el que se digitará el número de documento del usuario. El mismo cuenta con el tipo de dato respectivo, el nombre del campo y dos últimos atributos que permiten mostrar un tooltip, o caja con texto, que muestra información de interés al usuario: -->
                            <input type="text" name="documento" class="form-control" id="documento" aria-describedby="emailHelp" placeholder="Número de documento *" tool-tip-toggle="tooltip-required" data-original-title="Este campo es obligatorio">
                            <!-- Se añade una etiqueta '<div>' con un identificador dentro, este permite mostrar las alertas que vienen desde el archivo 'validacion_registro.js' y que son referentes a las validaciones del campo de número de documento: -->
                            <div id="alerta3"></div>
                        </div>

                        <!-- Se indica, con una clase Bootstrap, que el elemento a añadir hace para de un formulario: -->
                        <div class="form-group">
                            <!-- Se crea un 'badge' o insignia de Bootstrap, la cual muestra un título dentro de un contenedor pequeño: -->
                            <span id="perfil" class="badge font-weight-bold">Cargo *</span>
                            <!-- Se añade una etiqueta '<select>', la misma contiene las opciones para escoger el cargo que poseerá el nuevo usuario, así como una caja con texto informativa que es diferente a las demás ya mencionadas: -->
                            <select name="cargo" class="form-control" tool-tip-toggle="tooltip-required" data-original-title="Escoja el cargo de acuerdo a la funcionalidad del usuario">
                                <!-- Cargos disponibles en el formulario: -->
                                <option>Instructor</option>
                                <option>Personal administrativo</option>
                                <option>Administrador</option>
                            </select>
                        </div>
    <!-- A continuación, se usa un container que tiene un botón el cual inicia el registro direccionando a list_register.php -->
    <div class="container">
        <button type="submit" name="eliminar" class="btn btn-danger btn-lg " id="txt_button">Eliminar</button>
    </div>
    </div>
    </form>
    <!-- Fin del formulario-->
    <br>
    <div class="modal-footer">
    <p><a href='system_admin.php' id='go_back'>Volver al inicio</a></p>

    </div>
</body>

</html>
<?php
} else {
    // En caso de no haber ninguna sesión iniciada, se le redireccionará al usuario al archivo 'index.php' (página inicial) para indicarle con una alerta bootstrap que debe de iniciar sesión para usar las funcionaldiades del sistema:
    header("location: index.php?failone=true");

}


?>