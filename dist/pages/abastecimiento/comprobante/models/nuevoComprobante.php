<?php
include("./../../../../databases/db.php");

if ( empty($_POST['id_orden']) || empty($_FILES['pdf']) ) {
    echo 'error';
} else {
    
    $id_orden = $_POST['id_orden'];
    $observacion = empty($_POST['observacion']) ? 'Sin Observaciones' : $_POST['observacion'];
    $estado_nuevo = 1;
    
    $uploadDirectory = './../pdfs/';
    $pdfFile = $_FILES['pdf'];
    $pdfFileName = $pdfFile['name'];
    $pdfFilePath = $uploadDirectory . $pdfFileName;

    // * INSERT
    $query = "INSERT INTO comprobantedecompra (observacion, archivo, id_ordenDeCompra) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssi', $observacion, $pdfFileName, $id_orden);
    $stmt->execute();

    // * UPDATE
    $query2 = "UPDATE ordendecompra SET estado = ?  WHERE id_ordenDeCompra = ?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param('ii', $estado_nuevo, $id_orden);
    $stmt2->execute();
    
    if (move_uploaded_file($pdfFile['tmp_name'], $pdfFilePath)) {
        echo 'correcto';
    } else {
        echo 'error';
    }

}






?>
