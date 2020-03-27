<?php 

session_start();

$con=mysqli_connect("localhost","root","","reda");

if(isset($_POST['Enviar'])){

    $correo = $_POST['email'];

    header ("location: index.html");
}    
?>   