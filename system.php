<?php
// Se inicia o reanuda una sesión en caso de que un usuario ya haya ingresado al sistema por medio del log in o inicio de sesión:
session_start();

// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include 'ACTION_conexionBD.php';

// Se verifica con 'isset' si alguna de las dos sesiones para 'system.php' disponibles existen en el momento con alguno de los cargos en el sistema (instructor o personal administrativo):
if (isset($_SESSION['instructor']) || isset($_SESSION['personal'])) {
?>

<!Doctype html>
<!-- Idioma en el que el archivo está compuesto: -->
<html>
<head lang="es">
    <!-- Codifiación de caracteres 'UTF-8' para evitar errores de escritura al mostrar el texto en la pantalla: --> 
    <meta charset="utf-8">
    <!-- Uso de la etiqueta meta viewport para mostrar los elementos de manera responsive u ordenada dependiendo del tamaño de la pantalla del dispositivo: -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título de la pestaña: -->
    <title>REDA - SISTEMA</title>
    <!-- Archivo bootstrap para agregar los estilos css del framework: -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Icono de la pestaña: -->
    <link rel="icon" href="icons/reda4.png">
    <!-- Kit de Font Awesome para utilizar sus iconos: -->
    <script src="https://kit.fontawesome.com/ddefb55be1.js" crossorigin="anonymous"></script>
    <!-- Archivo CSS (hoja de estilos) de la vista en cuestión: -->
    <link rel="stylesheet" type="text/css" href="css/system.css">
</head>

<body>
<!-- Se colocan los 3 scripts que permiten que el framework Bootstrap en su versión 4.0 funcione correctamente con este documento. Desde sus estilos hasta las acciones o eventos realizados con funciones de JavaScript: -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <!-- Se crea un contenedor fluido de Bootstrap que adapta su tamaño automaticamente a la resolución de la pantalla: -->
            <div class="container-fluid" id="header">
                <!-- Se crea una barra de navegación que ocupa todo el ancho del contenedor: -->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- Se usa la clase 'navbar-collapse' para beneficiar el comportamiento de la barra de navegación al mostrarse en dispositivos con diferentes resoluciones de pantalla: -->
                    <div class="navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            <!-- Se asigna, en este caso, el logo del sistema REDA como elemento principal de la barra de navegación: -->
                            <li class="nav-item active reda_image">
                                <img src="icons/reda2.png" alt="">
                            </li>
                            <!-- Se muestra un texto con el nombre del sistema en cuestión, este texto cuenta con un espaciamiento interno al usar la utilidad espaciadora de Bootstrap 'py':  -->
                            <li class="nav-item py-4">
                                <h3 id="title"> Registro Digital del Aprendiz
                                </h3>
                            </li>
                        </ul>
                        <!-- Se hace uso de una etiqueta 'h2' para mostrar un mensaje de bienvenida con el nombre del usuario que ha iniciado sesión: -->
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
    <!-- Aquí termina el uso de esta barra de navegación. -->

<!-- Creación de una barra de navegación con Bootstrap, la misma contiene las opciones secundarias del sistema: -->
<nav class="navbar navbar-expand-md navbar-light d-flex justify-content-center" id="header">
        <!-- Se crea un botón que permite la aparición de un icono una vez la ventana toma una resolución bastante pequeña compara a la predeterminada: -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <!-- Se usa la siguiente clase para hacer aparecer el icono, este sirve para activar la visibilidad de las opciones secundarias ante ciertos cambios de resolución de pantalla: -->
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Barra de navegación con opciones secundarias del sistema: -->
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
            <!-- Se asigna una clase al elemento 'div' para añadirle estilos al contenedor desde el archivo CSS: -->
            <div class="container-fluid container_options">
                <!-- Se indica que cada elemento estará dentro de una fila: -->
                <div class="row">
                    <!-- Se usan de manera predeterminada 3 columnas de las 12 que posee el contenedor Bootstrap: -->
                    <div class="col">
                        <!-- Se crea un botón que permite abrir una ventana modal para visualiar los ingresos que el usuario ha realizado en el sistema: -->
                        <button type="button" class="btn btn-outline" data-toggle="modal" data-target="#modal_history"  id="button_nav">
                            Historial de ingreso
                        </button>
                    </div>
                    <!-- Se usan otras 3 columnas del contenedor: -->
                    <div class="col">
                        <!-- El siguiente botón permite la visualización de una ventana modal que enseña todas las copias de respaldo o 'backups' que el usuario o el sistema ha realizado: -->
                        <button type="button" class="btn btn-outline" data-toggle="modal" data-target="#backup"  id="button_nav">
                            Copias de seguridad
                        </button>
                    </div>
                    <!-- Se utilizan nuevamente 3 columnas del contenedor: -->
                    <div class="col">
                        <!-- Este penúltimo botón permite abrir una ventana modal que contiene el formulario para que el usuario pueda cambiar su contraseña en caso de requerirlo: -->
                        <button type="button" class="btn btn-outline" data-toggle="modal" data-target="#c_pass"  id="button_nav">
                            Cambiar contraseña
                        </button>
                    </div>
                    <!-- Se usan las 3 últimas columnas del contenedor Bootstrap: -->
                    <div class="col">
                        <!-- Este último botón permite que el usuario pueda cerrar su sesión una vez haya terminado de hacer lo necesario en el sistema: -->
                        <a href="ACTION_cerrar_sesion.php">
                            <button type="button" class="btn btn-outline" id="button_nav">
                                Cerrar sesión
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Aquí finaliza la estructura de esta barra de navegación. -->

        <!-- Aquí empieza a comentarse la estructura de cada ventana modal: -->
            <!-- Estructura de la ventana modal tipo 'fade' del historial de ingresos al sistema: -->
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
                            <h1 class="modal-title font-weight-bold text-center">
                                Ingresos realizados al sistema
                            </h1>
                            <!-- Se define que la ventana modal se adapte a cualquier tipo de resolución de pantalla: -->
                            <div class="table-responsive-xl">
                                <!-- Se crea una tabla para mostrar la información de los ingresos realizados al sistema por el usuario: -->
                                <table class="table table-hover text-center">
                                    <!-- Se crea la cabecera de la tabla con algunos estilos aplicados desde el archivo CSS: -->
                                    <thead>
                                        <!-- Se definen los títulos para cada columna de la tabla: -->
                                        <tr>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Hora</th>
                                            <th scope="col">Sistema operativo usado</th>
                                            <th scope="col">Navegador usado</th>
                                        </tr>
                                    </thead>
                                    <!-- Se usa la etiqueta '<tbody>' para empezar a agregar elementos al cuerpo de la tabla: -->
                                    <tbody>
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
                            <h1 class="modal-title font-weight-bold d-flex justify-content-center">
                                Copias de seguridad
                            </h1>
                            <!-- Se define que la ventana modal se adapte a cualquier tipo de resolución: -->
                            <div class="table-responsive-xl">
                                <!-- Se crea una tabla con el texto centrado dentro de ella: -->
                                <table class="table table-hover text-center">
                                    <!-- Se crea la cabecera para la tabla con la etiqueta '<thead>': -->
                                    <thead>
                                        <!-- Se digitan los títulos para cada una de las columnas de la tabla: -->
                                        <tr>
                                            <th scope="col">Fecha de creación</th>
                                            <th scope="col">Número de fichas en el sistema</th>
                                            <th scope="col">Tamaño de la copia</th>
                                            <th scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <!-- Se usa la etiqueta '<tbody>' para indicar el inicio del cuerpo de la tabla: -->
                                    <tbody>
                                        <!-- Se muestran los datos de cada copia de seguridad que posee el usuario: -->
                                        <tr>
                                            <!-- Fecha de creación de la copia de seguridad: -->
                                            <th scope="row">07/05/2019</th>
                                            <!-- Cantidad de fichas que maneja el usuario hasta ese momento: -->
                                            <td>7</td>
                                            <!-- Peso de la copia de seguridad: -->
                                            <td>304 KB</td>
                                            <!-- Icono de Font Awesome asignado para eliminar la copia de seguridad del sistema al hacer click sobre él: -->
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
                                <!-- Aquí termina la estructura de la tabla. -->
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            <!-- Aquí termina la estructura de la ventana modal. -->
            </div>

    <!-- Estructura de ventana modal con formulario para cambiar la contraseña: -->
    <!-- Se crea el formulario de cambiar contraseña, el mismo tiene el nombre 'form_pass' y utiliza los eventos 'onsubmit' y 'oninput' para regresar alertas programadas de Bootstrap desde el archivo 'cambio_pass.js': -->
    <form name="form_pass" action="ACTION_cambiopass.php" method="POST" oninput="return validacion_pass()" onsubmit="return enviado_pass() && validacion_pass();">
            <!-- Se crea una ventana modal que contiene una animación tipo 'fade': -->
            <div class="modal fade" id="c_pass" tabindex="-1" role="dialog" aria-labelledby="c_pass" aria-hidden="true">
                <!-- Se define el tamaño de la ventana modal: -->
                <div class="modal-dialog modal-md" role="document">
                    <!-- La clase 'modal-content' permite indicar el inicio de contenido por parte del formulario: -->
                    <div class="modal-content">
                        <!-- Se comienzan a crear los elementos para el cuerpo del formulario: -->
                        <div class="modal-body">
                            <!-- Se crea el botón para cerrar la ventana modal: -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <!-- Se crea un 'div' que contiene la clase que permite añadir estilos al icono principal del formulario: -->
                            <div class="change_icon">
                                <!-- Se añade un icono que hace alusión al formulario como parte del estilo del mismo: -->
                                <i class='fas fa-sync-alt fa-5x'></i>
                            </div>
                            <!-- Se asigna el título principal del formulario con un identificador para sus estilos y una clase Bootstrap para estilos de la fuente: -->
                            <p id="font" class="font-weight-bold">
                                Cambio de contraseña
                            </p>
                            <!-- Se crea el primer campo del formulario, el cual está hecho para que el usuario digite su contraseña actual. La clase 'form-group' de Bootstrap es usada para indicar que el campo hace parte de un formulario: -->
                            <div class="form-group">
                                <input type="password" class="form-control" id="actual" name="actual" placeholder="Contraseña actual">
                                <!-- Se añade un icono de Font Awesome que permite indicar al usuario, al hacer hover sobre el mismo, que las contraseñas ingresadas en los campos puedens ser visualizadas: -->
                                <div class="show_icon">
                                    <i class="fa fa-eye fa-lg" tool-tip-toggle="tooltip-pass" data-original-title="Mostrar contraseñas" id="passwords" id="show_password"></i>
                                </div>
                                <!-- Este 'div', con el id 'change' dentro de él, sirve para mostrar algunas de las alertas Bootstrap progamadas en caso de haber anomalías en el formulario: -->
                                <div id="change"></div>
                            </div>
                            <!-- Se crea el segundo campo del formulario, el mismo está hecho para que el usuario ingrese su contraseña nueva: -->
                            <div class="form-group">
                                <input type="password" name="new" class="form-control" id="new_pass" placeholder="Nueva contraseña">
                            </div>
                                <!-- Se añade un segundo icono con las mismas funcionalidades que el anterior, solo que esta vez el mensaje indica algunas recomendaciones al usuario para crear una contraseña segura: -->
                                <div class="info_icon">
                                    <i class="fa fa-info-circle fa-lg" tool-tip-toggle="tooltip-show" data-original-title="INFORMACIÓN: Por cuestiones de seguridad, la contraseña debe contener como mínimo: 8 carácteres, una mayúscula, una minúscula, un número y un caracter especial o raro. Por ejemplo, la contraseña 'Sena_1234' cumple con los parámetros requeridos."></i>
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
                                <!-- Se crea un segundo 'div', el cual contiene un id, para mostrar también alertas que se enseñan al usuario en caso de haber alguna incosistencia en el formulario: -->
                                <div id="change3"></div>
                                <!-- Se crea el último campo del formulario, el cual está hecho para que el usuario confirme su nueva contraseña: -->
                                <div class="form-group">
                                    <input type="password" class="form-control" id="confirmar_pass" name="confirmar_pass" placeholder="Confirmar contraseña">
                                    <!-- Se crea un último div con su respectivo id para mostrar también alertas relacionadas al formulario: -->
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
                                            // Este código activa igualmente la ventana modal de cambio de contraseña si la contraseña del usuario ha sido cambiada, mostrándole la alerta 'success' anterior mencionada:
                                            if (isset($_GET["success"]) && $_GET["success"] == 'true') {
                                                    echo "<script>$(document).ready(function() {
                                                            $('#c_pass').modal('toggle')
                                                        });</script>";
                                            }
                                    ?>

                                    <br>
                                    <!-- El botón para enviar el formulario es creado, en caso de haber inconsistencias en el mismo las alertas Bootstrap aparecerán y el cambio de contraseña no ocurrirá:-->
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

