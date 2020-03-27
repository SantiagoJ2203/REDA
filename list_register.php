<?php 
session_start();
include ('ACTION_conexionBD.php');

if (isset($_SESSION['instructor'])  || isset($_SESSION['personal']) ||isset($_SESSION['administrador'])){

    if (isset($_POST['registrar'])){
        $ficha = $_POST['ficha'];
        $date = date("Y-m-d");

        $con=mysqli_connect("localhost","root","","reda");
        $resultado = mysqli_query($con, "INSERT INTO tbl_registro_asistencia (fecha_registroA , numero_ficha) VALUES ('$date', '$ficha');");

    }

?> 

<!DOCTYPE html>

<head lang="es">
    <title>Resultado de listados - REDA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/reda_system.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" href="icons/reda4.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script type="text/javascript">
    setTimeout("document.location=document.location", 7000);
    </script>
</head>

<body>
<?php 

    $query = mysqli_query ($con, "SELECT * FROM register;");
    $row = mysqli_fetch_array($query);
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
    <p class="display-4 text-center" style="color: rgb(225, 115, 35); background-color: rgb(255, 255, 255);">Número de ficha: 1828182 </p>
    <div class="container-fluid">
        <table class="table text-center">
            <thead style="color: #fff; background-color: rgba(35, 130, 117);">
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Nombre Aprendiz</th>
                    <th scope="col">Hora llegada</th>
                    <th scope="col">Visualización</th>
                </tr>
            </thead>
            <?php 
                $i = 0;
                $query = mysqli_query ($con, "SELECT * FROM register;");
                while($i<$num){
                    $i += 1;
                    $row = mysqli_fetch_array($query);
                    $documento = $row['documento_aprendiz'];
                    $date = $row['fecha_registroA'];
                    $hora = $row['hora_registro'];
                    $query1 = mysqli_query ($con, "SELECT * FROM tbl_aprendiz WHERE documento_aprendiz = '$documento';");
                    $row2 = mysqli_fetch_array($query1);
                    $name1 = $row2['nombre1_aprendiz'];
                    $name2 = $row2['nombre2_aprendiz'];
                    $apellido1 = $row2['apellido1_aprendiz'];
                    $apellido2 = $row2['apellido2_aprendiz'];
                    $nombre = $name1. " " .$name2. " " .$apellido1. " " .$apellido2 ;
                    ?>
            <tbody style="background-color: rgba(128, 128, 128, 0.103);">
                <tr>
                    <td> <?php  echo $date;  ?></td>
                    <td> <?php  echo $nombre;  ?> </td>
                    <td> <?php  echo $hora;  ?> </td>
                    <td class="view"><a href="#" class="view"><img src="icons/view.png" width="25em"></a></td>
                </tr>
            </tbody>
            <?php   
}
?>
        </table>
        
    </div>
    <div class="modal-footer">
        </div>
        <div class="container">
        <a href="PHPMAILER/ACTION_Correo.php"style="text-decoration: none;"><button type="button" class="btn btn-primary btn-lg btn-block" id="txt_button"
            style="border: 3px solid rgb(226, 225, 225);">Finalizar registro</button></a>
    </div>
    <div class="footer">
        <p><a href="system.php" style="color: black; float: right; margin-right: 2em;">Volver al inicio</a></p>
    </div>
    
</body>

</html>
<?php

}
?>