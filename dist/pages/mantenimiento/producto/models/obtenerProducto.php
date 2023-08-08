<?php
// obtener_consumible.php
include("./../../../../databases/db.php");

$id = $_GET['id'];

$query = "SELECT * FROM producto WHERE id_producto = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$json = array(
    'producto' => array(),
    'categoria' => array(),
);


while ($row = $result->fetch_assoc()) {

    $json['producto'][] = array(
        'id_producto' => $row['id_producto'],
        'nom_producto' => $row['nom_producto'],
        'precio' => $row['precio'],
        'descripcion' => $row['descripcion'],
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
