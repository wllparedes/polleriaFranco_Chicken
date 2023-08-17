<?php

include("./../../../../databases/db.php");

$search = $_POST['search'];

$query = "SELECT * FROM comprobanteDeVenta WHERE id_comprobanteDeVenta LIKE ? OR id_pedido LIKE ? OR id_cliente LIKE ?";
$search1 = $search . "%";
$search2 = "%" . $search . "%";
$search3 = "%" . $search . "%";
$stmt = $conn->prepare($query);
$stmt->bind_param("sss", $search1, $search2, $search3);
$stmt->execute();

$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {

    $partes = explode(" ", $row['fecha_hora']);
    $fecha = $partes[0];
    $hora = $partes[1];
    $estado = $row['estado'] == 0 ? "<div class='badge badge-danger'>No activo</div>" : "<div class='badge badge-success'>Activo</div>";

    $id_cliente = $row['id_cliente'];
    $id_pedido = $row['id_pedido'];
    $cliente = "";

    if (!empty($id_cliente)) {

        $queryx = "SELECT razon_social FROM cliente WHERE id_cliente = ?";
        $stmt = $conn->prepare($queryx);
        $stmt->bind_param('i', $id_cliente);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowx = $result->fetch_object();
        $cliente = $rowx->razon_social;

    } else {

        $queryx = "SELECT nom_cliente FROM pedido WHERE id_pedido = ?";
        $stmt = $conn->prepare($queryx);
        $stmt->bind_param('i', $id_pedido);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowx = $result->fetch_object();
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