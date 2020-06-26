<?php

// Se inicia o reanuda una sesión en caso de que un usuario ya haya ingresado al sistema por medio del log in o inicio de sesión:
session_start();

// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include 'ACTION_conexionBD.php';

// Se verifica con 'isset' si alguna de las tres sesiones disponibles existe en el momento con alguno de los cargos en el sistema (instructor, personal administrativo o administrador):
if (isset($_SESSION['instructor']) || isset($_SESSION['personal']) || isset($_SESSION['administrador'])) {
    // En caso de estar en una sesión, el siguiente código para visualizar los reportes será ejecutado:
    ?>
<!-- Se define el lenguaje en el que estará este archivo: -->
<!DOCTYPE html>
<html>
<head lang="es">
 <!-- Se elimina un error de favicon -->
   <link rel="shortcut icon" href="#">
   <!-- Se usa la definición de caracteres 'UTF-8' para evitar errores en el texto a la hora de ser mostrado: -->
     <meta charset="utf-8">
     <!-- Se hace uso de la etiqueta 'meta viewport' para adaptar todo el contenido de la página a las pantallas de los dispositivos móviles: -->
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <!-- Hoja de estilos de bootstrap: -->
    <link rel="stylesheet" href="Bootstrap_4/css/bootstrap.min.css" >
    <!-- El título de la pestaña es agregado: -->
     <title>Reportes - REDA</title>
     <!-- El icono de la pestaña es agregado: -->
    <link rel="icon" href="icons/reda4.png">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <!-- El archivo CSS para agregar los estilos definidos por Bootstrap es añadido: -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <!-- El archivo CSS que añade los estilos al archivo es agregado: -->
    <link rel="stylesheet" type="text/css" href="css/reports.css">
</head>
<!--Aca se abre la etiqueta para empezar a agregarle elementos al cuerpo del html-->
<body>
 <!-- Se crea una barra de navegación-->
        <nav class="navbar navbar-expand-lg navbar-light" id="header">
        <!-- Se usa la clase 'navbar-collapse' para beneficiar el comportamiento de la barra de navegación al mostrarse en dispositivos con diferentes resoluciones de pantalla: -->
                <div class="navbar-collapse reda_image">
                    <img src="icons/reda2.png" alt="">
                    <li class="nav-item py-4">
                        <h3 id="title"> Registro Digital del Aprendiz</h3>
                    </li>
                     <!-- Se termina la estructura donde se beneficia el comportamiento de la barra de navegación-->
                </div>
                 <!-- Se termina la estructura de la barra de navegación-->
            </nav>
<!-- Se añade el título principal para ser mostrado en pantalla. 'Display-4' específica 
el tamaño del texto y el texto tambien se ecuentra centrado,  -->
    <p class="display-4 text-center first_line">Reportes de <span class="second_line">asistencia</span></p>
    <!-- Se crea una fila que estara dividida por las siguientes columnas-->
    <div class="row">
    <!--Se pone un col-xl-6 para organizar los espacios entre los elementos, se tienen que repartir hasta que sumen 12.
     Ya en esta parte se suma 6 -->
        <div class="col-xl-6 text-center" id="selectr">
            <h2>Formato</h2>
            <!-- Se crea el campo de selección para que el usuario seleccione el formato en el que quiere ver los reportes -->
            <select class="select">
            <!-- Opción de ver la asistencia por dia: -->
                <option>Día</option>
                <!-- Opción de ver la asistencia por semana: -->
                <option>Semana</option>
                <!-- Opción de ver la asistencia por mes: -->
                <option>Mes</option>
            </select>
            <!--Se termina la estructura de donde se dividen las columnas -->
        </div>
        <!--Se pone un col-xl-6 para organizar los espacios entre los elementos, se tienen que repartir hasta que sumen 12.
     Ya en esta parte se suma 12 -->
        <div class="col-xl-6 text-center" id="selectr">
            <h2>Ficha</h2>
            <!-- Se crea el campo de selección para que el usuario seleccione la ficha de la que quiere ver los reportes -->
            <select class="select">
             <!-- Opción para seleccionar la ficha: -->
                <option>1568975</option>
                <option>1475307</option>
                <option>1828182</option>
            </select>
 <!--Se termina la estructura de donde se dividen las columnas -->
        </div>
         <!-- Se termina la estructura de la fila -->
</div>
 <!--Se pone un col-xl-12 para organizar los espacios entre los elementos, en este caso solo hay un elemento -->
        <div class="col-xl-12 text-center">
        <h2>Vista de reportes</h2>
<!--Se crea un boton para que se muestren los reportes por medio de unas columnas -->
        <div class="btn-group" role="group" aria-label="">
            <button id="btnColumnas" type="button" class="btn btn-primary">Columnas</button>
           <!--Se termina la estructura del boton -->
        </div>
        <!--Se termina la estructura de donde esta la columna del boton -->
    </div>
     <!--En este container se muestran los gráficos-->
    <div id="contenedor"></div>
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

     <!-- jQuery, Popper.js, Bootstrap JS -->
        <script src="JQuery/jquery-3.3.1.min.js"></script>
        <script src="popper/popper.min.js"></script>
        <script src="Bootstrap_4/js/bootstrap.min.js"></script>     
         <!-- Highcharts JS -->              
        <script src="pluggins/Highcharts_7.0.3/code/highcharts.js"></script>
        <script src="pluggins/Highcharts_7.0.3/code/modules/exporting.js"></script>
        <script src="pluggins/Highcharts_7.0.3/code/modules/export-data.js"></script>        
        
        <script src="pluggins/Highcharts_7.0.3/code/modules/drilldown.js"></script>
        <script src="reportsJS.js"></script>

</body>
</html>
<?php
} else {
    // En caso de no haber ninguna sesión iniciada, se le redireccionará al usuario al archivo 'index.php' (página inicial) para indicarle con una alerta bootstrap que debe de iniciar sesión para usar las funcionaldiades del sistema:
    header("location: index.php?failone=true");

}
?>