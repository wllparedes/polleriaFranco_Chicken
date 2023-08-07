<?php

include("./../../../../databases/db.php");

$query = "SELECT * FROM comprobanteDeVenta";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {

    $partes = explode(" ", $row['fecha_hora']);
    $fecha = $partes[0];
    $hora = $partes[1];
    $estado = $row['estado'] == 0 ? "<div class='badge badge-danger'>No activo</div>" : "<div class='badge badge-success'>Activo</div>" ;

    $id_cliente = $row['id_cliente'];
    $id_pedido = $row['id_pedido'];
    $cliente;

    if (!empty($id_cliente)) {

        $queryx = "SELECT razon_social FROM cliente WHERE id_cliente = ?";
        $stmtx = $conn->prepare($queryx);
        $stmtx->bind_param('i', $id_cliente);
        $stmtx->execute();
        $resultx = $stmtx->get_result();
        $rowx = $resultx->fetch_object();
        $cliente = $rowx->razon_social;
        
    } else{
        
        $queryx = "SELECT nom_cliente FROM pedido WHERE id_pedido = ?";
        $stmtx = $conn->prepare($queryx);
        $stmtx->bind_param('i', $id_pedido);
        $stmtx->execute();
        $resultx = $stmtx->get_result();
        $rowx = $resultx->fetch_object();
        $cliente = $rowx->nom_cliente;

    }

    $json[] = array(
        'id_comprobante' => $row['id_comprobanteDeVenta'],
        'metodo_pago' => $row['metodo_pago'],
        'fecha' => $fecha,
        'hora' => $hora,
        'estado' => $estado,
        'total' => $row['total'],
        'igv' => $row['igv'],
        'id_pedido' => $id_pedido,
        'nombre' => $cliente,
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>
