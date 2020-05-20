<?php

session_start();

include 'ACTION_conexionBD.php';

if (isset($_SESSION['instructor']) || isset($_SESSION['personal'])) {

    $db_host = 'localhost';
    $db_name = 'reda';
    $db_user = 'root';
    $db_pass = '';

    $fecha = date("Ymd-His");

    $salida_sql = $db_name . '_' . $fecha . '.sql';

    $dump = 'c:\xampp\mysql\bin\ --single-transaction -u ' . $user . ' -p' . $pass . ' ' . $db . ' > ' . $salida_sql . '';

    system($dump, $output);

    $zip = new ZipArchive();

    $salida_zip = $db_name . '_' . $fecha . '.zip';

    if
    ($zip->open($salida_zip, ZIPARCHIVE::CREATE) === true) {
        $zip->addFile($salida_sql);
        $zip->close();
        unlink($salida_sql);

        header("location: $salida_zip");
    } else {
        echo "Error";
    }
} else {

    header("location: index.php?failone=true");

}