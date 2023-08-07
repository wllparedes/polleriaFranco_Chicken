<?php

include("./../../../../databases/db.php");

$id = $_POST['id'];


if (empty($id)) {
    echo 'advertencia';
} else {

    $query = "SELECT estado, id_pedido FROM comprobantedeventa WHERE id_comprobanteDeVenta = ? ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_object();
    $estado = (int) $row->estado;
    $id_pedido = (int) $row->id_pedido;

    if ($estado == 1) {
        echo 'error';
    } else {

        try {
            $estado_nuevo = 0;

            $query = "DELETE FROM comprobantedeventa WHERE id_comprobanteDeVenta = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $queryx = "UPDATE pedido SET estado = ? WHERE id_pedido = ?";
            $stmtx = $conn->prepare($queryx);
            $stmtx->bind_param('ii', $estado_nuevo, $id_pedido);
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
