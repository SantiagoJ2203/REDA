function validacion_pass(){

var correcto_cambio = true;
var form_cambio = document.form_pass;

    if(form_cambio.actual.value == ""){
        document.getElementById("change").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 87%; margin-left: 2em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Escriba su contraseña actual</div>';
        correcto_cambio = false;
    }else if(form_cambio.actual.value == true){
        document.getElementById("change").innerHTML = "";
    }

    if(form_cambio.new.value != form_cambio.confirmar_pass.value){
        document.getElementById("change2").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 87%; margin-left: 2em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Las contraseñas digitadas no coinciden</div>';
        correcto_cambio = false;
    }else if(form_cambio.new.value === form_cambio.confirmar_pass.value){
        document.getElementById("change2").innerHTML = "";
    }
    return correcto_cambio;
}

function enviado_pass(){

var correcto_enviado = true;
var form_dos = document.form_pass;

    if(form_dos.actual.value == ""){
        document.getElementById("change").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 87%; margin-left: 2em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Escriba su contraseña actual</div>';
        correcto_enviado = false;
    }else if(form_dos.actual.value == true){
        document.getElementById("change").innerHTML = "";
    }

    if(form_dos.new.value != form_dos.confirmar_pass.value || form_dos.new.value == "" && form_dos.confirmar_pass.value == ""){
        document.getElementById("change2").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 87%; margin-left: 2em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Las contraseñas digitadas no coinciden</div>';
        correcto_enviado = false;
    }
    if(form_dos.new.value == "" && form_dos.confirmar_pass.value == ""){
        document.getElementById("change2").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 0; font-weight: bold;width: 87%; margin-left: 2em;"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese por favor su nueva contraseña y confirmerla</div>';
        correcto_enviado = false;
    }
    return correcto_enviado;
}

$(document).ready(function(){
    $('#passwords').click(function(){
        if($(this).hasClass('fa-eye')){
            $('#actual').removeAttr('type');
            $('#new_pass').removeAttr('type');
            $('#confirmar_pass').removeAttr('type');
            $('#passwords').addClass('fa-eye-slash').removeClass('fa-eye');
            $('#passwords').attr('title', 'Ocultar contraseñas');
        }else{
            $('#actual').attr('type', 'password');
            $('#new_pass').attr('type', 'password');
            $('#confirmar_pass').attr('type', 'password');
            $('#passwords').addClass('fa-eye').removeClass('fa-eye-slash');
            $('#passwords').attr('title', 'Mostrar contraseñas');
        }
    });
});