<?php

include("./../../../../databases/db.php");

if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    try {
        // Preparar la consulta
        $query = "INSERT INTO categoria (nombre, descripcion) 
        VALUES (?, ?)";

        // Crear una declaración preparada
        $stmt = $conn->prepare($query);

        // Vincular los parámetros
        $stmt->bind_param("ss", $nombre, $descripcion);

        // Ejecutar la consulta
        $stmt->execute();
        // Cerrar
        $stmt->close();
        $conn->close();

        echo "correcto";
    } catch (Exception $e) {
        echo "error";
    }
}
?>
