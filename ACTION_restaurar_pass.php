<?php

// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include 'ACTION_conexionBD.php';
/*
@var string $key
@var string $emailone
@var string $cargo_recuperar
@var string $curDate
@var string $query
@var string $row
@var string $error
@var string $expDate

Se verifica si los valores 'token', 'email y 'action' están ya definidos (esto viene desde el enlace que el usuario usa para restaurar su contraseña).
*/
// Finalmente, se toma el token, el email del usuario, el cargo del mismo y se verifica si el valor definido 'action' no está vacío:
if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["cargo"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
    // Se obtiene el token que corresponde al e-mail del usuario que solicitó el cambio de contraseña en un día y momento determinado:
    $key = $_GET["key"];
    // Se obtiene dentro de una variable el e-mail del usuario que solicitó el cambio de contraseña:
    $emailone = $_GET["email"];
    // Se obtiene dentro de una variable el cargo que posee el correo electrónico:
    $cargo_recuperar = $_GET["cargo"];
    // Se toma la fecha en la que se está abriendo el enlace de recuperación de contraseña:
    $curDate = date("Y-m-d H:i:s");
    // Se realiza una consulta a la base de datos 'reda' para verificar si el token abierto existe en la base de datos y si dicho token corresponde a un e-mail existente en la tabla:
    $query = mysqli_query($con, "SELECT * FROM `password_reset_temp` WHERE `token`='" . $key . "' and `email`='" . $emailone . "';");
    // Se toman los resultados de la consulta y se guarda en la variable '$row' para realizar un conteo de cuantos resultados existen actualmente en la tabla:
    $row = mysqli_num_rows($query);
    // En caso de no existir resultado alguno en la consulta, se ejecuta el siguiente código:
    if ($row == "") {
        // Se le avisa al usuario de que el link ha expirado o no es correcto debido a que ya lo ha usado con anterioridad:
        $error = '<div style="text-align:center; margin-top: 12em; font-size: 1.5em;">
        <h2>Enlace inválido.</h2>
        <p>El enlace es invalido o ha expirado. Si no copiaste bien el enlace del correo, o si ya lo has usado (caso en el cual es desactivado),</p>
        <p><a href="localhost:80/reda/index.php">lo invitamos a dar clic aquí para solicitar un nuevo correo de recuperación para cambiar su contraseña</a></p>
        </div>';
        echo $error;
      // En caso de sí haber un resultado en la base de datos, se ejecuta el siguiente código:  
    } else {
        // Se traen los resultados guardados en la variable '$query':
        $row = mysqli_fetch_assoc($query);
        // Se trae de la tabla de la base de datos la fila llamada 'expDate':
        $expDate = $row['expDate'];
        // Se compara si la fecha de expiración es mayor a la fecha actual:
        if ($expDate >= $curDate) {
            // En caso de ser así, el siguiente código HTML con el formulario para recuperar la contraseña será mostrado:
        ?>

<!DOCTYPE html>
<!-- Idioma en el que el archivo está definido: -->
<html lang="es">
<head>
    <!-- Cofifiación de caracteres 'UTF-8' para evitar errores ortográficos al mostrar el texto en la pantalla: -->            
    <meta charset="utf-8">
    <!-- Etiqueta 'meta viewport' para controlar la composición en los navegadores móviles: -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Kit de Font Awesome para utilizar sus iconos: -->
    <script src="https://kit.fontawesome.com/ddefb55be1.js" crossorigin="anonymous"></script>
    <!-- Archivo bootstrap para agregar el css del mismo: -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Título de la pestaña: -->
    <title>Recuperación de contraseña - REDA</title>
    <!-- Icono de la pestaña: -->
    <link rel="icon" href="icons/reda2.png">
    <!-- Archivo CSS (hoja de estilos) de este archivo en cuestión: -->
    <link rel="stylesheet" type="text/css" href="css/restaurar_pass.css">
</head>
<body>
<!-- Se colocan los 3 scripts para que la versión 4 de Bootstrap pueda funcionar en el código: -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Se usa una etiqueta '<a>' para añadir atributos que permiten que una ventana modal bootstrap no pueda ser cerrada si se da click por fuera de esta. La configuración para hacer esto se realiza en el archivo 'cambio_pass.js': -->
<a data-controls-modal="pass_recovery" data-backdrop="static" data-keyboard="false">
<!-- Se crea el formulario de restauración de contraseña con el nombre de 'form_pass'. En caso de haber inconsistencias, aparecerán las alertas Bootstrap de la función 'cambio_pass'. Por otro lado, si hay inconsistencias en el formulario al tratar de ser enviado, aparecerán las alertas de la función 'enviado_cambio_pass': -->
<form name="form_pass" action="" method="POST" oninput="return cambio_pass()" onsubmit="return enviado_cambio_pass() && cambio_pass();">
            <!-- Se crea una ventana modal de boostrap. La misma está configurada con código JQuery (del archivo 'cambio_pass.js') para que aparezca automaticamente cada vez que carga este archivo: -->    
            <div class="modal fade" id="pass_recovery" tabindex="-1" role="dialog" aria-labelledby="c_pass" aria-hidden="true">
                <!-- Se define con la clase 'modal-dialog' que la ventana modal debe estar centrada vertical y horizontalmente: -->
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <!-- La clase 'modal-content' mantiene los elementos o el contenido que tendrá el formulario: -->
                    <div class="modal-content" id="contenido_sesion">
                        <!-- La clase 'modal-body' indica que el cuerpo del formulario empieza a mostrarse desde dicho punto: -->
                        <div class="modal-body">
                            <!-- En la zona superior del formulario se encuentran el título del formulario y una imagen llamada 'padlock.png' que indica esto: -->
                            <div class="change_icon">
                                <i class='fas fa-sync-alt fa-5x'></i>
                            </div>
                            <p id="font" class="font-weight-bold">Restauración de contraseña</p>
                            <!-- Se crea un input con un valor 'invisible', lo que significa que el usuario no puede verlo, esto con el objetivo de obtener la acción que el formulario tendrá al momento de ser enviado: -->
                            <input type="hidden" name="action" value="update">
                            <!-- Se crea el primer campo del formulario (usando la clase 'form-group' de bootstrap para indicar que el campo corresponde a un formulario), el mismo sirve para que el usuario ingrese su contraseña nueva: -->
                            <div class="form-group">
                                    <input type="password" name="new" class="form-control" id="new_pass" placeholder="Digite su nueva contraseña">
                            </div>
                                <!-- Aquí se coloca un icono del sitio web 'fontawesome.com'. Al mismo se le atribuye un tooltip de bootstrap (una caja con texto) que aparece al hacer un 'hover' sobre el icono. En este caso, la información mostrada es acerca de la visualización de las contraseñas ingresadas en los campos: -->
                                <i class="fa fa-eye fa-lg" tool-tip-toggle="tooltip-pass" data-original-title="Mostrar contraseñas" id="passwords" id="show_password"></i>
                                <!-- Un segundo icono de 'fontawesome' es colocado en el formulario, el mismo contiene también un tooltip, el cual esta vez informa al usuario sobre la seguridad de la contraseña al crear una: -->
                                <i class="fa fa-info-circle fa-lg" id="information" tool-tip-toggle="tooltip-show" data-original-title="INFORMACIÓN: Por cuestiones de seguridad, la contraseña debe contener como mínimo: 8 carácteres, una mayúscula, una minúscula, un número y un caracter especial o raro. Por ejemplo, la contraseña 'Sena_1234' cumple con los parámetros requeridos."></i>
                                <div id="change3"></div>
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
                                <!-- Se crea un 'div' con el id de 'change3', el cual es usado en el archivo 'cambio_pass.js' para hacer aparecer alertas en caso de existir incosistencias en el capo anterior: -->

                                <!-- Se crea el segundo y último campo del formulario. AL igual que con el primero, posee la clase 'form-group' de bootstrap. Esta vez, este campo sirve para que el usuario confirme su contraseña nueva: -->
                                <div class="form-group">
                                    <input type="password" class="form-control" id="confirmar_pass" name="confirmar_pass" placeholder="Confirme su nueva contraseña">
                                    <!-- Este id también permite la aparición de alertas, en este caso, el id puede indicar al usuario si las contraseñas no coinciden o si la contraseña fue cambiada con éxito: -->
                                    <div id="change2"></div>
                                    <?php

                                    ?>
                                    <br>
                                    <!-- Se crean dos inputs invisibles desde los que se guarda el correo electrónico del usuario y el cargo del mismo, esto con el objetivo de identificar, de manera específica, al usuario en cuestión: -->
                                    <input type="hidden" name="email" value="<?php echo $emailone ?>">
                                    <input type="hidden" name="cargo" value="<?php echo $cargo_recuperar ?>">
                                    <!-- Se crea un botón con la clase 'btn' de bootstrap. Dicho botón permite guardar los cambios para establecer una nueva contraseña: -->
                                    <button type="submit" name="cambio" class="btn btn-md btn-block text-center" id="enter_button">Guardar cambios
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Aquí finaliza el formulario de restauración de contraseña: -->        
</form>
<script src="js/cambio_pass.js"></script>
</body>
</html>

        <?php
        // Por otro lado, si la fecha actual es mayor que la fecha de expiración, se ejecutará entonces el siguiente código:
        }else{
            // Se le informará al usuario que el link ha expirado debido a que ha pasado 1 día desde que se solicitó:
            $error = "<div style='text-align:center; margin-top: 12em; font-size: 1.5em;'>
            <h2>El link ha expirado.</h2>
            <p>Estás intentando acceder a un enlace que fue solicitado hace más de 24 horas. Recuerda que dichos enlaces son válidos por unicamente un día.<br /><br /></p>
            </div>";
            echo $error;
        }
    }
}
// Se toma el e-mail del formulario de recuperar , junto al cargo, y el valor de 'action' que corresponde a la actualización de la contraseña al darle click al botón de 'Guardar cambios':
if (isset($_POST["email"]) &&isset($_POST["cargo"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
    // La variable '$error' deja de devolver un mensaje de error:
    $error = "";
    /*
    @var string $pass1
    @var string $pass2
    @var string $emailone
    @var string $cargo_recuperar
    @var $con

    Se definen 2 variables ('$pass1', '$pass2') las cuales tendrán los datos de los campos de contraseña nueva y de confirmar contraseña, además de permitir con normalidad, usando la función 'mysqli_real_escape_string', que la contraseña nueva sea un string con caracteres especiales:
    */
    $pass1 = mysqli_real_escape_string($con, $_POST["new"]);
    $pass2 = mysqli_real_escape_string($con, $_POST["confirmar_pass"]);
    // La contraseña digitada en el campo de nueva contraseña será guardada en la base de datos con la encriptación 'hash', usando especificamente la función 'password_hash':
    $recovery_pass_cifrado = password_hash($pass1, PASSWORD_DEFAULT, array("cost"=>12));
    // Se tiene el e-mail del usuario que solicitó el cambio de contraseña y que anteriormente fue obtenido en este archivo:
    $emailone = $_POST["email"];
    // Se tiene el cargo del usuario que solicitó el cambio de contraseña y que anteriormente fue obtenido en este archivo:
    $cargo_recuperar = $_POST["cargo"];

    // Si el cargo del usuario corresponde al de 'administrador', entonces se hará la consulta a la tabla 'tbl_administrador' de la base de datos:
    if ($cargo_recuperar = "Administrador"){
        // Se hace una consulta a la base de datos para actualizar la contraseña actual por la nueva ingresada por el usuario ('$recovery_pass_cifrado'). Esta nueva contraseña es establecida al usuario que posee el correo que se ha obtenido anteriormente junto con su cargo específico:
        mysqli_query($con, "UPDATE `tbl_administrador` SET `contrasena_administrador` = '".$recovery_pass_cifrado."' WHERE `correo_administrador`= '".$emailone."';");
        // Se hace una consulta a la base de datos para eliminar el token usado por el usuario:
        mysqli_query($con, "DELETE FROM `password_reset_temp` WHERE `email`= '".$emailone."';");
        // El usuario es redireccionado al archivo 'index.php' para ser informado, con una alerta tipo 'success' de bootstrap, de que la contraseña ha sido cambiada con éxito:
        header("location: index.php?password_recovered=true");
    }

    // Si el cargo del usuario corresponde al de 'instructor', entonces se hará la consulta a la tabla 'tbl_instructor' de la base de datos:
    if($cargo_recuperar = "Instructor"){
        // Se hace una consulta a la base de datos para actualizar la contraseña actual por la nueva ingresada por el usuario ('$recovery_pass_cifrado'). Esta nueva contraseña es establecida al usuario que posee el correo que se ha obtenido anteriormente junto con su cargo específico:
        mysqli_query($con, "UPDATE `tbl_instructor` SET `contrasena_instructor` = '".$recovery_pass_cifrado."' WHERE `correo_instructor`= '".$emailone."';");
        // Se hace una consulta a la base de datos para eliminar el token usado por el usuario:
        mysqli_query($con, "DELETE FROM `password_reset_temp` WHERE `email`= '".$emailone."';");
        // El usuario es redireccionado al archivo 'index.php' para ser informado, con una alerta tipo 'success' de bootstrap, de que la contraseña ha sido cambiada con éxito:
        header("location: index.php?password_recovered=true");
    }
    
    // Si el cargo del usuario corresponde al de 'personal administrativo', entonces se hará la consulta a la tabla 'tbl_personal_administrativo' de la base de datos:
    if($cargo_recuperar = "Personal administrativo"){
        // Se hace una consulta a la base de datos para actualizar la contraseña actual por la nueva ingresada por el usuario ('$recovery_pass_cifrado'). Esta nueva contraseña es establecida al usuario que posee el correo que se ha obtenido anteriormente junto con su cargo específico:
        mysqli_query($con, "UPDATE `tbl_personal_administrativo` SET `contrasena_administrativo` = '".$recovery_pass_cifrado."' WHERE `correo_administrativo`= '".$emailone."';");
        // Se hace una consulta a la base de datos para eliminar el token usado por el usuario:
        mysqli_query($con, "DELETE FROM `password_reset_temp` WHERE `email`= '".$emailone."';");
        // El usuario es redireccionado al archivo 'index.php' para ser informado, con una alerta tipo 'success' de bootstrap, de que la contraseña ha sido cambiada con éxito:
        header("location: index.php?password_recovered=true");
    }
}
?>