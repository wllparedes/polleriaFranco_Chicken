<?php
// obtener_cliente.php
include("./../../../../databases/db.php");

$id = $_GET['id'];

$query = "SELECT * FROM cargo WHERE id_cargo = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

$cargo = $result->fetch_assoc();
// Devuelves los datos del cargo en formato JSON
echo json_encode($cargo);

$stmt->close();
$conn->close();
?>
