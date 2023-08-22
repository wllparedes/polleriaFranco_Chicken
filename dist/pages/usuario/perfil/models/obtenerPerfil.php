<?php
// obtener_usuario.php
include("./../../../../databases/db.php");
include("./../../../../php/empezar_session.php");

$id = $_SESSION['id_usuario'];
$key = 'clave_secreta';

$query = "SELECT * FROM usuario WHERE id_usuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$json = array(
    'usuario' => array(),
);

while ($row = $result->fetch_assoc()) {

    $clave = $row['clave'];

    $queryP = "SELECT CAST(AES_DECRYPT(?, ?) AS CHAR) FROM usuario WHERE id_usuario = ?";
    $stmtP = $conn->prepare($queryP);
    $stmtP->bind_param('ssi', $clave, $key, $id);
    $stmtP->execute();
    $resultP = $stmtP->get_result();
    $rowP = $resultP->fetch_object();
    $password_decrypted = $rowP->{'CAST(AES_DECRYPT(?, ?) AS CHAR)'};


    $json['usuario'][] = array(
        'id_usuario' => $row['id_usuario'],
        'nombres' => $row['nombres'],
        'apellidos' => $row['apellidos'],
        'telefono' => $row['telefono'],
        'dni' => $row['dni'],
        'nombre_usuario' => $row['nombre_usuario'],
        'email' => $row['email'],
        'clave' => $password_decrypted,
    );
}

// Devuelves los datos del usuario en formato JSON
echo json_encode($json);

$stmt->close();
$conn->close();

?>
