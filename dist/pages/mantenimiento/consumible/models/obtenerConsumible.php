<?php
// obtener_cliente.php
include("./../../../../databases/db.php");


$id = $_GET['id'];

//  Obtenner consumible
$query = "SELECT * FROM consumible WHERE id_consumible = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$consumible = $result->fetch_assoc();

echo json_encode($consumible);

$stmt->close();
$conn->close();
?>
