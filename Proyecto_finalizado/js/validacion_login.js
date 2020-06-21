// La función 'SoloNumeros' es creada para verificar que los datos ingresados en un campo correspondan a solo números:
function SoloNumeros(param3) {
    // Se usa una expresión regular para que solo haya existencia desde el número 0 hasta el 9 en la función, comparando el parámetro 'param3' para verificar si es diferente o si es correcto con lo que se ha ingresado en el campo correspondiente: 
    if (!/^([0-9])*$/.test(param3)) {
        return false;
    } else {
        return true;
    }
}

// 1) LAS ALERTAS BOOTSTRAP SON LLAMADAS HACIENDO PRIMERAMENTE REFERENCIA AL DOCUMENTO O ARCHIVO EN CUESTIÓN, LUEGO OBTENIENDO EL ID DE UN ELEMENTO UBICADO EN EL ARCHIVO 'index.php' Y SEGUIDAMENTE SE HACE USO DEL innerHTML PARA INCLUIR CÓDIGO HTML Y PODER AÑADIR LA ALERTA CON SU RESPECTIVA INFORMACIÓN. EN CASO DE NO INCLUIR CÓDIGO HTML, NINGUNA ALERTA APARECERÁ.

// 2) TANTO LAS FUNCIONES DE 'validar_login' Y LA DE 'enviado_login' DEBEN DEVOLDER VALORES TRUE PARA QUE EL FORMULARIO SEA ENVIADO SIN PROBLEMA ALGUNO:

// La función'validar_login' es creada para validar todos los campos del formulario de inicio de sesión. Algunas alertas de Bootstrap aparecerán de manera inmediata en caso de que se ingrese algún caracter indebido en los campos, esto gracias al evento 'oninput' de JavaScript:
function validar_login() {

    // Mientras la variable 'correcto_login' devuelva false por parte de alguno de los condicionales 'if', el formulario no será enviado y devolverá alertas en los campos que contengan inconsistencias o caracteres no válidos:
    var correcto_login = true;
    // La variable 'formulario' contiene el nombre del formulario realizado en el archivo 'index.php' y, por lo tanto, puede ser llamado desde dicha variable para verificar los campos del mismo con el condicional 'if':
    var formulario = document.form_login;

// Pieza de código que llama a una función (en este caso, SoloNumeros, la cual valida que el documento del usuario contenga solo números). Este mismo proceso acontece con todas las demás alertas donde el condicional 'if' verifica si el valor ingresado devuelve un valor tipo false o true a la función:
    if(SoloNumeros(formulario.documento.value) == false) {
        // En caso de que el valor escrito en el campo devuelva un valor false a la función, se hará uso del innerHTML para permitir la aparición de una alerta Bootstrap al llamar el id 'aviso', el cual se encuentra en el formulario de inicio de sesión en el archivo 'index.php':
        document.getElementById("aviso").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo números en el número de documento</div>';
        // La variable 'correcto_login' devuelve un valor false:
        correcto_login = false;
    }else{
        // En caso contrario (si el valor del condicional es true), la alerta desaparecerá al instante, ya que el documento contiene solo números en el campo. Además la variable 'correcto_login' ahora devolverá un valor true:
        document.getElementById("aviso").innerHTML = "";       
    }
    // Se regresa la variable 'correcto_login' para verificar si todos los datos son correctos. En caso de ser true, no aparecerán alertas por parte de esta función; caso contrario, la función lanzará las alertas de error, las cuales pueden estar también relacionadas con la función 'enviado_login':
    return correcto_login;
}

