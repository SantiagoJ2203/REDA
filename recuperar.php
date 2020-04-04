<?php

require "ACTION_conexionBD.php";
require "ACTION_functions.php";

$errors = array();

if(!empty($_POST)){
    $email = $mysqli -> real_escape_string($_POST['email']);

    if(!isEmail($email)){
        $errors[] = "Debe ingresar un correo electrónico válido";
    }
        if(emailExiste($email)){
            $user_id = getValor('id', 'correo', $email);
            $nombre = getValor('nombre', 'correo', $email);

            $token = generarTokenPass($email);

            $url = 'http://'.$_SERVER["SERVER_NAME"].'/login/cambia_pass.php?user_id='.$user_id.'&token='.$token;
            $asunto = 'Recuperar password - Sistema de Usuarios';
            $cuerpo = "Hola $nombre: <br><br> Para restaurar la contraseña visita la siguiente dirección: <a href='$url>Cambiar password</a>";

            if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
                echo "Hemos enviado un correo electrónico a la dirección $email para restablecer su contraseña <br>";
                echo "<a href='index.html'>Iniciar sesion</a>"
                exit;
            }else{
                $errors[] = "Error al enviar el email";
            }
        }else{
            $errors[] = "No existe el correo electrónico";
        }
}

?>