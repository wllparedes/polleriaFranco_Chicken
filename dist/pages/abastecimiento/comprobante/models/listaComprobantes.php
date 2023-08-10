<?php

include("./../../../../databases/db.php");

$query = "SELECT * FROM comprobanteDeCompra";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {

    $partes = explode(" ", $row['fecha_hora']);
    $fecha = $partes[0];
    $hora = $partes[1];

    $json[] = array(
        'id_cdv' => $row['id_comprobanteDeCompra'],
        'observacion' => $row['observacion'],
        'archivo' => $row['archivo'],
        'fecha' => $fecha,
        'hora' => $hora,
        'id_odc' => $row['id_ordenDeCompra'],
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>
