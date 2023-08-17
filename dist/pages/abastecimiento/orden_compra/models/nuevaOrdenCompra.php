<?php

include("./../../../../databases/db.php");
include("./../../../../php/empezar_session.php");

if (empty($_POST['id_proveedor']) || empty($_POST['id_req'])) {
    echo 'error';
} else {

    $id_req = $_POST['id_req'];
    $id_proveedor = $_POST['id_proveedor'];
    $id_empresa = 1;
    $fecha_hora_entrega = $_POST['fecha_hora'];

    $estado = 0;
    $estado_nuevo = 1;

    // ? Sacar el igv del pedido

    $query = "SELECT sub_total FROM requerimiento WHERE id_req = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id_req);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_object();
    $sub_total = (float) $row->sub_total;

    // ? IGV Y Monto final 
    $igv = (float) $sub_total * 0.18;
    $monto_final = (float) $sub_total + $igv;

    // ? Insert orden de compra
    $query2 = "INSERT INTO ordenDeCompra (estado, igv, total, id_proveedor, id_req, id_empresa, fecha_hora_entrega)
    VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt->prepare($query2);
    $stmt->bind_param('iddiiis', $estado, $igv, $monto_final, $id_proveedor, $id_req, $id_empresa, $fecha_hora_entrega);
    $stmt->execute();
    // ? Fin del insert comprobante de Venta

    // * Actualizar el estado del pedido ya preparado a comprobante de venta

    $query3 = "UPDATE requerimiento SET estado = ?  WHERE id_req = ?";
    $stmt = $conn->prepare($query3);
    $stmt->bind_param('ii', $estado_nuevo, $id_req);
    $stmt->execute();


    $stmt->close();
    $conn->close();

    echo 'correcto';
}

?>
