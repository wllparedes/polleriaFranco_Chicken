<?php

include("./../../../../databases/db.php");
include("./../../../../php/empezar_session.php");

$id = (int) $_POST['id'];
$id_usuario = (int) $_SESSION['id_usuario'];

if ( empty($id) ) {
    echo 'advertencia';
} else {

    if ( $id == $id_usuario ) {
        echo 'not_eliminar';
    } else{        
        try {
            $query = "DELETE FROM usuario WHERE id_usuario = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            
            $stmt->close();
            echo 'correcto';
        } catch (Exception $e) {
            echo 'error';
        }
    }

}

$conn->close();

?>
