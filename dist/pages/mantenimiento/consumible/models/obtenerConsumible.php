<?php
// obtener_consumible.php
include("./../../../../databases/db.php");

$id = $_GET['id'];

$query = "SELECT * FROM consumible WHERE id_consumible = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$json = array(
    'consumible' => array(),
    'categoria' => array(),
);


while ($row = $result->fetch_assoc()) {

    $json['consumible'][] = array(
        'id_consumible' => $row['id_consumible'],
        'nom_consumible' => $row['nom_consumible'],
        'descripcion' => $row['descripcion'],
        'precio' => $row['precio'],
        'id_categoria' => $row['id_categoria'],
    );
}

// Obtener las categorias
$queryc = "SELECT * FROM categoria";
$stmtc = $conn->prepare($queryc);
$stmtc->execute();
$resultc = $stmtc->get_result();

while ($rowc = $resultc->fetch_assoc()) {
    $json['categoria'][] = array(
        'value' => $rowc['id_categoria'],
        'label' => $rowc['nombre'],
    );
}

// Devuelves los datos del usuario en formato JSON
echo json_encode($json);

$stmt->close();
$stmtc->close();
$conn->close();

?>
