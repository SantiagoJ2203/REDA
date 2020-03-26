<?php 
session_start();

include ('ACTION_conexionBD.php');

if (isset($_SESSION['instructor'])  || isset($_SESSION['personal'])){

?> 
<!Doctype html>
<html>

<head lang="es">
    <meta charset="utf-8">
    <title>REDA - SISTEMA</title>
    <link rel="stylesheet" type="text/css" href="css/reda_system.css">
    <link rel="stylesheet" media="only screen and (max-width: 1068px)" href="css/reda_system.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>REDA</title>
    <link rel="icon" href="icons/reda4.png">
</head>

<body>
    <div class="container-fluid" style="background-color: #11b6a0;">
        <div class="row">
            <div class="col-xl-12">
                            <nav class="navbar navbar-expand-sm navbar-light menu_inicio" style="background-color: #11b6a0; border-radius: 0;">
                    <div class="navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <img src="icons/reda2.png" class="d-inline-block align-top" alt="" id="reda_image">
                            </li>
                            <li class="nav-item py-4">
                                <h3 id="title"> Registro Digital del Aprendiz
                                    <div id="line"></div>
                                </h3>
                            </li>
                            
                        </ul>
                      <h2 class="welcome" >Bienvenido <?php 
                    
                    if($_SESSION['rol']=='Instructor'){
                        echo $_SESSION['nombre_instructor']; 
                    }
                    else{
                        echo  $_SESSION['nombre_administrativo'];
                    }
                    
                    
                    ?></h2>
           
                   </div> 

                </nav>

            </div>
        </div>
    </div>

    
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: #11b6a0;  border-radius: 0;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
           
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
            <div style="background-color: rgba(255, 255, 255, 0.315);margin-left:4em">
                <div class="row">
                    <div class="col-xl-3"><button type="button" class="btn btn-outline" data-toggle="modal" data-target="#modal_history" style="width:11em" id="button_nav" style="color:rgba(128, 128, 128, 0.103);">
                            Historial de ingreso
                        </button>
                    </div>
                    <div class="col-xl-3">
                        <button type="button" class="btn btn-outline" data-toggle="modal" data-target="#backup" style="width: 11em" id="button_nav">
                            Copias de seguridad
                        </button>
                    </div>
                    <div class="col-xl-3">
                        <button type="button" class="btn btn-outline" data-toggle="modal" data-target="#c_pass" style="width: 11em" id="button_nav">
                            Cambiar contraseña
                        </button>
                    </div>
                    <div class="col-xl-3">
                    <a href="ACTION_cerrar_sesion.php"> 
                    <button type="button" class="btn btn-outline" style="width: 11em" id="button_nav">
                        Cerrar sesión
                                   
                        </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal_history" tabindex="-1" role="dialog" aria-labelledby="modal_history" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h1 class="modal-title font-weight-bold">Ingresos realizados al sistema</h1>
                            <div class="table-responsive-xl">
                                <table class="table text-center">
                                    <thead style="color: #fff; background-color: rgb(35, 130, 117);">
                                        <tr>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Hora</th>
                                            <th scope="col">Lugar cercano de ingreso</th>
                                            <th scope="col">Característica del dispositivo usado</th>
                                            <th scope="col">Descargar como archivo TXT</th>
                                        </tr>
                                    </thead>
                                    <tbody style="background-color: rgba(128, 128, 128, 0.103);">
                                        <tr>
                                            <th scope="row">29/09/2019</th>
                                            <th>18:55</th>
                                            <td>Medellín, Antioquia</td>
                                            <td>SO Windows 7</td>
                                            <td class="download">
                                                <a href="#" class="down"><img src="icons/download.png" width="25em"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">18/07/2019</th>
                                            <th>09:14</th>
                                            <td>Medellín, Antioquia</td>
                                            <td>SO Windows 10</td>
                                            <td class="download">
                                                <a href="#" class="down"><img src="icons/download.png" width="25em"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">01/10/2019</th>
                                            <th>20:40</th>
                                            <td>Medellín, Antioquia</td>
                                            <td>SO Windows 8</td>
                                            <td class="download">
                                                <a href="#" class="down"><img src="icons/download.png" width="25em"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="txt_button">Descargar todo en un
                            archivo TXT</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="backup" tabindex="-1" role="dialog" aria-labelledby="backup" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" id="modal_backup">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h1 class="modal-title font-weight-bold">Copias de seguridad</h1>
                            <span>Frecuencia de creación automática de copias:</span>
                            <select style="border: none; background-color: rgba(211, 211, 211, 0.226);">
                                <option>Cada día</option>
                                <option>Cada semana</option>
                                <option>Cada mes</option>
                                <option>Nunca</option>
                            </select>
                            <div class="table-responsive-xl">
                                <table class="table text-center">
                                    <thead style="color: #fff; background-color: rgb(35, 130, 117);">
                                        <tr>
                                            <th scope="col">Fecha de creación</th>
                                            <th scope="col">Número de fichas en el sistema</th>
                                            <th scope="col">Tamaño de la copia</th>
                                            <th scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody style="background-color: rgba(128, 128, 128, 0.103);">
                                        <tr>
                                            <th scope="row">07/05/2019</th>
                                            <td>7</td>
                                            <td>304 KB</td>
                                            <td>
                                                <a href="#"><img src="icons/delete.png" width="25em" id="delete"></td>
                                            </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">13/07/2019</th>
                                            <td>3</td>
                                            <td>1.01 MB</td>
                                            <td>
                                                <a href="#"><img src="icons/delete.png" width="25em" id="delete"></a>
                                            </td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">06/08/2019</th>
                                            <td>5</td>
                                            <td>980 KB</td>
                                            <td>
                                                <a href="#"><img src="icons/delete.png" width="25em" id="delete"></td>
                                            </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="txt_button">Crear nueva copia de
                            seguridad</button>
                    </div>
                </div>
            </div>
            <form action="ACTION_cambiopass.php" method="POST">
            <div class="modal fade" id="c_pass" tabindex="-1" role="dialog" aria-labelledby="c_pass" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content" id="contenido_sesion">
                        <div class="modal-body">
                            <img src="icons/padlock.png" width="110em" id="icon_pass">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p id="font" style="font-size:27px" class="font-weight-bold">Cambio de contraseña</p>
                            <<div class="form-group">
                                <input type="password" class="form-control" id="current_pass" required placeholder="Contraseña actual" required style="width: 25em;  margin-left: 2em;">
                            </div>
                            <div class="form-group">
                                    <input type="password" name="new" class="form-control" id="new_pass" placeholder="Nueva contraseña" required style="width: 25em;  margin-left: 2em;">
                                </div>
                                <div class="form-group">
                                    
                                    <input type="password" class="form-control" id="conf_npass" placeholder="Confirmar contraseña"required style="width: 25em;  margin-left: 2em;"><br>
                                    <button type="submit" name="cambio" class="btn btn-md btn-block text-center" id="enter_button">Guardar cambios
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
        </div>
    </nav>
    <!--  BANNER  -->
    <div class="banner">
        <img src="icons/slide1.png"width="125%"; height="250em;">
    </div>
    <form action="list_result.php" method="POST" id="input_div" class="form-inline ">
        <div class="col-xl-1">
        </div>
        <div class="col-6">
            <input id="input" name="fichanombre" class="form-control mr-sm-2" type="search" placeholder="Ingrese el número de ficha..." aria-label="Search">
            <button name="buscar" id="input_b" class="btn btn-outline-success my-2 my-sm-0">
                <img src="icons/loupe.png" height="40em" width="40em">
            </button>
        </div>
    </form>
    <!--   ARTICLE    -->

    <div id="funciones" class="container-fluid text-center py-3">
        <div class="row justify-content-around">
            <div id="f1" class="col-4">
                <a href="manage_list.php">
                    <img src="icons/responsive.png" width="220em" height="180em" style="z-index:2;">
                    <h3>Gestionar listados</h3>
                </a>
            </div>
            <div id="f2" class="col-4">
                <a href="register.php">
                    <img src="icons/fingerprints.png" width="220em" height="180em">
                    <h3>Registrar la asistencia</h3>
                </a>
            </div>
            <div id="f3" class="col-4">
                <a href="reports.php">
                    <img src="icons/report.png" width="220em" height="180em">
                    <h3>Ver reportes</h3>
                </a>
            </div>
        </div>
    </div>
    <!--    SEARCH      -->
    <div id="busqueda" class="container-fluid justify-content-around py-3">
        <div class="card" style="max-width: 100em"></div>
        <div id="asearch" class="row justify-content-around text-center" style="background-color: #0fa18e;">
            <div class="col-3">
                <img src="icons/finger_add.png" class="card-img" height="250em">
            </div>

            <div class="col-6">
                <form>
                    <div class="form-group">
                        <span class="title_search">Búsqueda de Aprendiz</span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="sinput" aria-describedby="emailHelp" placeholder="Nombre del aprendiz" style="width: 25em;">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="sinput" placeholder="Número de ficha" style="width: 25em;">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="sinput" placeholder="Número de documento" style="width: 25em;">
                    </div>
                    <button id="sinput_b" class="btn btn-outline-success my-2 my-sm-0" type="submit">
                        <img src="icons/loupe.png" height="40em" width="40em">
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div id="prefooter" class="container-fluid" style="background-color: white;">
        <div class="row">
            <div class="col-4">
                <a href="user_manual.php">
                    <p class="pitem">Manual de usuario</p>
                </a>
            </div>
            <div class=" col-7">
                <p id="pitem1">&copy Todos los derechos reservados - SENA 2019</p>
            </div>
            <div class="col-1">
                <img id="fimg" src="icons/logoSena.png" height="80em" width="90em">
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