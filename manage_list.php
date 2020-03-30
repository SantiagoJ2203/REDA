<?php 
session_start();

include ('ACTION_conexionBD.php');

if (isset($_SESSION['instructor'])  || isset($_SESSION['personal']) ||isset($_SESSION['administrador'])  ){


?> 


<!DOCTYPE html>

<head lang="es">
    <title>Gestión de listados - REDA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/reda_system.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" href="icons/reda4.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php 

    $con=mysqli_connect("localhost","root","","reda");
    $query = mysqli_query ($con, "SELECT * FROM tbl_ficha;");
    $num = mysqli_num_rows($query);


?>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #11b6a0; border-radius: 0%;">
        <div class="navbar-collapse">
            <img src="icons/reda2.png" class="d-inline-block align-top" alt="">
            <div class="col-6">
                <h3 id="title"> Registro Digital del Aprendiz</h3>
            </div>
        </div>
    </nav>
    <p class="display-4 text-center"
        style="color: rgb(225, 115, 35); background-color: rgb(255, 255, 255);">Gestión de
        <span style="color:rgb(35, 130, 118);">listados</span></p>
    <div class="container-fluid">
        <h2 class="font-weight-bold">Número de listados totales: <?php echo $num; ?> </h2>
        <div class="table-responsive-xl">
            <table class="table text-center">
                <thead style="color: #fff; background-color: rgb(35, 130, 117);">
                    <tr>
                        <th scope="col">Número</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descargar a la computadora</th>
                        <th scope="col">Registrar asistencia</th>
                    </tr>
                </thead>
                <?php 
                $i = 0;
                $query = mysqli_query ($con, "SELECT * FROM tbl_ficha;");
                while($i<$num){
                    $row = mysqli_fetch_array($query);
                    $list = $row['numero_ficha'];
                    $name = $row['nombre_ficha'];
                    ?>
                <tbody style="background-color: rgba(128, 128, 128, 0.103);">
                    <tr>
                        <th scope="row"> <?php echo $list; ?> </th>
                        <th> <?php echo $name; ?>  </th>
                        <td class="download"><a href="#" class="down"> <img src="icons/download.png" width="25em"></td>
                        <td class="download"><a href="#" class="down"> <img src="icons/group.png" width="25em"></td>
                        </td>
                    </tr>
                </tbody>
                <?php $i += 1; } ?>
            </table>
        </div>       
        <div class="modal-footer">
            <p><a href="system.php" style="color: black;">Volver al inicio</a></p>
        </div>
</body>

</html>
<?php
}else{
    
    echo "<script>alert('Debes iniciar sesión');</script>";
    echo "<script>window.location='index.html';</script>";
    
}


?>