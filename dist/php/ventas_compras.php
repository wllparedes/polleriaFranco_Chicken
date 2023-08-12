<?php

function ventas_compras($registro)
{
    include("../../../../databases/db.php");

    // Escapar el nombre de la tabla para evitar inyección SQL
    $registro = mysqli_real_escape_string($conn, $registro);

    if ($registro == 'ventas') {
        $query = "SELECT SUM(total) as soles_ventas FROM comprobanteDeVenta";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_object();
        $soles_ventas = 'S/. ' . $row->soles_ventas;
        return $soles_ventas;

    } else if($registro == 'compras') {
        
        $query = "SELECT SUM(total) as soles_compras FROM ordenDeCompra;";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_object();
        $soles_compras = 'S/. ' . $row->soles_compras;
        return $soles_compras;
    }

}

?>
