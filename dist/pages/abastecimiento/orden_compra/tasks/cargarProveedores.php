<?php

include("./../../../../databases/db.php");

$query = "SELECT id_proveedor, razon_social, ruc FROM proveedor";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {
    $json[] = array(
        'value' => $row['id_proveedor'],
        'label' => $row['razon_social'],
        'description' => $row['ruc'],
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

$stmt->close();
$conn->close();

?>
