<?php

include("./../../../../databases/db.php");

// En el modal a veces se digitan vacios y se tiene q eliminar los espacios de L and R

$id = (int) trim($_POST['id']);
$nom_producto = trim($_POST['nom_producto']);
$descripcion = trim($_POST['descripcion']);
$precio = (double) trim($_POST['precio']);
$id_categoria = (int) trim($_POST['id_categoria']);

try {
    $sql = "UPDATE producto SET nom_producto = ?, descripcion = ?, precio = ?, id_categoria = ? WHERE id_producto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdii", $nom_producto, $descripcion, $precio, $id_categoria, $id);
    $stmt->execute();

    // Cerrar el stmt y la connexión
    $stmt->close();
    $conn->close();
    echo 'correcto';
} catch (Exception $e) {
    echo 'error';
}


?>
