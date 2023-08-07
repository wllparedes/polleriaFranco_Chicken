<?php

include("./../../../../databases/db.php");

$json = array();
// $valores = array
$valores = $_POST['valores'];

for ($i = 0; $i < count($valores); $i++) {

    $query = "SELECT * FROM producto WHERE id_producto =  ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $valores[$i]);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {

        // Identificar la categoria
        $stmt2 = $conn->prepare("SELECT nombre FROM categoria WHERE id_categoria = ?");
        $stmt2->bind_param('i', $row['id_categoria']);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $row2 = $result2->fetch_object();
        // Fin Identificar la categoria


        $json[] = array(
            'id_producto' => $row['id_producto'],
            'nom_producto' => $row['nom_producto'],
            'descripcion' => $row['descripcion'],
            'precio' => $row['precio'],
            'nom_categoria' => $row2->nombre,
        );
    }
}
$jsonstring = json_encode($json);
echo $jsonstring;
// }


?>
