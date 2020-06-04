// La función 'validar_password' es creada para validar la contraseña ingresada por el usuario:
 /* function validar_password(contrasena){
    // Los parámetros para que la contraseña sea valida es que la misma contenga por lo menos 8 caracteres, una mayúscula, una minúscula, un número y un caracter especial o raro: 
    if(contrasena.length >=8){
        var mayus = false;
        var minus = false;
        var num = false;
        var especial = false;

        // Mientras la contraseña contenga por lo menos 8 caracteres y cumpla con solo una de las condiciones anteriormente dichas, el valor correspondiente devolverá false, hasta que los demás parametros sean cumplidos y la contraseña sea finalmente correcta, devolviendo así true:
        for(var i = 0;i<contrasena.length;i++){
            if(contrasena.charCodeAt(i) >= 65 && contrasena.charCodeAt(i) <= 90){
                mayus = true;
            }else if(contrasena.charCodeAt(i) >= 97 && contrasena.charCodeAt(i) <= 122){
                minus = true;
            }else if(contrasena.charCodeAt(i) >=48 && contrasena.charCodeAt(i) <= 57){
                num = true
            }else{
                especial = true;
            }
        }
        if(mayus == true && minus == true && num == true && especial == true){
            return true;
        }
    }
    // En caso de no cumplir con todos los parámetros, se devolverá un valor false: 
    return false;
} */

/* 1) LAS ALERTAS BOOTSTRAP SON LLAMADAS HACIENDO PRIMERAMENTE REFERENCIA AL DOCUMENTO O ARCHIVO EN CUESTIÓN, LUEGO OBTENIENDO EL ID DE UN ELEMENTO UBICADO EN LOS ARCHIVOS 'system.php', 'system_admin.php', 'form_cambio.php' O 'ACTION_restaurar_pass.php' Y SEGUIDAMENTE SE HACE USO DEL innerHTML PARA INCLUIR CÓDIGO HTML Y PODER AÑADIR LA ALERTA CON SU RESPECTIVA INFORMACIÓN. EN CASO DE NO INCLUIR CÓDIGO HTML, NINGUNA ALERTA APARECERÁ. */

// 2) TANTO LAS FUNCIONES DE 'validacion_pass' Y LA DE 'enviado_pass' DEBEN DEVOLVER VALORES TRUE PARA QUE EL FORMULARIO DE CAMBIAR CONTRASEÑA SEA ENVIADO SIN PROBLEMA ALGUNO. LO ANTERIOR TAMBIÉN SUCEDE CON LAS FUNCIONES 'cambio_pass' Y 'enviado_cambio_pass' PARA CON EL FORMULARIO DE RESTAURAR CONTRASEÑA:

