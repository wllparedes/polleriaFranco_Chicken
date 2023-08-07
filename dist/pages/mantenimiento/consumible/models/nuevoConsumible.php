<?php
include("./../../../../databases/db.php");

if (isset($_POST['nom_consumible'])){

    $nom_consumible = $_POST['nom_consumible'];
    $descripcion = $_POST['descripcion'];
    $precio = (double) $_POST['precio'];
    $id_categoria = (int) $_POST['id_categoria'];
    
    try {
        $query = ("INSERT INTO consumible (nom_consumible, descripcion, precio, id_categoria) VALUES (?, ?, ?, ?)");
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssdi", $nom_consumible, $descripcion, $precio, $id_categoria);
        $stmt->execute();
    
        $stmt->close();
        $conn->close();
        echo 'correcto';
    } catch (Exception $e) {
        echo 'error';
    }

}


?>
