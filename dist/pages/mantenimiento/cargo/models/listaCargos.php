<?php

include("./../../../../databases/db.php");

$query = "SELECT * FROM cargo";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {
    $json[] = array(
        'id_cargo' => $row['id_cargo'],
        'nom_cargo' => $row['nom_cargo'],
        'descripcion' => $row['descripcion']
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>
