<?php
// obtener_cliente.php
include("./../../../../databases/db.php");

$id = $_GET['id'];

$query = "SELECT * FROM proveedor WHERE id_proveedor = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$proveedor = $result->fetch_assoc();
// Devuelves los datos del cliente en formato JSON
echo json_encode($proveedor);

$stmt->close();
$conn->close();

?>