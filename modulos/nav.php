<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./bienvenida.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Empleados</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../empleado/RegistrarEmpleado.php">Registrar Empleado</a></li>
            <li><a class="dropdown-item" href="../empleado/empleados.php">Lista Empleados</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrador</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../administrador/RegistrarAdministrador.php">Registrar Administrador</a></li>
            <li><a class="dropdown-item" href="../administrador/administrador.php">Lista Administrador</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="btn btn-danger" href="../../index.php">Cerrar Sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>