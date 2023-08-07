<?php

include("./../../../../databases/db.php");

$query = "SELECT id_consumible, nom_consumible FROM consumible";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {
    $json[] = array(
        'label' => $row['nom_consumible'],
        'value' => $row['id_consumible'],
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;




?>
