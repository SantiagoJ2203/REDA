function SoloLetras(parametro){
    var patron = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/;
    if(parametro.search(patron)){
        return false;
    } else{
        return true;
    }
}

function SoloNumeros(param3){
    if(!/^([0-9])*$/.test(param3)){
        return false;
    }else{
        return true;
    }
}

function ValidarEmail(valor){
    if(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(valor)){
        return true;
    } else{
        return false;
    }
}

function validar_espacios(param2){
    var patron2 = /^\s+$/;
    if(patron2.test(param2)){
        return false;
    }else{
        return true;
    }
}

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

function validar_registro(){

    var correcto_registrar = true;
    var formulario = document.form_registro;

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

function registro_enviado(){

    var correcto_enviado = true;
    var formulario2 = document.form_registro;

    if(form_registro.contraseña.value != form_registro.confirmar_contraseña.value){
        document.getElementById("alerta6").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Las contraseñas digitadas no coinciden</div>';
        correcto_enviado = false;
    }

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

$(document).ready(function(){
    $('#show_password').click(function(){
        if($(this).hasClass('fa-eye')){
        $('#contraseña').removeAttr('type');
        $('#confirmar_contraseña').removeAttr('type');
        $('#show_password').addClass('fa-eye-slash').removeClass('fa-eye');
        $('#show_password').attr('title', 'Ocultar contraseñas');
        }
    else{
        $('#contraseña').attr('type', 'password');
        $('#confirmar_contraseña').attr('type', 'password');
        $('#show_password').addClass('fa-eye').removeClass('fa-eye-slash');
        $('#show_password').attr('title', 'Mostrar contraseñas');
    }
    });
});