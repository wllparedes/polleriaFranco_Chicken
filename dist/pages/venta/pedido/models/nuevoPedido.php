<?php

include("./../../../../databases/db.php");

if (empty($_POST['productos'])) {
    echo 'error';
} else {

    // GUARDAR EN VARIABLES LOS DATOS A INSERTAR

    $productos = $_POST['productos'];
    $nom_cliente = $_POST['nom_cliente'];
    $n_mesa = empty($_POST['n_mesa']) ? 'Sin Mesa' : $_POST['n_mesa'] ;
    $observacion =  empty($_POST['observacion']) ? 'Sin observaciones' : $_POST['observacion'] ;
    $estado = 0;
    
    //  INSERT PARA LA TABLA PEDIDO
    
    $query = "INSERT INTO pedido (nom_cliente, estado, n_mesa, observacion) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('siss', $nom_cliente, $estado, $n_mesa, $observacion);
    $stmt->execute();
    $id_pedido = $conn->insert_id;
    
    // INSERT PARA LA TABLA DETALLE_PEDIDO
    
    foreach ($productos as $producto) {
        $id_consumible = (int) $producto['id_consumible'];
        $cantidad_i = (int) $producto['cantidad_i'];

        $query = "INSERT INTO detalle_pedido (id_pedido, id_consumible, cantidad) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('iii', $id_pedido, $id_consumible, $cantidad_i);
        $stmt->execute();
    }

    // CALCULAR EL SUBTOTAL

    $query2 = "SELECT subtotal FROM CALCULAR_SUBTOTAL WHERE id_pedido =  ?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param('i', $id_pedido);
    $stmt2->execute();
    $result = $stmt2->get_result();
    $row = $result->fetch_object();
    $sub_total = (float) $row->subtotal;

    // ACTUALIZAR EL SUBTOTAL DEL PEDIDO

    $query3 = "UPDATE pedido SET sub_total = ?  WHERE id_pedido = ?";
    $stmt3 = $conn->prepare($query3);
    $stmt3->bind_param('di', $sub_total, $id_pedido);
    $stmt3->execute();

    echo 'correcto';
    
    if (isset($stmt)) {
        @$stmt->close();
    } if (isset($stmt2)) {
        @$stmt2->close();
    } if (isset($stmt3)) {
        @$stmt3->close();
    }

    @$conn->close();
    
} 


?>
