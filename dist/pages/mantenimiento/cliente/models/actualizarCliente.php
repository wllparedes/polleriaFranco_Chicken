<?php

include("./../../../../databases/db.php");

// En el modal a veces se digitan vacios y se tiene q eliminar los espacios de L and R

$id = (int) trim($_POST['id']);
$razon_social = trim($_POST['razon_social']);
$direccion = trim($_POST['direccion']);
$correo = trim($_POST['correo']);
$ruc = trim($_POST['ruc']);
$numero = trim($_POST['numero']);

try {
    $sql = "UPDATE cliente SET razon_social = ?, direccion = ?, correo = ?, ruc = ?, numero = ?  WHERE id_cliente = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $razon_social, $direccion, $correo, $ruc, $numero, $id);
    $stmt->execute();

    // Cerrar el stmt y la connexión
    $stmt->close();
    $conn->close();
    echo 'correcto';
} catch (Exception $e) {
    echo 'error';
}


?>
