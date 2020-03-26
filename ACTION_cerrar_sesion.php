<?php 
include 'ACTION_conexionBD.php';

session_start();

session_destroy();

header ('location:index.html');

?>