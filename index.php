|<?php
// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include "ACTION_conexionBD.php";
?>

<!DOCTYPE html>
<!-- Se define el lenguaje en el que estará este archivo: -->
<html lang="es">
<head>
    <!-- Se usa la definición de caracteres 'UTF-8' para evitar errores en el texto a la hora de ser mostrado: -->
    <meta charset="utf-8">
    <!-- Se hace uso de la etiqueta 'meta viewport' para adaptar todo el contenido de la página a las pantallas de los dispositivos móviles: -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Se agrega un kit otorgado por Font Awesome para utilizar sus iconos: -->
    <script src="https://kit.fontawesome.com/ddefb55be1.js" crossorigin="anonymous"></script>
    <!-- Se usa el enlace de Google Material Icons para usar sus iconos: -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- El archivo CSS para agregar los estilos definidos por Bootstrap es añadido: -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- El título de la pestaña es agregado: -->
    <title>REDA</title>
    <!-- El icono de la pestaña es agregado: -->
    <link rel="icon" href="icons/reda2.png">
    <!-- El archivo CSS que añade los estilos al archivo es agregado: -->
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
    <?php
    // Se verifica si el valor 'failone' está definido y se obtiene si el valor 'failone' ubicado en el archivo 'ACTION_validalogin.php' devuelve true:
    if (isset($_GET["failone"]) && $_GET["failone"] == 'true') {
        // De ser así, una pieza de código HTML será insertada, con una alerta bootstrap de tipo 'danger' que será mostrada al usuario, indicándole de que no puede usar las funcionalidades del sistema ya que no ha iniciado sesión: 
        echo "<div class= 'alert alert-danger alert-dismissible fade show' role='alert' style='border-radius: 0; text-align: center; font-weight: bold; width:100%;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>Debes iniciar sesión para acceder a las funcionalidades del sistema.</div>";
    // Si el valor anterior devuelve false, entonces se verifica y obtiene el valor 'sent', que, en caso de ser true, mostrará el resultado del siguiente código:
    }elseif (isset($_GET["sent"]) && $_GET["sent"] == 'true') {
        // En este segundo caso, la alerta será de tipo 'success' y estará relacionada con el envío del correo de recuperación de contraseña, indicando que el mismo se ha enviado con éxito al e-mail del usuario en cuestión: 
        echo "<div class= 'alert alert-success alert-dismissible fade show' role='alert' style='border-radius: 0; text-align: center; font-weight: bold; width:100%;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>Un correo electrónico ha sido enviado a su bandeja de entrada, el mismo contiene las instrucciones para recuperar su contraseña.</div>";
    // Por otro lado, si ninguno de los dos valores mencionados anteriormente devuelve true, entonces se verifica y se obtiene si el valor 'notuser' sí lo hace:
    }elseif (isset($_GET["notuser"]) && $_GET["notuser"] == 'true') {
        // En un penúltimo caso, si lo anterior devuelve true, la alerta ahora será de tipo 'danger' e indicará al usuario de que el e-mail ingresado para recuperar la contraseña no existe, y, por lo tanto, no puede ser enviado el correo de recuperación:
        echo "<div class= 'alert alert-danger alert-dismissible fade show' role='alert' style='border-radius: 0; text-align: center; font-weight: bold; width:100%;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>Ningún usuario se encuentra registrado en el sistema con ese correo electrónico o con ese cargo.</div>";
    // Por último, si ninguno de los 3 valores ya mencionados devuelve true, entonces el valor 'wrong' sí que debe de devolverlo:
    }elseif (isset($_GET["wrong"]) && $_GET["wrong"] == 'true') {
        // Esta última alerta, de tipo 'danger' también, indica que el e-mail ingresado para recuperar la contraseña no cumple con la estructura de un e-mail convencional, por lo cual el correo no puede ser enviado tampoco:
        echo "<div class= 'alert alert-danger alert-dismissible fade show' role='alert' style='border-radius: 0; text-align: center; font-weight: bold; width:100%;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>El correo electrónico ingresado es inválido, por favor ingrese uno que exista y que tenga la estructura de un correo electrónico convencional.</div>";
    // Esta alerta posee relación con el formulario de recuperación de contraseña. Si el valor definido 'password_recovered' y el valor obtenido 'password_recovered' devuelven true, se muestra otra alerta diferente a la anterior:
    }elseif(isset($_GET["password_recovered"]) && $_GET["password_recovered"] == 'true'){
        // En este caso, la alerta bootstrap es de tipo 'success' e indica que la contraseña ha sido recuperada con éxito:
        echo "<div class= 'alert alert-success alert-dismissible fade show' role='alert' style='border-radius: 0; text-align: center; font-weight: bold; width:100%;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>Su contraseña ha sido recuperada con éxito. Ahora puede iniciar sesión con su nueva contraseña establecida.</div>";
    }      
    ?>

