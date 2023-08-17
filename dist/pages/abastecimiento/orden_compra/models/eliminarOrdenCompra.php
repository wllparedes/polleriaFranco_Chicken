<?php

include("./../../../../databases/db.php");

$id = $_POST['id'];


if (empty($id)) {
    echo 'advertencia';
} else {

    $query = "SELECT estado, id_req FROM ordenDeCompra WHERE id_ordenDeCompra = ? ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_object();
    $estado = (int) $row->estado;
    $id_req = (int) $row->id_req;

    if ($estado == 1) {
        echo 'error';
    } else {

        try {
            $estado_nuevo = 0;

            $query = "DELETE FROM ordenDeCompra WHERE id_ordenDeCompra = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $queryx = "UPDATE requerimiento SET estado = ? WHERE id_req = ?";
            $stmtx = $conn->prepare($queryx);
            $stmtx->bind_param('ii', $estado_nuevo, $id_req);
            $stmtx->execute();

            echo 'correcto';
        } catch (Exception $e) {
            echo 'error';
        }

        $stmtx->close();
        $stmt->close();
        $conn->close();

    }
}
?>
