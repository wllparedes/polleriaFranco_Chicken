<?php

include("./../../../../databases/db.php");

$id_req = $_POST['id'];

$query = "SELECT * FROM VER_REQUERIMIENTO WHERE id_req = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id_req);
$stmt->execute();
$result = $stmt->get_result();

$json = array(
    'productos' => array()
);

while ($row = $result->fetch_assoc()) {
    if (!isset($json['id_req'])) {
        $partes = explode(" ", $row['fecha_hora']);
        $fecha = $partes[0];
        $hora = $partes[1];
        $estado = $row['estado'] == 0 ? "<div class='badge badge-danger'>No activo</div>" : "<div class='badge badge-success'>Activo</div>" ;

        $json['id_req'] = $row['id_req'];
        $json['registrador'] = $row['registrador'];
        $json['fecha'] = $fecha;
        $json['hora'] = $hora;
        $json['estado'] = $estado;
        $json['sub_total'] = $row['sub_total'];
        $json['observacion'] = $row['observacion'];
        $json['id_usuario'] = $row['id_usuario'];
    }

    $json['productos'][] = array(
        'id_producto' => $row['id_producto'],
        'cantidad' => $row['cantidad'],
        'nom_producto' => $row['nom_producto'],
        'descripcion' => $row['descripcion'],
        'precio' => $row['precio'],
        'nom_categoria' => $row['nom_categoria']
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>
