<?php

include("./../../../../databases/db.php");
include("./../../../../php/empezar_session.php");

// En el modal a veces se digitan vacios y se tiene q eliminar los espacios de L and R
$key = 'clave_secreta';
$id = $_SESSION['id_usuario'];
$nombres = trim($_POST['nombres']);
$apellidos = trim($_POST['apellidos']);
$numero = trim($_POST['numero']);
$dni = trim($_POST['dni']);
$userName = trim($_POST['userName']);
$correo = trim($_POST['correo']);
$password = trim($_POST['password']);

$_SESSION['nombre_usuario'] = $userName;


try {
    $sql = "UPDATE usuario SET nombres = ?, apellidos = ?, telefono = ?, dni = ?, 
    nombre_usuario = ?, email = ?, clave = AES_ENCRYPT(?, ?) WHERE id_usuario = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssi",
        $nombres,
        $apellidos,
        $numero,
        $dni,
        $userName,
        $correo,
        $password,
        $key,
        $id
    );

    $stmt->execute();

    // Cerrar el stmt
    $stmt->close();
    echo 'correcto';
} catch (Exception $e) {
    echo 'error';
}

// Cerrar la connexión
$conn->close();

?>
