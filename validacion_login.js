function validar_espacios(param2){
    var patron2 = /^\s+$/;
    if(patron2.test(param2)){
        return false;
    }else{
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

function validar_login(){

    correcto_login = true;
    var formulario = document.form_login;

    if(formulario.contraseña.value == "" || validar_espacios(formulario.contraseña.value) == false){
        document.getElementById("aviso2").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" style="border-radius: 0; font-weight: bold; width: 87%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert">&times;</button>Ingrese su contraseña de usuario</div>';
        formulario.contraseña.value = "";
        formulario.contraseña.focus();
        correcto_login = false;
    }else{
        document.getElementById("aviso2").innerHTML= '';
    }

    if (SoloNumeros(formulario.documento.value) == false){
        document.getElementById("aviso").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" style="border-radius: 0; font-weight: bold; width: 87%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert">&times;</button>Ingrese solo números en el número de documento</div>';
        formulario.documento.focus();
        correcto_login = false;
    }

    if(formulario.documento.value == "" || validar_espacios(formulario.documento.value == false)){
        document.getElementById("").innerHTML= '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold; width: 87%; margin-left: 1.1em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese su número de documento</div>';
        formulario.documento.value = "";
        formulario.documento.focus();
        correcto_login = false;
    }else{
        document.getElementById("aviso").innerHTML = "";
    }
    return correcto_login;
}
$(document).ready(function(){
    $('#show_password').click(function(){
        if($(this).hasClass('fa-eye')){
        $('#contraseña').removeAttr('type');
        $('#show_password').addClass('fa-eye-slash').removeClass('fa-eye');
        $('#show_password').attr('title', 'Ocultar contraseña');
    }
    else{
        $('#contraseña').attr('type','password');
        $('#show_password').addClass('fa-eye').removeClass('fa-eye-slash');
        $('#show_password').attr('title', 'Mostrar contraseña');
    }
    });
});