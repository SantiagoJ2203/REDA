<?php

// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include ('ACTION_conexionBD.php');

// Se verifica si los valores 'token', 'email y 'action' están ya definidos (esto viene desde el enlace que el usuario usa para restaurar su contraseña).
// Finalmente, se toma el token y se verifica si el valor definido 'action' no está vacío:
if (isset($_GET["token"]) && isset($_GET["email"])
    && isset($_GET["action"]) && ($_GET["action"] == "reset")
    && !isset($_POST["action"])) {
    // Se obtiene el token que corresponde al e-mail del usuario que solicitó el cambio de contraseña en un día y momento determinado:
    $key = $_GET["token"];
    // Se obtiene el e-mail del usuario que solicitó el cambio de contraseña:
    $emailone = $_GET["email"];
    // Se toma la fecha en la que se está abriendo el enlace de recuperación de contraseña:
    $curDate = date("Y-m-d H:i:s");
    // Se realiza una consulta a la base de datos 'reda' para verificar si el token abierto existe en la base de datos y si dicho token corresponde a un e-mail existente en la tabla:
    $query = mysqli_query($con, "SELECT * FROM `password_reset_temp` WHERE `token`='" . $key . "' and `email`='" . $emailone . "';");
    // Se toman los resultados de la consulta y se guarda en la variable '$row' para realizar un conteo de cuantos resultados existen actualmente en la tabla:
    $row = mysqli_num_rows($query);
    // En caso de no existir resultado alguno en la consulta, se ejecuta el siguiente código:
    if ($row == "") {
        // Se le avisa al usuario de que el link ha expirado o no es correcto debido a que ya lo ha usado con anterioridad:
        $error = '<h2>Link inválido</h2>
<p>El link es invalido o ha expirado. Si no copiaste bien el link del correo, o ya usaste el link (caso en el cual es desactivado),</p>
<p><a href="localhost:80/reda-master/index.php">Dé click aquí para solicitar un nuevo correo para cambiar su contraseña</a></p>';
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
<!-- Idioma en el que el archivo está compuesto el documento: -->
<html lang="es">
<head>
    <!-- Cofifiación de caracteres 'UTF-8' para evitar errores de escritura al mostrar el texto en la pantalla: -->            
    <meta charset="utf-8">
    <!-- Etiqueta 'meta viewport' para controlar la composición en los navegadores móviles: -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Archivo CSS (hoja de estilos) de la plataforma REDA: -->
    <link rel="stylesheet" type="text/css" href="css/reda_system.css">
    <!-- Kit de Font Awesome para utilizar sus iconos: -->
    <script src="https://kit.fontawesome.com/ddefb55be1.js" crossorigin="anonymous"></script>
    <!-- Archivo bootstrap para agregar los estilos css del framework: -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Título de la pestaña: -->
    <title>Recuperación de contraseña - REDA</title>
    <!-- Icono de la pestaña: -->
    <link rel="icon" href="icons/reda2.png">
</head>
<body>
<!-- Se colocan los 3 scripts que permiten que el framework Bootstrap en su versión 4.0 funcione correctamente con este documento. Desde sus estilos hasta las acciones o eventos realizados con funciones de JavaScript: -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Se usa una etiqueta '<a>' para añadir atributos que permiten que una ventana modal bootstrap no pueda ser cerrada si se da click por fuera de esta. La configuración para hacer esto se realiza en el archivo 'cambio_pass.js': -->
<a data-controls-modal="pass_recovery" data-backdrop="static" data-keyboard="false">
<!-- Se crea el formulario de restauración de contraseña con el nombre de 'form_pass': -->
<form name="form_pass" action="" method="POST">
            <!-- Se crea una ventana modal de boostrap. La misma está configurada con código JQuery (del archivo 'cambio_pass.js') para que aparezca automaticamente cada vez que carga este archivo: -->    
            <div class="modal fade" id="pass_recovery" tabindex="-1" role="dialog" aria-labelledby="c_pass" aria-hidden="true">
                <!-- Se define con la clase 'modal-dialog' que la ventana modal debe estar centrada vertical y horizontalmente: -->
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <!-- La clase 'modal-content' mantiene los elementos o el contenido que tendrá el formulario: -->
                    <div class="modal-content" id="contenido_sesion">
                        <!-- La clase 'modal-body' indica que el cuerpo del formulario empieza a mostrarse desde dicho punto: -->
                        <div class="modal-body">
                            <!-- En la zona superior del formulario se encuentran el título del formulario y una imagen llamada 'padlock.png' que indica esto: -->
                            <img src="icons/padlock.png" width="110em" id="icon_pass">
                            <p id="font" style="font-size:27px" class="font-weight-bold">Restauraión de contraseña</p>
                            <!-- Se crea el primer campo del formulario (usando la clase 'form-group' de bootstrap para indicar que el campo corresponde a un formulario), el mismo sirve para que el usuario ingrese su contraseña nueva: -->
                            <div class="form-group">
                                    <input type="password" name="new" class="form-control" id="new_pass" placeholder="Digite su nueva contraseña" style="width: 25em;  margin-left: 2em;">
                                </div>
                                <!-- Aquí se coloca un icono del sitio web 'fontawesome.com'. Al mismo se le atribuye un tooltip de bootstrap (una caja con texto) que aparece al hacer un 'hover' sobre el icono. En este caso, la información mostrada es acerca de la visualización de las contraseñas ingresadas en los campos: -->
                                <i class="fa fa-eye fa-lg" tool-tip-toggle="tooltip-pass" data-original-title="Mostrar contraseñas" id="passwords" id="show_password" style="margin-top: -1.89em; margin-right: 1.85em; float: right;"></i>
                                <!-- Un segundo icono de 'fontawesome' es colocado en el formulario, el mismo contiene también un tooltip, el cual esta vez informa al usuario sobre la seguridad de la contraseña al crear una: -->
                                <i class="fa fa-info-circle fa-lg" tool-tip-toggle="tooltip-show" data-original-title="INFORMACIÓN: Se recomienda que para crear una contraseña fuerte siga los siguientes parámetros, es decir, que la contraseña contenga: 8 carácteres, una mayúscula, una minúscula, un número y un caracter raro o especial. Por ejemplo, la contraseña 'Sena_1234' cumple con los parámetros recomendados." style="float: right; margin-right: 3.5em; margin-top: -1.9em;"></i>
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
                                <div id="change3"></div>

                                <!-- Se crea el segundo y último campo del formulario. AL igual que con el primero, posee la clase 'form-group' de bootstrap. Esta vez, este campo sirve para que el usuario confirme su contraseña nueva: -->
                                <div class="form-group">
                                    <input type="password" class="form-control" id="confirmar_pass" name="confirmar_pass" placeholder="Confirme su nueva contraseña" style="width: 25em;  margin-left: 2em;">
                                    <!-- Este id también permite la aparición de alertas, en este caso, el id puede indicar al usuario si las contraseñas no coinciden o si la contraseña fue cambiada con éxito: -->
                                    <div id="change2"></div>
                                    <?php
                                        // Si el valor definido 'success' y el valor obtenido 'success' devuelven true, se muestra otra alerta diferente a la anterior:
                                        if (isset($_GET["success"]) && $_GET["success"] == 'true') {
                                        // En este caso, la alerta bootstrap es de tipo 'success' e indica que la contraseña ha sido cambiada con éxito:
                                        echo "<div class= 'alert alert-success alert-dismissible fade show' role='alert' style='border-radius: 0; font-weight: bold;width: 87%; margin-left: 2em;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>La contraseña ha sido cambiada con éxito</div>";
                                        }
                                    ?>
                                    <br>
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
<?php
        // Por otro lado, si la fecha actual es mayor que la fecha de expiración, se ejecutará entonces el siguiente código:
        } else {
            // Se le informará al usuario que el link ha expirado debido a que ha pasado 1 día desde que se solicitó:
            $error = "<h2>El link ha expirado</h2>
<p>Estás intentando acceder a un link que fue solicitado hace más de 24 horas. Recuerda que estos códigos son válidos por unicamente un día.<br /><br /></p>";
        }
    }
    // Si el error que debe de mostrarse no se aparece en pantalla, entonces el siguiente código hará que esto pase:
    if ($error != "") {
        echo "<div class='error'>" . $error . "</div><br />";
    }
}

