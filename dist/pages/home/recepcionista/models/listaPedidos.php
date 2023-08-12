<?php

include("./../../../../databases/db.php");

$query = "SELECT * FROM pedido";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_object()) {

    $partes = explode(' ', $row->fecha_hora);
    $fecha = $partes[0];
    $hora = $partes[1];

    $estado = $row->estado == 0 ? "<div class='badge badge-danger'>No activo</div>" : "<div class='badge badge-success'>Activo</div>";

    $json[] = array(
        'id_pedido' => $row->id_pedido,
        'nom_cliente' => $row->nom_cliente,
        'fecha' => $fecha,
        'hora' => $hora,
        'estado' => $estado,
        'sub_total' => $row->sub_total,
        'n_mesa' => $row->n_mesa,
        'observacion' => $row->observacion
    );

}

$jsonstring = json_encode($json);
echo $jsonstring;
?>
