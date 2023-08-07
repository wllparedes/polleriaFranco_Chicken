<?php

include("./../../../../databases/db.php");

$search = $_POST['search'];

$query = "SELECT *  FROM proveedor WHERE razon_social LIKE ? OR ruc LIKE ?";
$search1 = "%". $search . "%";
$search2 = $search . "%";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $search1, $search2);
$stmt->execute();

$result = $stmt->get_result();

if (!$result) { die('Error Consulta ' . mysqli_error($connection)); }

$json = array();
while ($row = $result->fetch_assoc()) {
    $json[] = array(
        'id_proveedor' => $row['id_proveedor'],
        'razon_social' => $row['razon_social'],
        'direccion' => $row['direccion'],
        'correo' => $row['correo'],
        'ruc' => $row['ruc'],
        'numero' => $row['numero']
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>
