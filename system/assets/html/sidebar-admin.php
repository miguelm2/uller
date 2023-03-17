<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="index">
        <i class="bi bi-grid"></i>
        <span>Inicio</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle collapsed" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-gear"></i>
        <span>Configuración</span>
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="tools">Herramientas / Equipos</a></li>
        <li><a class="dropdown-item" href="materials">Materiales</a></li>
        <li><a class="dropdown-item" href="equipmentTypes">Tipos de equipo</a></li>
        <li><a class="dropdown-item" href="serviceTypes">Tipos de servicio</a></li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="administrators">
        <i class="bi bi-people-fill"></i>
        <span>Administradores</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="users">
        <i class="bi bi-person-lines-fill"></i>
        <span>Usuarios</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="messages">
        <i class="bi bi-envelope"></i>
        <span>Mensajes <?= $contadorMensajes; ?></span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile">
        <i class="bi bi-person"></i>
        <span>Perfil</span>
      </a>
    </li><!-- End Profile Page Nav -->






    <li class="nav-item">
      <a class="nav-link collapsed" href="information">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Informacion</span>
      </a>
    </li><!-- End Login Page Nav -->



  </ul>

</aside>