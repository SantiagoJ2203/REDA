<?php

// Se inicia o reanuda una sesión en caso de que un usuario ya haya ingresado al sistema por medio del log in o inicio de sesión:
session_start();

// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include 'ACTION_conexionBD.php';

// Se verifica con 'isset' si la sesión con el cargo de administrador existe o está siendo utilizada en el sistema:
if (isset($_SESSION['administrador'])) {

    ?>

<!DOCTYPE html>
<!-- Idioma en el que el archivo está compuesto: -->
<head lang="es">
    <!-- Codifiación de caracteres 'UTF-8' para evitar errores de escritura al mostrar el texto en la pantalla: --> 
    <meta charset="utf-8">
    <!-- Uso de la etiqueta meta viewport para mostrar los elementos de manera responsive u ordenada dependiendo del tamaño de la pantalla del dispositivo: -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Título de la pestaña: -->
    <title>Registro de usuario - REDA</title>
    <!-- Icono de la pestaña: -->
    <link rel="icon" href="icons/reda2.png">
    <!-- Archivo bootstrap para agregar los estilos css del framework: -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Kit de Font Awesome para utilizar sus iconos: -->
    <script src="https://kit.fontawesome.com/ddefb55be1.js" crossorigin="anonymous"></script>
    <!-- Archivo CSS (hoja de estilos) de la vista en cuestión: -->
    <link rel="stylesheet" type="text/css" href="css/sign_up.css">
</head>

<body>
<!-- Se colocan los 3 scripts que permiten que el framework Bootstrap en su versión 4.0 funcione correctamente con este documento. Desde sus estilos hasta las acciones o eventos realizados con funciones de JavaScript: -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Se crea un contenedor para los elementos que se mostrarán en la pantalla: -->
<div class="container">
        <!-- Se define que una ventana modal Bootstrap será mostrada y se asigna el tamaño que tendrá dicha ventana de la vista: -->
        <div class="modal-dialog modal-lg">
            <!-- Se indica que se empezará a añadir contenido a la ventana modal: -->
            <div class="modal-content">
                <!-- Se indica que el cuerpo de la ventana modal será usado: -->
                <div class="modal-body">
                    <!-- Se añade un icono de Font Awesome con la etiqueta '<i>', y se contiene dicha etiqueta dentro de otra llamada '<span>', la cual contiene una clase que permite controlar más especificamente los estilos del icono: -->
                    <span class="user_plus_icon"><i class="fas fa-user-plus fa-6x"></i></span>
                    <!-- Se añade una etiqueta '<p>', la cual contiene el título principal de la ventana modal y un identificador y una clase desde las que se controlan los estilos del mismo: -->
                    <p id="font" class="display-4 font-weight-bold">Registro</p>
                    <!-- Se crea el formulario desde el que se enviarán los datos para registrar a un nuevo usuario. El mismo contiene su nombre, el archivo que ejecutará al ser enviado, el método con el que serán recibidos los datos y dos eventos de JavaScript con un par de funciones; estas últimas sirven para validar los campos del formulario: -->
                    <form name="form_registro" action="ACTION_sign_up.php" method="POST" oninput="return validar_registro()" onsubmit="return registro_enviado() && validar_registro();">

                        <!-- Se indica, con una clase Bootstrap, que el elemento a añadir hace para de un formulario:-->
                        <div class="form-group">
                            <!-- Se crea el input o campo en el que se digitará el primer nombre del usuario. El mismo cuenta con el tipo de dato respectivo, el nombre del campo y dos últimos atributos que permiten mostrar un tooltip, o caja con texto, que muestra información de interés al usuario: -->
                            <input type="text" name="nombre1" class="form-control" id="nombre1" aria-describedby="emailHelp"
                                placeholder="Primer nombre *" tool-tip-toggle="tooltip-required" data-original-title="Este campo es obligatorio">
                            <!-- Se añade una etiqueta '<div>' con un identificador dentro, este permite mostrar las alertas que vienen desde el archivo 'validacion_registro.js' y que son referentes a las validaciones del campo de primer nombre: -->
                            <div id="alerta"></div>
                        </div>

                        <!-- Se indica, con una clase Bootstrap, que el elemento a añadir hace para de un formulario:-->
                        <div class="form-group">
                            <!-- Se crea el input o campo en el que se digitará el segundo nombre del usuario. El mismo cuenta con el tipo de dato respectivo y el nombre del campo: -->
                            <input type="text" name="nombre2" class="form-control" id="nombre2" aria-describedby="emailHelp"
                                placeholder="Segundo nombre">
                            <!-- Se añade una etiqueta '<div>' con un identificador dentro, este permite mostrar las alertas que vienen desde el archivo 'validacion_registro.js' y que son referentes a las validaciones del campo de segundo nombre: -->
                            <div id="alerta9"></div>
                        </div>

                        <!-- Se indica, con una clase Bootstrap, que el elemento a añadir hace para de un formulario:-->
                        <div class="form-group">
                            <!-- Se crea el input o campo en el que se digitará el primer apellido del usuario. El mismo cuenta con el tipo de dato respectivo, el nombre del campo y dos últimos atributos que permiten mostrar un tooltip, o caja con texto, que muestra información de interés al usuario: -->
                            <input type="text" name="apellido1" class="form-control" id="apellido1" placeholder="Primer apellido *" tool-tip-toggle="tooltip-required" data-original-title="Este campo es obligatorio">
                            <!-- Se añade una etiqueta '<div>' con un identificador dentro, este permite mostrar las alertas que vienen desde el archivo 'validacion_registro.js' y que son referentes a las validaciones del campo de primer apellido: -->
                            <div id="alerta2"></div>
                        </div>

                        <!-- Se indica, con una clase Bootstrap, que el elemento a añadir hace para de un formulario: -->
                        <div class="form-group">
                            <!-- Se crea el input o campo en el que se digitará el segundo apellido del usuario. El mismo cuenta con el tipo de dato respectivo y el nombre del campo: -->
                            <input type="text" name="apellido2" class="form-control" id="apellido2" placeholder="Segundo apellido">
                            <!-- Se añade una etiqueta '<div>' con un identificador dentro, este permite mostrar las alertas que vienen desde el archivo 'validacion_registro.js' y que son referentes a las validaciones del campo de segundo apellido: -->
                            <div id="alerta8"></div>
                        </div>

                        <!-- Se indica, con una clase Bootstrap, que el elemento a añadir hace para de un formulario: -->
                        <div class="form-group">
                            <!-- Se crea el input o campo en el que se digitará el número de documento del usuario. El mismo cuenta con el tipo de dato respectivo, el nombre del campo y dos últimos atributos que permiten mostrar un tooltip, o caja con texto, que muestra información de interés al usuario: -->
                            <input type="text" name="documento" class="form-control" id="documento" aria-describedby="emailHelp" placeholder="Número de documento *" tool-tip-toggle="tooltip-required" data-original-title="Este campo es obligatorio">
                            <!-- Se añade una etiqueta '<div>' con un identificador dentro, este permite mostrar las alertas que vienen desde el archivo 'validacion_registro.js' y que son referentes a las validaciones del campo de número de documento: -->
                            <div id="alerta3"></div>
                        </div>

                        <!-- Se indica, con una clase Bootstrap, que el elemento a añadir hace para de un formulario: -->
                        <div class="form-group">
                            <!-- Se crea el input o campo en el que se digitará el correo electrónico del usuario. El mismo cuenta con el tipo de dato respectivo, el nombre del campo y dos últimos atributos que permiten mostrar un tooltip, o caja con texto, que muestra información de interés al usuario: -->
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Correo electrónico *" tool-tip-toggle="tooltip-required" data-original-title="Este campo es obligatorio">
                                <!-- Se añade un icono de Font Awesome que permite indicar al usuario, al hacer hover sobre el mismo, que el correo electrónico debe funcionar con el servidor de Gmail: -->
                                <span class="mail_icon">
                                    <i class="fa fa-envelope fa-lg" tool-tip-toggle="tooltip-email" data-original-title="Se requiere que el correo electrónico funcione con el servidor de Gmail, para así poder realizar la recuperación de la contraseña en caso de ser necesario. Por ejemplo, el correo 'example1@gmail.com' cumple con lo requerido."></i>
                                </span>
                                <!-- Se añade una etiqueta '<div>' con un identificador dentro, este permite mostrar las alertas que vienen desde el archivo 'validacion_registro.js' y que son referentes a las validaciones del campo de correo electrónico: -->
                                <div id="alerta4"></div>
                        </div>

                        <!-- Se indica, con una clase Bootstrap, que el elemento a añadir hace para de un formulario: -->
                        <div class="form-group">
                            <!-- Se crea un 'badge' o insignia de Bootstrap, la cual muestra un título dentro de un contenedor pequeño: -->
                            <span id="perfil" class="badge font-weight-bold">Cargo *</span>
                            <!-- Se añade una etiqueta '<select>', la misma contiene las opciones para escoger el cargo que poseerá el nuevo usuario, así como una caja con texto informativa que es diferente a las demás ya mencionadas: -->
                            <select name="cargo" class="form-control" tool-tip-toggle="tooltip-required" data-original-title="Escoja el cargo de acuerdo a la funcionalidad del usuario">
                                <!-- Cargos disponibles en el formulario: -->
                                <option>Instructor</option>
                                <option>Personal administrativo</option>
                                <option>Administrador</option>
                            </select>
                        </div>

                        <!-- Se indica, con una clase Bootstrap, que el elemento a añadir hace para de un formulario: -->
                        <div class="form-group">
                            <!-- Se crea el input o campo en el que se digitará la contraseña del usuario. El mismo cuenta con el tipo de dato respectivo, el nombre del campo y dos últimos atributos que permiten mostrar un tooltip, o caja con texto, que muestra información de interés al usuario: -->
                            <input type="password" name="contraseña" class="form-control" id="contraseña"
                                aria-describedby="emailHelp" placeholder="Contraseña *" tool-tip-toggle="tooltip-required" data-original-title="Este campo es obligatorio">
                            <!-- Se añade un icono de Font Awesome que, al hacer un 'hover' sobre el mismo, muestra una caja con texto que da información acerca de la contraseña al usuario -->
                            <span class="info_icon">
                                <i class="fa fa-info-circle fa-lg" tool-tip-toggle="tooltip-show" data-original-title="INFORMACIÓN: Por cuestiones de seguridad, la contraseña debe contener como mínimo: 8 carácteres, una mayúscula, una minúscula, un número y un caracter especial o raro. Por ejemplo, la contraseña 'Sena_1234' cumple con los parámetros requeridos."></i>
                            </span>
                            <!-- Se añade código JavaScript para los 'tooltips' o cajas con texto informativas: -->
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
                                });
                                // Aquí termina el código de la función JQuery.
                            </script>

                            <!-- Se añade un icono de Font Awesome dentro de una clase para controlar sus estilos de manera más específica. Este icono indica, al hacer un 'hover' sobre él, que haciendo clic sobre el mismo se pueden visualizar las contraseñas ingresadas en los campos: -->
                            <span class="show_icon">
                                <i class="fa fa-eye fa-lg show" tool-tip-toggle="tooltip-pass" data-original-title="Mostrar contraseñas" id="show_password"></i>
                            </span>
                            <!-- Se añade una etiqueta '<div>' con un identificador dentro, este permite mostrar las alertas que vienen desde el archivo 'validacion_registro.js' y que son referentes a las validaciones del campo de contraseña: -->
                            <div id="alerta5"></div>
                        </div>

                        <!-- Se indica, con una clase Bootstrap, que el elemento a añadir hace para de un formulario: -->
                        <div class="form-group">
                            <!-- Se crea el input o campo en el que se digitará la confirmación de la contraseña del usuario. El mismo cuenta con el tipo de dato respectivo, el nombre del campo y dos últimos atributos que permiten mostrar un tooltip, o caja con texto, que muestra información de interés al usuario: -->
                            <input type="password" class="form-control" id="confirmar_contraseña" aria-describedby="emailHelp" placeholder="Confirmar contraseña *" tool-tip-toggle="tooltip-required" data-original-title="Este campo es obligatorio">
                            <!-- Se añade una etiqueta '<div>' con un identificador dentro, este permite mostrar las alertas que vienen desde el archivo 'validacion_registro.js' y que son referentes a las validaciones del campo de confirmar contraseña: -->
                            <div id="alerta6"></div>

                            <!-- Se usa código PHP para validar si el registro fue realizado con éxito o si, por el contrario, existen inconvenientes a la hora de tratar de hacerlo: -->
                            <?php
                            // Se verifica si el valor 'new_user' está definido y se obtiene si el valor 'new_user' ubicado en el archivo 'ACTION_sign_up.php' devuelve true: 
                            if (isset($_GET["new_user"]) && $_GET["new_user"] == 'true') {
                                    // En caso de ser así, se insertará código HTML en este archivo para realizar la aparición de una alerta tipo 'success' de bootstrap, la cual aparecerá abajo del campo de confirmar contraseña. Esta alerta indica el registro exitoso de un nuevo usuario en el sistema:
                                    echo "<div class= 'alert alert-success alert-dismissible fade show last_alerts' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>Registro de usuario exitoso</div>";
                                }
                                // Se verifica si el valor 'double' está definido y se obtiene si el valor 'double' ubicado en el archivo 'ACTION_sign_up.php' devuelve true:  
                                if (isset($_GET["double"]) && $_GET["double"] == 'true') {
                                    // En caso de ser así, la alerta, en este caso, es de tipo 'danger' e indica que tanto el número de documento y el correo electrónico ya se encuentran registrados en el sistema, y, por lo tanto, no es posible hacer el registro:
                                    echo "<div class= 'alert alert-danger alert-dismissible fade show last_alerts' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>El documento y el correo electrónico ingresados ya se encuentran en la base de datos. Por favor corrija o ingrese un documento y un correo nuevos.</div>";
                                }
                                // Se verifica si el valor 'notavailable' está definido y se obtiene si el valor 'notavailable' ubicado en el archivo 'ACTION_sign_up.php' devuelve true: 
                                if (isset($_GET["notavailable"]) && $_GET["notavailable"] == 'true') {
                                    // En caso de ser así, la alerta, en este caso, es de tipo 'danger' e indica que el número de documento ya se encuentra registrado en la base de datos, y, por lo tanto, no es posible hacer el registro:
                                    echo "<div class= 'alert alert-danger alert-dismissible fade show last_alerts' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>El documento ingresado ya se encuentra en la base de datos. Por favor corrija o ingrese uno nuevo</div>";
                                // Si el anterior condicional devuelve false, entonces se verifica si el valor 'notemail' está definido y se obtiene si el valor 'notemail' ubicado en el archivo 'ACTION_sign_up.php' devuelve true: 
                                } elseif (isset($_GET["notemail"]) && $_GET["notemail"] == 'true') {
                                    // En caso de ser así, la alerta, en este caso, es de tipo 'danger' e indica que el correo electrónico ingresado ya está registrado en la base de datos, y, por lo tanto, no es posible hacer el registro: 
                                    echo "<div class= 'alert alert-danger alert-dismissible fade show last_alerts' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>El correo electrónico ingresado ya se encuentra en la base de datos. Por favor ingrese uno nuevo</div>";
                                }
                            ?>
                        </div>

                        <!-- Se añade un salto de línea con la etiqueta '<br>': -->
                        <br>
                        <!-- Se añade, con la etiqueta '<input>', el botón que permitirá enviar el formulario una vez este se encuentre completado. Dicho botón validará el formulario al darse click en él: -->
                        <input type="submit" value="Enviar" name="send" class="btn btn-md btn-block text-center"
                            id="enter_button" onclick="validar_formulario()">
                        <!-- Se añade otro salto de línea con la etiqueta '<br>': --> 
                        <br>
                        <!-- Se indica que el footer o pie de página del archivo será usado: -->
                        <div class="modal-footer">
                            <!-- Se añade un enlace con el cual el usuario podrá volver a la vista anterior: -->
                            <p><a href="system_admin.php" id="go_back2">Volver al inicio</a></p>
                        </div>
                    </form>
                    <!-- Aquí termina la estructura del formulario. -->
                </div>
                <!-- Aquí se deja de usar el cuerpo del formulario. -->
            </div>
            <!-- Se indica que hasta aquí va el contenido de la ventana modal. -->
        </div>
        <!-- Aquí finaliza la estructura de toda la ventana modal: -->
    </div>
    <!-- Se cierra el contenedor de la vista. -->
</body>
</html>
<!-- Se añade el archivo JavaScript desde el que llegan todas las validaciones o alertas Bootstrap al formulario, esto en caso de que hayan inconsistencias a la hora de ingresar y/o enviar datos en el formulario: -->
<script src="js/validacion_registro.js"></script>

<?php
} else {
    // En caso de no haber ninguna sesión iniciada, se le redireccionará al usuario al archivo 'index.php' (página inicial) para indicarle con una alerta bootstrap que debe de iniciar sesión para usar las funcionalidades del sistema:
    header("location: index.php?failone=true");
}
?>