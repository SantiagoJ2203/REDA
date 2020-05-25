<?php

// Se inicia o reanuda una sesión en caso de que un usuario ya haya ingresado al sistema por medio del log in o inicio de sesión:
session_start();

// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include 'ACTION_conexionBD.php';

// Se verifica con 'isset' si la sesión con el cargo de administrador existe o está siendo utilizada en el sistema:
if (isset($_SESSION['administrador'])) {

    ?>

<!Doctype html>
<html>

<head lang="es">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REDA - SISTEMA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="icons/reda4.png">
    <script src="https://kit.fontawesome.com/ddefb55be1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/system_admin.css">
</head>

<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<div class="container-fluid" id="header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active reda_image">
                                <img src="icons/reda2.png" alt="">
                            </li>
                            <li class="nav-item py-4">
                                <h3 id="title"> Registro Digital del Aprendiz
                                </h3>
                            </li>
                        </ul>
                        <h2 class="welcome">Bienvenido, <?php echo $_SESSION['nombre_administrador']; ?> </h2>
                   </div>
                </nav>
            </div>

            <nav class="navbar navbar-expand-md navbar-light d-flex justify-content-center" id="header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
            <div class="container-fluid container_options">
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-outline" data-toggle="modal" data-target="#modal_add_delete"  id="button_nav">
                            Agregar/eliminar fichas
                        </button>
                    </div>
                    <div class="col">
                        <a href="sign_up.php">
                            <button type="button" class="btn btn-outline" data-toggle="modal" data-target="#backup"  id="button_nav">
                                Agregar un nuevo usuario
                            </button>
                        </a>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-outline" data-toggle="modal" data-target="#c_pass"  id="button_nav">
                            Cambiar contraseña
                        </button>
                    </div>
                    <div class="col">
                        <a href="ACTION_cerrar_sesion.php">
                            <button type="button" class="btn btn-outline" id="button_nav">
                                Cerrar sesión
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal_add_delete" tabindex="-1" role="dialog" aria-labelledby="modal_add_delete" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h1 class="modal-title font-weight-bold">Agregar/Eliminar fichas</h1>
                            <div class="table-responsive-xl">
                                <table class="table table-hover text-center">
                                    <thead style="color: #fff; background-color: rgb(35, 130, 117);">
                                        <tr>
                                            <th scope="col">Fecha de inicio</th>
                                            <th scope="col">Fecha de fin</th>
                                            <th scope="col">Número</th>
                                            <th scope="col">Programa</th>
                                            <th scope="col">Gestor</th>
                                            <th scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody style="background-color: rgba(128, 128, 128, 0.103);">
                                        <tr>
                                            <th scope="row">12/12/2018</th>
                                            <th>12/12/2020</th>
                                            <th>1828182</th>
                                            <th>Análisis y desarrollo de sistemas de información</th>
                                            <th>Lee Jared Escobar</th>
                                            <td><a href="#" class="delete_icon"><i class='far fa-trash-alt'></i></a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">12/12/2018</th>
                                            <th>12/12/2020</th>
                                            <th>1828182</th>
                                            <th>Análisis y desarrollo de sistemas de información</th>
                                            <th>Lee Jared Escobar</th>
                                            <td><a href="#" class="delete_icon"><i class='far fa-trash-alt'></i></a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">12/12/2018</th>
                                            <th>12/12/2020</th>
                                            <th>1828182</th>
                                            <th>Análisis y desarrollo de sistemas de información</th>
                                            <th>Lee Jared Escobar</th>
                                            <td><a href="#" class="delete_icon"><i class='far fa-trash-alt'></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="txt_button">Agregar nueva ficha</button>
                    </div>
                </div>
            </div>

            <!-- VENTANA MODAL COPIAS DE SEGURIDAD -->
            <!-- <div class="modal fade" id="backup" tabindex="-1" role="dialog" aria-labelledby="backup" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" id="modal_backup">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h1 class="modal-title font-weight-bold d-flex justify-content-center">
                                Copias de seguridad
                            </h1>
                            <span>Frecuencia de creación automática de copias:</span>
                            <select class="select_frequency">
                                <option>Cada día</option>
                                <option>Cada semana</option>
                                <option>Cada mes</option>
                                <option>Nunca</option>
                            </select>
                            <div class="table-responsive-xl">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fecha de creación</th>
                                            <th scope="col">Número de fichas en el sistema</th>
                                            <th scope="col">Tamaño de la copia</th>
                                            <th scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">07/05/2019</th>
                                            <td>7</td>
                                            <td>304 KB</td>
                                                <td><a href="#" class="delete_icon"><i class='far fa-trash-alt'></i></a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">13/07/2019</th>
                                            <td>3</td>
                                            <td>1.01 MB</td>
                                            <td><a href="#" class="delete_icon"><i class='far fa-trash-alt'></i></a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">06/08/2019</th>
                                            <td>5</td>
                                            <td>980 KB</td>
                                            <td><a href="#" class="delete_icon"><i class='far fa-trash-alt'></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <button type="button" class="btn btn-primary" id="txt_button">
                            Crear nueva copia de seguridad
                        </button>
                    </div>
                </div>
            </div> -->

            <!-- VENTANA MODAL AJUSTES DE REGISTRO -->
            <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <p id="font" class="display-4 font-weight-bold">Ajustes de registro</p>
                            <div class="form-group">
                                <h4 class="text-light font-weight-bold">Hora de inicio predeterminada:</h4>
                                <input type="time" class="form-control text-center" id="current_pass" required>
                            </div>
                            <div class="form-group">
                                <h4 class="text-light font-weight-bold">Hora de finalización predeterminada:
                                </h4>
                                <input type="time" class="form-control text-center" id="current_pass" required>
                            </div>
                            <div class="form-g">
                                <button type="buttons" class="btn btn-primary" id="txt_button">
                                    <h4 class="text-light font-weight-bold">Verificar funcionamiento del
                                        huellero</h4>
                                </button>
                            </div>
                            <hr>
                            <button type="button" class="btn" id="save">Guardar cambios</button>
                            <br>
                        </div>
                    </div>
                </div>
            </div> -->

    <form name="form_pass" action="ACTION_cambiopass.php" method="POST" oninput="return validacion_pass()" onsubmit="return enviado_pass() && validacion_pass();">
            <div class="modal fade" id="c_pass" tabindex="-1" role="dialog" aria-labelledby="c_pass" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="change_icon">
                                <i class='fas fa-sync-alt fa-5x'></i>
                            </div>
                            <p id="font" class="font-weight-bold">
                                Cambio de contraseña
                            </p>
                            <div class="form-group">
                                <input type="password" class="form-control" id="actual" name="actual" placeholder="Contraseña actual">
                                <div class="show_icon">
                                    <i class="fa fa-eye fa-lg" tool-tip-toggle="tooltip-pass" data-original-title="Mostrar contraseñas" id="passwords" id="show_password"></i>
                                </div>
                                <div id="change"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" name="new" class="form-control" id="new_pass" placeholder="Nueva contraseña">
                            </div>
                                <div class="info_icon">
                                    <i class="fa fa-info-circle fa-lg" tool-tip-toggle="tooltip-show" data-original-title="INFORMACIÓN: Se recomienda que para crear una contraseña fuerte siga los siguientes parámetros, es decir, que la contraseña contenga: 8 carácteres, una mayúscula, una minúscula, un número y un caracter raro o especial. Por ejemplo, la contraseña 'Sena_1234' cumple con los parámetros recomendados."></i>
                                </div>
                            <script type="text/javascript">
                                /* Se crea una función JQuery para el formulario de cambiar contraseña. Esta función contendrá un par de eventos para activar 2 tooltips de bootstrap (cajas con texto) las cuales proporcionarán información al usuario al hacer 'hover' sobre alguno de ellos: */
                                $(document).ready(function(){
                                // Usando el atributo 'tool-tip-toggle' se toma el nombre del tooltip que se quiere activar (en este caso, el tooltip se llama 'tooltip-show'). Este tooltip indica al usuario las recomendaciones para crear una contraseña segura.
                                    // Después de indicar que es un tooltip, se le coloca, para este caso, que esté posicionado a la derecha:
                                    $('[tool-tip-toggle="tooltip-show"]').tooltip({
                                        placement : 'right'
                                    });
                                    // El mismo proceso anterior acontece con el tooltip llamado 'tooltip-pass', el cual indica al usuario que las contraseñas colocadas en los campos pueden ser visualizadas:
                                    $('[tool-tip-toggle="tooltip-pass"]').tooltip({
                                        placement : 'right'
                                    });
                                });
                            </script>
                                <div id="change3"></div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="confirmar_pass" name="confirmar_pass" placeholder="Confirmar contraseña">
                                    <div id="change2"></div>

                                    <!--- Se hace uso de PHP para mostrar el mensaje de los iconos y algunas alertas del formulario: -->
                                    <?php
                                        // Se verifica si el valor 'notfound' está definido y se obtiene si el valor 'notfound' ubicado en el archivo 'ACTION_cambiopass.php' devuelve true:
                                        if (isset($_GET["notfound"]) && $_GET["notfound"] == 'true') {
                                                /* En caso de que lo anterior sea cierto, una alerta bootstrap de tipo 'danger' aparecerá abajo del campo de confirmar contraseña del formulario de cambiar contraseña. Esta alerta indica que la contraseña actual ingresada no coincide con la registrada en la base de datos: */
                                                echo "<div class= 'alert alert-danger alert-dismissible fade show' role='alert' style='border-radius: 0; font-weight: bold;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>La contraseña actual no coincide con la registrada en la base de datos</div>";
                                            }
                                            // Nuevamente, se verifican y obtienen los valores como en el caso anterior:
                                            if (isset($_GET["notfound"]) && $_GET["notfound"] == 'true') {
                                            /* Y en caso de que devuelvan un resultado true, la ventana modal bootstrap de cambio de contraseña, al cargar todo el código HTML, se abrirá automaticamente para informar al usuario de que el cambio de contraseña no ha sido posible. */
                                                // Para hacer esto, se llama el nombre del formulario y se indica que el mismo se encuentra en una ventana modal, y que lo que se requiere es que se active ('toggle'):
                                                echo "<script>$(document).ready(function() {
                                                        $('#c_pass').modal('toggle')
                                                    });</script>";
                                            }
                                            // Si el valor definido 'success' y el valor obtenido 'success' devuelven true, se muestra otra alerta diferente a la anterior:
                                            if (isset($_GET["success"]) && $_GET["success"] == 'true') {
                                                // En este caso, la alerta bootstrap es de tipo 'success' e indica que la contraseña ha sido cambiada con éxito:
                                                echo "<div class= 'alert alert-success alert-dismissible fade show' role='alert' style='border-radius: 0; font-weight: bold;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>La contraseña ha sido cambiada con éxito</div>";
                                            }
                                            // Este tooltip activa igualmente la ventana modal de cambio de contraseña si la contraseña del usuario ha sido cambiada, mostrándole la alerta 'success' anterior mencionada:
                                            if (isset($_GET["success"]) && $_GET["success"] == 'true') {
                                                    echo "<script>$(document).ready(function() {
                                                            $('#c_pass').modal('toggle')
                                                        });</script>";
                                            }
                                    ?>

                                    <br>
                                    <button type="submit" name="cambio" class="btn btn-md btn-block text-center" id="enter_button">
                                        Guardar cambios
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</nav>

