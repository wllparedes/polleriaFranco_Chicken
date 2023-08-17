<?php

include("./../../../../databases/db.php");

$search = $_POST['search'];

$query = "SELECT * FROM comprobanteDeCompra WHERE id_comprobanteDeCompra LIKE ? OR id_ordenDeCompra LIKE ? OR archivo LIKE ?";
$search1 = $search . "%";
$search2 = $search . "%";
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
