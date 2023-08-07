<?php
include("./../../../../databases/db.php");

if (isset($_POST['nombres'])) {

    $key = 'clave_secreta';

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $numero = $_POST['numero'];
    $dni = $_POST['dni'];
    $userName = $_POST['userName'];
    $correo = $_POST['correo'];
    $id_cargo = (int) $_POST['id_cargo'];

    $encrypted_password = openssl_encrypt($_POST['password'], 'AES-256-ECB', $key);

    try {
        $query = ("INSERT INTO usuario (nombres, apellidos, telefono, dni, nombre_usuario, email, clave, id_cargo) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssi", $nombres, $apellidos, $numero, $dni, $userName, $correo, $encrypted_password, $id_cargo);
        $stmt->execute();

        echo 'correcto';
    } catch (Exception $e) {
        echo 'error';
    }
    
    $stmt->close();
    $conn->close();
}

// TODO:
    // ? Si el session:id == id_user { alert (usted no puede eliminarse a si mismo) } 

?>
