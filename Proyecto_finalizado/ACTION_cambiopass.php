<?php

// Se inicia o reanuda una sesión en caso de que un usuario ya haya ingresado al sistema por medio del log in o inicio de sesión: 
session_start();

/* 
@var $con
@param string localhost | Nombre del servidor.
@param string root | Nombre de usuario del gestor de bases de datos.
@param string clave | Clave de usario del gestor de bases de datos.
@param string reda | Nombre de la base de datos.

Se realiza la conexión al servidor local (phpMyAdmin) y a la base de datos con la función 'mysqli_connect'. Después del servidor local se coloca el nombre de usuario y seguidamente la contraseña del mismo: */
$con = mysqli_connect("localhost", "root", "", "reda");

// Se comienza a verificar si la petición POST con los datos para cambiar la contraseña es correcta:
if (isset($_POST['cambio'])) {
    /* 
    @var string $contraseña
    @var string $nueva
    
    Se define la variable '$contraseña' la cual contiene los datos del campo de contraseña actual, ubicado en el archivo 'system.php' o 'system_admin.php' (depende de la sesión en uso):
    */
    $contraseña = $_POST['actual'];
    // Se define la variable '$nueva' que contiene los datos ingresados en el campo de la contraseña nueva del usuario:
    $nueva = $_POST['new'];
    // Se hace uso de una variable llamada '$new_pass_cifrado' para guardar la función 'password_hash', la cual es útil para la encriptación de las contraseñas:
    $new_pass_cifrado = password_hash($nueva, PASSWORD_DEFAULT, array("cost"=>12));

    /* 
    @var string $resultado
    @var con
    @var string $row
    @var string $contraseñaBD
    @var string $documento
    
    Se verifica con un condicional si la sesión actual corresponde al rol o cargo de instructor:
    */
    if ($_SESSION['rol'] == 'Instructor') {
        // Asignamos a la variable '$documento' el número de documento actual que está en la sesión (con el que se ha iniciado sesión con anterioridad):
        $documento = $_SESSION['instructor'];
        // En caso de ser así, se realiza una consulta a la base de datos 'reda' donde se toman todos los datos hallados dentro de la tabla 'tbl_instructor':
        $resultado = mysqli_query($con, "SELECT * FROM tbl_instructor WHERE documento_instructor = $documento");
        // Luego, se traen todos los resultados en caso de que sí existan dentro de la tabla:
        $row = mysqli_fetch_array($resultado);
        // Seguidamente, se almacena en la variable 'contraseñaBD' la fila 'contrasena_instructor' para mantener el resultado en una única variable que específica lo requerido:
        $contraseñaBD = $row['contrasena_instructor'];
        // Se realiza un nuevo condicional en el cual se compara si en la base de datos sí existe una contraseña que cumpla con las mismas características que la ingresada por el usuario. Para esto, se hace uso de la función 'password_verify', la cual identifica si los caracteres ingresados son totalmente coincidentes con la contraseña encriptada de la base de datos:
        if (password_verify($contraseña, $row['contrasena_instructor'])) {
            /* En caso de ser correcto lo anterior, los datos guardados en la variable '$new_pass_cifrado' serán asignados a la nueva contraseña del usuario, usando una consulta UPDATE donde la contraseña del instructor sea ahora igual a '$new_pass_cifrado' donde esta corresponderá al identificador o número de documento del instructor (en este caso, al documento de la sesión actual): */
            mysqli_query($con, "UPDATE tbl_instructor SET contrasena_instructor='$new_pass_cifrado' WHERE documento_instructor = '$documento';");
            // Después de actualizar la contraseña correctamente, el usuario será redireccionado al archivo 'system.php' para ser notificado con una alerta bootstrap de que el cambio de contraseña ha sido exitoso:
            header("location: system.php?success=true");
          // Si la contraseña de la base de datos no cumple con las características de la ingresada por el usuario, es decir, no existe, será redireccionado al archivo 'system.php' sin haberse realizado cambio alguno:   
        }else{
            // Además, se le mostrará una alerta bootstrap de color rojo indicando que la contraseña actual no coincide con la de la base de datos:
            header("location: system.php?notfound=true");
        }
    }

    /* 
    @var string $resultado
    @var con
    @var string $row
    @var string $contraseñaBD
    @var string $documento

    Si la sesión no corresponde al rol o cargo instructor, se verifica verifica entonces con un condicional si la sesión actual corresponde al rol o cargo de administrador:
    */
    if ($_SESSION['rol'] == 'Administrador') {
        // Asignamos a la variable '$documento' el número de documento actual que está en la sesión (con el que se ha iniciado sesión con anterioridad):
        $documento = $_SESSION['administrador'];
        // En caso de ser así, se realiza una consulta a la base de datos 'reda' donde se toman todos los datos hallados dentro de la tabla 'tbl_administrador':
        $resultado = mysqli_query($con, "SELECT * FROM tbl_administrador");
        // Luego, se traen todos los resultados en caso de que sí existan dentro de la tabla:
        $row = mysqli_fetch_array($resultado);
        // Seguidamente, se almacena en la variable 'contraseñaBD' la fila 'contrasena_administrador' para mantener el resultado en una variable que específica lo requerido:
        $contraseñaBD = $row['contrasena_administrador'];
        // Se realiza un nuevo condicional en el cual se compara si en la base de datos sí existe una contraseña que cumpla con las mismas características que la ingresada por el usuario. Para esto, se hace uso de la función 'password_verify', la cual identifica si los caracteres ingresados son totalmente coincidentes con la contraseña encriptada de la base de datos::
        if (password_verify($contraseña, $row['contrasena_administrador'])) {
            /* En caso de ser correcto lo anterior, los datos guardados en la variable '$new_pass_cifrado' serán asignados a la nueva contraseña del usuario, usando una consulta UPDATE donde la contraseña del administrador sea ahora igual a '$new_pass_cifrado' donde esta corresponderá al identificador o número de documento del administrador (en este caso, al documento de la sesión actual): */
            mysqli_query($con, "UPDATE tbl_administrador SET contrasena_administrador='$new_pass_cifrado' WHERE documento_administrador = '$documento';");
            // Después de actualizar la contraseña correctamente, el usuario será redireccionado al archivo 'system_admin.php' para ser notificado con una alerta bootstrap de que el cambio de contraseña ha sido exitoso:
            header("location: system_admin.php?success=true");
          // Si la contraseña de la base de datos no cumple con las características de la ingresada por el usuario, es decir, no existe, será rederigido al archivo 'system_admin.php' sin haberse realizado cambio alguno:  
        }else{
            // Además, se le mostrará una alerta bootstrap de color rojo indicando que la contraseña actual no coincide con la de la base de datos:
            header("location: system_admin.php?notfound=true");
        }
    }

    /* 
    @var string $resultado
    @var con
    @var string $row
    @var string $contraseñaBD
    @var string $documento
    
    Si la sesión no corresponde ni al rol o cargo de instructor o personal administrativo, se verifica por último con un condicional si la sesión actual corresponde al rol o cargo de personal administrativo (lo cual debe devolver true):
    */
    if ($_SESSION['rol'] == 'Personal administrativo') {
        // Asignamos a la variable '$documento' el número de documento actual que está en la sesión (con el que se ha iniciado sesión con anterioridad):
        $documento = $_SESSION['personal'];
        // En caso de ser así, se realiza una consulta a la base de datos 'reda' donde se toman todos los datos hallados dentro de la tabla 'tbl_personal_administrativo':
        $resultado = mysqli_query($con, "SELECT * FROM tbl_personal_administrativo");
        // Luego, se traen todos los resultados en caso de que sí existan dentro de la tabla:
        $row = mysqli_fetch_array($resultado);
        // Seguidamente, se almacena en la variable 'contraseñaBD' la fila 'contrasena_administrativo' para mantener el resultado en una variable que específica lo requerido:
        $contraseñaBD = $row['contrasena_administrativo'];
        // Se realiza un nuevo condicional en el cual se compara si en la base de datos sí existe una contraseña que cumpla con las mismas características que la ingresada por el usuario. Para esto, se hace uso de la función 'password_verify', la cual identifica si los caracteres ingresados son totalmente coincidentes con la contraseña encriptada de la base de datos::
        if (password_verify($contraseña, $row['contrasena_administrativo'])) {
            /* En caso de ser correcto lo anterior, los datos guardados en la variable '$new_pass_cifrado' serán asignados a la nueva contraseña del usuario, usando una consulta UPDATE donde la contraseña del personal administrativo sea ahora igual a '$new_pass_cifrado' donde esta corresponderá al identificador o número de documento del personal administrativo (en este caso, al documento de la sesión actual): */
            mysqli_query($con, "UPDATE tbl_personal_administrativo SET contrasena_administrativo='$new_pass_cifrado' WHERE documento_administrativo = '$documento';");
            // Después de actualizar la contraseña correctamente, el usuario será redireccionado al archivo 'system.php' para ser notificado con una alerta bootstrap de que el cambio de contraseña ha sido exitoso:
            header("location: system.php?success=true");
          // Si la contraseña de la base de datos no cumple con las características de la ingresada por el usuario, es decir, no existe, será rederigido al archivo 'system_admin.php' sin haberse realizado cambio alguno:  
        }else{
            // Además, se le mostrará una alerta bootstrap de color rojo indicando que la contraseña actual no coincide con la de la base de datos:
            header("location: system.php?notfound=true");
        }

    }

}