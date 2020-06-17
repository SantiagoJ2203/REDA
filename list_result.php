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
    <!-- Idioma en el que el archivo está compuesto: -->
<head lang="es">
    <!-- Título de la pestaña: -->
    <title>Registro de asistencia - REDA</title>
    <!-- Codifiación de caracteres 'UTF-8' para evitar errores de escritura al mostrar el texto en la pantalla: --> 
    <meta charset="utf-8">
    <!-- Uso de la etique meta viewport para mostrar los elementos de manera responsive u ordenada dependiendo del tamaño de la pantalla del dispositivo: -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Archivo bootstrap para agregar los estilos css del framework: -->
    <!-- Icono de la pestaña: -->
    <link rel="icon" href="icons/reda4.png">
    <!-- Se colocan los 3 scripts que permiten que el framework Bootstrap en su versión 4.0 funcione correctamente con este documento. Desde sus estilos hasta las acciones o eventos realizados con funciones de JavaScript: -->
    <link rel="stylesheet" href="css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Archivo CSS (hoja de estilos) de la vista en cuestión: -->
    <link rel="stylesheet" href="css/list_result.css">
</head>

<body>
<?php

error_reporting(E_ALL & ~E_NOTICE);

/*
Se verifica si el botón 'buscar' en el módulo system.php o system_admin.php fue presionado.

@var string $fichanombre
@var string $con
@var array $row
@var string $list
@var string $name
@var integer $num

*/
    if (isset($_POST['buscar'])) {

        // Se guarda el numero de la ficha en la variable $fichanombre
        $fichanombre = $_POST['fichanombre'];
        // Conexión a la base de datos
        $con = mysqli_connect("localhost", "root", "", "reda");
        // Consulta a la base de datos que trae la información relacionada con la ficha que corresponde al número guardado en la variable $fichanombre
        $query = mysqli_query($con, "SELECT * FROM tbl_ficha WHERE numero_ficha = '$fichanombre';");
        // Se guarda los resultados de la consulta en la variable arrow
        $row = mysqli_fetch_array($query);
        // Se guarda el número de ficha extraído de la base de datos en la variable $list 
        $list = $row['numero_ficha'];
        // Se guarda el nombre de ficha extraído de la base de datos en la variable $name
        $name = $row['nombre_ficha'];
        // Se guarda el número de resultados de la consulta en la variable $num 
        $num = mysqli_num_rows($query);

    }

    ?>
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
    <p class="display-4 text-center first_line">Resultados totales: <span class="second_line"><?php echo $num; ?> </span></p>
    <!-- Se crea un contenedor fluido de Bootstrap que adapta su tamaño automaticamente a la resolución de la pantalla: -->
    <div class="container-fluid">
    <!-- Se usa una tabla responsive-->
        <table class="table table-hover table-responsive-xl text-center">
            <thead>
                <tr>
                <!-- Se Los títulos de cada columna en la tabla-->
                    <th scope="col">Número de ficha</th>
                    <th scope="col">Nombre del programa</th>
                    <th scope="col">Visualización</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <!-- Se muestra la información de cada columna traída con las variables $list y $name -->
                    <td> <?php echo $list; ?> </td>
                    <td> <?php echo $name; ?> </td>
                    <td><a href="asistencia.php" class="view"><i class="fa fa-eye fa-lg"></i></a></td>
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