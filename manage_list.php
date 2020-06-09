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
    <!-- Idioma en el que el archivo está compuesto: -->
<head lang="es">
    <!-- Título de la pestaña: -->
    <title>Gestión de listados - REDA</title>
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
    <link rel="stylesheet" href="css/manage_list.css">
</head>

<body>
<?php

/*
@var string $con
@var array $query
@var integer $num
*/
    // Se hace conexión a la base de datos
    $con = mysqli_connect("localhost", "root", "", "reda");
    // Se guarda los resultados de la consulta en la variable $query
    $query = mysqli_query($con, "SELECT * FROM tbl_ficha;");
    // Se guarda el número de resultados de la consulta en la variable $num
    $num = mysqli_num_rows($query);

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
    <!-- Texto centrado que muestra el número de ficha  -->
    <p class="display-4 text-center first_line">Gestión de
        <span class="second_line">listados</span></p>
        <!-- Se crea un contenedor fluido de Bootstrap que adapta su tamaño automaticamente a la resolución de la pantalla: -->
    <div class="container-fluid">
    <!-- Se muestra un título que contiene la variable $num-->
        <h2 class="font-weight-bold">Número de listados totales: <?php echo $num; ?> </h2>
        <!-- Se usa una tabla responsive-->
        <div class="table-responsive-xl">
            <table class="table text-center table-hover">
                <thead>
                <!-- Se muestran los títulos de cada columna en la tabla-->
                    <tr>
                        <th scope="col">Número</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descargar a la computadora</th>
                        <th scope="col">Registrar asistencia</th>
                    </tr>
                </thead>
                <?php
/*
@var string $con
@var array $query
@var array $row
@var string $list
@var string $name
@var integer $num
@var integer $i
*/

// Se inicializa la variable $i
$i = 0;
// Consulta a la base de datos que trae la información relacionada con la ficha
    $query = mysqli_query($con, "SELECT * FROM tbl_ficha;");
    // Mientras el número almacenado en la variable $i sea menor al número de la variable $num, realice el siguiente bloque de código
    while ($i < $num) {
        // Se guarda los resultados de la consulta en la variable $row
        $row = mysqli_fetch_array($query);
        // Se guarda el número de ficha extraído de la base de datos en la variable $list 
        $list = $row['numero_ficha'];
        // Se guarda el nombre de la ficha extraído de la base de datos en la variable $name
        $name = $row['nombre_ficha'];
        ?>
                <tbody>
                <!-- Se muestran toda la información de las columnas-->
                    <tr>
                        <!-- se muestra el número de la ficha -->
                        <th scope="row"> <?php echo $list; ?> </th>
                        <!-- se muestra el nombre de la ficha -->
                        <th> <?php echo $name; ?>  </th>
                        <!-- se muestra un icono de descarga -->
                        <td><a href="#" class="download"><i class="fas fa-download fa-lg"></i></a></td>
                        <!-- se muestra un icono de registro -->
                        <td><a href="#" class="check"><i class='fas fa-user-check fa-lg'></i></a></td>

                        </td>
                    </tr>
                </tbody>
                <!-- Se incrementa la variable $i y Se cierra el ciclo mientras-->
                <?php $i += 1;}?>
            </table>
        </div>
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