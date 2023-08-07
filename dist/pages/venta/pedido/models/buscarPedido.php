<?php

include("./../../../../databases/db.php");

$search = $_POST['search'];

$query = "SELECT *  FROM pedido WHERE id_pedido LIKE ? OR nom_cliente LIKE ? OR n_mesa LIKE ?";
$search1 = $search . "%";
$search2 = "%" . $search . "%";
$search3 = "%" . $search . "%";
$stmt = $conn->prepare($query);
$stmt->bind_param("sss", $search1, $search2, $search3);
$stmt->execute();

$result = $stmt->get_result();

if (!$result) {
    die('Error Consulta ' . mysqli_error($connection));
}

$json = array();

while ($row = $result->fetch_assoc()) {

    $partes = explode(" ", $row['fecha_hora']);
    $fecha = $partes[0];
    $hora = $partes[1];
    $estado = "";

    if ($row['estado'] == 0) {
        $estado = "<div class='badge badge-danger'>No activo</div>";
    } else {
        $estado = "<div class='badge badge-success'>Activo</div>";
    }

    $json[] = array(
        'id_pedido' => $row['id_pedido'],
        'nom_cliente' => $row['nom_cliente'],
        'fecha' => $fecha,
        'hora' => $hora,
        'estado' => $estado,
        'sub_total' => $row['sub_total'],
        'n_mesa' => $row['n_mesa'],
        'observacion' => $row['observacion']
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>