// La función 'validacion_pass' es creada para validar todos los campos del formulario de cambiar contraseña en el archivo 'system.php' o en 'system_admin.php'. Las alertas de esta función aparecerán de manera inmediata en caso de que se ingrese algo indebido en los campos, esto gracias al evento 'oninput' de JavaScript:
function validacion_pass(){

    // Mientras la variable 'correcto_cambio' devuelva false por parte de alguno de los condicionales 'if' el formulario no será enviado y devolverá alertas de Bootstrap en los campos que contengan datos no válidos:
    var correcto_cambio = true;
    // La variable 'form_cambio' contiene el nombre del formulario realizado en los archivos 'system_admin.php' y 'system.php' y, por lo tanto, puede ser llamado desde dicha variable para verificar los campos del mismo con el condicional 'if':
    var form_cambio = document.form_pass;

    // Esta pieza de código, indica que si el valor del campo de contraseña actual se encuentra vacío al enviar el formulario, se le pedirá a este que ingrese una. Este proceso acontece también con todos los demás campos que estén vacíos y que sean obligatorios completar:
    if(form_cambio.actual.value == ""){
        document.getElementById("change").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Digite su contraseña actual</div>';
        // La variable 'correcto_cambio' es devuelta con un valor false:
        correcto_cambio = false;
    // Si se ingresan datos en el campo, la alerta desaparecerá automaticamente. Esto mismo sucede con los demás condicionales que tengan las mismas pautas en este archivo:
    }else{
        document.getElementById("change").innerHTML = "";
    }

    // Esta pieza de código verifica si el valor del campo de contraseña y el de confirmar contraseña no coinciden. En este caso, se le notificará con una alerta al usuario de que esto es así:
    if(form_cambio.new.value != form_cambio.confirmar_pass.value){
        document.getElementById("change2").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Las contraseñas digitadas no coinciden</div>';
        correcto_cambio = false;
    // En caso de que ambas contraseñas coincidan, la alerta de Bootstrap desaparecerá automaticamente:
    }else{
        document.getElementById("change2").innerHTML = "";
    }

    // Pieza de código que llama a una función (en este caso, validar_password, la cual valida que la contraseña contenga los parámetros requeridos):
    /*  if(validar_password(form_cambio.new.value) == false){
        // En caso de que el valor de la misma devuelva un valor false a la función, se hará uso del innerHTML para permitir la aparición de una alerta de Bootstrap al llamar el id 'change3', el cual se encuentra en el formulario de registro en el archivo 'system.php' y 'system_admin.php':
        document.getElementById("change3").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Las contraseña no cumple con los parámetros requeridos</div>';
        correcto_cambio = false;
        // En caso contrario, la alerta desaparecerá al instante si la contraseña cumple con los parámetros requeridos. Este mismo proceso acontece con todas las demás alertas donde el condicional verifica si el valor ingresado devuelve un valor tipo false a la función. 
    }else if(validar_password(form_cambio.new.value) == true){
        document.getElementById("change3").innerHTML = "";
    } */

    // El siguiente código lanza una alerta de Bootstrap indicando que la contraseña actual y la contraseña nueva son las mismas. Mientras estas coincidan, la variable 'correcto_cambio' devolverá false:
    if(form_cambio.actual.value === form_cambio.new.value){
        document.getElementById("change3").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold; margin-top: -1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Por favor ingrese una contraseña diferente a la actual</div>';
        correcto_cambio = false;
    // Si ambas dejan de coincidir, la alerta desaparecerá automaticamente y el valor devuelto será true:
    }else if(form_cambio.actual.value != form_cambio.new.value){
        document.getElementById("change3").innerHTML = "";
    }
    // Se devuelve el valor de la variable correcto_cambio. Si es true, el formulario no tendrá incovenientes con las alertas de esta función; caso contrario, el formulario lanzara alertas de error, las cuales pueden corresponder también a la función 'enviado_pass':
    return correcto_cambio;
}

/* La función 'enviado_pass' permite que las alertas aparezcan en caso de que haya algún dato ingresado de manera indebida una vez se trata de enviar el formulario para cambiar la contraseña. En este caso se ha hecho uso del evento 'onsubmit' ubicado en el formulario de los archivos 'system_admin.php' y 'system.php': */
function enviado_pass(){

var correcto_enviado = true;
var form_dos = document.form_pass;

    if(form_dos.actual.value == ""){
        document.getElementById("change").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Digite su contraseña actual</div>';
        correcto_enviado = false;
    }else{
        document.getElementById("change").innerHTML = "";
    }

    /* Esta pieza de código verifica si la nueva contraseña y la confirmación de esta coinciden correctamente. En caso de no hacerlo, se lanzará una alerta pidiendo al usuario que rectifique esto: */
    if(form_dos.new.value != form_dos.confirmar_pass.value){
        document.getElementById("change2").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Las contraseñas digitadas no coinciden</div>';
        correcto_enviado = false;
    }

    // Pieza de código para verificar si los campos de nueva contraseña y la confirmación de contraseña no se encuentran vacías. En caso de estarlo, se lanzará una alerta:
    if(form_dos.new.value == "" && form_dos.confirmar_pass.value == ""){
        document.getElementById("change2").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese por favor su nueva contraseña y confirmela</div>';
        correcto_enviado = false;
    }
    // Se regresa la variable 'correcto_enviado', la cual tiene las mismas características que la variable 'correcto_cambio' de la función anterior:
    return correcto_enviado;
}

