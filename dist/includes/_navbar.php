<!--  ! NAVBAR FILA -->
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <div class="d-sm-none d-lg-inline-block"> 
          <strong>
            <?= $_SESSION['nom_cargo'] ?>:
          </strong> 
        </div>
        <div class="d-sm-none d-lg-inline-block">
          <?= $_SESSION['nombre_usuario'] ?>
        </div>
        <img alt="image" src="./../../../../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
      </a> <!-- ? ASIGNAR NOMBRE DE USER -->
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title">Inició sesión hace 5 minutos</div>
        <a href="features-profile.html" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Perfil
        </a>
        <a href="features-settings.html" class="dropdown-item has-icon">
          <i class="fas fa-cog"></i> Ajustes
        </a>
        <div class="dropdown-divider"></div>
        <a href="./../../../../php/cerrar_session.php" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
        </a>
      </div>
    </li>
  </ul>
</nav>
<!-- ! FIN DE LA NAVBAR FILA -->
