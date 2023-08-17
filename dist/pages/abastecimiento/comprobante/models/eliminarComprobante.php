<?php

include("./../../../../databases/db.php");

$id = $_POST['id'];

if (empty($id)) {
    echo 'advertencia';
} else {

    try {
        $estado_nuevo = 0;
        $directorio = '../pdfs/';

        $queryo = "SELECT id_ordenDeCompra, archivo FROM comprobanteDeCompra  WHERE id_comprobanteDeCompra = ? ";
        $stmto = $conn->prepare($queryo);
        $stmto->bind_param('i', $id);
        $stmto->execute();
        $resulto = $stmto->get_result();
        $rowo = $resulto->fetch_object();
        $id_orden = $rowo->id_ordenDeCompra;
        $archivo = $rowo->archivo;

        $rutaPDF = $directorio . $archivo;

        $query = "DELETE FROM comprobanteDeCompra WHERE id_comprobanteDeCompra = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $queryx = "UPDATE ordenDeCompra SET estado = ? WHERE id_ordenDeCompra = ?";
        $stmtx = $conn->prepare($queryx);
        $stmtx->bind_param('ii', $estado_nuevo, $id_orden);
        $stmtx->execute();

        if (file_exists($rutaPDF) && unlink($rutaPDF)) {
            echo 'correcto';
        } else {
            echo 'error';
        }
        $stmtx->close();
        $stmto->close();
        $stmt->close();
    } catch (Exception $e) {
        echo 'error';
    }

    $conn->close();

}
?>
