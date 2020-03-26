<?php
        if (isset($_POST['send'])){

            $con=mysqli_connect("localhost","root","","reda");

            $documento = $_POST['documento'];
            $nombre1 = $_POST['nombre1'];
            $nombre2 = $_POST['nombre2'];
            $apellido1 = $_POST['apellido1'];
            $apellido2 = $_POST['apellido2'];
            $email = $_POST['email'];
            $cargo = $_POST['cargo'];
            $contraseña = $_POST['contraseña'];

            if ($cargo == 'Instructor'){
                $query ="SELECT * FROM tbl_instructor WHERE documento_instructor = '$documento';";
                $result = mysqli_query ($con, $query);
                $num =  mysqli_num_rows($result);
                if($num== 0 ){
                    $query = "CALL insertar_tbl_instructor ('$documento','$nombre1','$nombre2','$apellido1','$apellido2','$email','$contraseña');";
                    mysqli_query ($con, $query);
                    echo "<script>alert('Registro exitoso');</script>";
                    echo "<script>window.location='system_admin.php';</script>";
                }else{
                    echo "<script>alert('Documento ya ingresado');</script>";
                    echo "<script>window.location='sign_up.php';</script>";
                }

                
            }elseif ($cargo == 'Personal administrativo'){

                $query ="SELECT * FROM tbl_personal_administrativo WHERE documento_administrativo = '$documento';";
                $result = mysqli_query ($con, $query);
                $num =  mysqli_num_rows($result);
                if($num== 0 ){
                    $query = "CALL insertar_tbl_personal_administrativo ('$documento','$nombre1','$nombre2','$apellido1','$apellido2','$email','$contraseña');";
                    mysqli_query ($con, $query);
                    echo "<script>alert('Registro exitoso');</script>";
                    echo "<script>window.location='system_admin.php';</script>";
                }else{
                    echo "<script>alert('Documento ya ingresado');</script>";
                    echo "<script>window.location='sign_up.php';</script>";
                }
            }elseif ($cargo == 'Administrador'){
                $query ="SELECT * FROM tbl_administrador WHERE documento_administrador = '$documento';";
                $result = mysqli_query ($con, $query);
                $num =  mysqli_num_rows($result);
                if($num== 0){
                    $query = "CALL insertar_tbl_administrador ('$documento','$nombre1','$nombre2','$apellido1','$apellido2','$email','$contraseña');";
                    mysqli_query ($con, $query);
                    echo "<script>alert('Registro exitoso');</script>";
                    echo "<script>window.location='system_admin.php';</script>";
                }else{
                    echo "<script>alert('Documento ya ingresado');</script>";
                    echo "<script>window.location='sign_up.php';</script>";
                }
            
        }
    }
       
    
        
?>