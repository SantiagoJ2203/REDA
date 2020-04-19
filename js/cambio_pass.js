/* Función creada para validar todos los campos del formulario de cambiar contraseña. Mientras la variable 'correcto_cambio' devuelva falso por parte de alguno de los condicionales 'if' el formulario no será enviado y devolverá alertas en los campos que contengan datos no válidos. La variable 'form_cambio' contiene el nombre del formulario realizado en el archivo 'system_admin.php' y, por lo tanto, puede ser llamado desde la variable. Las alertas de esta función aparecerán de manera inmediata en caso de que se ingrese algo indebido en los campos, esto debido al evento 'oninput'
*/
function validacion_pass(){

var correcto_cambio = true;
var form_cambio = document.form_pass;

/* Esta pieza de código indica que si el valor del campo de contraseña actual se encuentra vacío al enviar el formulario se le pedirá a este que ingrese una. Este proceso acontece también con todos los demás campos que estén vacíos y que sean obligatorios completar
*/
    if(form_cambio.actual.value == ""){
        document.getElementById("change").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 87%; margin-left: 2em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Escriba su contraseña actual</div>';
        correcto_cambio = false;
    }else if(form_cambio.actual.value == true){
        document.getElementById("change").innerHTML = "";
    }

/* Esta pieza de código verifica si el valor del campo de contraseña y el de confirmar contraseña no coinciden. En este caso, se le notificará al usuario de que ambas contraseñas no son coincidentes entre sí
*/
    if(form_cambio.new.value != form_cambio.confirmar_pass.value){
        document.getElementById("change2").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 87%; margin-left: 2em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Las contraseñas digitadas no coinciden</div>';
        correcto_cambio = false;
    }else if(form_cambio.new.value === form_cambio.confirmar_pass.value){
        document.getElementById("change2").innerHTML = "";
    }
    return correcto_cambio;
}

/* Esta función permite que las alertas aparezcan en caso de que haya algún un dato ingresado de manera indebida una vez se trata de enviar el formulario para cambiar la contraseña. En este caso se ha hecho uso de la función 'onsubmit'ubicada en el formulario del archivo 'system_admin.php'
*/
function enviado_pass(){

var correcto_enviado = true;
var form_dos = document.form_pass;

    if(form_dos.actual.value == ""){
        document.getElementById("change").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 87%; margin-left: 2em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Escriba su contraseña actual</div>';
        correcto_enviado = false;
    }else if(form_dos.actual.value == true){
        document.getElementById("change").innerHTML = "";
    }

    /* Esta pieza de código verifica si la nueva contraseña y la confirmación de esta coinciden correctamente. En caso de no hacerlo, se lanzará una alerta pidiendo al usuario que rectifique esto. */
    if(form_dos.new.value != form_dos.confirmar_pass.value || form_dos.new.value == "" && form_dos.confirmar_pass.value == ""){
        document.getElementById("change2").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 87%; margin-left: 2em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Las contraseñas digitadas no coinciden</div>';
        correcto_enviado = false;
    }
    /* Pieza de código para verificar si la nueva contraseña y la confirmación de esta no se encuentran vacías. En caso de estarlo, se lanzará una alerta */
    if(form_dos.new.value == "" && form_dos.confirmar_pass.value == ""){
        document.getElementById("change2").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 87%; margin-left: 2em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese por favor su nueva contraseña y confirmerla</div>';
        correcto_enviado = false;
    }
    return correcto_enviado;
}

/* Este código JQuery permite mostrar y ocultar las contraseñas en el formulario de registro. Una vez todo el documento haya sido cargado correctamente, esta función puede ser utilizada.
*/
$(document).ready(function(){
    // El evento '.click' indica que al darse click en el icono correspondiente a su id la función está se activara
    $('#passwords').click(function(){
        // Si el icono contiene en ese mismo momento la clase que es prederteminada para él, se removerá el tipo de dato a los campos de contraseña y confirmar contraseña, el cual es conocido como 'password'
        if($(this).hasClass('fa-eye')){
            $('#actual').removeAttr('type');
            $('#new_pass').removeAttr('type');
            $('#confirmar_pass').removeAttr('type');
            // Aquí se añade una nueva clase al ícono con el id '#show_password' y remueve la que tenía anteriormente
            $('#passwords').addClass('fa-eye-slash').removeClass('fa-eye');
            // Aquí se añade un nuevo título al ícono por medio de un llamado al atributo 'title'
            $('#passwords').attr('title', 'Ocultar contraseñas');
        }else{
        /* En caso de que se volviera a hacer click nuevamente al ícono, este devolvería el tipo de dato a los campos de contraseña al que poseían en un principio, añadaría la clase prederteminada al ícono otra vez y cambiaría el título de este. 
        */
            $('#actual').attr('type', 'password');
            $('#new_pass').attr('type', 'password');
            $('#confirmar_pass').attr('type', 'password');
            $('#passwords').addClass('fa-eye').removeClass('fa-eye-slash');
            $('#passwords').attr('title', 'Mostrar contraseñas');
        }
    });
});
