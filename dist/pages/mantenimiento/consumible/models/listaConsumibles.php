<?php

include("./../../../../databases/db.php");

$query = "SELECT * FROM consumible";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {

    // Identificar la categoria
    $stmt2 = $conn->prepare("SELECT nombre FROM categoria WHERE id_categoria = ?");
    $stmt2->bind_param('i', $row['id_categoria']);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $row2 = $result2->fetch_object();
    // Fin Identificar la categoria

    $json[] = array(
        'id_consumible' => $row['id_consumible'],
        'nom_consumible' => $row['nom_consumible'],
        'descripcion' => $row['descripcion'],
        'precio' => $row['precio'],
        'nom_categoria' => $row2->nombre,
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>
