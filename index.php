<!doctype html>
<html lang="es">

<?php
// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include "ACTION_conexionBD.php";
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/reda_system.css">
    <script src="https://kit.fontawesome.com/ddefb55be1.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>REDA</title>
    <link rel="icon" href="icons/reda2.png">
</head>

<body>
    <?php
// Se verifica si el valor 'failone' está definido y se obtiene si el valor 'failone' ubicado en el archivo 'ACTION_validalogin.php' devuelve true:
if (isset($_GET["failone"]) && $_GET["failone"] == 'true') {
    // De ser así, una pieza de código HTML será insertada, con una alerta bootstrap de tipo 'danger' que será mostrada al usuario, indicándole de que no puede usar las funcionalidades del sistema ya que no ha iniciado sesión: 
    echo "<div class= 'alert alert-danger alert-dismissible fade show' role='alert' style='border-radius: 0; text-align: center; font-weight: bold; width:100%; border-bottom: 2px solid #000;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>Debes iniciar sesión para acceder a las funcionalidades del sistema.</div>";
// Si el valor anterior devuelve false, entonces se verifica y obtiene el valor 'sent', que, en caso de ser true, mostrará el resultado del siguiente código:
}elseif (isset($_GET["sent"]) && $_GET["sent"] == 'true') {
    // En este segundo caso, la alerta será de tipo 'success' y estará relacionada con el envío del correo de recuperación de contraseña, indicando que el mismo se ha enviado con éxito al e-mail del usuario en cuestión: 
    echo "<div class= 'alert alert-success alert-dismissible fade show' role='alert' style='border-radius: 0; text-align: center; font-weight: bold; width:100%; border-bottom: 2px solid #000;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>Un correo electrónico ha sido enviado a su bandeja de entrada, el mismo contiene las instrucciones para recuperar su contraseña.</div>";
// Por otro lado, si ninguno de los dos valores mencionados anteriormente devuelve true, entonces se verifica y se obtiene si el valor 'notuser' sí lo hace:
}elseif (isset($_GET["notuser"]) && $_GET["notuser"] == 'true') {
    // En un penúltimo caso, si lo anterior devuelve true, la alerta ahora será de tipo 'danger' e indicará al usuario de que el e-mail ingresado para recuperar la contraseña no existe, y, por lo tanto, no puede ser enviado el correo de recuperación:
    echo "<div class= 'alert alert-danger alert-dismissible fade show' role='alert' style='border-radius: 0; text-align: center; font-weight: bold; width:100%; border-bottom: 2px solid #000;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>Ningún usuario se encuentra registrado en el sistema con ese correo electrónico.</div>";
// Por último, si ninguno de los 3 valores ya mencionados devuelve true, entonces el valor 'wrong' sí que debe de devolverlo:
}elseif (isset($_GET["wrong"]) && $_GET["wrong"] == 'true') {
    // Esta última alerta, de tipo 'danger' también, indica que el e-mail ingresado para recuperar la contraseña no cumple con la estructura de un e-mail convencional, por lo cual el correo no puede ser enviado tampoco:
    echo "<div class= 'alert alert-danger alert-dismissible fade show' role='alert' style='border-radius: 0; text-align: center; font-weight: bold; width:100%; border-bottom: 2px solid #000;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>El correo electrónico ingresado es inválido, por favor ingrese uno que exista y que tenga la estructura de un correo electrónico convencional.</div>";
}
?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div class="container-fluid" style="background-color: #11b6a0;">
        <div class="row">
            <div class="col-xl-12">
                <nav class="navbar navbar-expand-sm navbar-light menu_inicio" style="background-color: #11b6a0; border-radius: 0;">
                    <div class="navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <img src="icons/reda2.png" class="d-inline-block align-top" alt="" id="reda_image">
                            </li>
                            <li class="nav-item py-4">
                                <h3 id="title"> Registro Digital del Aprendiz
                                </h3>
                            </li>
                        </ul>
                        <span class="navbar-text">
                            <ol>
                                <li>
                                    <div class="container">
                                        <a id="boton2" role="button" class="btn btn-lg primary" data-toggle="modal"
                                            data-target="#start_login">
                                            Iniciar sesión
                                        </a>
                                    <form name="form_login" action="ACTION_validalogin.php" method="POST" oninput="return validar_login()" onsubmit="return enviado_login() && validar_login();">
                                            <div class="modal fade" id="start_login">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content" id="contenido_sesion">
                                                        <div class="modal-body">
                                                            <i class='far fa-id-badge fa-9x' style="color: #00000088;"></i>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                            <p id="font" class="display-4 font-weight-bold">Inicio de
                                                                sesión</p>
                                                            <div class="form-group">
                                                                <span id="perfil"
                                                                    class="badge font-weight-bold">Cargo</span>
                                                            <select name="cargo" class="form-control" style="width: 25em;">
                                                                    <option>Instructor</option>
                                                                    <option>Personal administrativo</option>
                                                                    <option>Administrador</option>
                                                                </select>
                    </div>
                    <div class="form-group ">
                        <input type="text" name="documento" class="form-control" id="documento" aria-describedby="emailHelp" placeholder="Número de documento" style="width: 25em;">
                        <div id="aviso"></div>
                    </div>

                    <div class="form-group">
                        <div>
                            <input type="password" name="contraseña" class="form-control" id="contraseña" placeholder="Contraseña" style="width: 25em;">
                            <i class="fa fa-eye fa-lg" id="show_password" id="contraseña" tool-tip-toggle="tooltip-pass" data-original-title="Mostrar contraseñas" style="color: #000; margin-top: -1.2em; margin-right: 2.5em; float: right;"></i>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $('[tool-tip-toggle="tooltip-pass"]').tooltip({
                                        placement : 'right'
                                    });
                                });
                            </script>
                            <div id="aviso2"></div>
                            <?php
