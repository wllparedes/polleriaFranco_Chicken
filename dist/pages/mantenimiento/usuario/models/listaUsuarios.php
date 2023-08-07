<?php

include("./../../../../databases/db.php");

$query = "SELECT * FROM usuario";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {
    $clave = '*********';

    $queryx = "SELECT nom_cargo FROM cargo WHERE id_cargo = ?";
    $stmtx = $conn->prepare($queryx);
    $stmtx->bind_param('i', $row['id_cargo']);
    $stmtx->execute();
    $resultx = $stmtx->get_result();
    $rowx = $resultx->fetch_assoc();
    $cargo = $rowx['nom_cargo'];

    $json[] = array(
        'id_usuario' => $row['id_usuario'],
        'nombre_usuario' => $row['nombre_usuario'],
        'numero' => $row['telefono'],
        'dni' => $row['dni'],
        'correo' => $row['email'],
        'clave' => $clave,
        'cargo' => $cargo,
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>
