<?php
  // Si no existe guardada en session los noimbres y apellidos, rederigir al index (login)
  if(empty($_SESSION['nombre_usuario']) && empty($_SESSION['nom_cargo'])){
    header('Location: ../../../../../index.php');
  }
?>