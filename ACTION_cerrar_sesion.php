<?php 

// Se incluye la conexión a la base de datos.
include 'ACTION_conexionBD.php';

// Se utiliza la función session_start() para hacer uso de la sesión iniciada
session_start();

// Se utiliza la función session_destroy() para cerrar la sesión que estaba iniciada
session_destroy();

// Se redirecciona a index
header ('location:index.php');

?>