<?php

include("./../../../../databases/db.php");

$id = $_POST['id'];


if (empty($id)) {
    echo 'advertencia';
} else {
    try {
        $query = "DELETE FROM proveedor WHERE id_proveedor = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt->close();
        $conn->close();
        echo 'correcto';
    } catch (Exception $e) {
        echo 'error';
    }
}
?>
