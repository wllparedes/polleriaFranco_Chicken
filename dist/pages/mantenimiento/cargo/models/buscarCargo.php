<?php

include("./../../../../databases/db.php");

$search = $_POST['search'];

$query = "SELECT *  FROM cargo WHERE nom_cargo LIKE ?";
$search = $search . "%";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $search);
$stmt->execute();

$result = $stmt->get_result();

if (!$result) {
    die('Error Consulta ' . mysqli_error($connection));
}

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
