<?php

include("./../../../../databases/db.php");

$id_pedido = $_POST['id'];

$query = "SELECT * FROM VER_PEDIDO WHERE id_pedido = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id_pedido);
$stmt->execute();
$result = $stmt->get_result();

$json = array(
    'productos' => array()
);

while ($row = $result->fetch_assoc()) {
    if (!isset($json['id_pedido'])) {
        $partes = explode(" ", $row['fecha_hora']);
        $fecha = $partes[0];
        $hora = $partes[1];
        $estado = "";

        if ($row['estado'] == 0) {
            $estado = "<div class='badge badge-danger'>No activo</div>";
        } else {
            $estado = "<div class='badge badge-success'>Activo</div>";
        }

        $json['id_pedido'] = $row['id_pedido'];
        $json['nom_cliente'] = $row['nom_cliente'];
        $json['fecha'] = $fecha;
        $json['hora'] = $hora;
        $json['estado'] = $estado;
        $json['sub_total'] = $row['sub_total'];
        $json['n_mesa'] = $row['n_mesa'];
        $json['observacion'] = $row['observacion'];
    }

    $json['productos'][] = array(
        'id_consumible' => $row['id_consumible'],
        'cantidad' => $row['cantidad'],
        'nom_consumible' => $row['nom_consumible'],
        'descripcion' => $row['descripcion'],
        'precio' => $row['precio'],
        'nom_categoria' => $row['nom_categoria']
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>
