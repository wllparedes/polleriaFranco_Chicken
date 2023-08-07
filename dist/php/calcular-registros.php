<?php

function calcular_registros($registro) {
    include("../../../../databases/db.php"); 
    
    // Escapar el nombre de la tabla para evitar inyección SQL
    $registro = mysqli_real_escape_string($conn, $registro);

    $query = "SELECT count(*) as 'total' FROM " . $registro;
    $stmt = $conn->prepare($query);

    $stmt->execute();
    $stmt->bind_result($total);
    $stmt->fetch();
    
    if ($total == 0) {
        return "<div class='card-body'> 0 </div>";
    } else {
        return "<div class='card-body'>" . $total . "</div>";
    }
}

?>