// La función 'cambio_pass' permite la aparición de una alerta Bootstrap en el formulario de restauración de contraseña. Dicha alerta aparece cuando las dos contraseñas ingresadas en los campos del formulario no coinciden, esto gracias al evento 'oninput':
function cambio_pass(){

    var cambio_pass_correcto = true;
    var form_change_pass = document.form_pass;
    
    if(form_change_pass.new_pass.value != form_change_pass.confirmar_pass.value){
        document.getElementById("change2").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Las contraseñas no coinciden</div>';
        cambio_pass_correcto = false;
    }else{
        document.getElementById("change2").innerHTML = "";
    }
    // Se devuelve la variable 'cambio_pass_correcto' con un valor true o false:
    return cambio_pass_correcto;
}

// La función 'enviado_cambio_pass' permite la aparición de una alerta en caso de que los campos de contraseña en el formulario de recuperación de contraseña se encuentren vacíos. Esta alerta aparece después de que se trata de enviar el formulario, esto gracias al evento 'onsubmit':
function enviado_cambio_pass(){

    var cambio_correcto = true;
    var form_change = document.form_pass;

    if(form_change.new_pass.value == ""){
        document.getElementById("change3").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold; margin-top: -1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese por favor su nueva contraseña</div>';
        cambio_correcto = false;
    }else{
        document.getElementById("change3").innerHTML = "";
    }

    if(form_change.confirmar_pass.value == ""){
        document.getElementById("change2").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Por favor confirme su nueva contraseña</div>';
        cambio_correcto = false;
    }
    // Se regresa la variable 'cambio_correcto' con un valor true o false:
    return cambio_correcto;
} 

// El siguiente código JQuery permite mostrar y ocultar las contraseñas en el formulario de cambio de contraseña y de restauración de contraseña. Una vez todo el código HTML haya sido cargado correctamente, esta función puede ser utilizada:
$(document).ready(function(){
    // El evento '.click' indica que al darse click en el icono correspondiente a su id la función se activará:
    $('#passwords').click(function(){
        // Si el icono contiene en ese mismo momento la clase que es prederteminada para él, se removerá el tipo de dato, el cual es conocido como 'password', a los tres campos del formulario; esto sucediendo al darle click al icono:
        if($(this).hasClass('fa-eye')){
            $('#actual').removeAttr('type');
            $('#new_pass').removeAttr('type');
            $('#confirmar_pass').removeAttr('type');
            // Aquí se añade una nueva clase al icono con el id '#passwords' y remueve la que tenía en un principio. Entiéndase que, en este caso, por clase se está haciendo referencia a un icono diferente al predeterminado:
            $('#passwords').addClass('fa-eye-slash').removeClass('fa-eye');
            // Aquí se añade un nuevo título al icono por medio de un llamado al atributo 'data-original-title', que permite mostrar un tooltip de Bootstrap (una pequeña caja con texto) al lado del icono:
            $('#passwords').attr('data-original-title', "Ocultar contraseñas").tooltip('show');
        }else{
        // En caso de que se volviera a hacer click nuevamente al icono, este devolvería el tipo de dato a los campos de contraseña a los que poseían en un principio:
            $('#actual').attr('type', 'password');
            $('#new_pass').attr('type', 'password');
            $('#confirmar_pass').attr('type', 'password');
            // Se añade otra vez la clase predeterminada al icono:
            $('#passwords').addClass('fa-eye').removeClass('fa-eye-slash');
            // Se cambia nuevamente el título al icono:
            $('#passwords').attr('data-original-title', "Mostrar contraseñas").tooltip('show');
        }
    });
});

// El siguiente código permite que una ventana modal bootstrap se abra automaticamente una vez el documento ha sido cargado por completo:
$( document ).ready(function() {
    $('#pass_recovery').modal('toggle')
});
// El siguiente código evita que la ventana modal abierta anteriormente pueda ser cerrada si se da click por fuera de la misma:
$('#pass_recovery').modal({backdrop: 'static', keyboard: false})