<?php

include("./../../../../databases/db.php");

$query = "SELECT id_producto, nom_producto FROM producto";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {
    $json[] = array(
        'label' => $row['nom_producto'],
        'value' => $row['id_producto'],
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>
