<?php

include("./../../../../databases/db.php");

// $valor = array
$valor = $_POST['valor'];

$query = "SELECT * FROM cliente WHERE id_cliente =  ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $valor);
$stmt->execute();
$result = $stmt->get_result();
$cliente = $result->fetch_assoc();

$jsonstring = json_encode($cliente);
echo $jsonstring;

$stmt->close();
$conn->close();

?>
