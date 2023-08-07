<?php

include("./../../../../databases/db.php");

// En el modal a veces se digitan vacios y se tiene q eliminar los espacios de L and R
$key = 'clave_secreta';
$id = (int) trim($_POST['id']);
$nombres = trim($_POST['nombres']);
$apellidos = trim($_POST['apellidos']);
$numero = trim($_POST['numero']);
$dni = trim($_POST['dni']);
$userName = trim($_POST['userName']);
$correo = trim($_POST['correo']);
$password = trim($_POST['password']);
$encrypted_password = openssl_encrypt($password, 'AES-256-ECB', $key);
$id_cargo = (int) trim($_POST['id_cargo']);

try {
    $sql = "UPDATE usuario SET nombres = ?, apellidos = ?, telefono = ?, dni = ?, 
    nombre_usuario = ?, email = ?, clave = ?, id_cargo = ? WHERE id_usuario = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssii", $nombres, $apellidos, $numero, $dni, $userName, 
    $correo, $encrypted_password, $id_cargo, $id);
    
    $stmt->execute();

    // Cerrar el stmt
    $stmt->close();
    echo 'correcto';
} catch (Exception $e) {
    echo $e;
    echo 'error';
}

// Cerrar la connexión
$conn->close();

// TODO: Cuando el usuario cambia su cargo, deberia de devolverlo al login.php

?>
