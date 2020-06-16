<?php

// Se inicia o reanuda una sesión en caso de que un usuario ya haya ingresado al sistema por medio del log in o inicio de sesión:
session_start();

// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include 'ACTION_conexionBD.php';

// Se comienza a verificar si la petición POST con los datos para cambiar la contraseña es correcta:
if (isset($_POST['buscar'])) {

    /* 
    @var $con
    @param string localhost | Nombre del servidor.
    @param string root | Nombre de usuario del gestor de bases de datos.
    @param string clave | Clave de usario del gestor de bases de datos.
    @param string reda | Nombre de la base de datos.  

    Se realiza la conexión al servidor local (phpMyAdmin) y a la base de datos con la función 'mysqli_connect'. Después del servidor local se coloca el nombre de usuario y seguidamente la contraseña del mismo: 
    */
    $con = mysqli_connect("localhost", "root", "", "reda");

    /*
    @var string $documento 

    Se definen una serie de variables que corresponden a los datos ingresados en los campos del formulario de registro ubicado en el archivo 'sign_up.php'. Los datos son recibidos por el método post para realizar una nueva solicitud de almacenamiento en la base de datos: 
    */
    $documento = $_POST['ap_documento'];

    /* 
    @var string $query
    @var string $row
    @var string $name1
    @var string $name2
    @var string $apellido1
    @var string $apellido2
    @var string $nombre
    @var string $ficha

    */

    /*Se hace una consulta a la base de datos para extraer de la tabla aprendiz, toda la información
    de un aprendiz cuyo documento es igual al que está almacenado en la variable $documento */
    $query = mysqli_query($con, "SELECT * FROM tbl_aprendiz WHERE documento_aprendiz = '$documento';");
    // Se guarda los resultados de la consulta en la variable $row
    $row = mysqli_fetch_array($query);
    // Se guarda el primer nombre del aprendiz extraído de la base de datos en la variable $name1
    $name1 = $row['nombre1_aprendiz'];
    // Se guarda el segundo nombre del aprendiz extraído de la base de datos en la variable $name2
    $name2 = $row['nombre2_aprendiz'];
    // Se guarda el primer apellido del aprendiz extraído de la base de datos en la variable $apellido1
    $apellido1 = $row['apellido1_aprendiz'];
    // Se guarda el segundo apellido del aprendiz extraído de la base de datos en la variable $apellido2
    $apellido2 = $row['apellido2_aprendiz'];
    // Se guarda el nombre completo del aprendiz en la variable $nombre
    $nombre = $name1 . " " . $name2 . " " . $apellido1 . " " . $apellido2;
    // Se guarda el segundo apellido del aprendiz extraído de la base de datos en la variable $apellido2
    $ficha = $row['numero_ficha'];
  
}
?>

<!DOCTYPE html>
<!-- Idioma en el que el archivo está compuesto: -->
<head lang="es">
    <!-- Título de la pestaña: -->
    <title>Búsqueda aprendiz - REDA</title>
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
    <link rel="stylesheet" href="css/list_register.css">
    <!-- Script de JavaScript para recargar la página cada 9 segundos -->
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
    <!-- Texto centrado que muestra el número de ficha  -->
    <p class="display-4 text-center course_number">Número de ficha: <?php echo $ficha; ?> </p>
    <!-- Se crea un contenedor fluido de Bootstrap que adapta su tamaño automaticamente a la resolución de la pantalla: -->
    <div class="container-fluid">
    <!-- Se usa una tabla responsive-->
        <table class="table table-hover table-responsive-l text-center">
            <thead>
                <tr>
                    <!-- Se muestran los títulos de cada columna en la tabla-->
                    <th scope="col">Nombre Aprendiz</th>
                    <th scope="col">Visualización de asistencia</th>
                </tr>
            </thead>
            <tbody>
            <!-- Se muestran toda la información de las columnas-->
                <tr><!-- Se muestra el nombre completo del aprendiz-->
                    <td> <?php echo $nombre; ?> </td>
                    <!-- Se muestra un icono-->
                    <td><a href="#" class="view"><i class="fa fa-eye fa-lg"></i></a></td>
                </tr>
            </tbody>
            <!-- Se cierra el ciclo mientras-->
        </table>

    </div>
    <div class="modal-footer">
        </div>
        <!-- En un contenedor se encuentra un botón que regresa a la parte principal del sistema -->
        <div class="container">
        <p><a href='system.php' id='go_back'>Volver al inicio</a></p>
    </div>
    <div class="footer">
    </div>

</body>

</html>