// Se verifica si el valor 'fallo' está definido y se obtiene si el valor 'fallo' ubicado en el archivo 'ACTION_validalogin.php' devuelve true: 
if (isset($_GET["fallo"]) && $_GET["fallo"] == 'true') {
    /* En caso de que lo anterior sea cierto, una alerta bootstrap de tipo 'danger' aparecerá abajo del campo de contraseña del formulario de iniciar sesión, el mismo indica que el inicio de sesión no ha sido posible debido a que no se ha encontrado en la base de datos a un usuario o contraseña con las características ingresadas en los campos: */
    echo "<div class= 'alert alert-danger alert-dismissible fade show' role='alert' style='border-radius: 0; font-weight: bold;width: 87%; margin-left: 1.1em;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>Usuario o contraseña incorrecta o no coincidente con el cargo seleccionado</div>";
}
// Nuevamente, se verifican y obtienen los valores como en el caso anterior:
if (isset($_GET["fallo"]) && $_GET["fallo"] == 'true') {
// Y en caso de que devuelvan un resultado true, la ventana modal bootstrap de inicio de sesión, al cargar todo el código HTML, se abrirá automaticamente para informar al usuario de que el inicio de sesión no ha sido posible.
    // Para hacer esto, se llama el nombre del formulario y se indica que el mismo se encuentra en una ventana modal, y que lo que se requiere es que se active ('toggle'):
    echo "<script>$(document).ready(function() {
                                    $('#start_login').modal('toggle')
                                });</script>";
}
?>
                        </div>


                    </div>
                    <div class="form-group">
                        <a href="Recuperaciondecontraseña" data-toggle="modal" data-target="#recuperacion_modal">¿Olvidaste tu contraseña?</a>
                    </div>
                    <button type="submit" name="ingresar" class="btn btn-md btn-block text-center" id="enter_button">Ingresar</button>
                    <br>

                    </form>

                <form name="recuperar_pass" action="ACTION_recuperarcon.php" method="post" oninput="return enviado_email()">
                    <div class="modal fade" id="recuperacion_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content" style="border-radius: 0; border: none; border: 4px solid rgba(0, 0, 0, 0.712);">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h2>Recuperación de contraseña</h2>
                                    <label for="email"><b>Introduzca su correo electrónico:</b></label>
                                    <br>
                                    <input type="email" name="email" id="email" style="width: 25em; height: 2em; border: none; font-weight: bold;">
                                    <div id="warning3"></div>
                                    <input type="submit" value="Enviar" id="enter_button" style="border: none; margin-top: 0.5em; margin-right: 7em;">
                                    <br>
                                    <p style="color: #000;">Se le hará envío de un código con el cual podrá definir una nueva contraseña para su cuenta.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </li>
    </ol>
    </span>
    </div>

    </nav>

    </div>
    </div>
    </div>

    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="icons/salon.jpg" alt="Aula de Aprendizaje" width="100%" height="530">
            </div>
            <div class="carousel-item">
                <img src="icons/paper.jpg" alt="Registro" width="100%" height="530">
            </div>
            <div class="carousel-item">
                <img src="icons/lector.jpg" alt="Huella" width="100%" height="530">
            </div>
            <div class="carousel-item">
                <img src="icons/huella.jpg" alt="Información" width="100%" height="530">
            </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col-sm">
                <div class="card-body justify-content">

                    <h1 class="container text-center" style="background-color: rgba(0, 0, 0, 0.048); font-size:2.5em;"><strong>¿Qué es REDA?</strong>
                    </h1>
                    <p class="card-text " style="font-size: 20px; text-align: justify;">REDA (por sus siglas:<strong>
                            Registro
                            Digital del
                            Aprendiz</strong>) es un sistema construido para el CTGI ubicado en el complejo SENA de Pedregal. Su objetivo es hacer que haya más dinamismo en la toma de asistencia por medio del uso de una computadora y un lector de huellas.
                        Facilitándose así la acción tanto para instructores como para aprendices al estarse usando la huella dactilar como principal herramienta para registrar la asistencia.</p>

                </div>
                <div class="card-deck py-3">
                    <div class="card " style="background: #20c7b1; border: 3px solid rgba(0, 0, 0, 0.3); border-radius: 0;">
                        <div class="card-body">
                            <h3 class="card-title card-footer text-center border border-dark" style="background-color:#20c7b1;">Misión
                            </h3>
                            <p class="card-text" style="text-align: justify; font-size: 20px;">La misión de REDA es ser un sistema de información que permita almacenar la huella dactilar de los aprendices para su posterior uso como evidencia de la asistencia del aprendiz a clase con el uso del lector biométrico.
                            </p>
                        </div>

                    </div>
                    <div class="card" style="background:#20c7b1; border: 3px solid rgba(0, 0, 0, 0.3); border-radius: 0;">
                        <div class="card-body">
                            <h3 class="card-title card-footer text-center border border-dark" style="background-color: #20c7b1;">
                                Visión</h3>
                            <p class="card-text" style="text-align: justify; font-size: 20px">
                                La visión de REDA es ser un sistema de información que pueda ser escalable a nivel tecnológico, ofreciendo así nuevas posibilidades u opciones de uso que faciliten la tarea de tomar asistencia.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container py-3">
            <div class="row">
                <div class="col-sm">
                </div>
            </div>
        </div>

        <div class="container text-center">
            <h2 class="card-title text-center" style="background-color: rgba(0, 0, 0, 0.048); font-size:2.5em;"><strong>¿Qué elementos hemos
                    utilizado?</strong>
            </h2>
            <div class="row justify-content-center">
                <div class="col-sm-5">
                    <div class="card mb-3" style="border: 3px solid rgba(0, 0, 0, 0.1); border-radius: 0; max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <i class='fas fa-laptop fa-7x'></i>
                                    <h4 class="card-title"><strong>Computadora</strong></h4>
                                    <p class="card-text text-justify">Con el uso de una computadora el instructor puede observar los listados de ficha correspondientes a su formación y ver cual es el estado de asistencia de cada uno de los aprendices.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="card mb-3" style="border: 3px solid rgba(0, 0, 0, 0.1); border-radius: 0; max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <i class="material-icons md-48" style="font-size:130px;">dock</i>
                                    <h4 class="card-title"><strong>Lector de huellas</strong></h4>
                                    <p class="card-text text-justify">Con el uso de un lector biométrico los aprendices pueden registrar su asistencia con su huella dactilar una vez esta se encuentre registrada en el sistema.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <h2 class="container text-center" style="background-color: rgba(0, 0, 0, 0.048); font-size:2.5em;"><strong>Beneficios de usar REDA</strong></h2>
    <div class="grid-container py-1">
        <div>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <i class="fas fa-tachometer-alt fa-8x" style="color: rgb(35, 130, 118);"></i>
                        <p>DINAMISMO</p>
                    </div>
                    <div class="flip-card-back" style="background-color: rgb(35, 130, 118);">
                        <h1 class="titulos">DINAMISMO</h1>
                        <p class="text-justify">Con el uso de los dos objetos principales (lector y computadora) ya no es tan repetitiva la toma de asistencia. </p>

                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <i class='fas fa-file-alt fa-8x' style="color: rgb(89, 181, 72);"></i>
                        <p>AHORRO DE PAPEL</p>
                    </div>
                    <div class="flip-card-back" style="background-color: rgb(89, 181, 72);">
                        <h1 class="titulos">AHORRO DE PAPEL</h1>
                        <p class="text-justify"> Ya no hace falta el uso de los formatos impresos de toma de asistencia, con REDA esto ya no es necesario. </p>

                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <i class='far fa-lightbulb fa-8x' style="color: rgb(225, 115, 35);"></i>
                        <p>AHORRO DE ENERGÍA</p>
                    </div>
                    <div class="flip-card-back">
                        <h2 class="titulos">AHORRO DE ENERGÍA</h2>
                        <p class="text-justify">El uso de impresoras evita que haya un consumo innecesario de energía al no estarse utilizando más las hojas de papel para los formatos.</p>

                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <i class='fas fa-tint fa-8x' style="color: rgb(35, 130, 118);"></i>
                        <p>AHORRO DE TINTA</p>
                    </div>
                    <div class="flip-card-back" style="background-color: rgb(35, 130, 118);">
                        <h1 class="titulos">AHORRO DE TINTA</h1>
                        <p class="text-justify">Con el gasto reducido de tinta se obtiene el beneficio de usar esta para otro tipo de formatos diferentes a los de la asistencia.</p>

                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <i class='fas fa-bullseye fa-8x' style="color: rgb(89, 181, 72);"></i>
                        <p>SIMPLEZA</p>
                    </div>
                    <div class="flip-card-back" style="background-color: rgb(89, 181, 72);">
                        <h1 class="titulos">SIMPLEZA</h1>
                        <p class="text-justify">REDA es un software sin complicaciones. Se centra en lo necesario para poder llevar correctamente el manejo de la asistencia de cada uno de los aprendices. </p>

                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <i class='fas fa-arrow-circle-up fa-8x' style="color: rgb(225, 115, 35);"></i>
                        <p>ESCALABILIDAD</p>
                    </div>
                    <div class="flip-card-back">
                        <h1 class="titulos">ESCALABILIDAD</h1>
                        <p class="text-justify"> Con el tiempo, REDA obtendrá mejoras que permitirán un mejor monitoreo a escala tecnológica.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <h2 style="background-color: rgba(0, 0, 0, 0.048); font-size:2.5em;"><strong>Sobre nosotros </strong></h2><br>
        <div class="row">
            <div class="card-deck">
                <div class="card" style="border: none;">
                    <img class="card-img-top mx-auto d-block" src="icons/creator.png" alt="Card image cap" style="width: 15em;">
                    <div class="card-body">
                        <p class="card-text"><span style="font-size:1.5em;"><strong>Breyder González Castillo</strong></span> <br/> <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo assumenda corporis voluptates eius magnam iure eos reprehenderit deserunt ad facere
                            veniam, officia neque, at nihil ea consectetur, vero consequuntur sunt.</p>
                        </p>
                    </div>
                </div>
                <div class="card" style="border: none;">
                    <img class="card-img-top mx-auto d-block" src="icons/creator1.jpg" alt="Card image cap" style="width: 15em;">
                    <div class="card-body">
                        <p class="card-text"><span style="font-size:1.5em;"><strong>Camila Parra Bedoya</strong></span> <br/> <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo assumenda corporis voluptates eius magnam iure eos reprehenderit deserunt ad facere
                            veniam, officia neque, at nihil ea consectetur, vero consequuntur sunt.</p>
                        </p>
                    </div>
                </div>
                <div class="card" style="border: none;">
                    <img class="card-img-top mx-auto d-block" src="icons/creator2.jpg" alt="Card image cap" style="width: 15em;">
                    <div class="card-body">
                        <p class="card-text"><span style="font-size:1.5em;"><strong>Santiago Jiménez Jiménez</strong></span> <br/><p class="text-justify"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo assumenda corporis voluptates eius magnam iure eos reprehenderit deserunt ad facere
                            veniam, officia neque, at nihil ea consectetur, vero consequuntur sunt.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container-fluid" style="background-color: #fa7e36;">
            <div class="row text-center py-3">
                <div class="col-xl-2"><span style="line-height: 3em;"><button type="button" class="btn btn-primary"
                            data-toggle="modal" data-target="#exampleModal" id="about_button">Acerca del
                            software</button></span>
                </div>
                <div class="col-xl-1"></div>
                <div class="col-xl-6"><span style="text-align: center; line-height: 3em; color: #fff;">&copy; Todos los
                        derechos
                        reservados -
                        SENA 2020</span></div>
                <div class="col-xl-2"></div>
                <div class="col-xl-1"><img src="icons/logoSena.png" class="justify-content-center" style=" width: 3em; filter: invert(100%);">
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-body" style="background-color: #fff; border-radius: 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2 class="modal-title font-weight-bold" id="exampleModalLabel">Acerca de <span class="text_d">este
                                software</span></h2><br>
                        <div class="row">
                            <div class="col-xl-4">
                                <i class="fab fa-bootstrap fa-7x" style="color: rgb(78, 43, 128)"></i>
                                <h2>Bootstrap</h2>
                                <p class="text-justify"> Con el uso del Framework Bootstrap, se desarrolló el diseño, el cual se adapta a los colores institucionales y a la funciones del sistema.
                                </p>
                            </div>
                            <div class="col-xl-4">
                                <i class="fab fa-java fa-7x" style="color: rgb(227, 87, 36);"></i>
                                <h2>Java</h2>
                                <p class="text-justify">La configuración del lector biométrico se logró con la utilización del lenguaje de programación Java, implementando las librerías propias del lector de huellas digitalPersona.
                                </p>
                            </div>
                            <div class="col-xl-4">
                                <i class="fab fa-php fa-7x" style="color: rgb(119, 133, 212);"></i>
                                <h3>Preprocesador de Hipertexto (PHP)</h3>
                                <p class="text-justify">Este lenguaje de programación es el motor de esta plataforma, con el se lograron todas las funcionalidades que realiza el sistema.

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    </div>
    <!-- Copyright -->

    </footer>
    <!-- Footer -->

</body>

</html>
<script src="js/validacion_login.js"></script>