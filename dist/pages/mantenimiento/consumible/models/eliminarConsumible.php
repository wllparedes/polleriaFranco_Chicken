<?php

include("./../../../../databases/db.php");

$id = $_POST['id'];

if (!empty($id)) {
    try {
        $query = "DELETE FROM consumible WHERE id_consumible = ?";
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
