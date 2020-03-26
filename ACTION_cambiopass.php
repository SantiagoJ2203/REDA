<?php 

session_start();

$con=mysqli_connect("localhost","root","","reda");

if(isset($_POST['cambio'])){
    $nueva = $_POST['new'];

    if($_SESSION['rol']=='Instructor'){
        $documento = $_SESSION['instructor'];
        mysqli_query($con , "UPDATE tbl_instructor SET contrasena_instructor='$nueva' WHERE documento_instructor = '$documento';");
        echo "<script>alert('Cambio');</script>";
        echo "<script>window.location='system.php';</script>";
    }
    elseif($_SESSION['rol']== 'Administrador'){
        $documento = $_SESSION['administrador'];
        mysqli_query($con , "UPDATE tbl_administrador SET contrasena_administrador='$nueva' WHERE documento_administrador = '$documento';");
        echo "<script>alert('Cambio');</script>";
        echo "<script>window.location='system_admin.php';</script>";
    }
    elseif($_SESSION['rol']=='Personal administrativo'){
        $documento = $_SESSION['personal'];
        mysqli_query($con , "UPDATE tbl_personal_administrativo SET contrasena_administrativo='$nueva' WHERE documento_administrativo = '$documento';");
        echo "<script>alert('Cambio');</script>";
        echo "<script>window.location='system.php';</script>";
    }
    
}

?>