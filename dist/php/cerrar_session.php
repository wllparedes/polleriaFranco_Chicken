<?php
  // Incluir base de datos
  include("empezar_session.php");
  // Destruir session cuando se haga click en cerrar session
  session_destroy();
  // Rederigir al index (login)
  header('Location: ../../index.php');
  

?>