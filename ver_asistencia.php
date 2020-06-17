<?php

// Se inicia o reanuda una sesión en caso de que un usuario ya haya ingresado al sistema por medio del log in o inicio de sesión:
session_start();

// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include 'ACTION_conexionBD.php';

// Se verifica con 'isset' si alguna de las tres sesiones disponibles existe en el momento con alguno de los cargos en el sistema (instructor, personal administrativo o administrador):
if (isset($_SESSION['instructor']) || isset($_SESSION['personal']) || isset($_SESSION['administrador'])) {

?>

<!DOCTYPE html>
<!-- Idioma en el que el archivo está compuesto: -->
<head lang="es">
    <!-- Título de la pestaña: -->
    <title>Ver asistencia - REDA</title>
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
<?php

// Si el botón ver del formulario en asistencia.php fue presionado, se ejecuta el siguiente código
if (isset($_POST['ver'])) {
    // Se almacena en la variable $fecha la fecha que se ingresó en el formulario de asistencia.php
    $fecha = $_POST['fecha'];
    // Se almacena en la variable $ficha la ficha que se ingresó en el formulario de asistencia.php
    $ficha = $_POST['ficha'];

/* 
@var date $fecha
@var array $query
@var integer $num

*/

// Se guarda la fecha actual en la variable $fecha

/*Consulta a la base de datos que trae la información relacionada con los registros de la tabla register
    que corresponden a la fecha almacenada la variable $fichanombre */
 $query = mysqli_query($con, "SELECT * FROM register WHERE fecha_registroA = '$fecha';");
    // Se guarda los resultados de la consulta en la variable $row
    $row = mysqli_fetch_array($query);
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
    <p class="display-4 text-center course_number">Número de ficha: <?php echo $ficha;?></p>
    <!-- Se crea un contenedor fluido de Bootstrap que adapta su tamaño automaticamente a la resolución de la pantalla: -->
    <div class="container-fluid">
    <!-- Se usa una tabla responsive-->
        <table class="table table-hover table-responsive-xl text-center">
            <thead>
                <tr>
                    <!-- Se muestran los títulos de cada columna en la tabla-->
                    <th scope="col">Fecha</th>
                    <th scope="col">Nombre Aprendiz</th>
                    <th scope="col">Hora llegada</th>
                </tr>
            </thead>
            <?php
/* 
@ var integer $i
@ var string $row
@ var string $documento
@ var string $date
@ var string $hora
@ var array $query1
@ var array $row2
@ var string $name1 
@ var string $name2
@ var string $apellido1 
@ var string $apellido2
@ var string $nombre 

*/
// Se inicializa la variable $i en cero.
$i = 0;
    /*Consulta a la base de datos que trae la información relacionada con los registros de la tabla register
    que corresponden a la fecha almacenada la variable $fichanombre */
    $query = mysqli_query($con, "SELECT * FROM register WHERE fecha_registroA = '$fecha';");
    //Mientras el número que tiene la variable $i sea menor al número contenido en la variable $num s ejecuta el siguiente bloque de código
    while ($i < $num) {
        // Se incrementa la variable $i
        $i += 1;
        // Se guarda los resultados de la consulta en la variable arrow
        $row = mysqli_fetch_array($query);
        // Se guarda el documento del aprendiz extraído de la base de datos en la variable $documento
        $documento = $row['documento_aprendiz'];
        // Se guarda la fecha del registro que está en la base de datos en la variable $date
        $date = $row['fecha_registroA'];
        // Se guarda la hora del registro qué está en la base de datos en la variable $hora
        $hora = $row['hora_registro'];
        
        /*Consulta a la base de datos que trae la información relacionada con el aprendiz de la tabla tbl_aprendiz
        que corresponde al documento guardado en la variable $documento */
        $query1 = mysqli_query($con, "SELECT * FROM tbl_aprendiz WHERE documento_aprendiz = '$documento';");
        // Se guarda los resultados de la consulta en la variable $row2
        $row2 = mysqli_fetch_array($query1);
        // Se guarda el primer nombre del aprendiz extraído de la base de datos en la variable $name1
        $name1 = $row2['nombre1_aprendiz'];
        // Se guarda el segundo nombre del aprendiz extraído de la base de datos en la variable $name2
        $name2 = $row2['nombre2_aprendiz'];
        // Se guarda el primer apellido del aprendiz extraído de la base de datos en la variable $apellido1
        $apellido1 = $row2['apellido1_aprendiz'];
        // Se guarda el segundo apellido del aprendiz extraído de la base de datos en la variable $apellido2
        $apellido2 = $row2['apellido2_aprendiz'];
        // Se guarda el nombre completo del aprendiz en la variable $nombre
        $nombre = $name1 . " " . $name2 . " " . $apellido1 . " " . $apellido2;
        ?>
            <tbody>
            <!-- Se muestran toda la información de las columnas-->
                <tr><!-- se muestra la fecha-->
                    <td> <?php echo $date; ?></td>
                    <!-- Se muestra el nombre completo del aprendiz-->
                    <td> <?php echo $nombre; ?> </td>
                    <!-- Se muestra la hora del registro-->
                    <td> <?php echo $hora; ?> </td>
                </tr>
            </tbody>
            
            <!-- Se cierra el ciclo mientras-->
            <?php

}

?>

        </table>
    </div>

<!-- Se crea un contenedor fluido de Bootstrap que adapta su tamaño automaticamente a la resolución de la pantalla: -->
<div class="container-fluid">
    <!-- Se usa una tabla responsive-->
        <table class="table table-hover table-responsive-xl text-center">
            <tbody>
    <?php

// Se hace una consulta a la base de datos que evalúa los aprendices que se encuentran en la tabla aprendiz pero que cuyo documento en la tabla register es nulo.
$resultado = mysqli_query($con, "SELECT * FROM tbl_aprendiz a LEFT JOIN register r ON a.documento_aprendiz = r.documento_aprendiz WHERE r.documento_aprendiz IS NULL;");
// Se cuentan el número de resultados obtenidos de la consulta y se almacena en la variable $num
$num = mysqli_num_rows($resultado); 
// Se inicializa la variable $x 
$x = 0;
// // Se hace una consulta a la base de datos que evalúa los aprendices que se encuentran en la tabla aprendiz pero que cuyo documento en la tabla register es nulo.
$resultado = mysqli_query($con, "SELECT * FROM tbl_aprendiz a LEFT JOIN register r ON a.documento_aprendiz = r.documento_aprendiz WHERE r.documento_aprendiz IS NULL;");
// Mientras la variable $x sea menor a el número en la variable $num se ejecuta el siguiente código
while ($x < $num) {
    // Se incrementa la variable $x
    $x += 1;
    // Se guardan los resultados de la consulta en la variable $row
    $row = mysqli_fetch_array($resultado);
    // Se guarda el segundo nombre del aprendiz extraído de la base de datos en la variable $nombre1
    $nombre1 = $row['nombre1_aprendiz'];
    // Se guarda el segundo nombre del aprendiz extraído de la base de datos en la variable $nombre2
    $nombre2 = $row['nombre2_aprendiz'];
    // Se guarda el primer apellido del aprendiz extraído de la base de datos en la variable $apellido1
    $apellido1 = $row['apellido1_aprendiz']; 
    // Se guarda el segundo apellido del aprendiz extraído de la base de datos en la variable $apellido2
    $apellido2 = $row['apellido2_aprendiz']; 
    // Se guarda el nombre completo del aprendiz en la variable $nombre
    $name = $nombre1 . " " . $nombre2 . " " . $apellido1 . " " . $apellido2;
    ?>
    
            <!-- Se muestran toda la información de las columnas-->
                <tr>
                <!-- Se muestra la fecha-->
                    <td> <?php echo $fecha ?> </td>
                    <!-- Se muestra el nombre completo del aprendiz-->
                    <td> <?php echo $name; ?> </td>
                     <!-- Se muestra un mensaje-->
                    <td> No asistió </td>
                </tr>
            </tbody>
            <!-- Se cierra el ciclo mientras-->
            <?php

}
?>
        </table>
    </div>
    <div class="footer">
    <?php
}
// Con este condicional, se verifica si el usuario esta en una sesión con el rol de instructor o de personal administrativo:
if ($_SESSION['rol'] == 'Instructor' || $_SESSION['rol'] == 'Personal administrativo') {
        // En caso de estar con alguno de los dos cargos anteriores, se le redireccionará al archivo 'system.php' en caso de que haga click en el siguiente enlace: 
        echo "<p><a href='system.php' id='go_back'>Volver al inicio</a></p><br />";
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