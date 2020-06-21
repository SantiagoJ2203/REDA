<?php

// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include ("ACTION_conexionBD.php");

// Se hace referencia al uso de la librería PHPMailer:
use PHPMailer\PHPMailer\PHPMailer;

// Se requiere el uso de varios archivos, los cuales permiten la conexión al STMP (la transferencia del correo), el uso de la estructura requerida para enviar el correo y la inclusión de las clases necesarias para el envío del correo: 
require 'PHPMAILER/SMTP.php';
require 'PHPMAILER/PHPMailer.php';
require 'PHPMAILER/Exception.php';
require 'PHPMAILER/OAuth.php';
require 'vendor/autoload.php';

/*
@var string $cargo_recuperar
@var string $emailone
@var string $cargo_recuperar
@var string $sel_queryone
@var string $resultsone
@var string $rowone

Se define si el valor 'email' es existente en el archivo HTML desde el que se enviaron los datos y se verifica si el valor 'email' no está vacío:
*/
if (isset($_POST['email']) && (!empty($_POST['email']))) {
    // En caso de haber un dato en el valor 'email', el mismo es guardado en una variable llamada '$emailone':
    $emailone = $_POST['email'];
    // Se guarda en la variable '$cargo_recuperar' el cargo que el usuario seleccionó al momento de enviar el correo de recuperación de contraseña:
    $cargo_recuperar = $_POST['cargo_recuperar'];
    // Se añade un filtro a la variable '$emailone' para eliminar los caracteres prohibidos, ilegales o no adecuados en caso de que el e-mail los contenga:
    $emailone = filter_var($emailone, FILTER_SANITIZE_EMAIL);
    // Se verifica si la variable '$emailone' contiene un e-mail válido, esto se hace con el filtro 'FILTER_VALIDATE_EMAIL':
    $emailone = filter_var($emailone, FILTER_VALIDATE_EMAIL);

    // En caso de que el e-mail sea inválido para el cargo de administrador (es decir, no tiene la estructura adecuada) incluso después de aplicados los filtros, se aplica el siguiente código:
    if ($cargo_recuperar == 'Administrador' && !$emailone) {
        // El usuario es redireccionado al archivo 'index.php', donde verá una alerta bootstrap que le indica que el e-mail ingresado es inválido, y, por lo tanto, el correo no es enviado:
        header("location: index.php?wrong=true");
        return false;
    }elseif($cargo_recuperar == 'Administrador'){
        /* Por otro lado, si el correo tiene una estructura válida, se realiza una consulta a la base de datos 'reda', verificando si en la fila 'correo_administrador' de la tabla 'tbl_administrador' existe un e-mail con las mismas características que el ingresado por el usuario: */
        $sel_queryone = "SELECT * FROM `tbl_administrador` WHERE correo_administrador = '".$emailone."'";
        // Se guarda el resultado obtenido (en caso de que exista) en la variable '$resultsone':
        $resultsone = mysqli_query($con, $sel_queryone);
        // Se utiliza la función 'mysqli_num_rows' para realizar un conteo de cuantos e-mails existen con las mismas características que el enviado por el usuario:
        $rowone = mysqli_num_rows($resultsone);
        // En caso de no existir ninguno, se ejecuta el siguiente código:
        if ($rowone == "") {
            // El usuario es redireccionado de vuelta al archivo 'index.php' para ser indicado de que el e-mail que ha ingresado no existe en la base de datos, y que, por lo tanto, el correo no ha podido ser enviado:
            header("location: index.php?notuser=true");
            return false;
        }
    }

    /*
    @var string $cargo_recuperar
    @var string @sel_querytwo
    @var string @resultstwo
    @var string @rowtwo
        
    En caso de que el e-mail sea inválido para el cargo de instructor (es decir, no tiene la estructura adecuada) incluso después de aplicados los filtros, se aplica el siguiente código:
    */
    if($cargo_recuperar == 'Instructor' && !$emailone){
        // El usuario es redireccionado al archivo 'index.php', donde verá una alerta bootstrap que le indica que el e-mail ingresado es inválido, y, por lo tanto, el correo no es enviado:
        header("location: index.php?wrong=true");
        return false;
    }elseif($cargo_recuperar == 'Instructor'){
    /* Por otro lado, si el correo tiene una estructura válida, se realiza una consulta a la base de datos 'reda', verificando si en la fila 'correo_instructor' de la tabla 'tbl_instructor' existe un e-mail con las mismas características que el ingresado por el usuario: */
    $sel_querytwo = "SELECT * FROM tbl_instructor WHERE correo_instructor = '".$emailone."'";
    // Se guarda el resultado obtenido (en caso de que exista) en la variable '$resultstwo':
    $resultstwo = mysqli_query($con, $sel_querytwo);
    // Se utiliza la función 'mysqli_num_rows' para realizar un conteo de cuantos e-mails existen con las mismas características que el enviado por el usuario:
    $rowtwo = mysqli_num_rows($resultstwo);
    // En caso de no existir ninguno, se ejecuta el siguiente código:
    if($rowtwo == ""){
        // El usuario es redireccionado de vuelta al archivo 'index.php' para ser indicado de que el e-mail que ha ingresado no existe en la base de datos, y que, por lo tanto, el correo no ha podido ser enviado:
        header("location: index.php?notuser=true");
        return false;
        }
    }

    /*
    @var string $cargo_recuperar
    @var string $sel_querythree
    @var string $resultsthree
    @var string $rowthree

    En caso de que el e-mail sea inválido para el cargo de personal administrativo (es decir, no tiene la estructura adecuada) incluso después de aplicados los filtros, se aplica el siguiente código:
    */
    if($cargo_recuperar == 'Personal administrativo' && !$emailone){
        // El usuario es redireccionado al archivo 'index.php', donde verá una alerta bootstrap que le indica que el e-mail ingresado es inválido, y, por lo tanto, el correo no es enviado:
        header("location: index.php?wrong=true");
        return false;
    }elseif($cargo_recuperar == 'Personal administrativo'){
        /* Por otro lado, si el correo tiene una estructura válida, se realiza una consulta a la base de datos 'reda', verificando si en la fila 'correo_administrativo' de la tabla 'tbl_personal_administrativo' existe un e-mail con las mismas características que el ingresado por el usuario: */
        $sel_querythree = "SELECT * FROM tbl_personal_administrativo WHERE correo_administrativo = '".$emailone."'";
        // Se guarda el resultado obtenido (en caso de que exista) en la variable '$resultsthree':
        $resultsthree = mysqli_query($con, $sel_querythree);
        // Se utiliza la función 'mysqli_num_rows' para realizar un conteo de cuantos e-mails existen con las mismas características que el enviado por el usuario:
        $rowthree = mysqli_num_rows($resultsthree);
        // En caso de no existir ninguno, se ejecuta el siguiente código:
        if($rowthree == ""){
            // El usuario es redireccionado de vuelta al archivo 'index.php' para ser indicado de que el e-mail que ha ingresado no existe en la base de datos, y que, por lo tanto, el correo no ha podido ser enviado:
            header("location: index.php?notuser=true");
            return false;
        }
    } 

    /* 
    @var string $error
    @var string $expFormat
    @var string $expDate
    @var string $key
    @var string $addKey
    @var con
    @var string $body
    @var string $subject
    @var string $email_to
    @var string $mail

    Si no existe ningún tipo de error a la hora de verificar el e-mail y su existencia, comienza a hacerse el proceso para llenar la tabla donde se guardará un token que servirá para producir el enlace donde el usuario podrá recuperar su contraseña: 
    */
    if($error == "") {
        // Se recoge la fecha actual con la función 'mktime' y se le aumenta un día a dicha fecha para calcular el momento en el que el token debe quedar invalidado:
        $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d")+ 1, date("Y"));
        // Se crea la variable '$expDate' para guardar en texto la fecha y la hora en la que el token será no válido, es decir, no será posible usar el enlace de ese token para recuperar la contraseña:
        $expDate = date("Y-m-d H:i:s", $expFormat);
        // Se crea un 'hash' para crear una combinación aleatoria de números y letras entre la multiplicación siguiente y el e-mail enviado del usuario:
        $key = md5("2418*2".$emailone);
        // Del resultado anterior se genera un nuevo 'hash' creando un id único y un número entero al cual se le extraerá los valores obtenidos en las posiciones 1, 3 y 10 del 'hash':
        $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
        // Se crea el token en su totalidad aunando el resultado de la variable '$key' y el de la variable '$addKey':
        $key = $key . $addKey;

// Se inserta dentro de la tabla 'password_reset_temp' el e-mail del usuario que solicitó el cambio de contraseña, el token generado y la fecha de expiración de esté último (la cual corresponde a un día después de solicitado):
        mysqli_query($con, "INSERT INTO `password_reset_temp` (`email`, `token`, `expDate`)
        VALUES ('".$emailone."', '".$key."', '".$expDate."');");

        /* Por medio de una única variable,, llamada '$body', se guarda todo el texto o cuerpo del correo que se enviará al usuario. Además, se crea la dirección a la que accederá el usuario para cambiar su contraseña. Dicha dirección está compuesta por el token de la base de datos y el e-mail del correo que corresponde a dicho token: */
        $body = '<p>Apreciado usuario, copie el siguiente enlace para recuperar su contraseña:</p> 
        <p>-------------------------------------------------------------</p>
        <p><a href="localhost:80/reda/ACTION_restaurar_pass.php?key='.$key.'&email='.$emailone.'&cargo='.$cargo_recuperar.'&action=reset" target="_blank">localhost:80/reda/ACTION_restaurar_pass.php?key='.$key.'&email='.$emailone.'&cargo='.$cargo_recuperar.'&action=reset</a></p>
        <p>-------------------------------------------------------------</p>
        <p>Por favor, asegúrese de copiar el link completo en la barra de su navegador, ya que el link, por cuestiones de seguridad, expira 1 día después de haber sido solicitado.</p>
        <p>Si usted no ha solicitado este correo de cambio de contraseña, por favor haga caso omiso al mismo. Sin embargo, se le recomienda cambiar su contraseña de usuario para evitar algún tipo de fraude con su cuenta.</p>
        <p>Gracias,</p>
        <p>Equipo REDA</p>';
        // Se escribe dentro de la variable '$subject' el asunto del correo a enviar:
        $subject = "Recuperación de contraseña - REDA";
        // Se asigna la variable '$emailone' a otra llamada '$email_to', esto con el objetivo de hacer referencia a qué e-mail será enviado el correo:
        $email_to = $emailone;

        // Se crea una nueva instancia de PHPMailer:
        $mail = new PHPMailer(true);
        // Se le dice a PHPMailer que el protocolo SMTP será utilizado:
        $mail->isSMTP();
        /* Dependiendo del objetivo de enviar el correo, esta opción puede ir de 0 a 2 (donde el número menor corresponde a solo uso de producción, 1 corresponde a envío de mensajes de cliente por correo y 2 corresponde a envío de mensajes por parte del servidor y por parte del cliente): */
        $mail->SMTPDebug = 0;
        // Se digita el nombre anfitrión del servidor de correo:
        $mail->Host = 'smtp.gmail.com';
        // Se usa el mecanismo de autenticación SMTP Auth para evitar la reproducción de spam en el servidor:
        $mail->SMTPAuth = true;
        // Se digita el e-mail desde el que se enviarán los correos:
        $mail->Username = "registrodigitalreda@gmail.com";
        // Se digita la contraseña actual del e-mail anteriormente ingresado:
        $mail->Password = "12345reda";
        // Se define el sistema de encriptación a usar (se realiza el uso de 'tls' ya que 'ssl' se encuentra obsoleto):  
        $mail->SMTPSecure = 'tls';
        // Se coloca el puerto desde el que funciona el protocolo SMTP. En este caso, el puerto 587 está autenticado por el sistema de encriptación tls y funciona en redes que no soportan el SMTP en IPv6:
        $mail->Port = 587;
        // Se específica desde qué e-mail se enviará el correo y que nombre de usuario visualizará aquel que lo abra: 
        $mail->setFrom('registrodigitalreda@gmail.com', 'Registro Digital del Aprendiz');
        // Se específica el e-mail al que se enviará el correo de recuperación de contraseña:
        $mail->addAddress($email_to);
        // Se aplica la codificación de caracteres 'UTF-8' para evitar errores de escritura en el correo enviado al usuario: 
        $mail->CharSet = 'UTF-8';
        // Se clarifica que la estructura del mensaje está hecha con código HTML:
        $mail->isHTML(true);
        // Se utiliza la variable '$subject' la cual contiene el asunto para el correo enviado al usuario:
        $mail->Subject = $subject;
        // Se utiliza la variable '$body' que contiene todo el cuerpo o explicación del correo enviado al usuario:
        $mail->Body = $body;
        // Si el correo no ha podido ser enviado, se le notificará con un mensaje al usuario de que esto es así:
        if (!$mail->Send()) {
            echo "Error de envío" . $mail->ErrorInfo;
        } else {
            // De otro modo, si el correo ha sido enviado con éxito, el usuario será redirigido al archivo 'index.php' para ser notificado con una alerta bootstrap de que por favor revise su bandeja de entrada:
            header("location: index.php?sent=true");
        }

    }

}
?>