function SoloNumeros(param3) {
    if (!/^([0-9])*$/.test(param3)) {
        return false;
    } else {
        return true;
    }
}

function validar_login() {

    var correcto_login = true;
    var formulario = document.form_login;

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

function enviado_login(){

    var correcto_enviado = true;
    var formulario3 = document.form_login;

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

$(document).ready(function() {
    $('#show_password').click(function() {
        if ($(this).hasClass('fa-eye')) {
            $('#contraseña').removeAttr('type');
            $('#show_password').addClass('fa-eye-slash').removeClass('fa-eye');
            $('#show_password').attr('title', 'Ocultar contraseña');
        } else {
            $('#contraseña').attr('type', 'password');
            $('#show_password').addClass('fa-eye').removeClass('fa-eye-slash');
            $('#show_password').attr('title', 'Mostrar contraseña');
        }
    });
});