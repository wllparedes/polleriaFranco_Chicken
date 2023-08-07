<?php

include("./../../../../databases/db.php");

$query = "SELECT id_cargo, nom_cargo FROM cargo";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {
    $json[] = array(
        'value' => $row['id_cargo'],
        'label' => $row['nom_cargo'],
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;




?>
