<?php 
session_start();

include ('ACTION_conexionBD.php');

if (isset($_SESSION['administrador'])){


?> 

<!DOCTYPE html>

<head lang="es">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registrarse - REDA</title>
    <link rel="icon" href="icons/reda2.png">
    <link rel="stylesheet" type="text/css" href="css/reda_system.css">
    <link rel="stylesheet" href="css/reda_system.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ddefb55be1.js" crossorigin="anonymous"></script>
</head>

<body id="bgcolor">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div class="container">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="contenido_sign">
                <div class="modal-body">
                    <img src="icons/finger_add.png" width="110em" id="sign_up" class="center">
                    <p id="font" class="display-4 font-weight-bold">Registro</p>
                    <form name="form_registro" action="ACTION_sign_up.php" method="POST" onsubmit="return validar_registro()">
                        <div class="form-group">
                            <input type="text" name="nombre1" class="form-control" id="nombre1" aria-describedby="emailHelp"
                                placeholder="Primer nombre" style="width: 95%"> 
                            <div id="alerta"></div> 
                        </div>
                        
                        <div class="form-group">
                            <input type="text" name="nombre2" class="form-control" id="nombre2" aria-describedby="emailHelp"
                                placeholder="Segundo nombre" style="width: 95%" >
                        </div>
                        <div class="form-group">
                            <input type="text" name="apellido1" class="form-control" id="apellido1" placeholder="Primer apellido" style="width: 95%">
                            <div id="alerta2"></div> 
                        </div>
                        
                        <div class="form-group">
                            <input type="text" name="apellido2" class="form-control" id="apellido2" placeholder="Segundo apellido" style="width: 95%">
                        </div>
                        <div class="form-group">
                            <input type="text" name="documento" class="form-control" id="documento" aria-describedby="emailHelp"
                                placeholder="Número de documento" style="width: 95%">
                                <div id="alerta3"></div> 
                        </div>
                        
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="email"
                                aria-describedby="emailHelp" placeholder="Correo electrónico" style="width: 95%">
                                <div id="alerta4"></div> 
                        </div>
                        
                        <div class="form-group">
                            <span id="perfil" class="badge font-weight-bold">Cargo</span>
                            <select name="cargo" class="form-control" style="width: 95%;">
                                <option>Instructor</option>
                                <option>Personal administrativo</option>
                                <option>Administrador</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="password" name="contraseña" class="form-control" id="contraseña"
                                aria-describedby="emailHelp" placeholder="Contraseña" style="width: 95%;">
                            <i class="fa fa-info-circle fa-lg" title="Información" data-toggle="modal" data-target="#info" style="float: right; margin-right: 3.5em; margin-top: -1.2em;">
                                <div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-family: arial;">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content" style="border-radius: 0; border: 4px solid #fff;">
                                            <div class="modal-header">
                                            <h2 class="modal-title" id="exampleModalLabel"><b>Contraseña más segura</b></h2>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <p style="color: #fff; font-weight: normal; line-height: 1em;">La contraseña debe contener como mínimo: 
                                            <ul style="line-height: 1em; font-weight: normal; color: #fff;">
                                                <li>8 caracteres</li>
                                                <li>1 mayúscula</li>
                                                <li>1 minúscula</li>
                                                <li>1 caracter especial</li>
                                            </ul>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </i>
                            <i class="fa fa-eye fa-lg" title="Mostrar contraseñas" id="show_password" style="margin-top: -1.2em; margin-right: 1.5em; float: right;"></i>
                            <div id="alerta5"></div>
                        </div>
                         
                        <div class="form-group">
                            <input type="password" class="form-control" id="confirmar_contraseña"
                                aria-describedby="emailHelp" placeholder="Confirmar contraseña" style="width: 95%">
                            <div id="alerta6"></div> 
                        </div>
                        
                        <br>
                        <input type="submit" value="Enviar" name="send" class="btn btn-md btn-block text-center"
                            id="enter_button" onclick="validar_formulario()">
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

<script src="validacion_registro.js">
    
</script>

<?php
}else{
    
    echo "<script>alert('Debes iniciar sesión');</script>";
    echo "<script>window.location='index.html';</script>";
    
}


?> 