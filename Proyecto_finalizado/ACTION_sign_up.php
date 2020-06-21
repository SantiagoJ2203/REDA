<?php

// Se comienza a verificar si la petición POST con los datos para cambiar la contraseña es correcta:
if (isset($_POST['send'])) {

    /* 
    @var $con
    @param string localhost | Nombre del servidor.
    @param string root | Nombre de usuario del gestor de bases de datos.
    @param string clave | Clave de usario del gestor de bases de datos.
    @param string reda | Nombre de la base de datos.  

    Se realiza la conexión al servidor local (phpMyAdmin) y a la base de datos con la función 'mysqli_connect'. Después del servidor local se coloca el nombre de usuario y seguidamente la contraseña del mismo: 
    */
    $con = mysqli_connect("localhost", "root", "", "reda");

    /*
    @var string $documento 
    @var string $nombre1
    @var string $nombre2
    @var string $apellido1
    @var string $apellido2
    @var string $email
    @var string $cargo
    @var string $contraseña
    @var string $pass_cifrado
    
    Se definen una serie de variables que corresponden a los datos ingresados en los campos del formulario de registro ubicado en el archivo 'sign_up.php'. Los datos son recibidos por el método post para realizar una nueva solicitud de almacenamiento en la base de datos: 
    */
    $documento = $_POST['documento'];
    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $email = $_POST['email'];
    $cargo = $_POST['cargo'];
    $contraseña = $_POST['contraseña'];
    // Se hace uso de una variable llamada '$passcifrado' para guardar la función 'password_hash', la cual es útil para la encriptación de las contraseñas:
    $pass_cifrado = password_hash($contraseña, PASSWORD_DEFAULT, array("cost"=>12));

    /* 
    @var string $query
    @var string $query2
    @var string $query3
    @var string $result
    @var string $result2
    @var string $result3
    @var string $num
    @var string $num2
    @var string $num3
    
    Se verifica con un condicional si el registro está tratando de hacerse para un usuario que tendrá el cargo de instructor:
    */
    if ($cargo == 'Instructor') {
        // Se realizan un total de 3 consultas para realizar diferentes tipos de pruebas al momento de que el formulario es enviado. En dichas consultas se seleccionan las filas 'documento_instructor' y 'correo_instructor' de la tabla 'tbl_instructor'.
        // La variable '$query' compara el documento de la base de datos con el ingresado por el usuario, y el correo electrónico de la base de datos con el ingresado: 
        $query = "SELECT * FROM tbl_instructor WHERE documento_instructor = '$documento' && correo_instructor = '$email';";
        // La variable '$query2' compara solo el documento de la base de datos con el ingresado por el usuario:
        $query2 = "SELECT * FROM tbl_instructor WHERE documento_instructor = '$documento'";
        // Y la variable '$query3' compara el correo electrónico de la base de datos con el ingresado por el usuario:
        $query3 = "SELECT * FROM tbl_instructor WHERE correo_instructor = '$email';";
        // Después, las 3 consultas a la base de datos se guardan por separado en un total de 3 variables, esto para no causar problemas a la hora de hacerse la comparación entre los resultados. 
        // La variable '$query' es guardada en la variable '$result': 
        $result = mysqli_query($con, $query);
        // la variable '$query2' es guardada en la variable '$result2':
        $result2 = mysqli_query($con, $query2);
        // Y finalmente, la variable '$query3' es guardada en la variable '$result3':
        $result3 = mysqli_query($con, $query3);
        // Seguidamente, las últimas 3 variables declaradas anteriormente se vuelven a guardar por separado en otras 3 variables, esta vez para contar con la función 'mysqli_num_rows' el número de veces que el o los resultados se encuentran en las filas de la tabla de la base de datos:
        $num = mysqli_num_rows($result);
        $num2 = mysqli_num_rows($result2);
        $num3 = mysqli_num_rows($result3);
        // Se crea un primer condicional donde se verifica en conjunto si las consultas de la tabla de la base de datos no contienen ningún registro, es decir, cero. En este condicional todas las condiciones deben de cumplirse para continuar con la siguiente parte del código: 
        if ($num == 0 && $num2 == 0 && $num3 == 0) {
            // Si lo anterior devuelve true, entonces se realiza un segundo condicional donde se verifica por separado si alguna de las filas contiene algún registro ya almacenado con anterioridad. Si una sola de las tres condiciones se cumple, el código hará lo que sigue después:
            if ($num == 0 || $num2 == 0 || $num3 == 0) {
                // En caso de que no hayan registros almacenados, un procedimiento almacenado, de nombre 'insertar_tbl_instructor', será llamado para almacenar en la base de datos al nuevo usuario con sus respectivos datos ingresados en el formulario:
                $query = "CALL insertar_tbl_instructor ('$documento','$nombre1','$nombre2','$apellido1','$apellido2','$email','$pass_cifrado');";
                mysqli_query($con, $query);
                // Por último, se redirecciona al administrador (aquel que registra a los nuevos usuarios) a la página de registro ('sign_up.php') para ser notificado, por medio de una alerta bootstrap, de que el registro ha sido exitoso.
                header("location: sign_up.php?new_user=true");
            }
          /* En caso de que el número de documento ingresado y el correo electrónico ingresado ya existan en la base de datos, el registro será anulado, se redireccionará al administrador a la página de registro ('sign_up.php') sin ningún cambio en la base de datos y se le notificará al administrador, con una alerta de bootstrap, de que esto es así: */ 
        } elseif ($num2 == 1 && $num3 == 1) {
            header("location: sign_up.php?double=true");
          // En un segundo caso, puede suceder que solo el número de documento está repetido, lo cual causará la misma acción que con el anterior 'elseif':  
        } elseif ($num2 == 1) {
            header("location: sign_up.php?notavailable=true");
          // Y en un tercer y último caso, puede suceder lo mismo con el correo electrónico en caso de ya estar registrado en la base de datos:  
        } elseif ($num3 == 1) {
            header("location: sign_up.php?notemail=true");
        }

      /* 
      @var string $query
      @var string $query2
      @var string $query3
      @var string $result
      @var string $result2
      @var string $result3
      @var string $num
      @var string $num2
      @var string $num3

      Si el registro no es realizado para un usuario que vaya a tener el cargo de instructor, se verifica entonces con un condicional si el registro está tratando de hacerse para un usuario que tendrá el cargo de personal administrativo:
      */
    } elseif ($cargo == 'Personal administrativo') {
        // Se realizan un total de 3 consultas para realizar diferentes tipos de pruebas al momento de que el formulario es enviado. En dichas consultas se seleccionan las filas 'documento_administrativo' y 'correo_administrativo' de la tabla 'tbl_personal_administrativo'.
        // La variable '$query' compara el documento de la base de datos con el ingresado por el usuario, y el correo electrónico de la base de datos con el ingresado: 
        $query = "SELECT * FROM tbl_personal_administrativo WHERE documento_administrativo = '$documento' && correo_administrativo = '$email';";
        // La variable '$query2' compara solo el documento de la base de datos con el ingresado por el usuario:
        $query2 = "SELECT * FROM tbl_personal_administrativo WHERE documento_administrativo = '$documento'";
        // Y la variable '$query3' compara el correo electrónico de la base de datos con el ingresado por el usuario:
        $query3 = "SELECT * FROM tbl_personal_administrativo WHERE correo_administrativo = '$email';";
        // Después, las 3 consultas a la base de datos se guardan por separado en un total de 3 variables, esto para no causar problemas a la hora de hacerse la comparación entre los resultados. 
        // La variable '$query' es guardada en la variable '$result': 
        $result = mysqli_query($con, $query);
        // la variable '$query2' es guardada en la variable '$result2':
        $result2 = mysqli_query($con, $query2);
        // Y finalmente, la variable '$query3' es guardada en la variable '$result3':
        $result3 = mysqli_query($con, $query3);
        // Seguidamente, las últimas 3 variables declaradas anteriormente se vuelven a guardar por separado en otras 3 variables, esta vez para contar con la función 'mysqli_num_rows' el número de veces que el o los resultados se encuentra en las filas de la tabla de la base de datos:
        $num = mysqli_num_rows($result);
        $num2 = mysqli_num_rows($result2);
        $num3 = mysqli_num_rows($result3);
        // Se crea un primer condicional donde se verifica en conjunto si las consultas de la tabla de la base de datos no contienen ningún registro, es decir, cero. En este condicional todas las condiciones deben de cumplirse para continuar con la siguiente parte del código: 
        if ($num == 0 && $num2 == 0 && $num3 == 0) {
            // Si lo anterior devuelve true, entonces se realiza un segundo condicional donde se verifica por separado si alguna de las filas contiene algún registro ya almacenado con anterioridad. Si una sola de las tres condiciones se cumple, el código hará lo que sigue después:
            if ($num == 0 || $num2 == 0 || $num3 == 0) {
                // En caso de que no hayan registros almacenados, un procedimiento almacenado, de nombre 'insertar_tbl_instructor', será llamado para almacenar en la base de datos al nuevo usuario con sus respectivos datos ingresados en el formulario:
                $query = "CALL insertar_tbl_personal_administrativo ('$documento','$nombre1','$nombre2','$apellido1','$apellido2','$email','$pass_cifrado');";
                mysqli_query($con, $query);
                // Por último, se redirecciona al administrador (aquel que registra a los nuevos usuarios) a la página de registro ('sign_up.php') para ser notificado, por medio de una alerta bootstrap, de que el registro ha sido exitoso.
                header("location: sign_up.php?new_user=true");
            }

          /* En caso de que el número de documento ingresado y el correo electrónico ingresado ya existan en la base de datos, el registro será anulado, se redireccionará al administrador a la página de registro ('sign_up.php') sin ningún cambio en la base de datos y se le notificará al administrador, con una alerta de bootstrap, de que esto es así: */ 
        } elseif ($num2 == 1 && $num3 == 1) {
            header("location: sign_up.php?double=true");
          // En un segundo caso, puede suceder que solo el número de documento está repetido, lo cual causará la misma acción que con el anterior 'elseif':  
        } elseif ($num2 == 1) {
            header("location: sign_up.php?notavailable=true");
          // Y en un tercer y último caso, puede suceder lo mismo con el correo electrónico en caso de ya estar registrado en la base de datos: 
        } elseif ($num3 == 1) {
            header("location: sign_up.php?notemail=true");
        }

    /*
    @var string $query
    @var string $query2
    @var string $query3
    @var string $result
    @var string $result2
    @var string $result3
    @var string $num
    @var string $num2
    @var string $num3

    Si el registro no es realizado para un usuario que vaya a tener el cargo de instructor, se verifica entonces con un condicional si el registro está tratando de hacerse para un usuario que tendrá el cargo de administrador (lo cual debe de devolver true):
    */
    } elseif ($cargo == 'Administrador') {
        // Se realizan un total de 3 consultas para realizar diferentes tipos de pruebas al momento de que el formulario es enviado. En dichas consultas se seleccionan las filas 'documento_administrador' y 'correo_administrador' de la tabla 'tbl_administrador'.
        // La variable '$query' compara el documento de la base de datos con el ingresado por el usuario, y el correo electrónico de la base de datos con el ingresado: 
        $query = "SELECT * FROM tbl_administrador WHERE documento_administrador = '$documento' && correo_administrador = '$email';";
        // La variable '$query2' compara solo el documento de la base de datos con el ingresado por el usuario:
        $query2 = "SELECT * FROM tbl_administrador WHERE documento_administrador = '$documento'";
        // Y la variable '$query3' compara el correo electrónico de la base de datos con el ingresado por el usuario:
        $query3 = "SELECT * FROM tbl_administrador WHERE correo_administrador = '$email';";
        // Después, las 3 consultas a la base de datos se guardan por separado en un total de 3 variables, esto para no causar problemas a la hora de hacerse la comparación entre los resultados. 
        // La variable '$query' es guardada en la variable '$result': 
        $result = mysqli_query($con, $query);
        // la variable '$query2' es guardada en la variable '$result2':
        $result2 = mysqli_query($con, $query2);
        // Y finalmente, la variable '$query3' es guardada en la variable '$result3':
        $result3 = mysqli_query($con, $query3);
        // Seguidamente, las últimas 3 variables declaradas anteriormente se vuelven a guardar por separado en otras 3 variables, esta vez para contar con la función 'mysqli_num_rows' el número de veces que el o los resultados se encuentra en las filas de la tabla de la base de datos:
        $num = mysqli_num_rows($result);
        $num2 = mysqli_num_rows($result2);
        $num3 = mysqli_num_rows($result3);
        // Se crea un primer condicional donde se verifica en conjunto si las consultas de la tabla de la base de datos no contienen ningún registro, es decir, cero. En este condicional todas las condiciones deben de cumplirse para continuar con la siguiente parte del código: 
        if ($num == 0 && $num2 == 0 && $num3 == 0) {
            // Si lo anterior devuelve true, entonces se realiza un segundo condicional donde se verifica por separado si alguna de las filas contiene algún registro ya almacenado con anterioridad. Si una sola de las tres condiciones se cumple, el código hará lo que sigue después:
            if ($num == 0 || $num2 == 0 || $num3 == 0) {
                // En caso de que no hayan registros almacenados, un procedimiento almacenado, de nombre 'insertar_tbl_instructor', será llamado para almacenar en la base de datos al nuevo usuario con sus respectivos datos ingresados en el formulario:
                $query = "CALL insertar_tbl_administrador ('$documento','$nombre1','$nombre2','$apellido1','$apellido2','$email','$pass_cifrado');";
                mysqli_query($con, $query);
                // Por último, se redirecciona al administrador (aquel que registra a los nuevos usuarios) a la página de registro ('sign_up.php') para ser notificado, por medio de una alerta bootstrap, de que el registro ha sido exitoso.
                header("location: sign_up.php?new_user=true");
            }

          // En caso de que el número de documento ingresado y el correo electrónico ingresado ya existan en la base de datos, el registro será anulado y se le notificará al administrador de que esto es así: 
        } elseif ($num2 == 1 && $num3 == 1) {
            header("location: sign_up.php?double=true");
          // En un segundo caso, puede suceder que solo el número de documento está repetido, lo cual causará la misma acción que con el anterior 'elseif':  
        } elseif ($num2 == 1) {
            header("location: sign_up.php?notavailable=true");
          // Y en un tercer y último caso, puede suceder lo mismo con el correo electrónico en caso de ya estar registrado en la base de datos: 
        } elseif ($num3 == 1) {
            header("location: sign_up.php?notemail=true");
        }

    }
}