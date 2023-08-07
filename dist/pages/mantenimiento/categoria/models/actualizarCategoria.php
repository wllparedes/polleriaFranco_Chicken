<?php

include("./../../../../databases/db.php");

$id = (int) trim($_POST['id']);
$nombre = trim($_POST['nombre']);
$descripcion = trim($_POST['descripcion']);


try {
    $sql = "UPDATE categoria SET nombre = ?, descripcion = ? WHERE id_categoria = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nombre, $descripcion, $id);
    $stmt->execute();
    // Cerrar el stmt y la connexión
    $stmt->close();
    $conn->close();
    echo 'correcto';
} catch (Exception $e) {
    echo 'error';
}


?>
