<?php

// incluir base de datos y empezar la session
// ! LA DIRECCIÓN  DE LOS INCLUDE ESTOS SON REFERENCIADOS DESDE php/

include("./../databases/db.php");
include("empezar_session.php");
include("acceso_session.php");

// Verificar si el usuario existe y luego guardar en session sus nombres apellidos y cargo
if (!empty($_POST["correo"]) and !empty($_POST["clave"])) {
  $key = 'clave_secreta';

  // Guardar en variables los correo y hash 
  $correo = $_POST["correo"];
  $password = $_POST["clave"];
  // Encryptar clave digitada para igualarla con la clave de la bd (tambien esta encryptada)
  $encrypted_password = openssl_encrypt($password, 'AES-256-ECB', $key);

  // Obtener correo y password
  $query = "SELECT * FROM usuario WHERE email = ? and clave = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ss", $correo, $encrypted_password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($datos = $result->fetch_object()) {
    
    $_SESSION['nombre_usuario'] = $datos->nombre_usuario;
    $_SESSION['id_usuario'] = $datos->id_usuario;

    // Guardar en una variable el id_cargo
    $id_cargo = $datos->id_cargo;

    // Obtener el nom_cargo
    $query2 = "SELECT nom_cargo FROM cargo WHERE id_cargo = ?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("i", $id_cargo);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    if($dato_cargo = $result2->fetch_object()){
      $_SESSION['nom_cargo'] = $dato_cargo->nom_cargo;
    } 

    if ($dato_cargo->nom_cargo == "Recepcionista") {
      $redirect = "dist/pages/home/recepcionista/views/inicio";
    } elseif ($dato_cargo->nom_cargo == "Almacenero") {
      $redirect = "dist/pages/home/almacenero/views/inicio";
    } elseif ($dato_cargo->nom_cargo == "Mesero") {
      $redirect = "dist/pages/home/mesero/views/inicio";
    }

    echo $redirect;

  } else{
    echo 'error';
  }
} else {
  echo 'incompleto';
}

?>