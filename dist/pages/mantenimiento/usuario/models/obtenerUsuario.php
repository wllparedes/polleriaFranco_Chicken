<?php
// obtener_cliente.php
include("./../../../../databases/db.php");

$id = $_GET['id'];
$key = 'clave_secreta';

$query = "SELECT * FROM usuario WHERE id_usuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$json = array(
    'usuario' => array(),
    'cargo' => array(),
);


while ( $row = $result->fetch_assoc() ) {

    $password = $row['clave'];
    $decrypted_password = openssl_decrypt($password, 'AES-256-ECB', $key);

    $json['usuario'][] = array( 
        'id_usuario' => $row['id_usuario'],
        'nombres' => $row['nombres'],
        'apellidos' => $row['apellidos'],
        'telefono' => $row['telefono'],
        'dni' => $row['dni'],
        'nombre_usuario' => $row['nombre_usuario'],
        'email' => $row['email'],
        'id_cargo' => $row['id_cargo'],
        'clave' => $decrypted_password,
        
    );
}

// Obtener los cargos
$queryc = "SELECT * FROM cargo";
$stmtc = $conn->prepare($queryc);
$stmtc->execute();
$resultc = $stmtc->get_result();

while ($rowc = $resultc->fetch_assoc()) {
    $json['cargo'][] = array(
        'value' => $rowc['id_cargo'],
        'label' => $rowc['nom_cargo'],
    );
}

// Devuelves los datos del usuario en formato JSON
echo json_encode($json);

$stmt->close();
$stmtc->close();
$conn->close();

?>
