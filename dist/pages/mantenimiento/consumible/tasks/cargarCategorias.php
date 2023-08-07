<?php

include("./../../../../databases/db.php");

$query = "SELECT id_categoria, nombre FROM categoria";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {
    $json[] = array(
        'label' => $row['nombre'],
        'value' => $row['id_categoria'],
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;




?>
