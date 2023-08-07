<?php
// obtener_cliente.php
include("./../../../../databases/db.php");

$id = $_GET['id'];

$query = "SELECT * FROM cliente WHERE id_cliente = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$cliente = $result->fetch_assoc();
// Devuelves los datos del cliente en formato JSON
echo json_encode($cliente);

$stmt->close();
$conn->close();

?>