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

        for(var i = 0;i<contrasena.lenght;i++){
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

    if(form_registro.contraseña.value == "" || validar_espacios(formulario.contraseña.value) == false){
        document.getElementById("alerta5").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese una contraseña</div>';
        formulario.contraseña.value = "";
        formulario.contraseña.focus();
        correcto_registrar = false;
    }else if(validar_password(form_registro.contraseña.value) == true){
        document.getElementById("alerta5").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>La contraseña no cumple con los parámetros requeridos</div>';
        formulario.contraseña.focus();
        correcto_registrar = false;
    }
    else if(validar_password(form_registro.contraseña.value) == false){
        document.getElementById("alerta5").innerHTML = "";
    }
    if(form_registro.confirmar_contraseña.value == "" || validar_espacios(formulario.confirmar_contraseña.value) == false){
        document.getElementById("alerta6").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Confirme su contraseña</div>';
        formulario.confirmar_contraseña.value = "";
        correcto_registrar = false;
    }else if(formulario.contraseña.value === formulario.confirmar_contraseña.value){
        document.getElementById("alerta6").innerHTML = "";
    }

    if(form_registro.contraseña.value != form_registro.confirmar_contraseña.value){
        document.getElementById("alerta5").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Las contraseñas digitadas no coinciden</div>';
        form_registro.contraseña.value = "";
        form_registro.confirmar_contraseña.value = "";
        formulario.contraseña.focus();
        correcto_registrar = false;
    }else if(form_registro.contraseña.value === form_registro.confirmar_contraseña.value){
        document.getElementById("alerta5").innerHTML = "";
    }

    if(form_registro.email.value == ""){
        document.getElementById("alerta4").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese una dirección de correo electrónico</div>';
        formulario.email.focus();
        correcto_registrar = false;
    }else if(ValidarEmail(form_registro.email.value) == false){
        document.getElementById("alerta4").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>La dirección de correo electrónico es incorrecta</div>';
        formulario.email.focus();
        correcto_registrar = false;
    }else if(ValidarEmail(form_registro.email.value) == true){
        document.getElementById("alerta4").innerHTML = "";
    }

    if(SoloNumeros(form_registro.documento.value) == false){
        document.getElementById("alerta3").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo números para el número de documento</div>';
        formulario.documento.focus();
        correcto_registrar = false;
    }else if(form_registro.documento.value == "" || validar_espacios(formulario.documento.value) == false){
        document.getElementById("alerta3").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese su número de documento</div>';
        formulario.documento.value = "";
        formulario.documento.focus();
        correcto_registrar = false;
    }else if(SoloNumeros(form_registro.documento.value) == true){
        document.getElementById("alerta3").innerHTML = "";
    }

    if(SoloLetras(form_registro.nombre1.value) == false){
        document.getElementById("alerta").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo letras en los nombres y apellidos</div>';
        formulario.nombre1.focus();
        correcto_registrar = false;
    }else if(SoloLetras(form_registro.nombre2.value) == false){
        document.getElementById("alerta").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo letras en los nombres y apellidos</div>';
        formulario.nombre2.focus();
        correcto_registrar = false;
    }
    if(SoloLetras(form_registro.apellido1.value) == false){
        document.getElementById("alerta2").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo letras en los nombres y apellidos</div>';
        formulario.apellido1.focus();
        correcto_registrar = false;
    }else if(SoloLetras(form_registro.apellido2.value) == false){
        document.getElementById("alerta2").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo letras en los nombres y apellidos</div>';
        formulario.apellido2.focus();
        correcto_registrar = false;
    }

    if(formulario.apellido1.value == "" || validar_espacios(formulario.apellido1.value) == false){
        document.getElementById("alerta2").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold; width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese como mínimo su primer apellido</div>';
        formulario.apellido1.value = "";
        formulario.apellido1.focus();
        correcto_registrar = false;
    }else if(SoloLetras(form_registro.apellido1.value) == true){
        document.getElementById("alerta2").innerHTML = "";
    }

    if(formulario.nombre1.value == "" || validar_espacios(formulario.nombre1.value) == false){
        document.getElementById("alerta").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 95%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese como mínimo su primer nombre</div>';;
        formulario.nombre1.value = "";
        formulario.nombre1.focus();
        correcto_registrar = false;
    }else if(SoloLetras(form_registro.nombre1.value) == true){
        document.getElementById("alerta").innerHTML = "";
    }

return correcto_registrar;
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