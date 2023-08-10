<?php

include("./../../../../databases/db.php");

if (empty($_POST['id'])) {
    echo 'error';
} else{
    $id_orden = $_POST['id'];
    $directorio = '../pdfs/';

    $query = "SELECT archivo FROM comprobantedecompra WHERE id_comprobanteDeCompra = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id_orden);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_object();
    $archivo = $row->archivo;
    $rutaPDF = $directorio . $archivo;
    echo $rutaPDF;
}


?>