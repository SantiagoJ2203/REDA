<?php 
session_start();

include ('ACTION_conexionBD.php');

if (isset($_SESSION['administrador'])){


?> 
<!DOCTYPE html>

<head lang="es">
    <meta charset="utf-8">
    <title>Registrarse- REDA</title>
    <link rel="icon" href="icons/reda4.png">
    <link rel="stylesheet" type="text/css" href="css/reda_system.css">
    <link rel="stylesheet" href="css/reda_system.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
</head>

<body id="bgcolor">
    <div class="container" style="width: 45em;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="contenido_sign">
                <div class="modal-body">
                    <img src="icons/finger_add.png" width="90em" id="sign_up" class="center">
                    <p id="font" style="font-size: 3em;">Registro</p>
                    <form action= "ACTION_sign_up.php" method="POST">
                        <div class="form-group" style="margin-left: 2em;">
                            <input type="text" name="nombre1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Primer nombre" required style="width: 35em;">
                        </div>
                        <div class="form-group"style="margin-left: 2em;">
                            <input type="text" name="nombre2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Segundo nombre" required style="width: 35em;"> 
                        </div>
                        <div class="form-group"style="margin-left: 2em;">
                            <input type="text" name="apellido1" class="form-control" id="exampleInputPassword1" placeholder="Primer apellido"
                                required style="width: 35em;">
                        </div>
                        <div class="form-group"style="margin-left: 2em;">
                            <input type="text" name="apellido2" class="form-control" id="exampleInputPassword1" placeholder="Segundo apellido"
                                required style="width: 35em;">
                        </div>
                        <div class="form-group"style="margin-left: 2em;">
                            <input type="text" name="documento" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Número de documento" required style="width: 35em;">
                        </div>
                        <div class="form-group"style="margin-left: 2em;">
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Correo electrónico" required style="width: 35em;">
                        </div>
                        <div class="form-group"style="margin-left: 2em; width: 35em;">
                            <span id="perfil" class="badge font-weight-bold">Cargo</span>
                            <select name="cargo" class="form-control" >
                                <option>Instructor</option>
                                <option>Personal administrativo</option>
                                <option>Administrador</option>
                            </select>
                        </div>
                        <div class="form-group"style="margin-left: 2em;">
                            <input type="password" name="contraseña" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Contraseña" required style="width: 35em;">
                        </div>
                        <div class="form-group"style="margin-left: 2em;">
                            <input type="password" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Confirmar contraseña" required style="width: 35em;"> 
                        </div>
                        <br>
                        <input type="submit" name="send" class="btn btn-md btn-block text-center"
                            id="enter_button" style="margin-left: 13.5em;">
                        <br>
                        <div class="modal-footer">
                            <p><a href="system_admin.php">Volver al inicio</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
}else{
    
    echo "<script>alert('Debes iniciar sesión');</script>";
    echo "<script>window.location='index.html';</script>";
    
}


?>