// La función 'enviado_login' permite que las alertas Bootstrap aparezcan en caso de que haya algún dato ingresado de manera indebida una vez se trata de enviar el formulario de iniciar sesión. En este caso, se ha hecho también uso del evento 'onsubmit' en el formulario de inicio de sesión en el archivo 'index.php':
function enviado_login(){

    var correcto_enviado = true;
    var formulario3 = document.form_login;

// Esta pieza de código indica que, si el valor del campo de contraseña se encuentra vacío al enviar el formulario, se le pedirá a este que ingrese una. Este proceso acontece también con todos los demás campos que estén vacíos y que sean obligatorios completar:
    if(formulario3.contraseña.value == ""){
        // Si el campo de contraseña está vacío, aparecerá la siguiente alerta bootstrap:
        document.getElementById("aviso2").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese su contraseña de usuario</div>';
        correcto_enviado = false;
    }else{
        // Por otro lado, la alerta desaparecerá en caso de que se introduzcan datos dentro del campo:
        document.getElementById("aviso2").innerHTML = "";
    }
    if(formulario3.documento.value == ""){
        // Si el campo de número de documento está vacío, aparecerá la siguiente alerta Bootstrap:
        document.getElementById("aviso").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese su número de documento</div>';
        correcto_enviado = false;
    }
    // Si la variable 'correcto_enviado' devuelve un valor true, la alerta del documento y de la contraseña desaparecerán, usando de esta última el id 'aviso2' que es utilizado en la función 'validar_login' de este archivo; caso contrario, el formulario no será enviado y se mantendrán las alertas hasta que los datos ingresados sean correctos:
    return correcto_enviado;
}

// La siguiente función, llamada 'enviado_email', devolverá una alerta en caso de que el usuario no haya escrito ningún correo electrónico en el campo del formulario de recuperar contraseña, el cual se haya ubicado en el archivo 'index.php':
 function enviado_email(){

    var correo_enviado = true;
    var form_cambio = document.recuperar_pass;

    if(form_cambio.email.value == ""){
        // Si el campo de correo electrónico se encuentra vacío, aparecerá la siguiente alerta bootstrap:
        document.getElementById("warning3").innerHTML = '<div class="d-flex justify-content-center text-center"><div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold; width: 70.3%;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese un correo electrónico</div></div>';
        correo_enviado = false;
    }else{
        // En caso de que el usuario escriba en el campo, la alerta desaparecerá de manera automática:
        document.getElementById("warning3").innerHTML = "";
    }
    // Se devuelve el valor true o false a la variable 'correcto_enviado':
    return correo_enviado;  
}

// El siguiente código JQuery permite mostrar y ocultar la contraseña en el formulario de inicio de sesión. Una vez todo el código HTML haya sido cargado correctamente, esta función puede ser utilizada:
$(document).ready(function() {
    // El evento '.click' indica que al darse click en el icono correspondiente a su id la función se activará:
    $('#show_password').click(function() {
         // Si el icono contiene en ese mismo momento la clase que es prederteminada para él, se removerá el tipo de dato, el cual es conocido como 'password', al campo de contraseña al dar click en el icono:
        if ($(this).hasClass('fa-eye')) {
            $('#contraseña').removeAttr('type');
         // Aquí se añade una nueva clase al icono con el id '#show_password' y remueve la que tenía en un principio. Entiéndase que, en este caso, por clase se está haciendo referencia a un icono diferente al predeterminado:
            $('#show_password').addClass('fa-eye-slash').removeClass('fa-eye');
         // Aquí se añade un nuevo título al icono por medio de un llamado al atributo 'data-original-title', que permite mostrar un tooltip de Bootstrap (una pequeña caja con texto) al lado del icono:
            $('#show_password').attr('data-original-title', "Ocultar contraseña").tooltip('show');
        } else {   
            // En caso de que se volviera a hacer click nuevamente al icono, este devolvería el tipo de dato al campo de contraseña al que poseía en un principio:
            $('#contraseña').attr('type', 'password');
            // Se añade otra vez la clase predeterminada al icono:
            $('#show_password').addClass('fa-eye').removeClass('fa-eye-slash');
            // Se cambia nuevamente el título al icono:
            $('#show_password').attr('data-original-title', "Mostrar contraseña").tooltip('show');
        }
    });
});
