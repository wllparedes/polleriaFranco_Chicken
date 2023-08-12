<?php

    // Datos de la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "parisfranciamain";  // Cambien por su contraseña
    $dbname = "PolleriaFrancoChicken";

    $conn = new mysqli($servername,$username,$password, $dbname);

    $conn->set_charset("utf8");

?>


