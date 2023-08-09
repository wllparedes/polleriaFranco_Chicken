<?php

include("./../../../../databases/db.php");

$query = "SELECT id_req, registrador, fecha_hora FROM requerimiento WHERE estado = 0";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {

    $id_req = $row['id_req'];

    $separado = explode(" ", $row['fecha_hora']);
    $hora = $separado[1];
    $description = $id_req . " - " . $hora;

    $json[] = array(
        'value' => $id_req,
        'label' => $row['registrador'],
        'description' => $description,
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;



?>
