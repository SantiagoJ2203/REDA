<?php

session_start();

$con=mysqli_connect("localhost","root","","reda");

if (isset($_POST['ingresar'])){
    $cargo = $_POST['cargo'];
    $documento = $_POST['documento'];
    $contraseña=$_POST['contraseña'];
   
    if ($cargo == 'Instructor'){
       $resultado = mysqli_query($con, "SELECT * FROM tbl_instructor WHERE documento_instructor='$documento' AND contrasena_instructor='$contraseña';");
       $row = mysqli_fetch_array($resultado);
        $documentoBD = $row['documento_instructor'];
        $contraseñaBD = $row['contrasena_instructor'];
        $name1 = $row['nombre1_instructor'];
         $name2 = $row['apellido1_instructor'];
        $_SESSION['instructor'] = $documentoBD;
        $_SESSION['nombre_instructor'] = $name1." ".$name2;
        $_SESSION['rol']= $cargo;

       if ($documentoBD === $documento && $contraseñaBD === $contraseña){
        header ('location:system.php');
       
       } elseif($documentoBD != $documento && $contraseñaBD != $contraseña){
         echo "<script>alert('Usuario o contraseña incorrectas o no coincidentes con el cargo seleccionado.');</script>";
         echo "<script>window.location='index.html';</script>";
           
       }

    }
    
    if ($cargo == 'Administrador'){
        $resultado = mysqli_query ($con,"SELECT * FROM tbl_administrador WHERE documento_administrador='$documento' AND contrasena_administrador='$contraseña';");
        $row = mysqli_fetch_array($resultado);
        $documentoBD = $row['documento_administrador'];
        $contraseñaBD = $row['contrasena_administrador'];
        $_SESSION['administrador'] = $documentoBD;
        $name1 = $row['nombre1_administrador'];
        $name2 = $row['apellido1_administrador'];
        $_SESSION['nombre_administrador'] = $name1." ".$name2;
        $_SESSION['rol']= $cargo;
       if ($documentoBD === $documento && $contraseñaBD === $contraseña){
        header ('location:system_admin.php');
      } elseif($documentoBD != $documento && $contraseñaBD != $contraseña){
         echo "<script>alert('Usuario o contraseña incorrectas o no coincidentes con el cargo seleccionado.');</script>";
         echo "<script>window.location='index.html';</script>";
           
       }
      }

    if ($cargo == 'Personal administrativo'){
      $resultado = mysqli_query ($con,"SELECT * FROM tbl_personal_administrativo WHERE documento_administrativo='$documento' AND contrasena_administrativo='$contraseña';");
      $row = mysqli_fetch_array($resultado);
      $documentoBD = $row['documento_administrativo'];
      $contraseñaBD = $row['contrasena_administrativo'];
      $_SESSION['personal'] = $documentoBD;
      $name1 = $row['nombre1_administrativo'];
      $name2 = $row['apellido1_administrativo'];
      $_SESSION['nombre_administrativo'] = $name1." ".$name2;
      $_SESSION['rol']= $cargo;
      if ($documentoBD === $documento && $contraseñaBD === $contraseña){
         header ('location:system.php');
      } elseif($documentoBD != $documento && $contraseñaBD != $contraseña){
         echo "<script>alert('Usuario o contraseña incorrectas');</script>";
         echo "<script>window.location='index.html';</script>";
           
      }
   }
}

 
?>