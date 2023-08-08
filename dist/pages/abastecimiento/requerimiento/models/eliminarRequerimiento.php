<?php

include("./../../../../databases/db.php");

$id = $_POST['id'];


if (empty($id)) {
    echo 'advertencia';
} else {

    $query = "SELECT estado FROM requerimiento WHERE id_req = ? ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_object();
    $estado = (int) $row->estado;

    if ($estado == 1) {
        echo 'error';
    } else {

        try {
            $query = "DELETE FROM detalle_requerimiento WHERE id_req = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $stmt->close();

            $query = "DELETE FROM requerimiento WHERE id_req = ?";
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
}
?>
