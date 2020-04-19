/* 
Función creada para verificar que los datos ingresados en el campo sean unicamente letras. Se ha hecho uso de una expresión regular la cual verifica las letras de la 'A' a la 'Z' tanto en mayúsculas como en minísculas, además de verificar si en el campo se ingresa alguna vocal con tílde o una letra propia del idioma español como la 'Ñ'. En caso de que el parámetro no cumpla con el requisito de que sean solo letras se devolverá un valor false
*/
function SoloLetras(parametro){
    var patron = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/;
    if(parametro.search(patron)){
        return false;
    } else{
        return true;
    }
}
/* Función creada para verificar que los datos ingresados correspondan a solo números. Se usa una expresión regular para que solo haya existencia desde el número 0 hasta el 9 en la función, comparando el parámetro 'param3' para verificar si es diferente o si es correcto con lo que se ha ingresado en el campo correspondiente.
*/
function SoloNumeros(param3){
    if(!/^([0-9])*$/.test(param3)){
        return false;
    }else{
        return true;
    }
}
/* Función creada para validar el email por medio de una expresión regular. La expresión sigue el patrón correspondiente a un correo común, es decir: nombre del correo, servidor y dominio. En caso de que el usuario escriba en el campo un correo que cumpla con estas carecterísticas correctamente, el parámetro conocido como 'valor' será comparado con la expresión para devolver un valor true 
*/
function ValidarEmail(valor){
    if(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(valor)){
        return true;
    } else{
        return false;
    }
}
/* Función creada para evitar el ingreso de espacios por parte del usuario al momento de tratar de ingresar algún dato en un campo. La variable 'patron2' contiene la expresión regular que será comparada con el parámetro 'param2'
*/
function validar_espacios(param2){
    var patron2 = /^\s+$/;
    if(patron2.test(param2)){
        return false;
    }else{
        return true;
    }
}
/* Función creada para validar la contraseña ingresada por el usuario. Los parámetros para que la contraseña sea valida es que la misma contenga por lo menos 8 caracteres, una mayúscula, una minúscula, un número y un caracter especial o raro. Mientras la contraseña contenga por lo menos 8 caracteres y cumpla con una de las condiciones anteriormente dichas, el valor correspondiente devolverá true, hasta que los demás parametros sean cumplidos y la contraseña sea finalmente correcta; de otro modo devolverá un valor false 
*/
function validar_password(contrasena){
    if(contrasena.length >=8){
        var mayus = false;
        var minus = false;
        var num = false;
        var especial = false;

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
    return false;
}

/* Función creada para validar todos los campos del formulario de registro. Mientras la variable 'correcto_registrar' devuelva falso por parte de alguno de los condicionales 'if' el formulario no será enviado y devolverá alertas en los campos que contengan datos no válidos. La variable 'formulario' contiene el nombre del formulario realizado en el archivo 'sign_up.php' y, por lo tanto, puede ser llamado desde la variable. Las alertas de esta función aparecerán de manera inmediata en caso de que se ingrese algo indebido en los campos, esto debido al evento 'oninput'
*/
function validar_registro(){

    var correcto_registrar = true;
    var formulario = document.form_registro;

/* Pieza de código que llama a una función (en este caso, validar_password, la cual valida que la contraseña contenga los parámetros requeridos). En caso de que el valor de la misma devuelva un valor false a la función, se hará uso del innerHTML para permitir la aparición de una alerta al llamar el id 'alerta5', el cual se encuentra en el formulario de registro en el archivo 'sign_up.php'. En caso contrario, la alerta desaparecerá al instante si la contraseña cumple con los parámetros requeridos. Este mismo proceso acontece con todas las demás alertas donde el condicional verifica si el valor ingresado devuelve un valor tipo false a la función.
*/
    if(validar_password(formulario.contraseña.value) == false){
        document.getElementById("alerta5").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>La contraseña no cumple con los parámetros requeridos</div>';
        correcto_registrar = false;
    }else if(validar_password(formulario.contraseña.value) == true){
        document.getElementById("alerta5").innerHTML = "";
    } 

    if(validar_espacios(formulario.contraseña.value) == false){
        document.getElementById("alerta5").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese una contraseña</div>';
        correcto_registrar = false;
    }
    if(validar_espacios(formulario.confirmar_contraseña.value) == false){
        document.getElementById("alerta6").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Confirme su contraseña</div>';
        correcto_registrar = false;
    }else if(formulario.contraseña.value === formulario.confirmar_contraseña.value){
        document.getElementById("alerta6").innerHTML = "";
    }

    if(ValidarEmail(form_registro.email.value) == true){
        document.getElementById("alerta4").innerHTML = "";
    }

    if(SoloNumeros(form_registro.documento.value) == false){
        document.getElementById("alerta3").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo números para el número de documento</div>';
        correcto_registrar = false;
    }else if(validar_espacios(formulario.documento.value) == false){
        document.getElementById("alerta3").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese su número de documento</div>';
        formulario.documento.value = "";
        correcto_registrar = false;
    }else if(SoloNumeros(form_registro.documento.value) == true){
        document.getElementById("alerta3").innerHTML = "";
    }

    if(SoloLetras(form_registro.nombre1.value) == false){
        document.getElementById("alerta").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo letras en los nombres</div>';
        correcto_registrar = false;
    }
    if(SoloLetras(form_registro.nombre2.value) == false){
        document.getElementById("alerta9").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo letras en los nombres</div>';
        correcto_registrar = false;
    }
    if(SoloLetras(form_registro.apellido1.value) == false){
        document.getElementById("alerta2").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo letras en los apellidos</div>';
        correcto_registrar = false;
    }
    if(SoloLetras(form_registro.apellido2.value) == false){
        document.getElementById("alerta8").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo letras en los apellidos</div>';
        correcto_registrar = false;
    }
    
    if(validar_espacios(formulario.apellido1.value) == false){
        document.getElementById("alerta2").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold; width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese como mínimo su primer apellido</div>';
        formulario.apellido1.value = "";
        correcto_registrar = false;
    }else if(SoloLetras(form_registro.apellido1.value) == true){
        document.getElementById("alerta2").innerHTML = "";
    }

    if(validar_espacios(formulario.apellido2.value) == false){
        document.getElementById("alerta8").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold; width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo letras en los apellidos</div>';
        formulario.apellido2.value = "";
        correcto_registrar = false;
    }else if(SoloLetras(form_registro.apellido2.value) == true){
        document.getElementById("alerta8").innerHTML = "";
    }

    if(validar_espacios(formulario.nombre1.value) == false){
        document.getElementById("alerta").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese como mínimo su primer nombre</div>';
        formulario.nombre1.value = "";
        correcto_registrar = false;
    }else if(SoloLetras(form_registro.nombre1.value) == true){
        document.getElementById("alerta").innerHTML = "";
    }

    if(validar_espacios(formulario.nombre2.value) == false){
        document.getElementById("alerta9").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo letras en los nombres</div>';
        formulario.nombre2.value = "";
        correcto_registrar = false;
    }else if(SoloLetras(form_registro.nombre2.value) == true){
        document.getElementById("alerta9").innerHTML = "";
    }

return correcto_registrar;
}

/* Esta función permite que las alertas aparezcan en caso de que haya algún un dato ingresado de manera indebida una vez se trata de enviar el formulario para registrar al usuario.  
*/
function registro_enviado(){

    var correcto_enviado = true;
    var formulario2 = document.form_registro;

/* Esta pieza de código verifica si el valor del campo de contraseña y el de confirmar contraseña no coinciden. En este caso, se le notificará al usuario de que ambas contraseñas no son coincidentes entre sí
*/
    if(form_registro.contraseña.value != form_registro.confirmar_contraseña.value){
        document.getElementById("alerta6").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Las contraseñas digitadas no coinciden</div>';
        correcto_enviado = false;
    }

/* Esta pieza de código indica que si el valor del campo de contraseña se encuentra vacío al enviar el formulario se le pedirá a este que ingrese una. Este proceso acontece también con todos los demás campos que estén vacíos y que sean obligatorios completar
*/
    if(form_registro.contraseña.value == ""){
        document.getElementById("alerta5").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese una contraseña</div>';
        correcto_enviado = false;
    }
    if(form_registro.confirmar_contraseña.value == ""){
        document.getElementById("alerta6").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Confirme su contraseña</div>';
        correcto_enviado = false;
    }

    if(form_registro.email.value == "" || ValidarEmail(form_registro.email.value) == false){
        document.getElementById("alerta4").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>La dirección de correo electrónico es incorrecta o no se ha ingresado ninguna</div>';
        correcto_enviado = false;
    }

    if(form_registro.documento.value == ""){
        document.getElementById("alerta3").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese su número de documento</div>';
        formulario2.documento.value = "";
        correcto_enviado = false;
    }

    if(formulario2.apellido1.value == ""){
        document.getElementById("alerta2").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold; width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese como mínimo su primer apellido</div>';
        correcto_enviado = false;
    }

    if(formulario2.nombre1.value == ""){
        document.getElementById("alerta").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese como mínimo su primer nombre</div>';
        correcto_enviado = false;
    }

return correcto_enviado;
}

/* Este código JQuery permite mostrar y ocultar las contraseñas en el formulario de registro. Una vez todo el documento haya sido cargado correctamente, esta función puede ser utilizada.
*/
$(document).ready(function(){
// El evento '.click' indica que al darse click en el icono correspondiente a su id la función está se activara
    $('#show_password').click(function(){
        // Si el icono contiene en ese mismo momento la clase que es prederteminada para él, se removerá el tipo de dato a los campos de contraseña y confirmar contraseña, el cual es conocido como 'password'
        if($(this).hasClass('fa-eye')){
        $('#contraseña').removeAttr('type');
        $('#confirmar_contraseña').removeAttr('type');
        // Aquí se añade una nueva clase al ícono con el id '#show_password' y remueve la que tenía anteriormente
        $('#show_password').addClass('fa-eye-slash').removeClass('fa-eye');
        // Aquí se añade un nuevo título al ícono por medio de un llamado al atributo 'title'
        $('#show_password').attr('title', 'Ocultar contraseñas');
        }
    else{
        /* En caso de que se volviera a hacer click nuevamente al ícono, este devolvería el tipo de dato a los campos de contraseña al que poseían en un principio, añadaría la clase prederteminada al ícono otra vez y cambiaría el título de este. 
        */
        $('#contraseña').attr('type', 'password');
        $('#confirmar_contraseña').attr('type', 'password');
        $('#show_password').addClass('fa-eye').removeClass('fa-eye-slash');
        $('#show_password').attr('title', 'Mostrar contraseñas');
    }
    });
});
