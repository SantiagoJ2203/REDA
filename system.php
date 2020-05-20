<?php
// Se inicia o reanuda una sesión en caso de que un usuario ya haya ingresado al sistema por medio del log in o inicio de sesión:
session_start();

// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include 'ACTION_conexionBD.php';

// Se verifica con 'isset' si alguna de las dos sesiones para 'system.php' disponibles existen en el momento con alguno de los cargos en el sistema (instructor o personal administrativo):
if (isset($_SESSION['instructor']) || isset($_SESSION['personal'])) {
?>

<!Doctype html>
<!-- Idioma en el que el archivo está compuesto el documento: -->
<html lang="es">
<head>
    <!-- Cofifiación de caracteres 'UTF-8' para evitar errores de escritura al mostrar el texto en la pantalla: --> 
    <meta charset="utf-8">
    <!-- Título de la pestaña: -->
    <title>REDA - SISTEMA</title>
    <!-- Archivo CSS (hoja de estilos) de la plataforma REDA: -->
    <link rel="stylesheet" type="text/css" href="css/reda_system.css">
    <!-- Se coloca nuevamente el css de la plataforma para manejar el responsive (visualización apropiada en otros dispositivos) con el atributo 'media': -->
    <link rel="stylesheet" media="only screen and (max-width: 1068px)" href="css/reda_system.css">
    <!-- Archivo bootstrap para agregar los estilos css del framework: -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Icono de la pestaña: -->
    <link rel="icon" href="icons/reda4.png">
    <!-- Kit de Font Awesome para utilizar sus iconos: -->
    <script src="https://kit.fontawesome.com/ddefb55be1.js" crossorigin="anonymous"></script>
</head>

<body>
<!-- Se colocan los 3 scripts que permiten que el framework Bootstrap en su versión 4.0 funcione correctamente con este documento. Desde sus estilos hasta las acciones o eventos realizados con funciones de JavaScript: -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Se crea un contenedor que abarca todo el ancho de la pantalla: -->
    <div class="container-fluid" style="background-color: #11b6a0;">
        <!-- Se indica que los siguientes elementos que usen las columnas del contenedor Bootstrap estarán dentro de una fila cada uno: -->
        <div class="row">
            <!-- De las 12 columnas que contiene el contenedor, todas estas son usadas por el siguiente 'div': -->
            <div class="col-xl-12">
                <nav class="navbar navbar-expand-sm navbar-light menu_inicio" style="background-color: #11b6a0; border-radius: 0;">
                    <!-- Se usa la clase 'navbar-collapse' para beneficiar el comportamiento de la barra de navegación al mostrarse en dispositivos con diferentes resoluciones de pantalla: -->
                    <div class="navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            <!-- Se asigna, en este caso, el logo del sistema REDA como elemento principal de la barra de navegación: -->
                            <li class="nav-item active">
                                <img src="icons/reda2.png" class="d-inline-block align-top" alt="" id="reda_image">
                            </li>
                            <!-- Se muestra un texto con el nombre del sistema en cuestión, este texto cuenta con un espaciamiento interno al usar la utilidad espaciadora de Bootstrap 'py':  -->
                            <li class="nav-item py-4">
                                <h3 id="title"> Registro Digital del Aprendiz
                                    <div id="line"></div>
                                </h3>
                            </li>
                        </ul>
                        <!-- Se hace uso de una etiqueta 'h2' para mostrar un mensaje de bienvenido con el nombre del usuario en cuestión. -->
                        <h2 class="welcome" >Bienvenido, 
                            <!-- Para mostrar el nombre del usuario se hace uso del siguiente código PHP: -->
                            <?php
                            // Se verifica con un condicional si la sesión actual corresponde al cargo de instructor o al de personal administrativo:
                                if ($_SESSION['rol'] == 'Instructor') {
                            // Si es instructor, se trae la variable con su valor definido, la cual se encuentra en el archivo 'ACTION_validalogin.php'. Dicha variable contiene el primer nombre y el primer apellido del usuario en cuestión:
                                echo $_SESSION['nombre_instructor'];
                                } else {
                            // Si es al contrario, se mostrará el primer nombre y el primer apellido del personal administrativo que se encuentra en la sesión activa:
                                echo $_SESSION['nombre_administrativo'];
                                }
                            ?>
                        </h2>
                        <!-- Aquí finaliza mensaje de bienvenida al usuario. -->
                   </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Aquí termina el uso de esta barra de navegación. -->

<!-- Creación de una barra de navegación con Bootstrap, la misma contiene las opciones secundarias del sistema: -->
<nav class="navbar navbar-expand-md navbar-light" style="background-color: #11b6a0;  border-radius: 0;">
        <!-- Se crea un botón que permite la aparición de un icono una vez la ventana toma una resolución bastante pequeña a la predeterminada: -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <!-- Se usa la siguiente clase para hacer aparecer el icono, este sirve para activar la visibilidad de las opciones secundarias ante ciertos cambios de resolución de pantalla: -->
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Barra de navegación con opciones secundarias del sistema: -->
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
            <!-- Se añaden estilos CSS a la barra de navegación: -->
            <div style="background-color: rgba(255, 255, 255, 0.315); margin-left:4em;">
                <!-- Se indica que cada elemento estará dentro de una fila: -->
                <div class="row">
                    <!-- Se usan 3 columnas de las 12 que posee el contenedor Bootstrap: -->
                    <div class="col-xl-3">
                        <!-- Se crea un botón que permite abrir una ventana modal para visualiar los ingresos que el usuario ha realizado en el sistema: -->
                        <button type="button" class="btn btn-outline" data-toggle="modal" data-target="#modal_history" style="width:11em" id="button_nav" style="color:rgba(128, 128, 128, 0.103);">
                            Historial de ingreso
                        </button>
                    </div>
                    <!-- Se usan otras 3 columnas del contenedor: -->
                    <div class="col-xl-3">
                        <!-- El siguiente botón permite la visualización de una ventana modal que enseña todas las copias de respaldo o 'backups' que el usuario o el sistema ha realizado: -->
                        <button type="button" class="btn btn-outline" data-toggle="modal" data-target="#backup" style="width: 11em" id="button_nav">
                            Copias de seguridad
                        </button>
                    </div>
                    <!-- Se utilizan nuevamente 3 columnas del contenedor: -->
                    <div class="col-xl-3">
                        <!-- Este penúltimo botón permite abrir una ventana modal que contiene el formulario para que el usuario pueda cambiar su contraseña en caso de requerirlo: -->
                        <button type="button" class="btn btn-outline" data-toggle="modal" data-target="#c_pass" style="width: 11em" id="button_nav">
                            Cambiar contraseña
                        </button>
                    </div>
                    <!-- Se usan las 3 últimas columnas del contenedor Bootstrap: -->
                    <div class="col-xl-3">
                        <!-- Este último botón permite que el usuario pueda cerrar su sesión una vez haya terminado de hacer lo necesario en el sistema: -->
                        <a href="ACTION_cerrar_sesion.php">
                            <button type="button" class="btn btn-outline" style="width: 11em" id="button_nav">
                                Cerrar sesión
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Aquí finaliza la estructura de esta barra de navegación. -->

        <!-- Aquí empieza a comentarse la estructura de cada ventana modal: -->
            <!-- Estructura de ventana modal tipo 'fade' de historial de ingresos al sistema: -->
            <div class="modal fade" id="modal_history" tabindex="-1" role="dialog" aria-labelledby="modal_history" aria-hidden="true">|
                <!-- Se define el tamaño de la ventana modal: -->
                <div class="modal-dialog modal-lg" role="document">
                    <!-- Se indica el inicio del contenido de la ventana modal: -->
                    <div class="modal-content">
                        <!-- Se define la clase 'modal-body' para comenzar a agregar elementos al cuerpo de la ventana modal: -->
                        <div class="modal-body">
                            <!-- Se crea el botón con el que se cierra la ventana modal: -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <!-- Se muestra el título principal de la ventana modal: -->
                            <h1 class="modal-title font-weight-bold">
                                Ingresos realizados al sistema
                            </h1>
                            <!-- Se define que la ventana modal se adapte a cualquier tipo de resolución: -->
                            <div class="table-responsive-xl">
                                <!-- Se crea una tabla para mostrar la información de los ingresos realizados al sistema por el usuario: -->
                                <table class="table text-center">
                                    <!-- Se crea la cabecera de la tabla con algunos estilos en ella: -->
                                    <thead style="color: #fff; background-color: rgb(35, 130, 117);">
                                        <!-- Se definen los títulos para cada columna de la tabla: -->
                                        <tr>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Hora</th>
                                            <th scope="col">Lugar cercano de ingreso</th>
                                            <th scope="col">Característica del dispositivo usado</th>
                                        </tr>
                                    </thead>
                                    <!-- Se usa la etiqueta '<tbody>' para empezar a agregar elementos al cuerpo de la tabla: -->
                                    <tbody style="background-color: rgba(128, 128, 128, 0.103);">
                                        <!-- Se comienzan a agregar resultados a la tabla acerca de algunas especificaciones que poseía o posee el computador desde el que se ha entrado al sistema (ya sea con anterioridad o justo en el mismo día): -->
                                        <tr>
                                            <!-- Fecha en la que el usuario ingresó: -->
                                            <th scope="row">29/09/2019</th>
                                            <!-- Hora a la que ingresó: -->
                                            <th>18:55</th>
                                            <!-- Lugar desde el que realizó el ingresó: -->
                                            <td>Medellín, Antioquia</td>
                                            <!-- Sistema operativo con el que ingresó: -->
                                            <td>SO Windows 7</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">18/07/2019</th>
                                            <th>09:14</th>
                                            <td>Medellín, Antioquia</td>
                                            <td>SO Windows 10</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">01/10/2019</th>
                                            <th>20:40</th>
                                            <td>Medellín, Antioquia</td>
                                            <td>SO Windows 8</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Aquí finaliza la estructura de la tabla. -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Aquí termina la estructura de la ventana modal. -->

            <!-- Estructura de ventana modal de copias de seguridad del usuario: -->
            <div class="modal fade" id="backup" tabindex="-1" role="dialog" aria-labelledby="backup" aria-hidden="true">
                <!-- Se define el tamaño de la ventana modal: -->
                <div class="modal-dialog modal-lg" role="document">
                    <!-- Se indica el espacio desde el que empezará a ser agregado el contenido para la ventana modal: -->
                    <div class="modal-content" id="modal_backup">
                        <!-- Se indica que se empezarán a agregar elementos al cuerpo de la ventana modal: -->
                        <div class="modal-body">
                            <!-- Se crea el botón para cerrar la ventana modal cuando el usuario lo requiera: -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <!-- Se asigna un título a la ventana modal para ser mostrado al usuario: -->
                            <h1 class="modal-title font-weight-bold">
                                Copias de seguridad
                            </h1>
                            <!-- Se le da la opción al usuario de seleccionar cada cuanto quiere que se realice una copia de seguridad: -->
                            <span>Frecuencia de creación automática de copias:</span>
                            <select style="border: none; background-color: rgba(211, 211, 211, 0.226);">
                            <!-- Se muestran las opciones que posee el usuario para definir la frecuencia de creación de la copia de seguridad: -->
                                <option>Cada día</option>
                                <option>Cada semana</option>
                                <option>Cada mes</option>
                                <option>Nunca</option>
                            </select>
                            <!-- Se define que la ventana modal se adapte a cualquier tipo de resolución: -->
                            <div class="table-responsive-xl">
                                <!-- Se crea una tabla con el texto centrado dentro de ella: -->
                                <table class="table text-center">
                                    <!-- Se crea la cabecera para la tabla con la etiqueta '<thead>': -->
                                    <thead style="color: #fff; background-color: rgb(35, 130, 117);">
                                        <!-- Se digitan los títulos para cada una de las columnas de la tabla: -->
                                        <tr>
                                            <th scope="col">Fecha de creación</th>
                                            <th scope="col">Número de fichas en el sistema</th>
                                            <th scope="col">Tamaño de la copia</th>
                                            <th scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <!-- Se usa la etiqueta '<tbody>' para indicar el inicio del cuerpo de la tabla: -->
                                    <tbody style="background-color: rgba(128, 128, 128, 0.103);">
                                        <!-- Se muestran los datos de cada copia de seguridad que posee el usuario: -->
                                        <tr>
                                            <!-- Fecha de creación de la copia de seguridad: -->
                                            <th scope="row">07/05/2019</th>
                                            <!-- Cantidad de fichas que maneja el usuario hasta ese momento: -->
                                            <td>7</td>
                                            <!-- Peso de la copia de seguridad: -->
                                            <td>304 KB</td>
                                            <!-- Icono asignado para eliminar la copia de seguridad del sistema al hacer click sobre él: -->
                                            <td><a href="#"><img src="icons/delete.png" width="25em" id="delete"></a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">13/07/2019</th>
                                            <td>3</td>
                                            <td>1.01 MB</td>
                                            <td><a href="#"><img src="icons/delete.png" width="25em" id="delete"></a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">06/08/2019</th>
                                            <td>5</td>
                                            <td>980 KB</td>
                                            <td><a href="#"><img src="icons/delete.png" width="25em" id="delete"></a></td>
                                        </tr>
                                    </tbody>
                                <!-- Aquí termina la estructura de la tabla. -->
                                </table>
                            </div>

                        </div>
                        <!-- Se crea un botón con el que el usuario puede crear una nueva copia de seguridad: -->
                        <button type="button" class="btn btn-primary" id="txt_button">
                            Crear nueva copia de seguridad
                        </button>
                    </div>
                </div>
            <!-- Aquí termina la estructura de la ventana modal. -->
            </div>

    <!-- Estructura de ventana modal con formulario para cambiar la contraseña: -->
    <!-- Se crea el formulario de cambiar contraseña, el mismo tiene el nombre 'form_pass' y utiliza los eventos 'onsubmit' y 'oninput' para regresar alertas programadas de bootstrap desde el archivo 'cambio_pass.js': -->
    <form name="form_pass" action="ACTION_cambiopass.php" method="POST" oninput="return validacion_pass()" onsubmit="return enviado_pass() && validacion_pass();">
            <!-- Se crea una ventana modal que contiene una animación tipo 'fade': -->
            <div class="modal fade" id="c_pass" tabindex="-1" role="dialog" aria-labelledby="c_pass" aria-hidden="true">
                <!-- Se define el tamaño de la ventana modal: -->
                <div class="modal-dialog modal-md" role="document">
                    <!-- La clase 'modal-content' permite indicar el inicio de contenido por parte del formlario: -->
                    <div class="modal-content" id="contenido_sesion">
                        <!-- Se comienzan a crear los elementos para el cuerpo del formulario: -->
                        <div class="modal-body">
                            <!-- Se añade una imagen que hace alusión al formulario como parte del estilo del mismo: -->
                            <img src="icons/padlock.png" width="110em" id="icon_pass">
                            <!-- El botón para cerrar la ventana modal es creado: -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <!-- Se asigna el título principal del formulario: -->
                            <p id="font" style="font-size:27px" class="font-weight-bold">
                                Cambio de contraseña
                            </p>
                            <!-- Se crea el primer campo del formulario, el cual está hecho para que el usuario digite su contraseña actual. La clase 'form-group' de Bootstrap es usada para indicar que el campo hace parte de un formulario: -->
                            <div class="form-group">
                                <input type="password" class="form-control" id="actual" name="actual" placeholder="Contraseña actual"  style="width: 25em;  margin-left: 2em;">
                                <!-- Se añade un icono de Font Awesome que permite indicar al usuario, al hacer hover sobre el mismo, que las contraseñas ingresadas en los campos puedens er visualizadas: -->
                                <i class="fa fa-eye fa-lg" tool-tip-toggle="tooltip-pass" data-original-title="Mostrar contraseñas" id="passwords" id="show_password" style="margin-top: -1.2em; margin-right: 2.5em; float: right;"></i>
                                <!-- Este 'div', con el id 'change' dentro de él, sirve para mostrar algunas de las alertas bootstrap progamadas en caso de ser necesario: -->
                                <div id="change"></div>
                            </div>
                            <!-- Se crea el segundo campo del formulario, el mismo está hecho para que el usuario ingrese su contraseña nueva: -->
                            <div class="form-group">
                                <input type="password" name="new" class="form-control" id="new_pass" placeholder="Nueva contraseña" style="width: 25em;  margin-left: 2em;">
                            </div>
                                <!-- Se añade un segundo icono con las mismas funcionalidades que el anterior, solo que esta vez el mensaje indica algunas recomendaciones al usuario para crear una contraseña segura: -->
                                <i class="fa fa-info-circle fa-lg" tool-tip-toggle="tooltip-show" data-original-title="INFORMACIÓN: Se recomienda que para crear una contraseña fuerte siga los siguientes parámetros, es decir, que la contraseña contenga: 8 carácteres, una mayúscula, una minúscula, un número y un caracter raro o especial. Por ejemplo, la contraseña 'Sena_1234' cumple con los parámetros recomendados." style="float: right; margin-right: 2.6em; margin-top: -1.9em;"></i>
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
                                <!-- Se crea un segundo 'div', el cual contiene un id, para mostrar también alertas que se enseñan al usuario en caso de haber alguna incosistencia en el formulario: -->
                                <div id="change3"></div>
                                <!-- Se crea el último campo del formulario, el cual está hecho para que el usuario confirme su nueva contraseña: -->
                                <div class="form-group">
                                    <input type="password" class="form-control" id="confirmar_pass" name="confirmar_pass" placeholder="Confirmar contraseña" style="width: 25em;  margin-left: 2em;">
                                    <!-- Se crea un último div con su respectivo id para mostrar también alertas relacionadas al formulario: -->
                                    <div id="change2"></div>

                                    <!--- Se hace uso de PHP para mostrar el mensaje de los iconos y algunas alertas del formulario: -->
                                    <?php
                                        // Se verifica si el valor 'notfound' está definido y se obtiene si el valor 'notfound' ubicado en el archivo 'ACTION_cambiopass.php' devuelve true:
                                        if (isset($_GET["notfound"]) && $_GET["notfound"] == 'true') {
                                                /* En caso de que lo anterior sea cierto, una alerta bootstrap de tipo 'danger' aparecerá abajo del campo de confirmar contraseña del formulario de cambiar contraseña. Esta alerta indica que la contraseña actual ingresada no coincide con la registrada en la base de datos: */
                                                echo "<div class= 'alert alert-danger alert-dismissible fade show' role='alert' style='border-radius: 0; font-weight: bold;width: 87%; margin-left: 2em;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>La contraseña actual no coincide con la registrada en la base de datos</div>";
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
                                                echo "<div class= 'alert alert-success alert-dismissible fade show' role='alert' style='border-radius: 0; font-weight: bold;width: 87%; margin-left: 2em;'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>La contraseña ha sido cambiada con éxito</div>";
                                            }
                                            // Este tooltip activa igualmente la ventana modal de cambio de contraseña si la contraseña del usuario ha sido cambiada, mostrándole la alerta 'success' anterior mencionada:
                                            if (isset($_GET["success"]) && $_GET["success"] == 'true') {
                                                    echo "<script>$(document).ready(function() {
                                                            $('#c_pass').modal('toggle')
                                                        });</script>";
                                            }
                                    ?>

                                    <br>
                                    <!-- El botón para enviar el formulario es creado, en caso de haber inconsistencias en el mismo, las alertas Bootstrap aparecerán y el cambio de contraseña no ocurrirá:-->
                                    <button type="submit" name="cambio" class="btn btn-md btn-block text-center" id="enter_button">
                                        Guardar cambios
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    <!-- Aquí finaliza la estructura del formulario. -->
</nav>
<!-- Aquí termina el uso de la barra de navegación que contiene las opciones secundarias del sistema. -->

    <!--  Creación de un banner que contiene un pequeño formulario para buscar fichas de aprendices en el sistema:  -->
    <div class="banner">
        <!-- Se asigna la imagen en cuestión para el banner: -->
        <img src="icons/slide1.png"width="125%"; height="250em;">
    </div>
    <!-- Se crea un pequeño formulario para realizar la búsqueda de resultados con los datos ingresados por el usuario: -->
    <form action="list_result.php" method="POST" id="input_div" class="form-inline ">
        <!-- Se asigna una columna Bootstrap sin nada en su interior (en blanco): -->
        <div class="col-xl-1"></div>
        <div class="col-6">
            <!-- Se crea un campo de entrada (input) para que el usuario pueda ingresar el número de ficha a buscar:-->
            <input id="input" name="fichanombre" class="form-control mr-sm-2" type="search" placeholder="Ingrese el número de ficha..." aria-label="Search">
            <!-- Se crea un botón con el icono de una lupa, el cual indica que al hacer click en este comenzará la búsqueda de resultados: -->
            <button name="buscar" id="input_b" class="btn btn-outline-success my-2 my-sm-0">
                <img src="icons/loupe.png" height="40em" width="40em">
            </button>
        </div>
    </form>
    <!-- Aquí finaliza el formulario de búsqueda. -->

    <!-- Funciones principales del sistema: -->
    <!-- Se crea un contenedor que contendrá los links de las 3 funciones: -->
    <div id="funciones" class="container-fluid text-center py-3">
        <!-- Se le indica al contenedor Bootstrap que el mismo mantendrá los objetos en una fila cada uno: -->
        <div class="row justify-content-around">
            <!-- Se asigna un total de 4 columnas (de las 12 que hay en Bootstrap) para colocar el link a la primera función: -->
            <div id="f1" class="col-4">
                <!-- Se asigna el link de la función, el cual dirige al usuario a la vista de gestionar el listado de alguna ficha, es decir, para descargar alguno a la computadora o para iniciar el registro de asistencia directamente: -->
                <a href="manage_list.php">
                    <!-- Se asigna una imagen y el nombre de la función en un texto visible, esto para hacer más indicativa la función: -->
                    <img src="icons/responsive.png" width="220em" height="180em" style="z-index:2;">
                    <h3>Gestionar listados</h3>
                </a>
            </div>
            <!-- Se asignan otras 4 columnas para la segunda función: -->
            <div id="f2" class="col-4">
                <!-- Se asigna el link que dirigirá al usuario a la segunda función, la cual es la de registrar la asistencia de una ficha por medio del huellero digital: -->
                <a href="register.php">
                    <!-- Se asigna la imagen y el texto alusivos a la función: -->
                    <img src="icons/fingerprints.png" width="220em" height="180em">
                    <h3>Registrar la asistencia</h3>
                </a>
            </div>
            <!-- Y, por último, se utilizan las últimas 4 columnas restantes para la función final: -->
            <div id="f3" class="col-4">
                <!-- Se asigna el link a la función de reportes, la cual sirve para mostrar al usuario, en un gráfico, las faltas e inasistencias de los aprendices: -->
                <a href="reports.php">
                    <!-- Se asignan la imagen y el texto pertenecientes a la función: -->                        
                    <img src="icons/report.png" width="220em" height="180em">
                    <h3>Ver reportes</h3>
                </a>
            </div>
        </div>
    <!-- Finaliza el uso del contenedor Bootstrap: -->    
    </div>
    <!-- Aquí acaba la estructura que muestra las funciones principales del sistema. -->

    <!-- Formulario para buscar a un aprendiz: -->
    <!-- Se crea un contenedor Bootstrap que abarca todo el ancho de la pantalla: -->
    <div id="busqueda" class="container-fluid justify-content-around py-3">
        <div class="card" style="max-width: 100em"></div>
        <!-- Se indica que los elementos estarán en una fila cada uno y que estarán repartidos por el contenedor: -->
        <div id="asearch" class="row justify-content-around text-center" style="background-color: #0fa18e;">
            <!-- Se toman 3 columnas del contenedor para agregar un icono alusivo al formulario de búsqueda: -->
            <div class="col-3">
                <img src="icons/finger_add.png" class="card-img" height="250em">
            </div>
            <!-- Se le indica al código que 6 columnas del contenedor serán utilizadas: -->
            <div class="col-6">
                <!-- Inicia el formulario para ingresar los datos del aprendiz a buscar: -->
                <form>
                    <!-- Se muestra el texto que indica que el formulario corresponde a la búsqueda de un aprendiz en el sistema: -->
                    <div class="form-group">
                        <span class="title_search">Búsqueda de Aprendiz</span>
                    </div>
                    <!-- Se crea el primer campo del formulario, el cual sirve para ingresar el nombre del aprendiz:-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="sinput" aria-describedby="emailHelp" placeholder="Nombre del aprendiz" style="width: 25em;">
                    </div>
                    <!-- El segundo campo está hecho para ingresar la ficha en la que pueda estar el aprendiz: -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="sinput" placeholder="Número de ficha" style="width: 25em;">
                    </div>
                    <!-- Y el último campo está hecho para ingresar el número de documento del aprendiz en caso de saber cual es: -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="sinput" placeholder="Número de documento" style="width: 25em;">
                    </div>
                    <!-- Se crea un botón con un icono de una lupa dentro de él; esto indica que al hacer click en el mismo la búsqueda del aprendiz comenzará a producirse en el sistema: -->
                    <button id="sinput_b" class="btn btn-outline-success my-2 my-sm-0" type="submit">
                        <img src="icons/loupe.png" height="40em" width="40em">
                    </button>
                </form>
                 <!-- Aquí finaliza el formulario de búsqueda de un aprendiz. -->
            </div>
        </div>
    </div>
    <!-- Aquí termina de usarse el contenedor. -->

    <!-- Footer del documento 'system.php': -->
    <!-- Se crea un contenedor Bootstrap que abarca todo el ancho de la pantalla: -->
    <div id="prefooter" class="container-fluid" style="background-color: #fa7e36;">
        <!-- Se indica que cada elemento estará dentro de una fila: -->
        <div class="row">
            <!-- Se toman 4 columnas del contenedor para asignar el link al manual de usuario del sistema: -->
            <div class="col-4">
                <!-- Se asigna el link al manual de usuario con su respectivo texto para indicar al usuario de que puede acceder al mismo: -->
                <a href="user_manual.php">
                    <p class="pitem text-light">Manual de usuario</p>
                </a>
            </div>
            <!-- Se asigna un total de 7 columnas para indicar el copyright correspodiente del SENA: -->
            <div class=" col-7">
                <p id="pitem1" class="text-light">&copy Todos los derechos reservados - SENA 2020</p>
            </div>
            <!-- Se utiliza la última columna del contenedor para añadir el logo de la organización SENA: -->
            <div class="col-1">
                <img id="fimg" src="icons/logoSena.png" height="80em" width="90em" style="filter: invert(100%);">
            </div>
        </div>
    </div>
    <!-- Aquí finaliza el footer. -->
</body>
<!-- Se añade el uso del archivo 'cambio_pass.js' para permitir la aparición de alertas bootstrap en los casos donde sucedan cambios o anomalías en el formulario de cambiar contraseña: -->
<script src="js/cambio_pass.js"></script>
</html>
<?php
} else {
    // En caso de no haber ninguna sesión iniciada, se le redireccionará al usuario al archivo 'index.php' (página inicial) para indicarle con una alerta bootstrap que debe de iniciar sesión para usar las funcionaldiades del sistema:
    header("location: index.php?failone=true");

}
?>