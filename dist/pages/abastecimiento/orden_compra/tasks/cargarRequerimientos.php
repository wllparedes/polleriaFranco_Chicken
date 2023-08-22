<?php

include("./../../../../databases/db.php");

$query = "SELECT id_req FROM requerimiento WHERE estado = 0";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {

    $queryR = "SELECT * FROM VER_REQUERIMIENTO WHERE id_req = ?";
    $stmtR = $conn->prepare($queryR);
    $stmtR->bind_param("i" ,$row['id_req']);
    $stmtR->execute();
    $resultR = $stmtR->get_result();
    $rowR = $resultR->fetch_object();

    $id_req = $rowR->id_req;

    $separado = explode(" ", $rowR->fecha_hora);
    $fecha = $separado[0];
    $hora = $separado[1];
    $description = "Fecha: " . $fecha . " Hora: " . $hora . " Registrador: " . $rowR->nombre_usuario;

    $json[] = array(
        'value' => $rowR->id_req,
        'label' => "ID: " . $rowR->id_req . " - Sub total: " . $rowR->sub_total,
        'description' => $description,
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;



?>
