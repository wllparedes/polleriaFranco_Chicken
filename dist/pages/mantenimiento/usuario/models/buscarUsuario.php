<?php

include("./../../../../databases/db.php");

$search = $_POST['search'];

$query = "SELECT *  FROM usuario WHERE id_usuario LIKE ? OR nombre_usuario LIKE ? OR email LIKE ? OR telefono LIKE ?";
$search1 = $search . "%";
$search2 = "%" . $search . "%";
$search3 = "%" . $search . "%";
$search4 = $search . "%";
$stmt = $conn->prepare($query);
$stmt->bind_param("isss", $search1, $search2, $search3, $search4);
$stmt->execute();

$result = $stmt->get_result();

if (!$result) {
    die('Error Consulta ' . mysqli_error($connection));
}

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
