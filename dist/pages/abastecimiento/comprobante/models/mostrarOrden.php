<?php

include("./../../../../databases/db.php");

// $valor = array
$valor = $_POST['valor'];

$query = "SELECT * FROM ordenDeCompra WHERE id_ordenDeCompra = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $valor);
$stmt->execute();
$result = $stmt->get_result();

$json = array(
    'orden' => array(),
    'proveedor' => array()
);

while ($row = $result->fetch_assoc()) {

    $partes = explode(" ", $row['fecha_hora']);
    $fecha = $partes[0];
    $hora = $partes[1];
    $estado = $row['estado'] == 0 ? "<div class='badge badge-danger'>No activo</div>" : "<div class='badge badge-success'>Activo</div>";

    $json['orden'][] = array(
        'id_odc' => $row['id_ordenDeCompra'],
        'fecha' => $fecha,
        'hora' => $hora,
        'estado' => $estado,
        'igv' => 'S/. ' . $row['igv'],
        'total' => 'S/. ' . $row['total'],
        'id_req' => $row['id_req'],
        'fecha_hora_entrega' => $row['fecha_hora_entrega'],
    );

    $id_proveedor = $row['id_proveedor'];
    $queryp = "SELECT * FROM proveedor WHERE id_proveedor = ?";
    $stmtp = $conn->prepare($queryp);
    $stmtp->bind_param('i', $id_proveedor);
    $stmtp->execute();
    $resultp = $stmtp->get_result();
    $rowp = $resultp->fetch_assoc();

    $json['proveedor'][] = array(
        'id_proveedor' => $rowp['id_proveedor'],
        'razon_social' => $rowp['razon_social'],
        'direccion' => $rowp['direccion'],
        'ruc' => $rowp['ruc'],
        'numero' => $rowp['numero'],
        'correo' => $rowp['correo']
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

$stmt->close();
$conn->close();

?>
