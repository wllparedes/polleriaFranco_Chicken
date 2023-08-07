<?php
// obtener_cliente.php
include("./../../../../databases/db.php");


$id = $_GET['id'];

//  Obtenner consumible
$query = "SELECT * FROM producto WHERE id_producto = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$producto = $result->fetch_assoc();

echo json_encode($producto);

$stmt->close();
$conn->close();
?>
