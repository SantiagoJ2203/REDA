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

        //Se guarda el número de ficha traído del formulario en manage_ficha.php en la variable $ficha
        $ficha = $_POST['ficha'];

        //Se hace una consulta a la base de datos para eliminar la ficha que tiene como número el mismo dato almacenado en la variable $ficha
        $query = mysqli_query($con, "CALL eliminar_tbl_ficha('$ficha');");

        //Se redirecciona a la vista manage_ficha.php
        header ('location:manage_ficha.php');
}
?>
