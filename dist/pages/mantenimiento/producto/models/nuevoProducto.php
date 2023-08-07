<?php
include("./../../../../databases/db.php");

if (isset($_POST['nom_producto'])) {

    $nom_producto = $_POST['nom_producto'];
    $descripcion = $_POST['descripcion'];
    $precio = (double) $_POST['precio'];
    $id_categoria = (int) $_POST['id_categoria'];

    try {
        $query = ("INSERT INTO producto (nom_producto, descripcion, precio, id_categoria) VALUES (?, ?, ?, ?)");
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssdi", $nom_producto, $descripcion, $precio, $id_categoria);
        $stmt->execute();

        $stmt->close();
        $conn->close();
        echo 'correcto';
    } catch (Exception $e) {
        echo 'error';
    }

}


?>
