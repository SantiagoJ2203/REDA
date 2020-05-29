<?php

// Se inicia o reanuda una sesión en caso de que un usuario ya haya ingresado al sistema por medio del log in o inicio de sesión:
session_start();

// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include 'ACTION_conexionBD.php';

// Se verifica con 'isset' si alguna de las tres sesiones disponibles existe en el momento con alguno de los cargos en el sistema (instructor, personal administrativo o administrador):
if (isset($_SESSION['instructor']) || isset($_SESSION['personal']) || isset($_SESSION['administrador'])) {
    // En caso de estar en una sesión, el siguiente código para visualizar los reportes será ejecutado:
    ?>

<!DOCTYPE html>
<html>
<head lang="es">

   <link rel="shortcut icon" href="#">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="Bootstrap_4/css/bootstrap.min.css" >
     <title>Reportes - REDA</title>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/reports.css">
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
    <p class="display-4 text-center first_line">Reportes de <span class="second_line">asistencia</span></p>
    <div class="row">
        <div class="col-xl-6 text-center" id="selectr">
            <h2>Formato</h2>
            <select class="select">
                <option>Día</option>
                <option>Semana</option>
                <option>Mes</option>
            </select>
        </div>
        <div class="col-xl-6 text-center" id="selectr">
            <h2>Ficha</h2>
            <select class="select">
                <option>1568975</option>
                <option>1475307</option>
                <option>1828182</option>
            </select>
        </div>
</div>
        <div class="col-xl-12 text-center">
        <h2>Vista de reportes</h2>
        <div class="btn-group" role="group" aria-label="">
            <button id="btnColumnas" type="button" class="btn btn-secondary">Columnas</button>
            <button id="btnLineas" type="button" class="btn btn-primary">Líneas</button>            
            <button id="btnTorta" type="button" class="btn btn-dark">Torta</button>
            <button id="btnPrueba" type="button" class="btn btn-danger">Gráfico de Prueba</button>            
            <button id="btnBD" type="button" class="btn btn-info">Gráficos desde BD</button>
        </div>
    </div>
    <div id="contenedor"></div>
    <br>

     <!--En este container se muestran los gráficos-->
     <!-- <div id="contenedor"></div> -->
              
              <!--Modal para gráficos-->    
              <div id="modal-1" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg">
              <div class="modal-content">
                   <div class="modal-header">
                          <h5 class="modal-title"></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                          </button>
                      </div>        
                      <div class="modal-body"> 
                          <!--En este container se muestran los gráficos-->
                          <!-- <div id="contenedor-modal"></div> -->
                      </div>                    
              </div>
              </div>
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