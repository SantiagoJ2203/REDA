<?php

// Se inicia o reanuda una sesión en caso de que un usuario ya haya ingresado al sistema por medio del log in o inicio de sesión:
session_start();

// Se incluye el archivo 'ACTION_conexionBD.php' para acceder a la conexion de la base de datos 'reda' sin tener que escribir el script de conexión:
include 'ACTION_conexionBD.php';

// Se vverifica si el botón buscar de la vista manage_ficha.php fue accionado:
    if (isset($_POST['eliminar'])) {

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
        */
        //Se guarda el número de documento traído del formulario en manage_usuarios.php en la variable $documento
        $documento = $_POST['documento'];

        //Se guarda el cargo traído del formulario en manage_usuarios.php en la variable $cargo
        $cargo = $_POST['cargo'];

        //Se evalúa con un condicional el cargo que está almacenado en la variable $cargo
        //Si la variable $cargo es igual a Instructor entonces ejecute el siguiente bloque:
        if ($cargo == 'Instructor'){
            /*Se hace una consulta a la base de datos para eliminar el instructor que tiene como documento el mismo dato almacenado 
            en la variable $documento */
        
            $query = mysqli_query($con, "CALL eliminar_tbl_instructor ('$documento');");

        //Si la variable $cargo es igual a Personal administrativo entonces ejecute el siguiente bloque:
        }elseif($cargo == 'Personal administrativo'){
            /*Se hace una consulta a la base de datos para eliminar el personal administrativo que tiene como documento el mismo dato almacenado 
            en la variable $documento */
            $query = mysqli_query($con, "CALL eliminar_tbl_personal_administrativo('$documento');");

        //Si la variable $cargo es igual a Administrador entonces ejecute el siguiente bloque:
        }elseif($cargo == 'Administrador'){
            /*Se hace una consulta a la base de datos para eliminar el administrador que tiene como documento el mismo dato almacenado 
            en la variable $documento */
            $query = mysqli_query($con, "CALL eliminar_tbl_administrador('$documento');");

        }

        //Se redirecciona a la vista manage_usuarios.php
        header ('location:manage_usuarios.php');
}
?>
