<?php

include("./../../../../databases/db.php");

$query = "SELECT id_ordenDeCompra, igv, total, id_proveedor, fecha_hora FROM ordenDeCompra WHERE estado = 0";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$json = array();

while ($row = $result->fetch_assoc()) {

    $id_odc = $row['id_ordenDeCompra'];
    $id_prov = $row['id_proveedor'];

    $queryp = "SELECT razon_social FROM proveedor WHERE id_proveedor = ?";
    $stmtp = $conn->prepare($queryp);
    $stmtp->bind_param('i', $id_prov);
    $stmtp->execute();
    $resultp = $stmtp->get_result();
    $rowp = $resultp->fetch_object();
    $razon_social = $rowp->razon_social;

    $json[] = array(
        'value' => $id_odc,
        'label' => "ID: " . $id_odc . ' - igv: S/.' . $row['igv'] . " - Monto Final: S/." . $row['total'],
        'description' => 'Prov: ' . $razon_social . ' - Fecha y Hora: ' . $row['fecha_hora'],
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;



?>
