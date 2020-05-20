<?php

/*

@var $con
@param string localhost | Nombre del servidor.
@param string root | Nombre de usuario del gestor de bases de datos.
@param string clave | Clave de usario del gestor de bases de datos.

En la variable $con se guarda la información para la conexión con el servidor de base de datos.

*/
$con = mysqli_connect("localhost","root","");

// Se establece conexión con la base de datos llamada 'reda'
mysqli_select_db($con, "reda");

// Se declara la zona horaria que tendrá como default la base de datos:
date_default_timezone_set('America/Bogota');

?>