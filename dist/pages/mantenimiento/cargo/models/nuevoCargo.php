<?php

include("./../../../../databases/db.php");

if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    try {
        // Preparar la consulta
        $query = "INSERT INTO cargo (nom_cargo, descripcion) VALUES (?, ?)";

        // Crear una declaración preparada
        $stmt = $conn->prepare($query);

        // Vincular los parámetros
        $stmt->bind_param("ss", $nombre, $descripcion);

        // Ejecutar la consulta
        $stmt->execute();
        // Cerrar
        $stmt->close();
        
        echo "correcto";
    } catch (Exception $e) {
        echo "error";
    }
}

$conn->close();

?>
