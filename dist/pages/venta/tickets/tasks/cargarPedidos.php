<?php

include("./../../../../databases/db.php");

$query = "SELECT id_pedido, nom_cliente, n_mesa, fecha_hora FROM pedido";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {

    $id_pedido = $row['id_pedido'];
    $n_mesa = $row['n_mesa'];

    $separado = explode(" ", $row['fecha_hora']);
    $hora = $separado[1];
    $description = $id_pedido . " - " . $n_mesa . " - " . $hora;

    $json[] = array(
        'value' => $id_pedido,
        'label' => $row['nom_cliente'],
        'description' => $description,
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;





?>
