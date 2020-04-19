/* Función creada para verificar que los datos ingresados correspondan a solo números. Se usa una expresión regular para que solo haya existencia desde el número 0 hasta el 9 en la función, comparando el parámetro 'param3' para verificar si es diferente o si es correcto con lo que se ha ingresado en el campo correspondiente.
*/
function SoloNumeros(param3) {
    if (!/^([0-9])*$/.test(param3)) {
        return false;
    } else {
        return true;
    }
}

/* Función creada para validar todos los campos del formulario de registro. Mientras la variable 'correcto_login' devuelva falso por parte de alguno de los condicionales 'if' el formulario no será enviado y devolverá alertas en los campos que contengan datos no válidos. La variable 'formulario' contiene el nombre del formulario realizado en el archivo 'index.html' y, por lo tanto, puede ser llamado desde la variable. Las alertas de esta función aparecerán de manera inmediata en caso de que se ingrese algo indebido en los campos, esto debido al evento 'oninput'
*/
function validar_login() {

    var correcto_login = true;
    var formulario = document.form_login;

/* Pieza de código que llama a una función (en este caso, SoloNumeros, la cual valida que el documento del usuario contenga solo números). En caso de que el valor de la misma devuelva un valor false a la función, se hará uso del innerHTML para permitir la aparición de una alerta al llamar el id 'aviso', el cual se encuentra en el formulario de registro en el archivo 'index.html'. En caso contrario, la alerta desaparecerá al instante si la contraseña cumple con los parámetros requeridos. Este mismo proceso acontece con todas las demás alertas donde el condicional verifica si el valor ingresado devuelve un valor tipo false a la función.
*/
    if(SoloNumeros(formulario.documento.value) == false) {
        document.getElementById("aviso").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 87%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo números en el número de documento</div>';
        correcto_login = false;
    }else if(SoloNumeros(formulario.documento.value) == true){
        document.getElementById("aviso").innerHTML = "";       
    }

    if(formulario.contraseña.value == true){
        document.getElementById("aviso2").innerHTML = "";
    }
    return correcto_login;
}

/* Esta función permite que las alertas aparezcan en caso de que haya algún un dato ingresado de manera indebida una vez se trata de enviar el formulario para registrar al usuario. En este caso, se ha hecho uso del evento 'onsubmit' en el formulario de inicio de sesión en 'index.html'  
*/
function enviado_login(){

    var correcto_enviado = true;
    var formulario3 = document.form_login;

/* Esta pieza de código indica que si el valor del campo de contraseña se encuentra vacío al enviar el formulario se le pedirá a este que ingrese una. Este proceso acontece también con todos los demás campos que estén vacíos y que sean obligatorios completar
*/
    if(formulario3.contraseña.value == ""){
        document.getElementById("aviso2").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 87%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese su contraseña de usuario</div>';
        correcto_enviado = false;
    }
    if(formulario3.documento.value == ""){
        document.getElementById("aviso").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 87%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese su número de documento</div>';
        correcto_enviado = false;
    }
    return correcto_enviado;
}

/* Este código JQuery permite mostrar y ocultar la contraseña en el formulario de inicio de sesión. Una vez todo el documento haya sido cargado correctamente, esta función puede ser utilizada.
*/
$(document).ready(function() {
    $('#show_password').click(function() {
         // Si el icono contiene en ese mismo momento la clase que es prederteminada para él, se removerá el tipo de dato al campo de contraseña, el cual es conocido como 'password'
        if ($(this).hasClass('fa-eye')) {
            $('#contraseña').removeAttr('type');
         // Aquí se añade una nueva clase al ícono con el id '#show_password' y remueve la que tenía anteriormente
            $('#show_password').addClass('fa-eye-slash').removeClass('fa-eye');
         // Aquí se añade un nuevo título al ícono por medio de un llamado al atributo 'title'
            $('#show_password').attr('title', 'Ocultar contraseña');
        } else {   
/* En caso de que se volviera a hacer click nuevamente al ícono, este devolvería el tipo de dato al campo de contraseña al que poseía en un principio, añadaría la clase prederteminada al ícono otra vez y cambiaría el título de este. 
*/
            $('#contraseña').attr('type', 'password');
            $('#show_password').addClass('fa-eye').removeClass('fa-eye-slash');
            $('#show_password').attr('title', 'Mostrar contraseña');
        }
    });
});
