<?php

// incluir base de datos y empezar la session
// ! LA DIRECCIÓN  DE LOS INCLUDE ESTOS SON REFERENCIADOS DESDE php/

include("./../databases/db.php");
include("empezar_session.php");
include("acceso_session.php");

// Verificar si el usuario existe y luego guardar en session sus nombres apellidos y cargo
if (!empty($_POST["correo"]) and !empty($_POST["clave"])) {
  $key = 'clave_secreta';

  $correo = $_POST["correo"];
  $password_writed = $_POST["clave"];

  // Obtener correo y password
  $query = "SELECT * FROM usuario WHERE email = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $correo);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($datos = $result->fetch_object()) {

    $clave = $datos->clave;
    $id_usuario = $datos->id_usuario;

    $queryP = "SELECT CAST(AES_DECRYPT(?, ?) AS CHAR) FROM usuario WHERE id_usuario = ?";
    $stmtP = $conn->prepare($queryP);
    $stmtP->bind_param('ssi',$clave, $key, $id_usuario);
    $stmtP->execute();
    $resultP = $stmtP->get_result();
    $rowP = $resultP->fetch_object();
    $password_decrypted = $rowP->{'CAST(AES_DECRYPT(?, ?) AS CHAR)'};

    if ($password_decrypted == $password_writed) {
      
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
  
      if ($dato_cargo = $result2->fetch_object()) {
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
    } else {
      echo 'error';
    }
  } else {
    echo 'error';
  }
} else {
  echo 'incompleto';
}

?>