<!-- Contenedor fluido de Bootstrap para crear el formulario de buscar una ficha en el sistema: -->
<div class="container-fluid banner">
    <!-- Se crea un 'div' con su respectiva clase para añadir estilos CSS a todos los elementos del formulario en conjunto: -->
    <div class="form-group search_course">
            <!-- Se crea un 'badge' o insignia de Bootstrap para mostrar el nombre del formulario: -->
            <label class="badge badge-info search_badge" for="input_search">Búsqueda de una ficha:</label>
            <!-- Se crea el formulario con su respectivo método de envío y la acción que hará una vez se realice la búsqueda. Además, se pone un nombre al formulario y dos eventos JavaScript ('oninput' y 'onsubmit'), con sus respectivas funciones de retorno, para validar el campo 'input' para buscar una ficha: -->
            <form name="buscar_ficha" action="list_result.php" method="POST" oninput="return validar_ficha()" onsubmit="return enviado_ficha() && validar_ficha();">
            <!-- Se utiliza la clase 'input-group' para indicar que habrán dos o más elementos en línea a partir de un campo input: -->
            <div class="input-group">
                <div class="input-group-prepend"></div>
                <!-- Se crea el 'input', con su respectivo nombre ('fichanombre'), en el que el usuario puede agregar el número de ficha que desea buscar: -->
                <input type="text" class="form-control input_search" name="fichanombre" placeholder="Ingrese el número de la ficha a buscar...">
                <!-- Se crea el 'div' que contendrá todos los elementos relacionados al botón del formulario: -->
                <div class="button_search_div">
                <!-- Se crea el botón en cuestión para buscar una ficha: -->
                <button name="buscar" class="btn my-2 my-sm-0 btn_search">
                    <!-- Se inserta un icono de Font Awesome con su respectiva clase para añadir estilos CSS al mismo: -->
                    <div class="input-group-text search_icon"><i class="fas fa-search fa-2x"></i></div>
                </button>
                </div>
            </form>
            <!-- Aquí finaliza el formulario de buscar una ficha. -->
        </div>
        <!-- Se añade un 'div' con un identificador llamado 'alerta_ficha', el mismo muestra una alerta de Bootstrap en caso de que sucedan anomalías en el formulario: -->
        <div id="alerta_ficha"></div>
    </div>
