<?php

include("./../../../../databases/db.php");

$query = "SELECT id_cliente, razon_social, ruc FROM cliente";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {
    $json[] = array(
        'label' => $row['razon_social'],
        'value' => $row['id_cliente'],
        'description' => $row['ruc'],
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

$stmt->close();
$conn->close();

?>
