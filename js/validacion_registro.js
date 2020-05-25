// la función 'SoloLetras' verifica que los datos ingresados en el campo sean unicamente letras: 
function SoloLetras(parametro){
    // Se ha hecho uso de una expresión regular la cual verifica las letras de la 'A' a la 'Z' tanto en mayúsculas como en minúsculas, además de verificar si en el campo se ingresa alguna vocal con tílde o una letra propia del idioma español como la 'ñ':
    var patron = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/;
    if(parametro.search(patron)){
        // En caso de que el parámetro no cumpla con el requisito de que sean solo letras se devolverá un valor false:
        return false;
    } else{
        // Caso contrario, se devolverá true:
        return true;
    }
}

// La función 'SoloNumeros' es creada para verificar que los datos ingresados en un campo correspondan a solo números:
function SoloNumeros(param3){
    // Se usa una expresión regular para que solo haya existencia desde el número 0 hasta el 9 en la función, comparando el parámetro 'param3' para verificar si es diferente o si es correcto con lo que se ha ingresado en el campo correspondiente: 
    if(!/^([0-9])*$/.test(param3)){
        return false;
    }else{
        return true;
    }
}

// La función 'ValidarEmail' valida el correo electrónico del usuario por medio de una expresión regular: 
function ValidarEmail(valor){
    // La expresión sigue el patrón correspondiente a un correo común, es decir: nombre del correo, servidor y dominio:
    if(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(valor)){
        // En caso de que el usuario escriba en el campo un correo que cumpla con estas carecterísticas correctamente, el parámetro conocido como 'valor' será comparado con la expresión para devolver un valor true:
        return true;
    } else{
        return false;
    }
}

// La función 'validar_espacios' evita el ingreso de espacios por parte del usuario al momento de ingresar algún dato en un campo:
function validar_espacios(param2){
    // La variable 'patron2' contiene la expresión regular que será comparada con el parámetro 'param2' para verificar si se cumple o no se cumple la expresión regular: 
    var patron2 = /^\s+$/;
    if(patron2.test(param2)){
        return false;
    }else{
        return true;
    }
}

