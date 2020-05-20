<!DOCTYPE html>
<!-- Idioma en el que el archivo está definido: -->
<html lang="es">
<head>
    <!-- Cofifiación de caracteres 'UTF-8' para evitar errores ortográficos al mostrar el texto en la pantalla: -->            
    <meta charset="utf-8">
    <!-- Etiqueta 'meta viewport' para controlar la composición en los navegadores móviles: -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Archivo CSS de la plataforma REDA: -->
    <link rel="stylesheet" type="text/css" href="css/reda_system.css">
    <!-- Kit de Font Awesome para utilizar sus iconos: -->
    <script src="https://kit.fontawesome.com/ddefb55be1.js" crossorigin="anonymous"></script>
    <!-- Archivo bootstrap para agregar el css del mismo: -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Título de la pestaña: -->
    <title>Recuperación de contraseña - REDA</title>
    <!-- Icono de la pestaña: -->
    <link rel="icon" href="icons/reda2.png">
</head>
<body>
<!-- Se colocan los 3 scripts para que la versión 4 de Bootstrap pueda funcionar en el código: -->
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
<script src="js/cambio_pass.js"></script>
</body>
</html>