// Se toma el e-mail del formulario de recuperar contraseña y el valor de 'action' que corresponde a la actualización de la contraseña al darle click al botón de 'Guardar cambios':
if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
    // La variable '$error' deja de devolver un mensaje de error:
    $error = "";
    // Se definen 2 variables ('$pass1', '$pass2') las cuales tendrán los datos de los campos de contraseña nueva y de confirmar contraseña, además de permitir con normalidad, usando la función 'mysqli_real_escape_string', que la contraseña nueva sea un string con caracteres especiales:
    $pass1 = mysqli_real_escape_string($con, $_POST["new"]);
    $pass2 = mysqli_real_escape_string($con, $_POST["confirmar_pass"]);
    // Se tiene el e-mail del usuario que solicitó el cambio de contraseña y que anteriormente fue obtenido en este archivo:
    $emailone = $_POST["email"];
    // Se toma la fecha en la que se está realizando el cambio de contraseña, esto con el objetivo de eliminar el token correcto de la base de datos:
    $curDate = date("Y-m-d H:i:s");
    // Si las dos contraseñas ingresadas en los campos no son coincidentes entre sí, se ejecuta entonces el siguiente código:
    if ($pass1 != $pass2) {
        // Se le informa al usuario con una alerta de que ambas contraseñas no son coincidentes:
        echo "<p>Las contraseñas no coinciden.<br /><br /></p>";
    }
    // Si el error que debe de mostrarse no se aparece en pantalla, entonces el siguiente código hará que esto pase:
    if ($error != "") {
        echo "<div class='error'>" . $error . "</div><br />";
      // De no ser necesario que un error se muestre, el siguiente código es ejecutado:
    } else {
        // La contraseña digitada en el campo de nueva contraseña será guardada en la base de datos con la encriptación 'hash', usando especificamente la función 'password_hash':
        $pass1 = md5($pass1);
        // Se hace una consulta a la base de datos para actualizar la contraseña actual por la nueva ingresada por el usuario ('$pass1'):
        mysqli_query($con,
            "UPDATE `tbl_administrador` SET `contrasena_administrador`='" . $pass1 . "', `trn_date`='" . $curDate . "' WHERE `email`='" . $emailone . "';");
        // Se elimina automaticamente el token de la base de datos al haber sido usado por el usuario:
        mysqli_query($con, "DELETE FROM `password_reset_temp` WHERE `email`='" . $emailone . "';");
        // El usuario es redireccionado al archivo 'ACTION_restaurar_pass.php' para ser informado con una alerta tipo 'success' de bootstrap de que la contraseña ha sido cambiada con éxito:
        header("location: ACTION_restaurar_pass.php?success=true");
    }
}
?>
<!-- Se añade el uso del archivo 'cambio_pass.js' para permitir la aparición de alertas bootstrap en los casos donde sucedan cambios o anomalías en el formulario: -->
<script src="js/cambio_pass.js"></script>
</body>
</html>