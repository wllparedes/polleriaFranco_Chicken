<?php

include("./../../../../databases/db.php");

$query = "SELECT * FROM proveedor";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {
    $json[] = array(
        'id_proveedor' => $row['id_proveedor'],
        'razon_social' => $row['razon_social'],
        'direccion' => $row['direccion'],
        'correo' => $row['correo'],
        'ruc' => $row['ruc'],
        'numero' => $row['numero']
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>