</div>
<!-- Aquí acaba de usarse el contenedor para el formulario de buscar una ficha. -->

    <!-- Se crea un contenedor fluido de Bootstrap que contiene todo lo relacionado a las funciones principales del sistema: -->
    <div class="container-fluid text-center">
        <!-- Se indica que cada elemento estará dentro de una fila, que se adaptarán al tamaño de la pantalla del navegador y que cada uno estará alineado en el centro del contenedor: -->
        <div class="row d-flex justify-content-center">
            <!-- Se usa la clase 'card-deck' de Bootstrap para crear una serie de 'cards' o cartas Bootstrap en el contenedor -->
            <div class="card-deck">
                <!-- Se crea una única y primera carta que posee una clase para los estilos CSS ('functions') y que ocupa automaticamente parte de las columnas de Bootstrap -->
                <div class="card col functions">
                    <!-- Enlace hacia el cual será direccionado el usuario una vez dé click sobre la carta: -->
                    <a href="manage_list.php">
                    <!-- Se añade una imagen alusiva a la función, la misma posee una clase para los estilos CSS ('img_functions'): -->
                    <img class="card-img-top mx-auto d-block img_functions" src="icons/responsive.png" alt="Card image cap">
                    <!-- Texto añadido al cuerpo de la carta, el mismo indica el nombre de la función: -->
                    <div class="card-body">
                        <!-- El texto posee su propia clase CSS y hace parte del enlace que direcciona al usuario a la pestaña de la función: -->
                        <p class="card-text txt_functions"><span><strong>Gestionar listados</strong></span></a>
                    </div>
                <!-- Aquí finaliza esta carta: -->
                </div>
                <!-- Se crea una segunda carta que posee una las mismas características que la anterior: -->
                <div class="card col functions">
                    <!-- Se agrega el enlace hacia el cual será direccionado el usuario una vez dé click sobre la carta: -->
                    <a href="register.php">
                    <!-- Se añade una imagen alusiva a la función, la cual posee la misma clase que la de la anterior carta: -->
                    <img class="card-img-top mx-auto d-block img_functions" src="icons/fingerprints.png" alt="Card image cap">
                    <!-- Texto añadido al cuerpo de la carta, el mismo indica el nombre de la función: -->
                    <div class="card-body">
                        <!-- El texto posee su propia clase CSS y hace también parte del enlace que direcciona al usuario a la pestaña de la función: -->
                        <p class="card-text txt_functions"><span><strong>Registrar asistencia</strong></span></a>
                    </div>
                <!-- Aquí finaliza esta segunda carta: -->
                </div>
                <!-- Se crea una segunda carta que posee las mismas características que las dos anteriores: -->
                <div class="card col functions">
                    <!-- Se agrega el enlace hacia el cual será direccionado el usuario una vez dé click sobre la carta: -->
                    <a href="reports.php">
                    <!-- Se añade una imagen alusiva a la función, la cual posee la misma clase que la de las dos anteriores cartas: -->
                    <img class="card-img-top mx-auto d-block img_functions" src="icons/report.png" alt="Card image cap">
                    <!-- Texto añadido al cuerpo de la carta, el mismo indica el nombre de la función: -->
                    <div class="card-body">
                        <!-- El texto posee su propia clase CSS y hace también parte del enlace que direcciona al usuario a la pestaña de la función: -->
                        <p class="card-text txt_functions"><span><strong>Reportes de asistencia</strong></span></a>
                    </div>
                <!-- Aquí finaliza esta tercera y última carta: -->
                </div>
            </div>
            <!-- Aquí finaliza el 'div' para el conjunto de cartas creadas. -->
        </div>
    </div>
    <!-- Aquí termina de utilizarse el contenedor para las cartas. -->

    <!-- Formulario para buscar a un aprendiz: -->
    <!-- Se crea un contenedor Bootstrap que abarca todo el ancho de la pantalla: -->
    <div class="container-fluid py-3">
        <!-- Se indica que los elementos estarán en una fila y que estarán centrados en el contenedor: -->
        <div class="row justify-content-center text-center container_search_appr">
            <div class="text-center">
                <!-- Se toman 3 columnas del contenedor para agregar un icono alusivo al formulario de búsqueda: -->
                <div class="col-3 id_card_icon">
                    <!-- Aquí se inserta el icono en cuestión: -->
                    <i class='fas fa-id-card'></i>
                </div>
            </div>
            <br />
            <!-- Se le indica al código que 6 columnas del contenedor serán utilizadas: -->
            <div class="col-5 py-4">
                <!-- Se crea el formulario con su respectivo método de envío y la acción que hará una vez se realice la búsqueda. Además, se pone un nombre al formulario y dos eventos JavaScript ('oninput' y 'onsubmit'), con sus respectivas funciones de retorno, para validar el campo 'input' para buscar a un aprendiz: -->
                <form name="form_aprendiz" class="form_search_appr" action="ACTION_buscar_aprendiz.php" method="POST" oninput="return validar_aprendiz();" onsubmit="return enviado_aprendiz() && validar_aprendiz();">
                    <!-- Se muestra el título que indica que el formulario corresponde a la búsqueda de un aprendiz en el sistema: -->
                    <div class="form-group">
                        <!-- Se asigna una clase al título para añadirle estilos desde el archivo CSS: -->
                        <span class="title_search_appr">Búsqueda de un aprendiz:</span>
                    </div>
                    <!-- Este campo campo está hecho para ingresar el número de documento del aprendiz en caso de saber cual es: -->
                    <div class="form-group">
                        <input type="text" name="ap_documento" class="form-control-m" placeholder="Número de documento">
                    </div>
                    <!-- 'Div' que contiene un identificador llamado 'alerta_ap_documento', el cual permite que una alerta Bootstrap aparezca si hay alguna inconsistencia en el campo de número de documento del aprendiz: -->
                    <div id="alerta_ap_documento"></div>
                    <!-- Se crea un botón con un icono de una lupa dentro de él; esto indica que al hacer click en el mismo la búsqueda del aprendiz comenzará a producirse en el sistema: -->
                    <button class="btn input_search_appr" name="buscar" type="submit">
                        <!-- Aquí se inserta el icono con forma de lupa: -->
                        <i class="fas fa-search fa-2x"></i>
                    </button>
                </form>
                 <!-- Aquí finaliza el formulario de búsqueda de un aprendiz. -->
                 <!-- Se añade un 'div' con un identificador llamado 'alerta_aprendiz', el mismo muestra una alerta de Bootstrap en caso de que sucedan anomalías generales en el formulario: -->
                <div id="alerta_aprendiz"></div>
            </div>
        </div>
    </div>
    <!-- Aquí termina de usarse el contenedor para el formulario. -->

    <!-- Aquí comienza el footer o pie de página del archivo: -->
    <footer>
        <!-- Se crea un contenedor fluido para que su tamaño se adapte automaticamente a la pantalla; además de crearse una clase para agrgarl estilos al mismo desde el archivo CSS: -->
        <div class="container-fluid system_footer">
            <!-- Se indica que cada elemento estará dentro de una fila y que el texto de cada uno estará centrado: -->
            <div class="row text-center py-3">
                <!-- Se toman 2 columnas del contenedor para crear el botón que permite visualizar el manual de usuario del sistema. Dicho botón posee una clase para el estilo del texto del enlace y un identificador para su estilo en general: -->
                <div class="col-xl-2 manual_button"><span><a href="user_manual.php"><button type="button" class="btn btn-primary" id="manual_button">Manual de usuario</button></span></a>
                </div>
                <!-- Se genera un espacio entre el botón y el siguiente texto con la siguiente columna de Bootstrap: -->
                <div class="col-xl-1"></div>
                <!-- Se crea el texto que muestra el copyright o los derechos reservados del sistema. Este texto ocupa 6 columnas de Bootstrap y pose una clase de CSS para sus estilos: -->
                <div class="col-xl-6 site_rights"><span>&copy; Todos los
                        derechos
                        reservados -
                        SENA 2020</span></div>
                <!-- Nuevamente se usan las columnas de Bootstrap para generar espacio entre el texto anterior y la imagen correspondiente al logo de la entidad SENA: -->
                <div class="col-xl-2"></div>
                <!-- Se agrega el logo de la entidad SENA con su respectivo tamaño, su clase CSS para los estilos y la última columna Bootstrap que ocupa el elemento: -->
                <div class="col-xl-1 sena_logo" class="justify-content-center"><img src="icons/logoSena.png" width="50em">
                </div>
            </div>
        </div>
    </footer>
    <!-- Aquí finaliza el footer o pie de página del archivo. -->
</body>
<!-- Se añade el uso del archivo 'cambio_pass.js' para permitir la aparición de alertas bootstrap en los casos donde sucedan cambios o anomalías en el formulario de cambiar contraseña: -->
<script src="js/cambio_pass.js"></script>
<!-- Se llama a un segundo archivo JavaScript, el mismo valida los formularios de buscar una ficha y de buscar a un aprendiz: -->
<script src="js/validacion_buscar.js"></script>
</html>
<?php
} else {
    // En caso de no haber ninguna sesión iniciada, se le redireccionará al usuario al archivo 'index.php' (página inicial) para indicarle con una alerta bootstrap que debe de iniciar sesión para usar las funcionaldiades del sistema:
    header("location: index.php?failone=true");

}
?>