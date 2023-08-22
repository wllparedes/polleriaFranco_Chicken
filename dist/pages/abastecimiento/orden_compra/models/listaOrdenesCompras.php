<?php

include("./../../../../databases/db.php");

$query = "SELECT * FROM ordenDeCompra";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {

    $partes = explode(" ", $row['fecha_hora']);
    $fecha = $partes[0];
    $hora = $partes[1];
    $estado = $row['estado'] == 0 ? "<div class='badge badge-danger'>No activo</div>" : "<div class='badge badge-success'>Activo</div>";

    $id_req = $row['id_req'];
    $id_proveedor = $row['id_proveedor'];

    // ? Razon Social

    $queryx = "SELECT razon_social FROM proveedor WHERE id_proveedor = ?";
    $stmtx = $conn->prepare($queryx);
    $stmtx->bind_param('i', $id_proveedor);
    $stmtx->execute();
    $resultx = $stmtx->get_result();
    $rowx = $resultx->fetch_object();
    $proveedor = $rowx->razon_social;


    // ? Requerimiento

    $queryr = "SELECT fecha_hora FROM requerimiento WHERE id_req = ?";
    $stmtr = $conn->prepare($queryr);
    $stmtr->bind_param('i', $id_req);
    $stmtr->execute();
    $resultr = $stmtr->get_result();
    $rowr = $resultr->fetch_object();
    $fecha_hora_req = $rowr->fecha_hora;


    $json[] = array(
        'id_orden' => $row['id_ordenDeCompra'],
        'fecha' => $fecha,
        'hora' => $hora,
        'estado' => $estado,
        'igv' => $row['igv'],
        'total' => $row['total'],
        'proveedor' => $proveedor .': '. $id_proveedor,
        'id_req' => $id_req,
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>
