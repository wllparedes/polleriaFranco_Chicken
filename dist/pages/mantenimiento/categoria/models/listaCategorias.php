<?php

include("./../../../../databases/db.php");

$query = "SELECT * FROM categoria";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {
    $json[] = array(
        'id_categoria' => $row['id_categoria'],
        'nombre' => $row['nombre'],
        'descripcion' => $row['descripcion']
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>
