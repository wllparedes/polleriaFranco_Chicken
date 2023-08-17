<?php

include("./../../../../databases/db.php");

$id_comprobante = $_POST['id'];

$query = "SELECT * FROM VER_COMPROBANTE WHERE id_cdv = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id_comprobante);
$stmt->execute();
$result = $stmt->get_result();

$json = array(
    'comprobante' => array(),
    'pedido' => array(),
    'productos' => array(),
    'cliente' =>array()
);

while ($row = $result->fetch_assoc()) {
    if ( count($json['comprobante']) < 1 ) {

        $id_cliente = $row['id_cliente'];

        $partes_cdv = explode(" ", $row['fecha_hora_cdv']);
        $fecha_cdv = $partes_cdv[0];
        $hora_cdv = $partes_cdv[1];
        $estado_cdv = $row['estado_cdv'] == 0 ? "No activo" : "Activo";

        $partes = explode(" ", $row['fecha_hora']);
        $fecha = $partes[0];
        $hora = $partes[1];
        $estado = $row['estado'] == 0 ? "No activo" : "Activo";

        // ? Comprobante de Venta : Datos

        $json['comprobante'][] = array(
            'id_cdv' => $row['id_cdv'],
            'metodo_pago' => $row['metodo_pago'],
            'fecha' => $fecha_cdv,
            'hora' => $hora_cdv,
            'estado' => $estado_cdv,
            'total' => $row['total'],
            'igv' => $row['igv'],
            'id_usuario' => $row['id_usuario'],
            'id_cliente' => $row['id_cliente']
        );


        // ? Pedido : Datos

        $json['pedido'][] = array(
            
            'id_pedido' => $row['id_pedido'],
            'nom_cliente' => $row['nom_cliente'], 
            'fecha' => $fecha,
            'hora' => $hora,
            'estado' => $estado,
            'sub_total' => $row['sub_total'],
            'n_mesa' => $row['n_mesa'],
            'observacion' => $row['observacion']

        );

        if ( !empty($id_cliente) ) {
            $queryx = "SELECT * FROM cliente WHERE id_cliente = ?";
            $stmtx = $conn->prepare($queryx);
            $stmtx->bind_param('i', $id_cliente);
            $stmtx->execute();
            $resultx = $stmtx->get_result();
            $rowx = $resultx->fetch_assoc();

            $json['cliente'][] = array(

                'razon_social' => $rowx['razon_social'],
                'direccion' => $rowx['direccion'],
                'correo' => $rowx['correo'],
                'ruc' => $rowx['ruc'],
                'numero' => $rowx['numero']
            );
            $stmtx->close();

        }

    }

    // ? Productos 

    $json['productos'][] = array(
        'id_consumible' => $row['id_consumible'],
        'cantidad' => $row['cantidad'],
        'nom_consumible' => $row['nom_consumible'],
        'descripcion' => $row['descripcion'],
        'precio' => $row['precio'],
        'nom_categoria' => $row['nom_categoria']
    );
}


$stmt->close();
$conn->close();

$jsonstring = json_encode($json);
echo $jsonstring;
?>
