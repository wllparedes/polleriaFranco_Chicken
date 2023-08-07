<?php

    // Datos de la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";  // Cambien por su contraseña
    $dbname = "PolleriaFrancoChiken";

    $conn = new mysqli($servername,$username,$password, $dbname);

    $conn->set_charset("utf8");

?>