<!-- Se colocan los 3 scripts que permiten que el framework Bootstrap en su versión 4.0 funcione correctamente con este documento. Desde sus estilos hasta las acciones o eventos realizados con funciones de JavaScript: -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Se crea un contenedor fluido de Bootstrap que adapta su tamaño automaticamente a la resolución de la pantalla: -->
    <div class="container-fluid" id="header">
        <!-- Se crea una barra de navegación que ocupa todo el ancho del contenedor: -->
        <nav class="navbar navbar-expand-sm navbar-light">
            <!-- Se usa la clase 'navbar-collapse' para beneficiar el comportamiento de la barra de navegación al mostrarse en dispositivos con diferentes resoluciones de pantalla: -->
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <!-- Se asigna, en este caso, el logo del sistema REDA como elemento principal de la barra de navegación: -->
                    <li class="nav-item active reda_image">
                        <img src="icons/reda2.png" alt="">
                    </li>
                    <!-- Se muestra un texto con el nombre del sistema en cuestión, este texto cuenta con un espaciamiento interno al usar la utilidad espaciadora de Bootstrap 'py':  -->
                    <li class="nav-item py-4">
                        <h3 id="title"> Registro Digital del Aprendiz</h3>
                    </li>
                </ul>
                <!-- Se añade una etiqueta '<span>', la cual contiene una clase Bootstrap que alínea al centro todos los elementos que se encuentren dentro de dicha etiqueta. Dicha acción ocurre cada vez que la ventana del navegador cambia de tamaño: -->
                <span class="navbar-text d-flex justify-content-center">
                    <!-- Se añade la etiqueta '<ol>' para añadir una lista ordenada: -->
                    <ol>
                        <!-- Se añade la etiqueta '<li>' para agregar un elemento de lista: -->
                        <li>
        <!-- Se crea un nuevo contenedor, el mismo contiene en su espacio el botón que indica inicio de sesión: -->
        <div class="container">
            <!-- Se crea el botón que permite abrir el formulario de iniciar sesión, el cual se encuentra dentro de una ventana modal de Bootstrap: -->
            <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#start_login" id="boton2">Iniciar sesión</button>
            <!-- Se crea el formulario. El mismo contiene su respectivo nombre, su acción a ejecutar, su método de envío de datos y dos eventos JavaScript, del archivo 'validacion_login.js', para validar los campos del formulario: -->
            <form name="form_login" action="ACTION_validalogin.php" method="POST" oninput="return validar_login()" onsubmit="return enviado_login() && validar_login();">
                <!-- Se indica que la ventana modal será de tipo 'fade': -->
                <div class="modal fade" id="start_login">
                    <!-- Se añade la clase 'modal-dialog' para permitir que la ventana sea mostrada, y se añade la clase 'modal-md' para otorgarle un tamaño específico a la ventana: -->
                    <div class="modal-dialog modal-md">
                        <!-- Se indica, por medio de la clase 'modal-content', que desde dicha etiqueta empezarán a añadirse elementos a la ventana modal: -->
                        <div class="modal-content" id="contenido_sesion">
                            <!-- Se añade la clase 'modal-body', la cual permite iniciar el cuerpo de la ventana modal: -->
                            <div class="modal-body">
                                <!-- Se crea el botón con signo de 'x', el cual permite cerrar la ventana cuantas veces sean necesarias: -->
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <!-- Se incluye un icono de Font Awesome, dicho icono hace alusión a la función del formulario: -->
                                    <div class="id_icon">
                                        <i class='far fa-id-badge fa-9x'></i>
                                    </div>
                                    <!-- Se añade el título principal de la ventana modal para ser mostrado en pantalla. 'Display-4' específica el tamaño del texto, mientras que 'font-weight-bold' específica el grosor de la letra: -->
                                    <p id="font" class="display-4 font-weight-bold">Inicio de sesión</p>
                    <!-- Se añade un 'div', el cual posee una clase que indica que el siguiente elemento hace parte de un formulario: -->
                    <div class="form-group">
                        <!-- Se añade un span, el cual contiene una clase Bootstrap que permite añadir un 'badge' o insignia, que muestra un pequeño título, en este caso, arriba del campo de selección de cargo: -->
                        <span id="perfil" class="badge font-weight-bold">Cargo</span>
                        <!-- Se crea el campo de selección para que el usuario seleccione su cargo: -->
                        <select name="cargo" class="form-control">
                            <!-- Opción de cargo instructor: -->
                            <option>Instructor</option>
                            <!-- Opción de cargo personal administrativo: -->
                            <option>Personal administrativo</option>
                            <!-- Opción de cargo administrador: -->
                            <option>Administrador</option>
                        </select>
                    </div>
                    <!-- Aquí termina el cargo para el campo de selección. -->

                    <!-- Se añade un nuevo 'div', que indica también que el siguiente elemento hace parte de un formulario: -->
                    <div class="form-group ">
                        <!-- El siguiente campo de entrada está hecho para que el usuario introduzca su número de documento respectivo: -->
                        <input type="text" name="documento" class="form-control" id="documento" aria-describedby="emailHelp" placeholder="Número de documento">
                        <!-- Se añade un 'div' con el identificador 'aviso', el cual está programado para hacer aparecer un mensaje de alerta, en caso de que hayan inconsistencias en el campo: -->
                        <div id="aviso"></div>
                    </div>
                    <!-- Aquí termina el código para el campo de número de documento. -->

                    <!-- Se añade un tercer 'div' que indica, de igual manera que con los anteriores, que el siguiente elemento hace parte de un formulario: -->
                        <div class="form-group">
                            <!-- El siguiente campo de entrada está hecho para que el usuario ingrese la contraseña de su cuenta: -->
                            <input type="password" name="contraseña" class="form-control" id="contraseña" placeholder="Contraseña">
                            <!-- Se añade otro icono de Font Awesome, este permite mostrar y ocultar las contraseñas en caso de requerirlo. Lo anterior sucede al hacer clic sobre el icono: -->
                            <div class="show_icon">
                                <!-- Además, se añaden dos atributos, 'tool-tip-toggle' y 'data-original-title', para permitir que, al hacer un 'hover' sobre el icono, un mensaje indicativo sea mostrado al usuario: -->
                                <i class="fa fa-eye fa-lg" id="show_password" id="contraseña" tool-tip-toggle="tooltip-pass" data-original-title="Mostrar contraseñas"></i>
                            </div>
                            <!-- El siguiente código JavaScript, permite que el mensaje programado para el icono de mostrar y ocultar contraseña, pueda ser ejecutado correctamente: -->
                            <script type="text/javascript">
                                // Cuando el documento se encuentra completamente cargado, la función puede ser usada sin problema alguno:
                                $(document).ready(function(){
                                    // Se indica por medio del valor del atributo 'tool-tip-toggle', que un 'tooltip' (caja con texto) aparecerá:
                                    $('[tool-tip-toggle="tooltip-pass"]').tooltip({
                                        // Se posiciona el 'tooltip' al lado derecho del icono:
                                        placement : 'right'
                                    });
                                });
                                // Aquí finaliza la función.
                            </script>
                            <!-- Se crea otro 'div' que posee un identificador que mostrará una alerta de Bootstrap, en caso de que hayan inconsistencias dentro del campo de contraseña: -->
                            <div id="aviso2"></div>
                            <!-- El siguiente código PHP, muestra una alerta Bootstrap en caso de que el documento o la contraseña sean incorrectos a la hora de tratar de acceder al sistema: -->
                            <?php
                            // Se verifica si el valor 'fallo' está definido y se obtiene si el valor 'fallo' ubicado en el archivo 'ACTION_validalogin.php' devuelve true: 
                            if (isset($_GET["fallo"]) && $_GET["fallo"] == 'true') {
                                /* En caso de que lo anterior sea cierto, una alerta bootstrap de tipo 'danger' aparecerá abajo del campo de contraseña del formulario de iniciar sesión, el mismo indica que el inicio de sesión no ha sido posible debido a que no se ha encontrado en la base de datos a un usuario o contraseña con las características ingresadas en los campos: */
                                echo "<div class= 'alert alert-danger alert-dismissible fade show nouser' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>Usuario o contraseña incorrecta o no coincidente con el cargo seleccionado</div>";
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
                        <!-- Aquí finaliza el código del campo de contraseña: -->

                    <!-- Se crea un cuardo 'div' para el formulario, el cual indica, nuevamente, que el siguiente elemento hace parte de un formulario: -->
                    <div class="form-group">
                        <!-- Se añade un enlace que abre una ventana modal, dicha ventana es la que permite enviar un correo de recuperación de contraseña al usuario: -->
                        <a href="Recuperaciondecontraseña" data-toggle="modal" data-target="#recuperacion_modal" id="recovery">¿Olvidaste tu contraseña?</a>
                    </div>
                    <!-- Aquí finaliza el código del enlace. -->

                    <!-- Se crea un botón, el mismo permite enviar los datos ingresados en el formulario, y así verificar si todos los datos son correctos: -->
                    <button type="submit" name="ingresar" class="btn btn-md btn-block text-center" id="enter_button">Ingresar</button>
                <!-- Se añade un salto de línea -->
                <br>
            </form>
            <!-- Aquí termina la estructura del formulario. -->

            <!-- Se crea el formulario que permite al usuario enviar, a su correo electrónico, un correo de recuperación de contraseña. Este formulario, al igual que el anterior, posee un nombre, una acción a ejecutar, un método de envío y dos eventos JavaScript para verificar el formulario: -->
            <form name="recuperar_pass" action="ACTION_recuperarcon.php" method="post" oninput="return enviado_email()" onsubmit="return enviado_email()">
                <!-- Se indica que la ventana modal será de tipo 'fade': -->
                <div class="modal fade" id="recuperacion_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <!-- Se añade el código para que la ventana sea mostrada y para que la misma aparezca centrada en la pantalla: -->
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <!-- Se indica que el contenido de la ventana modal empezará a ser añadido: -->
                        <div class="modal-content">
                            <!-- Se crea el cuerpo de la ventana modal, y se añade, además, la clase 'modal_recovery' para añadir estilos CSS a la misma: -->
                            <div class="modal-body modal_recovery">
                                <!-- Se crea el botón que permite cerrar la ventana modal cuantas veces se requiera: -->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <!-- Se añade el título principal que poseerá la ventana: -->
                                    <h2>Recuperación de contraseña</h2>
                                    <!-- Se añade un texto indicativo en negrita:-->
                                    <label for="email"><b>Seleccione su cargo e introduzca su correo electrónico:</b></label>
                                    <!-- Se añade un salto de línea: -->
                                    <br>
                                    <!-- Se indica que el siguiente elemento hará parte de un formulario, y se indica también que todo dentro de este se halle alineado al centro: -->
                                    <div class="form-group text-center d-flex justify-content-center">
                                        <!-- Se añade un campo de selección para escoger el cargo al que pertenece el correo electrónico: -->
                                        <select name="cargo_recuperar" class="form-control" id="cargo_recuperar">
                                            <!-- Opción de cargo instructor: -->
                                            <option>Instructor</option>
                                            <!-- Opción de cargo personal administrativo: -->
                                            <option>Personal administrativo</option>
                                            <!-- Opción de cargo administrador: -->
                                            <option>Administrador</option>
                                        </select>
                                    </div>
                                    <!-- Aquí finaliza el código del campo de selección. -->

                                    <!-- Se añade un nuevo campo de entrada, en el mismo será digitado el correo electrónico del usuario que recuperará su contraseña: -->
                                    <input type="email" name="email" id="input_email">
                                    <!-- Se añade un 'div' con un identificador. Dicho id, permite mostrar una alerta Bootstrap en caso de que el campo de correo electrónico se encuentre vacío: -->
                                    <div id="warning3"></div>
                                    <!-- Se añade un campo que permite enviar la información digitada en los dos campos de entrada y selección anteriores: -->
                                    <input type="submit" value="Enviar" id="enter_button_recovery">
                                    <!-- Se añaden dos saltos de línea: -->
                                    <br><br>
                                <!-- Se añade un texto informativo al usuario acerca del uso del correo de recuperación de contraseña: -->
                                <p class="recovery_text">Se le hará envío de un enlace con el cual podrá definir una nueva contraseña para su cuenta.</p>
                            </div>
                            <!-- Aquí finaliza el cuerpo de la ventana modal. -->
                        </div>
                        <!-- Aquí finaliza el contenido mostrado por la ventana modal. -->
                    </div>
                    <!-- Aquí termina la estructura de la ventana modal. -->
                </div>
            </form>
            <!-- Aquí acaba la estructura de este segundo formulario. -->
        </div>
    </div>
    </li>
    </ol>
    </span>
    </div>
    </nav>
    <!-- Aquí acaba la estructura de la barra de navegación. -->
    </div>
    <!-- Aquí finaliza el contenedor con el identificador 'header'. -->
    
     <!-- Se crea un cuardo 'div' para el carrusel, el cual mostrara una lista de elementos -->
    <div id="demo" class="carousel slide" data-ride="carousel">
     <!--En primer lugar se prepara una lista de elementos que se quiere mostrar-->
        <ul class="carousel-indicators">
         <!--Pondremos la cantidad de diapositivas que se quiere mostrar , se pondran en un orden de 0 hasta 
         el que se desee, la clase .active debe agregarse a una de las diapositivas. De lo contrario, el carrusel no será visible.
         En este caso se muestra la diapositiva 0 y esta tiene la clase active-->
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <!-- Aca tendremos la diapositiva número 1-->
            <li data-target="#demo" data-slide-to="1"></li>
            <!-- Aca tendremos la diapositiva número 2-->
            <li data-target="#demo" data-slide-to="2"></li>
            <!-- Aca tendremos la diapositiva número 3-->
            <li data-target="#demo" data-slide-to="3"></li>
            <!-- Aca el </ul> indica que se finaliza el listado de los elementos que se desea mostrar-->
        </ul>
        
        <!--Las diapositivas se especifican en un <div> con clase .carousel-inner.-->
        <div class="carousel-inner">
        <!--El contenido de cada diapositiva se define en un <div> con clase .item. Esto puede ser texto o imágenes y la clase .active debe 
        agregarse a una de las diapositivas. De lo contrario, el carrusel no será visible.-->
            <div class="carousel-item active">
            <!--Aca se pone la primer imagen que se mostrara en la primera diapositiva-->
                <img src="icons/salon.jpg" alt="Aula de Aprendizaje">
                <!--Aqui termina la estructura donde se pone la primera imagen.-->
            </div>
            <!--El contenido de cada diapositiva se define en un <div> con clase .item. Esto puede ser texto o imágenes-->
            <div class="carousel-item">
           <!--Aca se pone la segunda imagen que se mostrara en la siguiente diapositiva-->
                <img src="icons/paper.jpg" alt="Registro">
             <!--Aqui termina la estructura donde se pone la segunda imagen.-->
            </div>
              <!--El contenido de cada diapositiva se define en un <div> con clase .item. Esto puede ser texto o imágenes-->
            <div class="carousel-item">
            <!--Aca se pone la tercera imagen que se mostrara en la siguiente diapositiva-->
                <img src="icons/lector.jpg" alt="Huella">
            <!--Aqui termina la estructura donde se pone la tercera imagen.-->
            </div>
             <!--El contenido de cada diapositiva se define en un <div> con clase .item. Esto puede ser texto o imágenes-->
            <div class="carousel-item">
            <!--Aca se pone la cuarta imagen que se mostrara en la siguiente diapositiva-->
                <img src="icons/huella.jpg" alt="Información">
                <!--Aqui termina la estructura donde se pone la cuarta imagen.-->
            </div>
             <!--Aqui termina la estrructura donde se especifican las diapositivas .-->
        </div>
       <!-- El atributo data-slide acepta la palabra clave "prev" que es anterior, que altera
         la posición de la diapositiva  en relación con su posición actual.-->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <!--Aca se crea el icono que llevara una dirección hacia la diapositiva anterior-->
            <span class="carousel-control-prev-icon"></span>
        </a>
         <!-- El atributo data-slide acepta la palabra clave "next" que es siguiente, que altera
         la posición de la diapositiva  en relación con su posición actual.-->
        <a class="carousel-control-next" href="#demo" data-slide="next">
         <!--Aca se crea el icono que llevara una dirección hacia la diapositiva siguiente-->
            <span class="carousel-control-next-icon"></span>
        </a>
 <!--Aqui termina el cuadro </div> dentro del cual se creo el carrusel-->
    </div>
<!--Este py-3 significa que entre la trajeta y el carrusel habra un espacio grande que los separara -->
    <div class="container py-3">
    <!--Este texto estara ubicado dentro de una fila-->
        <div class="row">
        <!--El tamaño de la fila sera pequeño-->
            <div class="col-sm">
            <!--Se crea un card-body para ubicar el titulo y se justifica-->
                <div class="card-body justify-content">
                <!--Se crea un h1 con un contenedor que es donde va a estar el titulo del texto, luego se centra con un text-center y se pone 
                en negrita con </strong>-->
                    <h1 class="container text-center main_titles"><strong>¿Qué es REDA?</strong></h1>
                    <!--Se crea un <p> donde se crea una tarjeta para ubicar el texto y se pone </strong> para resaltar una parte de texto en negrita-->
                    <p class="card-text txt_first_section">REDA (por sus siglas:<strong>
                        Registro
                        Digital del Aprendiz</strong>) es un sistema construido para el CTGI ubicado en el complejo SENA de Pedregal. 
                        Su objetivo es hacer que haya más dinamismo en la toma de asistencia por medio del uso de una computadora y un lector
                        de huellas.Facilitándose así la acción tanto para instructores como para aprendices al estarse usando la huella dactilar como 
                        principal herramienta para registrar la asistencia.</p>
 <!--Se termina la estructura de la tarjeta donde esta el titulo y el parrafo-->
                </div>
                <!--Se crea una tarjeta principal, que tiene un py-3 este es un espacio grande que hay entre la tarjeta del parrafo anterior
                la tarjeta que estamos creando-->
                <div class="card-deck py-3">
                <!--Se crea una tarjeta dentro de la tarjeta principal donde se ubicaran otras tarjetas-->
                    <div class="card objectives_container">
                    <!--Se crea una tarjeta dentro de la tarjeta principal donde se piensa ubicar las tarjetas del titulo y del texto-->
                        <div class="card-body">
                        <!--Se crea una tarjeta donde se ubica el titulo-->
                            <h3 class="card-title card-footer text-center border border-dark objectives_titles">Misión</h3>
                            <!--Se crea una tarjeta dentro de la tarjeta principal donde se ubica el resto del texto-->
                            <p class="card-text txt_first_section">La misión de REDA es ser un sistema de información que permita almacenar la huella dactilar de los aprendices para su posterior uso como evidencia de la asistencia del aprendiz a clase con el uso del lector biométrico.
                            </p>
                            <!--Se termina la estructura de la tarjeta donde estaran las otras tarjetas-->
                        </div>
                        <!--Se termina la estructura de la tarjeta donde estaran las  tarjetas del titulo y parrafo-->  
                    </div>
                    
                    <!--Se crea una tarjeta dentro de la tarjeta principal donde se ubicaran otras tarjetas-->
                    <div class="card objectives_container">
                     <!--Se crea una tarjeta dentro de la tarjeta principal donde se piensa ubicar las tarjetas del titulo y del texto-->
                        <div class="card-body">
                        <!--Se crea una tarjeta donde se ubica el titulo-->
                            <h3 class="card-title card-footer text-center border border-dark objectives_titles">
                                Visión</h3>
                                 <!--Se crea una tarjeta dentro de la tarjeta principal donde se ubica el resto del texto-->
                            <p class="card-text txt_first_section">
                                La visión de REDA es ser un sistema de información que pueda ser escalable a nivel tecnológico, ofreciendo así nuevas posibilidades u opciones de uso que faciliten la tarea de tomar asistencia.
                            </p>
                            <!--Se termina la estructura de la tarjeta donde estaran las otras tarjetas-->
                        </div>
                         <!--Se termina la estructura de la tarjeta donde estaran las  tarjetas del titulo y parrafo-->
                    </div>
                   <!--Se termina la estructura de la tarjeta principal-->
                </div>
                 <!--Aca termina la estructura de  la columna-->
            </div>
           <!--Aca termna la estructura de  la fila-->
        </div>
        <!--Este py-3 significa que entre el titulo y la tarjeta anterior habra un espacio grande que los separara -->
        <div class="container py-3">
        <!--Este texto estara ubicado dentro de una fila-->
            <div class="row">
             <!--El tamaño de la fila sera pequeño-->
                <div class="col-sm">
                 <!--Aca termina la estructura de  la columna -->
                </div>
                 <!--Aca termina la estructura de  la fila-->
            </div>
             <!--Aca termina la estructura del espaciado entre la tarjeta y el titulo-->
        </div>
        <!--Se crea un contenedor y en el se centra en texto-->
        <div class="container text-center">
        <!--Aca se crea una tarjeta donde se ubica el titulo  y tiene un <strong> para resaltar el titulo-->
            <h2 class="card-title text-center main_titles"><strong>¿Qué elementos hemos utilizado?</strong> 
            </h2>
              <!--Aca se tiene una fila donde el contenido esta justificado -->
            <div class="row justify-content-center">
             <!--Aca se tiene una columna que ocupa el contenedor-->
                <div class="col-sm-5">
                <!-- Aca'mb-3' agrega un margen inferior de 3 al elemento y 'used_elements' es una clase creada para añadirle estilos al 
                elemento desde CSS -->
                    <div class="card mb-3 used_elements"> 
                           <!--es la columna dentro de las que se encuentran los iconos y el texto del contenedor-->
                            <div class="col-md-12">
                            <!--Aca se tiene una tarjeta general -->
                                <div class="card-body">
                            <!--dentro de la tarjeta principal se agrega un icono -->
                                    <i class='fas fa-laptop fa-7x'></i>
                                 <!--Aca se tiene una tarjeta dentro de la tarjeta principal donde esta ubicado el titulo del texto  -->
                                    <h4 class="card-title"><strong>Computadora</strong></h4>
                                  <!--Aca se tiene una tarjeta dentro de la tarjeta principal donde se ubica el texto -->
                                    <p class="card-text text-justify">Con el uso de una computadora el instructor puede observar los listados de ficha correspondientes a su formación y ver cual es el estado de asistencia de cada uno de los aprendices.
                                    </p>
                                <!--Aca se termina la estructura de la tarjeta donde se ubico el titulo y el texto-->
                                </div>
                                 <!--Aca se termina la estructura de la columna donde se ubico el icono y el texto del contenedor-->
                            </div>
                             <!--Aca se termina la estructura de la margen inferior de 3 al elemento-->
                        </div>
                         <!--Aca se termina la estructura de la columna del contenedor-->
                </div>
                 <!--Aca se tiene una columna que ocupa el contenedor-->
                <div class="col-sm-5">
                 <!-- Aca'mb-3' agrega un margen inferior de 3 al elemento y 'used_elements' es una clase creada para añadirle estilos al 
                elemento desde CSS -->
                    <div class="card mb-3 used_elements">
                    <!--es la columna dentro de las que se encuentran los iconos y el texto del contenedor-->
                            <div class="col-md-12">
                            <!--Aca se tiene una tarjeta general -->
                                <div class="card-body">
                                 <!--dentro de la tarjeta principal se agrega un icono -->
                                    <i class="material-icons md-48">dock</i>
                                   <!--Aca se tiene una tarjeta dentro de la tarjeta principal donde esta ubicado el titulo del texto  -->
                                    <h4 class="card-title"><strong>Lector de huellas</strong></h4>
                                    <!--Aca se tiene una tarjeta dentro de la tarjeta principal donde se ubica el texto -->
                                    <p class="card-text text-justify">Con el uso de un lector biométrico los aprendices pueden registrar su asistencia con su huella dactilar una vez esta se encuentre registrada en el sistema.</p>
                                 <!--Aca se termina la estructura de la tarjeta donde se ubico el titulo y el texto-->
                                </div>
                                 <!--Aca se termina la estructura de la columna donde se ubico el icono y el texto del contenedor-->
                            </div>
                            <!--Aca se termina la estructura de la margen inferior de 3 al elemento-->
                        </div>
                        <!--Aca se termina la estructura de la columna del contenedor-->
                    </div>
                    <!--Aca se termina la estructura de la fila donde el contenido esta justificado -->
            </div>
            <!--Aca se termina la estructura del contenedor y de centrar el texto-->
    </div>
<!--Se crea un contenedor y en el se centra en texto, en este se pone un titulo y se resalta con un </strong>-->
    <h2 class="container text-center main_titles"><strong>Beneficios de usar REDA</strong></h2>
   <!--Se crea un contenedor el cual tendra un espaciado con las tarjetas anteriores -->
    <div class="grid-container py-1">
        <div>
           <!--Se crea una tarjeta principal -->
            <div class="flip-card">
               <!--Se crea otra tarjeta donde va a estar los iconos y el texto-->
                <div class="flip-card-inner">
                   <!--Se crea otra tarjeta donde estara la parte del icono-->
                    <div class="flip-card-front">
                       <!--Se inserta un icono -->
                        <i class="fas fa-tachometer-alt fa-8x flip_dinamism_icon"></i>
                           <!--Se inserta el titulo-->
                        <h2>DINAMISMO</h2>
                           <!--Se termina la parte donde se inserto el icono y el titulo-->
                    </div>
                       <!--Se crea una tarjeta donde estara el resto del texto-->
                    <div class="flip-card-back flip_dinamism_bg">
                        <h2 class="titulos">DINAMISMO</h2>
                           <!--Se ingresa el texto y se justifica-->
                        <p class="text-justify">Con el uso de los dos objetos principales (lector y computadora) ya no es tan repetitiva la toma de asistencia. </p>
                     <!--Se termina la estructura donde se pone el resto del texto-->
                    </div>
                    <!--Se termina la estructura donde se pone el resto del texto-->
                </div>
                <!--Se termina la estructura donde pone el icono y el texto-->
            </div>
           <!--Se termina la estructura de la tarjeta principal-->
        </div>
        <div>
           <!--Se crea una tarjeta principal -->
            <div class="flip-card">
             <!--Se crea otra tarjeta donde va a estar los iconos y el texto--><!--Se crea otra tarjeta donde va a estar los iconos y el texto-->
                <div class="flip-card-inner">
                <!--Se crea otra tarjeta donde estara la parte del icono-->
                    <div class="flip-card-front">
                     <!--Se inserta un icono -->
                        <i class='fas fa-file-alt fa-8x flip_paper_icon'></i>
                         <!--Se inserta el titulo-->
                        <h3>AHORRO DE PAPEL</h3>
                        <!--Se termina la parte donde se inserto el icono y el titulo-->
                    </div>
                    <!--Se crea una tarjeta donde estara el resto del texto-->
                    <div class="flip-card-back flip_paper_bg">
                        <h2 class="titulos">AHORRO DE PAPEL</h2>
                        <!--Se ingresa el texto y se justifica-->
                        <p class="text-justify"> Ya no hace falta el uso de los formatos impresos de toma de asistencia, con REDA esto ya no es necesario. </p>
                     <!--Se termina la estructura donde se pone el resto del texto-->
                    </div>
                     <!--Se termina la estructura donde pone el icono y el texto-->
                </div>
               <!--Se termina la estructura de la tarjeta principal-->
            </div>
        </div>
        <div>
         <!--Se crea una tarjeta principal -->
            <div class="flip-card">
            <!--Se crea otra tarjeta donde va a estar los iconos y el texto-->
                <div class="flip-card-inner">
                <!--Se crea otra tarjeta donde estara la parte del icono-->
                    <div class="flip-card-front">
                    <!--Se inserta un icono -->
                        <i class='far fa-lightbulb fa-8x flip_energy_icon'></i>
                        <!--Se inserta el titulo-->
                        <h3>AHORRO DE ENERGÍA</h3>
                        <!--Se termina la parte donde se inserto el icono y el titulo-->
                    </div>
                    <!--Se crea una tarjeta donde estara el resto del texto-->
                    <div class="flip-card-back flip_energy_bg">
                        <h2 class="titulos">AHORRO DE ENERGÍA</h2>
                         <!--Se ingresa el texto y se justifica-->
                        <p class="text-justify">El uso de impresoras evita que haya un consumo innecesario de energía al no estarse utilizando más las hojas de papel para los formatos.</p>
                    <!--Se termina la estructura donde se pone el resto del texto-->
                    </div>
                    <!--Se termina la estructura donde pone el icono y el texto-->
                </div>
                <!--Se termina la estructura de la tarjeta principal-->
            </div>
        </div>
        <div>
        <!--Se crea una tarjeta principal -->
            <div class="flip-card">
            <!--Se crea otra tarjeta donde va a estar los iconos y el texto-->
                <div class="flip-card-inner">
                <!--Se crea otra tarjeta donde estara la parte del icono-->
                    <div class="flip-card-front">
                    <!--Se inserta un icono -->
                        <i class='fas fa-tint fa-8x flip_ink_icon'></i>
                        <!--Se inserta el titulo-->
                        <h2>AHORRO DE TINTA</h2>
                        <!--Se termina la parte donde se inserto el icono y el titulo-->
                    </div>
                    <!--Se crea una tarjeta donde estara el resto del texto-->
                    <div class="flip-card-back flip_ink_bg">
                        <h2 class="titulos">AHORRO DE TINTA</h2>
                        <!--Se ingresa el texto y se justifica-->
                        <p class="text-justify">Con el gasto reducido de tinta se obtiene el beneficio de usar esta para otro tipo de formatos diferentes a los de la asistencia.</p>
                      <!--Se termina la estructura donde se pone el resto del texto-->
                    </div>
                    <!--Se termina la estructura donde pone el icono y el texto-->
                </div>
                <!--Se termina la estructura de la tarjeta principal-->
            </div>
        </div>
        <div>
        <!--Se crea una tarjeta principal -->
            <div class="flip-card">
            <!--Se crea otra tarjeta donde va a estar los iconos y el texto-->
                <div class="flip-card-inner">
                <!--Se crea otra tarjeta donde estara la parte del icono-->
                    <div class="flip-card-front">
                    <!--Se inserta un icono -->
                        <i class='fas fa-bullseye fa-8x flip_simple_icon'></i>
                        <!--Se inserta el titulo-->
                        <h2>SIMPLEZA</h2>
                         <!--Se termina la parte donde se inserto el icono y el titulo-->
                    </div>
                    <!--Se crea una tarjeta donde estara el resto del texto-->
                    <div class="flip-card-back flip_simple_bg">
                        <h2 class="titulos">SIMPLEZA</h2>
                        <!--Se ingresa el texto y se justifica-->
                        <p class="text-justify">REDA es un software sin complicaciones. Se centra en lo necesario para poder llevar correctamente el manejo de la asistencia de cada uno de los aprendices. </p>
                         <!--Se termina la estructura donde se pone el resto del texto-->
                    </div>
                     <!--Se termina la estructura donde pone el icono y el texto-->
                </div>
                <!--Se termina la estructura de la tarjeta principal-->
            </div>
        </div>
        <div>
        <!--Se crea una tarjeta principal -->
            <div class="flip-card">
             <!--Se crea otra tarjeta donde va a estar los iconos y el texto-->
                <div class="flip-card-inner">
                <!--Se crea otra tarjeta donde estara la parte del icono-->
                    <div class="flip-card-front">
                    <!--Se inserta un icono -->
                        <i class='fas fa-arrow-circle-up fa-8x flip_scale_icon'></i>
                        <!--Se inserta el titulo-->
                        <h2>ESCALABILIDAD</h2>
                        <!--Se termina la parte donde se inserto el icono y el titulo-->
                    </div>
                    <!--Se crea una tarjeta donde estara el resto del texto-->
                    <div class="flip-card-back flip_scale_bg">
                        <h2 class="titulos">ESCALABILIDAD</h2>
                        <!--Se ingresa el texto y se justifica-->
                        <p class="text-justify"> Con el tiempo, REDA obtendrá mejoras que permitirán un mejor monitoreo a escala tecnológica.</p>
                       <!--Se termina la estructura donde se pone el resto del texto-->
                    </div>
                    <!--Se termina la estructura donde pone el icono y el texto-->
                </div>
                 <!--Se termina la estructura de la tarjeta principal-->
            </div>
             <!--Se termina la estructura del contenedor donde estan todas las trjetas-->
        </div>
    </div>
 <!--Se crea un contenedor y en el, el texto estara centrado -->
    <div class="container text-center">
     <!--Se pone un titulo que estara resaltado en negrita por un <strong> -->
        <h2 class="main_titles"><strong>Sobre nosotros</strong></h2><br>
         <!--Se crea una fila -->
        <div class="row">
         <!--Se crea una tarjeta general -->
            <div class="card-deck">
            <!--Se crea una tarjeta donde estara la imagen y el texto -->
            <div class="card creator">
                <!--Se agrega una imagen dentro de la tarjeta -->
                    <img class="card-img-top mx-auto d-block img_developers" src="icons/creator.png" alt="Card image cap">
                    <!--Se crea una tarjeta dentro de la tarjeta principal para el cuerpo del texto -->
                    <div class="card-body">
                    <!--Se añade el titulo y el texto y se grega un salto de linea entre ellos-->
                        <p class="card-text txt_last_section"><span><strong>Breyder González Castillo</strong></span> <br/> <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo assumenda corporis voluptates eius magnam iure eos reprehenderit deserunt ad facere
                            veniam, officia neque, at nihil ea consectetur, vero consequuntur sunt.</p>
                        </p>
                        <!--Se termina la estructura de la tarjeta del cuerpo del texto -->
                    </div>
                    <!--Se termina la estructura de la tarjeta donde estara la imagen y el texto-->
                </div>
                 <!--Se crea una tarjeta donde estara la imagen y el texto -->
                <div class="card creator">
                <!--Se agrega una imagen dentro de la tarjeta -->
                    <img class="card-img-top mx-auto d-block img_developers" src="icons/creator1.jpg" alt="Card image cap">
                    <!--Se crea una tarjeta dentro de la tarjeta principal para el cuerpo del texto -->
                    <div class="card-body">
                    <!--Se añade el titulo y el texto y se grega un salto de linea entre ellos-->
                        <p class="card-text txt_last_section"><span><strong>Camila Parra Bedoya</strong></span> <br/> <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo assumenda corporis voluptates eius magnam iure eos reprehenderit deserunt ad facere
                            veniam, officia neque, at nihil ea consectetur, vero consequuntur sunt.</p>
                        </p>
                         <!--Se termina la estructura de la tarjeta del cuerpo del texto -->
                    </div>
                     <!--Se termina la estructura de la tarjeta donde estara la imagen y el texto-->
                </div>
                 <!--Se crea una tarjeta donde estara la imagen y el texto -->
                <div class="card creator">
                <!--Se agrega una imagen dentro de la tarjeta -->
                    <img class="card-img-top mx-auto d-block img_developers" src="icons/creator2.jpg" alt="Card image cap">
                     <!--Se crea una tarjeta dentro de la tarjeta principal para el cuerpo del texto -->
                    <div class="card-body">
                     <!--Se añade el titulo y el texto y se grega un salto de linea entre ellos-->
                        <p class="card-text txt_last_section"><span><strong>Santiago Jiménez Jiménez</strong></span> <br/><p class="text-justify"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo assumenda corporis voluptates eius magnam iure eos reprehenderit deserunt ad facere
                            veniam, officia neque, at nihil ea consectetur, vero consequuntur sunt.</p>
                        <!--Se termina la estructura de la tarjeta del cuerpo del texto -->
                    </div>
                     <!--Se termina la estructura de la tarjeta donde estara la imagen y el texto-->
                </div>
                  <!--Se termina la estructura de la tarjeta principal-->
            </div>
            <!--Se termina la estructura dde la fila-->
        </div>
       <!--Se termina la estructura del contenedor donde el texto esta centrado-->
    </div>
     <!--Se empieza a crear el footer que es la parte inferior del index-->
    <footer>
     <!--Se crea un contenedor para crear el footer-->
        <div class="container-fluid index_footer">
          <!--Se crea una fila y en ella el texto estara centrado, tambien habra un espaciado grande entre los elementos anteriores y el footer-->
            <div class="row text-center py-3">
               <!--Se crea un boton que tendra un color azul y un identificador para añadir estilos del CSS-->
                <div class="col-xl-2 about_software"><span><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" 
                id="about_button">Acerca del software</button></span>
                  <!--Se termina la estructura del boton-->
                </div>
              <!--Se crea una columna que va hacer ocupada por el contenedor-->
                <div class="col-xl-1"></div>
                   
                <div class="col-xl-6 site_rights"><span>&copy; Todos los derechos reservados SENA 2020</span></div>

                <div class="col-xl-2"></div>
                <!-- Se agrega una imagen que estara ubicada en la parte derecha del footer': -->
                <div class="col-xl-1 sena_logo" class="justify-content-center"><img src="icons/logoSena.png" width="50em">
                <!-- Se termina la estructura donde se pone la imagen: -->
                </div>

            </div>

        </div>
         <!-- Se indica que la ventana modal será de tipo 'fade': -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        
            <div class="modal-dialog modal-xl" role="document">
                <!-- Se indica que el contenido de la ventana modal empezará a ser añadido: -->
                <div class="modal-content">
                 <!-- Se añade la clase 'modal-body', la cual permite iniciar el cuerpo de la ventana modal: -->
                    <div class="modal-body modal_about">
                    <!-- Se crea el botón con signo de 'x', el cual permite cerrar la ventana cuantas veces sean necesarias: -->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                        <!-- En esta parte se cra el titulo de la ventana modal -->
                        <h2 class="modal-title font-weight-bold text_one" id="exampleModalLabel">Acerca de <span class="text_two">este
                                software</span></h2><br>
                        <!--Se crea una fila la cual estara dividida por unas columnas -->
                        <div class="row">
                         <!--Se pone un col-xl-4 para organizar los espacios entre los elementos, se tienen que repartir hasta que sumen 12.
                             Ya en esta parte se suma 4 -->
                            <div class="col-xl-4">
                             <!--Se agrega un icono-->
                                <i class="fab fa-bootstrap fa-7x bootstrap_logo"></i>
                                <!--Se agrega un titulo-->
                                <h2>Bootstrap</h2>
                                 <!--Se justifica y se agrega el texto -->
                                <p class="text-justify"> Con el uso del Framework Bootstrap, se desarrolló el diseño, el cual se adapta a los colores institucionales y a la funciones del sistema.
                                </p>
                                <!--Se termina la estructura donde se deja de dividir la columna-->
                            </div>
                            <!--Se pone un col-xl-4 para organizar los espacios entre los elementos, se tienen que repartir hasta que sumen 12.
                             Ya en esta parte se suma 8 -->
                            <div class="col-xl-4">
                            <!--Se agrega un icono-->
                                <i class="fab fa-java fa-7x java_logo"></i>
                                <!--Se agrega un titulo-->
                                <h2>Java</h2>
                                <!--Se justifica y se agrega el texto -->
                                <p class="text-justify">La configuración del lector biométrico se logró con la utilización del lenguaje de programación Java, implementando las librerías propias del lector de huellas digitalPersona.
                                </p>
                              <!--Se termina la estructura donde se deja de dividir la columna-->  
                            </div>
                            <!--Se pone un col-xl-4 para organizar los espacios entre los elementos, se tienen que repartir hasta que sumen 12. 
                             Ya en esta parte se finaliza, lo cual quiere decir que con esta se suma 12-->
                            <div class="col-xl-4">
                            <!--Se agrega un icono-->
                                <i class="fab fa-php fa-7x php_logo"></i>
                                <!--Se agrega un titulo-->
                                <h3>Preprocesador de Hipertexto (PHP)</h3>
                                <!--Se justifica y se agrega el texto -->
                                <p class="text-justify">Este lenguaje de programación es el motor de esta plataforma, con el se lograron 
                                todas las funcionalidades que realiza el sistema.
                                </p>
                                <!--Se termina la estructura donde se deja de dividir las columna-->
                            </div>
                             <!--Se termina la estructura de la fila -->
                        </div>
                         <!-- Se  termina la estructura donde se permite iniciar el cuerpo de la ventana -->
                    </div>
                    <!-- Se termina la estructura qel contenido de la ventana modal fue añadido: -->
                </div>

            </div>
            <!-- Se termina la estructura donde indica que la ventana modal fue de tipo 'fade': -->
        </div>
        <!--Se cierra el footer-->
    </footer>


    </div>
    <!-- Copyright -->

    </footer>
    <!-- Footer -->

</body>
<!--Se cierra el html-->
</html>
<script src="js/validacion_login.js"></script>