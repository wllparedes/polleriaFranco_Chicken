<?php

include("./../../../../databases/db.php");
include("./../../../../php/empezar_session.php");

if (empty($_POST['id_pedido']) || empty($_POST['metodo_pago'])) {
    echo 'error';
} else {

    $id_pedido = $_POST['id_pedido'];
    $metodo_pago = $_POST['metodo_pago'];
    $id_cliente = $_POST['id_cliente'];
    $estado = 0;
    $estado_nuevo = 1;
    $id_usuario = $_SESSION['id_usuario'];

    // ? Sacar el igv del pedido

    $query = "SELECT sub_total FROM pedido WHERE id_pedido = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id_pedido);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_object();
    $sub_total = (float) $row->sub_total;

    // ? IGV Y Monto final 
    $igv = $sub_total * 0.18;
    $monto_final = $sub_total + $igv;

    if (empty($id_cliente)) {

        $query2 = "INSERT INTO comprobanteDeVenta (metodo_pago, estado, total, igv, id_pedido, id_usuario)
        VALUES (?, ?, ?, ?, ?, ?)";
        $stmt->prepare($query2);
        $stmt->bind_param('siddii', $metodo_pago, $estado, $monto_final, $igv, $id_pedido, $id_usuario);
        $stmt->execute();

    } else{

        // ? Insert Comprobante de Venta
        $query2 = "INSERT INTO comprobanteDeVenta (metodo_pago, estado, total, igv, id_pedido, id_usuario, id_cliente)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt->prepare($query2);
        $stmt->bind_param('siddiii', $metodo_pago, $estado, $monto_final, $igv, $id_pedido, $id_usuario, $id_cliente);
        $stmt->execute();
        // ? Fin del insert comprobante de Venta

    }


    // * Actualizar el estado del pedido ya preparado a comprobante de venta

    $query3 = "UPDATE pedido SET estado = ?  WHERE id_pedido = ?";
    $stmt = $conn->prepare($query3);
    $stmt->bind_param('ii', $estado_nuevo, $id_pedido);
    $stmt->execute();


    $stmt->close();
    $conn->close();

    echo 'correcto';
}

?>
