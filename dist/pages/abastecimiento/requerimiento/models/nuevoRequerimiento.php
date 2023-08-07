<?php

include("./../../../../databases/db.php");
include("./../../../../php/empezar_session.php");

if (empty($_POST['productos'])) {
    echo 'error';
} else {

    // GUARDAR EN VARIABLES LOS DATOS A INSERTAR

    $productos = $_POST['productos'];
    $registrador = $_POST['registrador'];
    $observacion = empty($_POST['observacion']) ? 'Sin observaciones' : $_POST['observacion'];
    $estado = 0;
    $id_usuario = $_SESSION['id_usuario'];

    //  INSERT PARA LA TABLA PEDIDO

    $query = "INSERT INTO requerimiento (registrador, estado, observacion, id_usuario) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sisi', $registrador, $estado, $observacion, $id_usuario);
    $stmt->execute();
    $id_req = $conn->insert_id;

    // INSERT PARA LA TABLA DETALLE_PEDIDO

    foreach ($productos as $producto) {
        $id_producto = (int) $producto['id_producto'];
        $cantidad_i = (double) $producto['cantidad_i'];

        $query = "INSERT INTO detalle_requerimiento (id_req, id_producto, cantidad) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('iid', $id_req, $id_producto, $cantidad_i);
        $stmt->execute();
    }

    // CALCULAR EL SUBTOTAL

    $query2 = "SELECT subtotal FROM CALCULAR_SUBTOTAL_REQUERIMIENTO WHERE id_req =  ?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param('i', $id_req);
    $stmt2->execute();
    $result = $stmt2->get_result();
    $row = $result->fetch_object();
    $sub_total = (float) $row->subtotal;

    // ACTUALIZAR EL SUBTOTAL DEL PEDIDO

    $query3 = "UPDATE requerimiento SET sub_total = ?  WHERE id_req = ?";
    $stmt3 = $conn->prepare($query3);
    $stmt3->bind_param('di', $sub_total, $id_req);
    $stmt3->execute();

    echo 'correcto';

    if (isset($stmt)) {
        @$stmt->close();
    }
    if (isset($stmt2)) {
        @$stmt2->close();
    }
    if (isset($stmt3)) {
        @$stmt3->close();
    }

    @$conn->close();

}


?>
