<?php

include("./../../../../databases/db.php");

if (isset($_POST['razon_social'])) {
    $razon_social = $_POST['razon_social'];
    $ruc = $_POST['ruc'];
    $numero = $_POST['numero'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];

    try {
        // Preparar la consulta
        $query = "INSERT INTO cliente (razon_social, direccion, correo, ruc, numero) 
        VALUES (?, ?, ?, ?, ?)";

        // Crear una declaración preparada
        $stmt = $conn->prepare($query);

        // Vincular los parámetros
        $stmt->bind_param("sssss", $razon_social, $direccion, $correo, $ruc, $numero);

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
