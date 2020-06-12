<?php

// Se utiliza la función session_start() para hacer iniciar una sesión.
session_start();

/*
@var $con
@param string localhost | Nombre del servidor.
@param string root | Nombre de usuario del gestor de bases de datos.
@param string clave | Clave de usario del gestor de bases de datos.
@param string reda | Nombre de la base de datos.

En la variable $con se guarda la información para la conexión con la base de datos.
*/
$con=mysqli_connect("localhost","root","","reda");

include 'helper.php';

/*
El condicional If evalúa si en el formulario de incio de sesión del index, el botón 'ingresar' fue presionado, 
al ser el resultado verdadero, se establecen las siguientes variables:

@var string $cargo 
@var string $documento
@var string $contraseña

En ellas se guardan los datos de inicio de sesión.
*/
if (isset($_POST['ingresar'])){
    $cargo = $_POST['cargo'];
    $documento = $_POST['documento'];
    $contraseña=$_POST['contraseña'];
   
   /* 
      El siguiente condicional If evalúa si la variable $cargo es igual a 'Instructor'.
      Si el resultado es verdadero se ejecuta este bloque de código.
   */
    if ($cargo == 'Instructor'){
      /*
      @var string $resultado
      @var string $row
      @var string $documentoBD
      @var string $contraseñaBD
      @var string $name1
      @var string $name2

      Se realiza una consulta a la base de datos la cual muestra toda la información en la tabla tbl_instructor, 
      donde el documento_instructor sea igual al documento guardado en la variable $documento.

      */
       $resultado = mysqli_query($con, "SELECT * FROM tbl_instructor WHERE documento_instructor='$documento'");
       // En la variable $row se guarda toda la información resultante de la consulta realizada a la base de datos.
       $row = mysqli_fetch_array($resultado);

       //En la variable $documentoBD se guarda el número de documento del instructor registrado en la base de datos.
        $documentoBD = $row['documento_instructor'];
        //En la variable $contraseñaBD se guarda la contraseña del instructor registrada en la base de datos.
        $contraseñaBD = $row['contrasena_instructor'];
        //En la variable $name1 se guarda el primer nombre del instructor registrado en la base de datos.
        $name1 = $row['nombre1_instructor'];
        //En la variable $name2 se guarda el primer apellido del instructor registrado en la base de datos.
         $name2 = $row['apellido1_instructor'];
        //En la variable super global $SESSION['instructor'] se guarda el documento del instructor registrado en la base de datos.
        $_SESSION['instructor'] = $documentoBD;
        //En la variable super global $SESSION['nombre_instructor'] se guarda el primer nombre y apellido del instructor registrado en la base de datos.
        $_SESSION['nombre_instructor'] = $name1." ".$name2;
        //En la variable super global $SESSION['rol'] se guarda el cargo del instructor registrado en la base de datos.
        $_SESSION['rol']= $cargo;
      /* 
         El siguiente condicional If evalúa si la variable $documentoBD que tiene el documento del instructor registrado en la base de datos es igual a la variable $documento que contiene el documento ingresado en el formulario de inicio de sesión. Y se evalúa si la contraseña ingresada por el usuario en el formulario es igual a la que se encuentra guardada en la fila 'contrasena_instructor' de la tabla. Lo anterior es realizado con la función 'password_verify', la cual permite comparar si los caracteres ingresados en el campo del formulario coinciden con los de la contraseña encriptada en la base de datos.

         Si es verdadero se ingresa al sistema.
      */
       if ($documentoBD === $documento && password_verify($contraseña, $row['contrasena_instructor'])){
        /* Cada vez que un usuario con el cargo de instructor entre al sistema, una consulta a la base de datos será realizada para insertar datos en la tabla 'tbl_historial_instructor', la cual almacena el documento del instructor, la fecha en la que el instructor ha hecho el ingreso en cuestión, la hora en la que ingresó, el sistema operativo usado en el momento y el navegador web utilizado en el momento: */
        mysqli_query($con, "INSERT INTO `tbl_historial_instructor` (`id_instructor`, `fecha_ingreso`, `hora_ingreso`, `so_usado`, `navegador_usado`) VALUES ('".$documento."', '".$expDate."', '".$expTime."', '".$so."', '".$navegador."');");
        header ('location:system.php');
      /* 
         Si el condicional anterior es falso, se manda una alerta de JavaScript que indica que los datos no son 
         correctos y se redirecciona al index.

         En caso de que ni el número de documento ni la contraseña ingresados coincidan con la información de la base de datos,
         se redireccionará al usuario al 'index.php' y se le notificará al usuario de que el documento o la contraseña son 
         incorrectos; esto último se muestra por medio de una alerta de bootstrap.
      */   
      } else{
         header("location: index.php?fallo=true"); 
      
      }
    }

    /* 
      El siguiente condicional If evalúa si la variable $cargo es igual a 'Administrador'.
      Si el resultado es verdadero se ejecuta este bloque de código.
    */
    if ($cargo == 'Administrador'){
       /*
      @var string $resultado
      @var string $row
      @var string $documentoBD
      @var string $contraseñaBD
      @var string $name1
      @var string $name2

      Se realiza una consulta a la base de datos la cual muestra toda la información en la tabla tbl_administrador, 
      donde el documento_administrador sea igual al documento guardado en la variable $documento.

      */
        $resultado = mysqli_query ($con,"SELECT * FROM tbl_administrador WHERE documento_administrador='$documento'");
        // En la variable $row se guarda toda la información resultante de la consulta realizada a la base de datos.
        $row = mysqli_fetch_array($resultado);
        //En la variable $documentoBD se guarda el número de documento del administrador registrado en la base de datos.
        $documentoBD = $row['documento_administrador'];
        //En la variable $contraseñaBD se guarda la contraseña del administrador registrada en la base de datos.
        $contraseñaBD = $row['contrasena_administrador'];
        //En la variable $name1 se guarda el primer nombre del administrador registrado en la base de datos.
        $name1 = $row['nombre1_administrador'];
        //En la variable $name2 se guarda el primer apellido del administrador registrado en la base de datos.
        $name2 = $row['apellido1_administrador'];
        //En la variable super global $SESSION['instructor'] se guarda el documento del administrador registrado en la base de datos.
        $_SESSION['administrador'] = $documentoBD;
        //En la variable super global $SESSION['nombre_instructor'] se guarda el primer nombre y apellido del administrador registrado en la base de datos.
        $_SESSION['nombre_administrador'] = $name1." ".$name2;
        //En la variable super global $SESSION['rol'] se guarda el cargo del administrador registrado en la base de datos.
        $_SESSION['rol']= $cargo;
      /* 
         El siguiente condicional If evalúa si la variable $documentoBD que tiene el documento del administrador registrado en la base de datos es igual a la variable $documento que contiene el documento ingresado en el formulario de inicio de sesión. Y se evalúa si la contraseña ingresada por el usuario en el formulario es igual a la que se encuentra guardada en la fila 'contrasena_administrador' de la tabla. Lo anterior es realizado con la función 'password_verify', la cual permite comparar si los caracteres ingresados en el campo del formulario coinciden con los de la contraseña encriptada en la base de datos.

         Si es verdadero se ingresa al sistema.
      */
      if ($documentoBD === $documento && password_verify($contraseña, $row['contrasena_administrador'])){
        /* Cada vez que un usuario con el cargo de administrador entre al sistema, una consulta a la base de datos será realizada para insertar datos en la tabla 'tbl_historial_administrador', la cual almacena el documento del administrador, la fecha en la que el administrador ha hecho el ingreso en cuestión, la hora en la que ingresó, el sistema operativo usado en el momento y el navegador web utilizado en el momento: */
        mysqli_query($con, "INSERT INTO `tbl_historial_administrador` (`id_administrador`, `fecha_ingreso`, `hora_ingreso`, `so_usado`, `navegador_usado`) VALUES ('".$documento."', '".$expDate."', '".$expTime."', '".$so."', '".$navegador."');");
        header("location: system_admin.php"); 

        /* 
         Si el condicional anterior es falso, se manda una alerta de JavaScript que indica que los datos no son 
         correctos y se redirecciona al index.

         En caso de que ni el número de documento ni la contraseña ingresados coincidan con la información de la base de datos,
         se redireccionará al usuario al 'index.php' y se le notificará al usuario de que el documento o la contraseña son 
         incorrectos; esto último se muestra por medio de una alerta de bootstrap.
         */   
      } else{
         header("location: index.php?fallo=true"); 
      }
   }

   /* 
      El siguiente condicional If evalúa si la variable $cargo es igual a 'Personal Administrativo'.
      Si el resultado es verdadero se ejecuta este bloque de código.
    */
    if ($cargo == 'Personal administrativo'){
       /*
      @var string $resultado
      @var string $row
      @var string $documentoBD
      @var string $contraseñaBD
      @var string $name1
      @var string $name2

      Se realiza una consulta a la base de datos la cual muestra toda la información en la tabla tbl_personal_administrativo
      donde el documento_personal_administrativo sea igual al documento guardado en la variable $documento.

      */
      $resultado = mysqli_query ($con,"SELECT * FROM tbl_personal_administrativo WHERE documento_administrativo='$documento'");
      // En la variable $row se guarda toda la información resultante de la consulta realizada a la base de datos.
      $row = mysqli_fetch_array($resultado); 
      //En la variable $documentoBD se guarda el número de documento del personal administrativo registrado en la base de datos.
      $documentoBD = $row['documento_administrativo'];
      //En la variable $contraseñaBD se guarda la contraseña del personal administrativo registrada en la base de datos.
      $contraseñaBD = $row['contrasena_administrativo'];
      //En la variable $name1 se guarda el primer nombre del personal administrativo registrado en la base de datos.
      $name1 = $row['nombre1_administrativo'];
      //En la variable $name2 se guarda el primer apellido del personal administrativo registrado en la base de datos.
      $name2 = $row['apellido1_administrativo'];
      //En la variable super global $SESSION['instructor'] se guarda el documento del personal administrativo registrado en la base de datos.
      $_SESSION['personal'] = $documentoBD;
      //En la variable super global $SESSION['nombre_instructor'] se guarda el primer nombre y apellido del personal administrativo registrado en la base de datos.
      $_SESSION['nombre_administrativo'] = $name1." ".$name2;
      //En la variable super global $SESSION['rol'] se guarda el cargo del personal administrativo registrado en la base de datos.
      $_SESSION['rol']= $cargo;
    /* 
       El siguiente condicional If evalúa si la variable $documentoBD que tiene el documento del personal administrativo registrado en la base de datos es igual a la variable $documento que contiene el documento ingresado en el formulario de inicio de sesión. Y se evalúa si la contraseña ingresada por el usuario en el formulario es igual a la que se encuentra guardada en la fila 'contrasena_administrativo' de la tabla. Lo anterior es realizado con la función 'password_verify', la cual permite comparar si los caracteres ingresados en el campo del formulario coinciden con los de la contraseña encriptada en la base de datos.

       Si es verdadero se ingresa al sistema.
    */
      if ($documentoBD === $documento && password_verify($contraseña, $row['contrasena_administrativo'])){
        /* Cada vez que un usuario con el cargo de personal administrativo entre al sistema, una consulta a la base de datos será realizada para insertar datos en la tabla 'tbl_historial_administrativo', la cual almacena el documento del personal administrativo, la fecha en la que ha hecho el ingreso en cuestión, la hora en la que ingresó, el sistema operativo usado en el momento y el navegador web utilizado en el momento: */
         mysqli_query($con, "INSERT INTO `tbl_historial_administrativo` (`id_administrativo`, `fecha_ingreso`, `hora_ingreso`, `so_usado`, `navegador_usado`) VALUES ('".$documento."', '".$expDate."', '".$expTime."', '".$so."', '".$navegador."');");
         header ('location:system.php');
   /* 
      Si el condicional anterior es falso, se manda una alerta de JavaScript que indica que los datos no son 
      correctos y se redirecciona al index.
      En caso de que ni el número de documento ni la contraseña ingresados coincidan con la información de la base de datos,
       se redireccionará al usuario al 'index.php' y se le notificará al usuario de que el documento o la contraseña son 
       incorrectos; esto último se muestra por medio de una alerta de bootstrap.
   */   
      } else{
        header("location: index.php?fallo=true"); 
           
      }
      
   }
}

 
?>