// La función 'validar_password' es creada para validar la contraseña ingresada por el usuario:
 /* function validar_password(contrasena){
    // Los parámetros para que la contraseña sea valida es que la misma contenga por lo menos 8 caracteres, una mayúscula, una minúscula, un número y un caracter especial o raro: 
       if(contrasena.length >=8){
        var mayus = false;
        var minus = false;
        var num = false;
        var especial = false;

        // Mientras la contraseña contenga por lo menos 8 caracteres y cumpla con solo una de las condiciones anteriormente dichas, el valor correspondiente devolverá false, hasta que los demás parametros sean cumplidos y la contraseña sea finalmente correcta, devolviendo así un valor true:
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

// 1) LAS ALERTAS BOOTSTRAP SON LLAMADAS HACIENDO PRIMERAMENTE REFERENCIA AL DOCUMENTO O ARCHIVO EN CUESTIÓN, LUEGO OBTENIENDO EL ID DE UN ELEMENTO UBICADO EN EL ARCHIVO 'sign_up.php' Y SEGUIDAMENTE SE HACE USO DEL innerHTML PARA INCLUIR CÓDIGO HTML Y PODER AÑADIR LA ALERTA CON SU RESPECTIVA INFORMACIÓN. EN CASO DE NO INCLUIR CÓDIGO HTML, NINGUNA ALERTA APARECERÁ.
// 2) TANTO LAS FUNCIONES DE 'validar_registro' Y LA DE 'registro_enviado' deben devolver valores true para que el formulario sea enviado sin problema alguno:

// La función 'validar_registro' es creada para validar todos los campos del formulario de registro.  Las alertas de esta función aparecerán de manera inmediata en caso de que se ingrese algo indebido en los campos, esto debido al evento 'oninput' de JavaScript:
function validar_registro(){
    // Mientras la variable 'correcto_registrar' devuelva false por parte de alguno de los condicionales 'if' el formulario no será enviado y devolverá alertas en los campos que contengan datos no válidos:
    var correcto_registrar = true;
    // La variable 'formulario' contiene el nombre del formulario realizado en el archivo 'sign_up.php' y, por lo tanto, puede ser llamado desde dicha variable para verificar los campos del mismo con el condicional 'if':
    var formulario = document.form_registro;

    // Pieza de código que llama a una función (en este caso, validar_password, la cual valida que la contraseña contenga los parámetros requeridos):  
/*    if(validar_password(formulario.contraseña.value) == false){
      // En caso de que el valor de la misma devuelva un valor false a la función, se hará uso del innerHTML para permitir la aparición de una alerta al llamar el id 'alerta5', el cual se encuentra en el formulario de registro en el archivo 'sign_up.php':
        document.getElementById("alerta5").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>La contraseña no cumple con los parámetros requeridos</div>';
        correcto_registrar = false;
        // En caso contrario, la alerta desaparecerá al instante si la contraseña cumple con los parámetros requeridos. Este mismo proceso acontece con todas las demás alertas donde el condicional verifica si el valor ingresado devuelve un valor tipo false a la función: 
    }else if(validar_password(formulario.contraseña.value) == true){
        document.getElementById("alerta5").innerHTML = "";
    } */

    // El siguiente código hace uso de la función 'validar_espacios', la cual lanza una alerta bootstrap en caso de que haya espacios en el campo de ingresar una contraseña: 
    if(validar_espacios(formulario.contraseña.value) == false){
        document.getElementById("alerta5").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese una contraseña</div>';
        correcto_registrar = false;
    // En caso de que una contraseña sea ingresada, la alerta bootstrap desaparecerá automaticamente:
    }else if(formulario.contraseña.value == true){
        document.getElementById("alerta5").innerHTML = "";
    }

    if(validar_espacios(formulario.confirmar_contraseña.value) == false){
        document.getElementById("alerta6").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Confirme su contraseña</div>';
        correcto_registrar = false;
    // En caso de que el campo de ingresar contraseña y el de confirmar contraseña coincidan con sus datos, la alerta anterior desaparecerá automaticamente:
    }else if(formulario.contraseña.value === formulario.confirmar_contraseña.value){
        document.getElementById("alerta6").innerHTML = "";
    }

    // Si el campo de correo electrónico contiene un e-mail con la estructura válida, es decir, la función 'ValidarEmail' devuelve true, la alerta bootstrap desaparecerá en caso de haber enviado el formulario vacío o con un e-mail no válido con anterioridad:
    if(ValidarEmail(form_registro.email.value) == true){
        document.getElementById("alerta4").innerHTML = "";
    }

    // En el siguiente condicional se hace uso de la función 'SoloNumeros' para verificar si el campo de número de documento contiene unicamente números. En caso de que la función devuelva false, la alerta bootstrap aparecerá automaticamente:
    if(SoloNumeros(form_registro.documento.value) == false){
        document.getElementById("alerta3").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo números para el número de documento</div>';
        correcto_registrar = false;
    // En otro caso, se utiliza un condicional con la función 'validar_espacios' para verificar si el campo contiene espacios innecesarios. En caso de ser así, la alerta bootstrap indicando esto aparecerá:
    }else if(validar_espacios(formulario.documento.value) == false){
        document.getElementById("alerta3").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese su número de documento</div>';
        // Para evitar que se añadan espacios, la siguiente línea de código limpia de manera automática e inmediata el campo en caso de detectar el uso de la barra espaciadora:
        formulario.documento.value = "";
        correcto_registrar = false;
    // Finalmente, si la función 'SoloNumeros' devuelve un valor true, es decir, si solo hay números en el campo, la alerta bootstrap desaparecerá:
    }else if(SoloNumeros(form_registro.documento.value) == true){
        document.getElementById("alerta3").innerHTML = "";
    }

    // En los siguientes 4 condicionales se hace uso de la función 'SoloLetras' para verificar si en los campos de primer nombre, segundo nombre, primer apellido o segundo apellido hay algún caracter que no corresponda a una letra. En caso de ser así, una alerta aparecerá abajo del campo o de los campos que contengan dicha inconsistencia:
    if(SoloLetras(form_registro.nombre1.value) == false){
        document.getElementById("alerta").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo letras en los nombres</div>';
        correcto_registrar = false;
    }
    if(SoloLetras(form_registro.nombre2.value) == false){
        document.getElementById("alerta9").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo letras en los nombres</div>';
        correcto_registrar = false;
    }
    if(SoloLetras(form_registro.apellido1.value) == false){
        document.getElementById("alerta2").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo letras en los apellidos</div>';
        correcto_registrar = false;
    }
    if(SoloLetras(form_registro.apellido2.value) == false){
        document.getElementById("alerta8").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo letras en los apellidos</div>';
        correcto_registrar = false;
    }
    
    // En estos últimos condicionales de esta función, se hace uso de la función 'validar_espacios' para verificar si el usuario trata de ingresar espacios innecesarios en los campos de primer nombre, segundo nombre, primer apellido o segundo apellido. En caso de ser así, una alerta bootstrap aparecerá abajo de aquel o aquellos campos que contengan incosistencias:
    if(validar_espacios(formulario.apellido1.value) == false){
        document.getElementById("alerta2").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese como mínimo su primer apellido</div>';
        // Los espacios son borrados de manera automática e inmediata en caso de ser ingresados:
        formulario.apellido1.value = "";
        correcto_registrar = false;
    // En caso de que la función 'SoloLetras' devuelva un valor true, es decir, que los campos de los nombres o apellidos contengan solo letras, la alerta desaparecerá del campo que contenga los parámetros indicados: 
    }else if(SoloLetras(form_registro.apellido1.value) == true){
        document.getElementById("alerta2").innerHTML = "";
    }

    if(validar_espacios(formulario.apellido2.value) == false){
        document.getElementById("alerta8").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo letras en los apellidos</div>';
        formulario.apellido2.value = "";
        correcto_registrar = false;
    }else if(SoloLetras(form_registro.apellido2.value) == true){
        document.getElementById("alerta8").innerHTML = "";
    }

    if(validar_espacios(formulario.nombre1.value) == false){
        document.getElementById("alerta").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese como mínimo su primer nombre</div>';
        formulario.nombre1.value = "";
        correcto_registrar = false;
    }else if(SoloLetras(form_registro.nombre1.value) == true){
        document.getElementById("alerta").innerHTML = "";
    }

    if(validar_espacios(formulario.nombre2.value) == false){
        document.getElementById("alerta9").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo letras en los nombres</div>';
        formulario.nombre2.value = "";
        correcto_registrar = false;
    }else if(SoloLetras(form_registro.nombre2.value) == true){
        document.getElementById("alerta9").innerHTML = "";
    }
