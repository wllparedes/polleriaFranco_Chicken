<?php
// obtener_cliente.php
include("./../../../../databases/db.php");

$id = $_GET['id'];

$query = "SELECT * FROM categoria WHERE id_categoria = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

$categoria = $result->fetch_assoc();
// Devuelves los datos del cliente en formato JSON
echo json_encode($categoria);

$stmt->close();
$conn->close();
?>
