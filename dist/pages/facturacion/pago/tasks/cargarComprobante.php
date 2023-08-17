<?php

include("./../../../../databases/db.php");

$query = "SELECT id_comprobanteDeVenta, id_pedido, total, fecha_hora FROM comprobanteDeVenta WHERE estado = 0";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {

    $id_cdv = $row['id_comprobanteDeVenta'];
    $id_pedido = $row['id_pedido'];
    $total = $row['total'];

    $separado = explode(" ", $row['fecha_hora']);
    $hora = $separado[1];
    $description ="S/. " . $total . " - " . $hora . " - " . $id_pedido;

    $json[] = array(
        'value' => $id_cdv,
        'label' => $id_cdv,
        'description' => $description,
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;





?>