// Se devuelve la variable 'correcto_registrar'. En caso de que sea true, la función 'validar_registro' no devolverá ninguna alerta contenida en ella, indicando que el formulario puede ser enviado sin problemas:
return correcto_registrar;
}

// La función 'registro_enviado' permite que las alertas aparezcan en caso de que haya algún dato ingresado de manera indebida una vez se trata de enviar el formulario para registrar al usuario: 
function registro_enviado(){

    var correcto_enviado = true;
    var formulario2 = document.form_registro;

    // Esta pieza de código verifica si el valor del campo de contraseña y el de confirmar contraseña no coinciden. En este caso, se le notificará al usuario de que ambas contraseñas no son coincidentes entre sí:
    if(form_registro.contraseña.value != form_registro.confirmar_contraseña.value){
        document.getElementById("alerta6").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Las contraseñas digitadas no coinciden</div>';
        correcto_enviado = false;
    }

    // Esta pieza de código indica que si el valor del campo de contraseña se encuentra vacío al enviar el formulario se le pedirá al usuario que ingrese una. Este mismo proceso acontece también con todos los demás campos que estén vacíos y que sean obligatorios completar, como el campo de correo electrónico o el campo de número de documento:
    if(form_registro.contraseña.value == ""){
        document.getElementById("alerta5").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese una contraseña</div>';
        correcto_enviado = false;
    }

    if(form_registro.confirmar_contraseña.value == ""){
        document.getElementById("alerta6").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Confirme su contraseña</div>';
        correcto_enviado = false;
    }

    // En el siguiente condicional se hace uso de la función 'ValidarEmail' para verificar si el correo electrónico ingresado cumple o no cumple con la estructura correcta:
    if(form_registro.email.value == "" || ValidarEmail(form_registro.email.value) == false){
        document.getElementById("alerta4").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>La dirección de correo electrónico es incorrecta o no se ha ingresado ninguna</div>';
        correcto_enviado = false;
    }

    if(form_registro.documento.value == ""){
        document.getElementById("alerta3").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese su número de documento</div>';
        correcto_enviado = false;
    }

    if(formulario2.apellido1.value == ""){
        document.getElementById("alerta2").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese como mínimo su primer apellido</div>';
        correcto_enviado = false;
    }

    if(formulario2.nombre1.value == ""){
        document.getElementById("alerta").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese como mínimo su primer nombre</div>';
        correcto_enviado = false;
    }
// Se devuelve la variable 'correcto_enviado', la cual cumple con las mismas funciones que la variable 'correcto_registrar' ubicada en la función anterior del archivo:
return correcto_enviado;
}

// Este código JQuery permite mostrar y ocultar las contraseñas en el formulario de registro. Una vez todo el documento haya sido cargado correctamente, esta función puede ser utilizada:
$(document).ready(function(){
    // El evento '.click' indica que al darse click en el icono correspondiente a su id la función se activará:
    $('#show_password').click(function(){
        // Si el icono contiene en ese mismo momento la clase que es prederteminada para él, se removerá el tipo de dato a los campos de contraseña y confirmar contraseña, el cual es conocido como 'password':
        if($(this).hasClass('fa-eye')){
        $('#contraseña').removeAttr('type');
        $('#confirmar_contraseña').removeAttr('type');
        // Aquí se añade una nueva clase al icono con el id '#show_password' y remueve la que tenía anteriormente. Entiéndase que, en este caso, por clase se está haciendo referencia a un icono diferente al predeterminado:
        $('#show_password').addClass('fa-eye-slash').removeClass('fa-eye');
        // Aquí se añade un nuevo título al icono por medio de un llamado al atributo 'data-original-title', que permite mostrar un tooltip de boostrap (una pequeña caja con texto) al lado del icono:
        $('#show_password').attr('data-original-title', "Ocultar contraseñas").tooltip('show');
        }
    else{
        // En caso de que se volviera a hacer click nuevamente al icono, este devolvería el tipo de dato a los campos de contraseña al que poseían en un principio:
        $('#contraseña').attr('type', 'password');
        $('#confirmar_contraseña').attr('type', 'password');
        // Se añade otra vez la clase predeterminada al icono:
        $('#show_password').addClass('fa-eye').removeClass('fa-eye-slash');
        // Se cambia nuevamente el título al icono:
        $('#show_password').attr('data-original-title', "Mostrar contraseñas").tooltip('show');
    }
    });
});