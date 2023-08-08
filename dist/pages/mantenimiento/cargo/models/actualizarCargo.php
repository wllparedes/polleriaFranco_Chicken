<?php

include("./../../../../databases/db.php");

$id = (int) trim($_POST['id']);
$nom_cargo = trim($_POST['nom_cargo']);
$descripcion = trim($_POST['descripcion']);

try {
    $sql = "UPDATE cargo SET nom_cargo = ?, descripcion = ? WHERE id_cargo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nom_cargo, $descripcion, $id);
    $stmt->execute();
    // Cerrar el stmt y la connexión
    $stmt->close();
    $conn->close();
    echo 'correcto';
} catch (Exception $e) {
    echo 'error';
}


?>
