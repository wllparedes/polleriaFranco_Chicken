<?php

include("./../../../../databases/db.php");

$search = $_POST['search'];

$query = "SELECT *  FROM requerimiento WHERE id_req LIKE ? OR fecha_hora LIKE ? OR sub_total LIKE ?";

$search1 = $search . "%";
$search2 = $search . "%";
$search3 = $search . "%";
$stmt = $conn->prepare($query);
$stmt->bind_param("sss", $search1, $search2, $search3);
$stmt->execute();

$result = $stmt->get_result();

if (!$result) {
    die('Error Consulta ' . mysqli_error($connection));
}

$json = array();

while ($row = $result->fetch_assoc()) {

    $partes = explode(" ", $row['fecha_hora']);
    $fecha = $partes[0];
    $hora = $partes[1];
    $estado = $row['estado'] == 0 ? "<div class='badge badge-danger'>No activo</div>" : "<div class='badge badge-success'>Activo</div>";

    // nombre del registrador

    $queryR = "SELECT nombre_usuario FROM usuario WHERE id_usuario = ?";
    $stmtR = $conn->prepare($queryR);
    $stmtR->bind_param("i", $row['id_usuario']);
    $stmtR->execute();
    $resultR = $stmtR->get_result();
    $rowR = $resultR->fetch_assoc();
    $registrador = $rowR['nombre_usuario'];


    $json[] = array(
        'id_requerimiento' => $row['id_req'],
        'registrador' => $registrador,
        'fecha' => $fecha,
        'hora' => $hora,
        'estado' => $estado,
        'observacion' => $row['observacion'],
        'sub_total' => $row['sub_total'],
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>
