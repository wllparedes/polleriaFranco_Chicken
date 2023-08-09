<?php

include("./../../../../databases/db.php");

// $valor = array
$valor = $_POST['valor'];

$query = "SELECT * FROM proveedor WHERE id_proveedor =  ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $valor);
$stmt->execute();
$result = $stmt->get_result();
$proveedor = $result->fetch_assoc();

$jsonstring = json_encode($proveedor);
echo $jsonstring;

$stmt->close();
$conn->close();

?>
