<!DOCTYPE html>

<head lang="es">
    <title>Gestión de listados - REDA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" href="icons/reda4.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/ddefb55be1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/manage_list.css">
</head>
<nav class="navbar navbar-expand-lg navbar-light" id="header">
    <div class="navbar-collapse reda_image">
        <img src="icons/reda2.png" alt="">
        <li class="nav-item py-4">
            <h3 id="title"> Registro Digital del Aprendiz</h3>
        </li>
    </div>
</nav>
<p class="display-4 text-center course_number">Número de ficha: 1828182</p>
    <div class="container-fluid">
        <table class="table table-hover table-responsive-xl text-center">
            <thead>
                <tr>
                    <th scope="col">Documento</th>
                    <th scope="col">Nombre Aprendiz</th>
                    <th scope="col">Programa</th>
                    <th scope="col">Asistencias</th>
                    <th scope="col">Inasistencias</th>
                </tr>
            </thead>
            <?php
$i = 0;
    $query = mysqli_query($con, "SELECT * FROM register WHERE fecha_registroA = '$fecha';");
    while ($i < $num) {
        $i += 1;
        $row = mysqli_fetch_array($query);
        $documento = $row['documento_aprendiz'];
        $date = $row['fecha_registroA'];
        $hora = $row['hora_registro'];
        $query1 = mysqli_query($con, "SELECT * FROM tbl_aprendiz WHERE documento_aprendiz = '$documento';");
        $row2 = mysqli_fetch_array($query1);
        $name1 = $row2['nombre1_aprendiz'];
        $name2 = $row2['nombre2_aprendiz'];
        $apellido1 = $row2['apellido1_aprendiz'];
        $apellido2 = $row2['apellido2_aprendiz'];
        $nombre = $name1 . " " . $name2 . " " . $apellido1 . " " . $apellido2;
        ?>
            <tbody>
                <tr>
                    <td> <?php echo $date; ?></td>
                    <td> <?php echo $nombre; ?> </td>
                    <td> <?php echo $hora; ?> </td>
                    <td><a href="#" class="view"><i class="fa fa-eye fa-lg"></i></a></td>
                </tr>
            </tbody>
            <?php
}
    ?>
        </table>

    </div>
</html>