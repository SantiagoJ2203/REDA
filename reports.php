<!DOCTYPE html>

<head lang="es">
    <meta charset="utf-8">
    <title>Reportes - REDA</title>
    <link rel="icon" href="icons/reda4.png">
    <link rel="stylesheet" type="text/css" href="css/reda_system.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #11b6a0; border-radius: 0%;">
                <div class="navbar-collapse">
                    <img src="icons/reda2.png" class="d-inline-block align-top" alt="">
                    <div class="col-6">
                        <h3 id="title"> Registro Digital del Aprendiz</h3>
                    </div>
                </div>
            </nav>
    <p class="display-4 text-center"
        style="color: rgb(225, 115, 35); background-color: rgb(255, 255, 255);">Reportes
        de <span style="color: rgb(35, 130, 118);">asistencia</span></p>
    <div class="row">
        <div class="col-xl-4 text-center" id="selectr">
            <h2>Formato</h2>
            <select
                style="font-size: 1.5em; border: 1px solid rgb(89, 181, 72); background-color: rgba(0, 0, 0, 0.048);">
                <option>Día</option>
                <option>Semana</option>
                <option>Mes</option>
            </select>
        </div>
        <div class="col-xl-4 text-center" id="selectr">
            <h2>Ficha</h2>
            <select
                style="font-size: 1.5em; border: 1px solid rgb(89, 181, 72); background-color: rgba(0, 0, 0, 0.048);">
                <option>1568975</option>
                <option>1475307</option>
                <option>1828182</option>
            </select>
        </div>
        <div class="col-xl-4 text-center" id="selectr">
            <h2>Vista de reportes</h2>
            <select
                style="font-size: 1.5em; border: 1px solid rgb(89, 181, 72); background-color: rgba(0, 0, 0, 0.048);">
                <option>Circular</option>
                <option>Por columnas</option>
                <option>En barras</option>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="container">
            <div class="col-xl-12" id="report">
                <img src="icons/report_b.png" style="width: 100%; height: 35em;">
            </div>
        </div>
    </div>
    <br>
    <div class="row text-center">
        <div class="col-xl-4">
            <div class="point"><span></span><strong>Asistencias</strong></div>
        </div>
        <div class="col-xl-4">
            <div class="point2"><span></span><strong>Inasistencias</strong></div>
        </div>
        <div class="col-xl-4">
            <div class="point3"><span></span><strong>Número de correos enviados</strong></div>
        </div>
    </div>

    <br>
    <div class="modal-footer">
        <p><a href="system.php" style="color: black;">Volver al inicio</a></p>
    </div>
</body>

</html>