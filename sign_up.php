<?php

// Se inicia o reanuda una sesión en caso de que un usuario ya haya ingresado al sistema por medio del log in o inicio de sesión:
session_start();

// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include 'ACTION_conexionBD.php';

// Se verifica con 'isset' si la sesión con el cargo de administrador existe o está siendo utilizada en el sistema:
if (isset($_SESSION['administrador'])) {

    ?>

<!DOCTYPE html>

<head lang="es">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro de usuario - REDA</title>
    <link rel="icon" href="icons/reda2.png">
    <link rel="stylesheet" type="text/css" href="css/reda_system.css">
    <link rel="stylesheet" href="css/reda_system.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ddefb55be1.js" crossorigin="anonymous"></script>
</head>

<body id="bgcolor">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<div class="container">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="contenido_sign">
                <div class="modal-body">
                    <i class="fas fa-user-plus fa-6x"></i>
                    <p id="font" class="display-4 font-weight-bold">Registro</p>
                    <form name="form_registro" action="ACTION_sign_up.php" method="POST" oninput="return validar_registro()" onsubmit="return registro_enviado() && validar_registro();">
                        <div class="form-group">
                            <input type="text" name="nombre1" class="form-control" id="nombre1" aria-describedby="emailHelp"
                                placeholder="Primer nombre *" tool-tip-toggle="tooltip-required" data-original-title="Este campo es obligatorio" style="width: 95%">
                            <div id="alerta"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="nombre2" class="form-control" id="nombre2" aria-describedby="emailHelp"
                                placeholder="Segundo nombre" style="width: 95%" >
                                <div id="alerta9"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="apellido1" class="form-control" id="apellido1" placeholder="Primer apellido *" tool-tip-toggle="tooltip-required" data-original-title="Este campo es obligatorio" style="width: 95%">
                            <div id="alerta2"></div>
                        </div>

                        <div class="form-group">
                            <input type="text" name="apellido2" class="form-control" id="apellido2" placeholder="Segundo apellido" style="width: 95%">
                            <div id="alerta8"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="documento" class="form-control" id="documento" aria-describedby="emailHelp"
                                placeholder="Número de documento *" tool-tip-toggle="tooltip-required" data-original-title="Este campo es obligatorio" style="width: 95%">
                                <div id="alerta3"></div>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="email"
                                aria-describedby="emailHelp" placeholder="Correo electrónico *" tool-tip-toggle="tooltip-required" data-original-title="Este campo es obligatorio" style="width: 95%">
                                <!-- Se añade un icono de Font Awesome que permite indicar al usuario, al hacer hover sobre el mismo, que el correo electrónico debe funcionar con el servidor de Gmail: -->
                                <i class="fa fa-envelope fa-lg" tool-tip-toggle="tooltip-email" data-original-title="Se requiere que el correo electrónico funcione con el servidor de Gmail para así poder realizar la recuperación de la contraseña en caso de ser necesario. Por ejemplo, el correo 'example1@gmail.com' cumple con lo requerido." style="float: right; margin-right: 1.5em; margin-top: -1.2em;"></i>
                                <div id="alerta4"></div>
                        </div>

                        <div class="form-group">
                            <span id="perfil" class="badge font-weight-bold">Cargo *</span>
                            <select name="cargo" class="form-control" tool-tip-toggle="tooltip-required" data-original-title="Escoja el cargo de acuerdo a la funcionalidad del usuario" style="width: 95%;">
                                <option>Instructor</option>
                                <option>Personal administrativo</option>
                                <option>Administrador</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="password" name="contraseña" class="form-control" id="contraseña"
                                aria-describedby="emailHelp" placeholder="Contraseña *" tool-tip-toggle="tooltip-required" data-original-title="Este campo es obligatorio" style="width: 95%;">
                            <i class="fa fa-info-circle fa-lg" tool-tip-toggle="tooltip-show" data-original-title="INFORMACIÓN: Se recomienda que para crear una contraseña fuerte siga los siguientes parámetros, es decir, que la contraseña contenga: 8 carácteres, una mayúscula, una minúscula, un número y un caracter raro o especial. Por ejemplo, la contraseña 'Sena_1234' cumple con los parámetros recomendados." style="float: right; margin-right: 3.5em; margin-top: -1.2em;"></i>
                            <script type="text/javascript">
                                /* Se crea una función que posee diferentes eventos con código JQuery. Las mismas permiten, usando el atributo 'tool-tip-toggle', que una pequeña caja con texto pueda ser mostrada arriba, abajo, a la izquierda o a la derecha del elemento que posee el valor puesto dentro del atributo ya mencionado. Una vez el código HTMl haya sido cargado correctamente, estas funciones podrán mostrarse haciendo 'hover' sobre el elemento que posee el atributo 'tool-tip-toggle': */
                                $(document).ready(function(){
                                    // El valor 'tooltip-show' es llamado para mostrar una caja de texto con las recomendaciones para crear una contraseña segura:
                                    $('[tool-tip-toggle="tooltip-show"]').tooltip({
                                        // El posicionamiento del tooltip, en este caso, es hacia la derecha:
                                        placement : 'right'
                                // Aquí termina el código para este evento:
                                    });
                                // Aquí inicia un nuevo evento para la función JQuery.
                                    // El valor 'tooltip-pass' es llamado para mostrar la caja de texto que indica que las contraseñas se pueden mostrar en el formulario de registro de un usuario:
                                    $('[tool-tip-toggle="tooltip-pass"]').tooltip({
                                        placement : 'right'
                                    });
                                    // El valor 'tooltip-required' indica con una caja de texto los campos que son obligatorios rellenar en el formulario de registro:
                                    $('[tool-tip-toggle="tooltip-required"]').tooltip({
                                        // El posicionamiento del tooltip, en este caso, es hacia la izquierda:
                                        placement : 'left'
                                    });
                                    // El valor 'tooltip-choose' indica en el formulario de registro que se debe escoger un cargo para el usuario dependiendo de su funcionalidad en el sistema:
                                    $('[tool-tip-toggle="tooltip-choose"]').tooltip({
                                        placement : 'left'
                                    });
                                    // El valor 'tooltip-email' indica que el correo electrónico del usuario a registrar debe funcionar con el servidor de Gmail:
                                    $('[tool-tip-toggle="tooltip-email"]').tooltip({
                                        placement : 'right'
                                    });
                                    // Aquí termina el código de la función JQuery:
                                });
                            </script>

                            <i class="fa fa-eye fa-lg" tool-tip-toggle="tooltip-pass" data-original-title="Mostrar contraseñas" id="show_password" style="margin-top: -1.2em; margin-right: 1.5em; float: right;"></i>
                            <div id="alerta5"></div>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" id="confirmar_contraseña"
                                aria-describedby="emailHelp" placeholder="Confirmar contraseña *" tool-tip-toggle="tooltip-required" data-original-title="Este campo es obligatorio" style="width: 95%">
                            <div id="alerta6"></div>
                            <?php
// Se verifica si el valor 'new_user' está definido y se obtiene si el valor 'new_user' ubicado en el archivo 'ACTION_sign_up.php' devuelve true: 
if (isset($_GET["new_user"]) && $_GET["new_user"] == 'true') {
        // En caso de ser así, se insertará código HTML en este archivo para realizar la aparición de una alerta tipo 'success' de bootstrap, la cual aparecerá abajo del campo de confirmar contraseña. Esta alerta indica el registro exitoso de un nuevo usuario en el sistema:
        echo "<div class= 'alert alert-success alert-dismissible fade show' role='alert' style='border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>Registro de usuario exitoso</div>";
    }
    // Se verifica si el valor 'double' está definido y se obtiene si el valor 'double' ubicado en el archivo 'ACTION_sign_up.php' devuelve true:  
    if (isset($_GET["double"]) && $_GET["double"] == 'true') {
        // En caso de ser así, la alerta, en este caso, es de tipo 'danger' e indica que tanto el número de documento y el correo electrónico ya se encuentran registrados en el sistema, y, por lo tanto, no es posible hacer el registro:
        echo "<div class= 'alert alert-danger alert-dismissible fade show' role='alert' style='border-radius: 0; font-weight: bold;width:95%; margin-left: 1.1em;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>El documento y el correo electrónico ingresados ya se encuentran en la base de datos. Por favor corrija o ingrese un documento y un correo nuevo.</div>";
    }
    // Se verifica si el valor 'notavailable' está definido y se obtiene si el valor 'notavailable' ubicado en el archivo 'ACTION_sign_up.php' devuelve true: 
    if (isset($_GET["notavailable"]) && $_GET["notavailable"] == 'true') {
        // En caso de ser así, la alerta, en este caso, es de tipo 'danger' e indica que el número de documento ya se encuentra registrado en la base de datos, y, por lo tanto, no es posible hacer el registro:
        echo "<div class= 'alert alert-danger alert-dismissible fade show' role='alert' style='border-radius: 0; font-weight: bold;width:95%; margin-left: 1.1em;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>El documento ingresado ya se encuentra en la base de datos. Por favor corrija o ingrese uno nuevo</div>";
    // Si el anterior condicional devuelve false, entonces se verifica si el valor 'notemail' está definido y se obtiene si el valor 'notemail' ubicado en el archivo 'ACTION_sign_up.php' devuelve true: 
    } elseif (isset($_GET["notemail"]) && $_GET["notemail"] == 'true') {
        // En caso de ser así, la alerta, en este caso, es de tipo 'danger' e indica que el correo electrónico ingresado ya está registrado en la base de datos, y, por lo tanto, no es posible hacer el registro: 
        echo "<div class= 'alert alert-danger alert-dismissible fade show' role='alert' style='border-radius: 0; font-weight: bold;width:95%; margin-left: 1.1em;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>El correo electrónico ingresado ya se encuentra en la base de datos. Por favor ingrese uno nuevo</div>";
    }
    ?>
                        </div>

                        <br>
                        <input type="submit" value="Enviar" name="send" class="btn btn-md btn-block text-center"
                            id="enter_button" onclick="validar_formulario()">
                        <br>
                        <div class="modal-footer">
                            <p><a href="system_admin.php">Volver al inicio</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="js/validacion_registro.js">

</script>

<?php
} else {
    // En caso de no haber ninguna sesión iniciada, se le redireccionará al usuario al archivo 'index.php' (página inicial) para indicarle con una alerta bootstrap que debe de iniciar sesión para usar las funcionaldiades del sistema:
    header("location: index.php?failone=true");

}

?>