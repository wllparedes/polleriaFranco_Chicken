<?php

include("./../../../../databases/db.php");

if (empty($_POST['id_cdv'])) {
    echo 'error';
} else {
    $id_cdv = $_POST['id_cdv'];
    $nuevo_estado = 1;

    $query = "UPDATE comprobantedeventa SET estado = ? WHERE id_comprobanteDeVenta = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii', $nuevo_estado, $id_cdv);
    $stmt->execute();

    echo 'correcto';
    $stmt->close();
}

$conn->close();

?>