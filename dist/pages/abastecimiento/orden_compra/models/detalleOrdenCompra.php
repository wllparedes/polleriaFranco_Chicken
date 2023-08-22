<?php

include("./../../../../databases/db.php");

$id_odc = $_POST['id'];

$query = "SELECT * FROM VER_ORDEN WHERE id_odc = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id_odc);
$stmt->execute();
$result = $stmt->get_result();

$json = array(
    'orden' => array(),
    'requerimiento' => array(),
    'productos' => array(),
    'empresa' => array()
);

while ($row = $result->fetch_assoc()) {
    if (count($json['orden']) < 1) {

        // * Orden de compra
        $partes_odc = explode(" ", $row['fecha_hora_odc']);
        $fecha_odc = $partes_odc[0];
        $hora_odc = $partes_odc[1];
        $estado_odc = $row['estado_odc'] == 0 ? "No activo" : "Activo";
        
        $partes_entrega = explode(" ", $row['fecha_hora_entrega']);
        $fecha_entrega = $partes_entrega[0];
        $hora_entrega = $partes_entrega[1];

        // * Requerimiento de compra
        $partes = explode(" ", $row['fecha_hora']);
        $fecha = $partes[0];
        $hora = $partes[1];
        $estado = $row['estado'] == 0 ? "No activo" : "Activo";


        // ? Comprobante de Venta : Datos

        $json['orden'][] = array(
            'id_odc' => $row['id_odc'],
            'fecha' => $fecha_odc,
            'hora' => $hora_odc,
            'estado' => $estado_odc,
            'total' => 'S/. ' . $row['total'],
            'igv' => 'S/. ' . $row['igv'],
            'fecha_entrega' => $fecha_entrega,
            'hora_entrega' => $hora_entrega
        );

        // ? Pedido : Datos

        $json['requerimiento'][] = array(

            'id_req' => $row['id_req'],
            'registrador' => $row['nombre_usuario'],
            'fecha' => $fecha,
            'hora' => $hora,
            'estado' => $estado,
            'observacion' => $row['observacion'],
            'sub_total' => 'S/. ' . $row['sub_total'],

        );

        $json['empresa'][] = array(

            'id_empresa' => $row['id_empresa'],
            'razon_social' => $row['razon_social'],
            'ruc' => $row['ruc'],
            'direccion' => $row['direccion'],
            'ciudad' => $row['ciudad'],
            'email' => $row['email'],
            'telefono' => $row['telefono'],
            'telefono_fijo' => $row['telefono_fijo']
        );

        $json['proveedor'][] = array(

            'id_proveedor' => $row['id_proveedor'],
            'razon_social' => $row['razon_social_prov'],
            'direccion' => $row['direccion_prov'],
            'ruc' => $row['ruc_prov'],
            'telefono' => $row['numero_prov'],
            'email' => $row['correo_prov'],

        );

    }

    // ? Productos 

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