<div class="container-fluid banner">
    <div class="form-group search_course">
            <label class="badge badge-info search_badge" for="input_search">Búsqueda de una ficha:</label>
            <form action="list_result.php" method="POST">
            <div class="input-group">
                <div class="input-group-prepend"></div>
                <input type="text" class="form-control input_search" placeholder="Ingrese el número de la ficha a buscar...">
                <div class="button_search_div">
                <button name="buscar" class="btn my-2 my-sm-0 btn_search">
                    <div class="input-group-text search_icon"><i class="fas fa-search fa-2x"></i></div>
                </button>
                </div>
            </form>
        </div>
    </div>
</div>

    <div class="container-fluid text-center">
        <div class="row d-flex justify-content-center">
            <div class="card-deck">
                <div class="card col functions">
                    <a href="manage_list.php">
                    <img class="card-img-top mx-auto d-block img_functions" src="icons/responsive.png" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text txt_functions"><span><strong>Gestionar listados</strong></span></a>
                    </div>
                </div>
                <div class="card col functions">
                    <a href="register.php">
                    <img class="card-img-top mx-auto d-block img_functions" src="icons/fingerprints.png" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text txt_functions"><span><strong>Registrar asistencia</strong></span></a>
                    </div>
                </div>
                <div class="card col functions">
                    <a href="reports.php">
                    <img class="card-img-top mx-auto d-block img_functions" src="icons/report.png" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text txt_functions"><span><strong>Reportes de asistencia</strong></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-3">
        <div class="row justify-content-center text-center container_search_appr">
            <div class="text-center">
                <div class="col-3 id_card_icon">
                    <i class='fas fa-id-card'></i>
                </div>
            </div>
            <div class="col-6">
                <form class="form_search_appr">
                    <div class="form-group">
                        <span class="title_search_appr">Búsqueda de un aprendiz:</span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nombre del aprendiz">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Número de ficha">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Número de documento">
                    </div>
                    <button class="btn input_search_appr" type="submit">
                        <i class="fas fa-search fa-2x"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <div class="container-fluid system_footer">
            <div class="row text-center py-3">
                <div class="col-xl-2 manual_button"><span><a href="user_manual.php"><button type="button" class="btn btn-primary" id="manual_button">Manual de usuario</button></span></a>
                </div>
                <div class="col-xl-1"></div>
                <div class="col-xl-6 site_rights"><span>&copy; Todos los
                        derechos
                        reservados -
                        SENA 2020</span></div>
                <div class="col-xl-2"></div>
                <div class="col-xl-1 sena_logo" class="justify-content-center"><img src="icons/logoSena.png" width="50em">
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
<script src="js/cambio_pass.js"></script>
<?php
} else {
    // En caso de no haber ninguna sesión iniciada, se le redireccionará al usuario al archivo 'index.php' (página inicial) para indicarle con una alerta bootstrap que debe de iniciar sesión para usar las funcionaldiades del sistema:
    header("location: index.php?failone=true");

}
?>