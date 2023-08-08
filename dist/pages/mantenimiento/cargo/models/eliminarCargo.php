<?php

include("./../../../../databases/db.php");

$id = $_POST['id'];

if (!empty($id)) {
    try {
        $query = "DELETE FROM cargo WHERE id_cargo = ?";
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
