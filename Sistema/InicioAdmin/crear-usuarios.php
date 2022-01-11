<?php error_reporting (5);?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Sistema</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/usuarios.css">
</head>
<body>
  <div class="ban">
    <h3 class="s-t">Sistema De Ventas y Facturacion</h3>
  </div>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">PANEL ADMINISTRADOR</a>
      </div>
      <ul class="nav navbar-nav">
        <ul class="nav navbar-nav">
          <li class=""><a href="index.php">Inicio</a></li>

          <li class="dropdown active">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="crear-usuarios.php">Crear Usuarios</a></li>
            <li><a href="crear-tipo-usuarios.php">Crear Tipo Usuarios</a></li>
            <li><a href="lista-usuarios.php">(Actualizar | Eliminar) Usuarios</a></li>
            <li><a href="lista-tipo-usuarios.php">(Actualizar | Eliminar) Tipo Usuarios</a></li>
          </ul>
          </li>

          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Clientes
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="crear-cliente.php">Crear Cliente</a></li>
            <li><a href="lista-clientes.php">(Actualizar | Eliminar) Clientes</a></li>
          </ul>
          </li>

          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Proveedores
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="crear-proveedor.php">Crear Proveedor</a></li>
            <li><a href="lista-proveedores.php">(Actualizar | Eliminar) Proveedores</a></li>
          </ul>
          </li>

          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Productos
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="crear-producto.php">Crear Producto</a></li>
            <li><a href="lista-productos.php">(Actualizar | Eliminar) Productos</a></li>
          </ul>
          </li>

          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Facturas
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="crear-facturas.php">Crear Factura</a></li>
            <li><a href="lista-facturas.php">Lista de Facturas</a></li>
          </ul>
          </li>
        </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../php/salir.php"><span class="glyphicon glyphicon-log-in"></span>    Salir</a></li>
      </ul>
      </ul>
    </div>
  </nav>

  <section id="container">
    <div class="form-r">
      <h3>Registro de Usuarios</h3>
      <hr>
        <form class="" action="../php/reg-user.php" method="post">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" value="">
          <label for="nombre">Apellido</label>
          <input type="text" name="apellido" id="apellido" value="">
          <label for="email">Correo Electronico</label>
          <input type="text" name="correo" id="correo" value="">
          <label for="usuario">Usuario</label>
          <input type="text" name="usuario" id="usuario" value="">
          <label for="contrasena">Contraseña</label>
          <input type="password" name="contrasena" id="contrasena" value="">
          <label for="tipo-usuario">Tipo de Usuario</label>

          <?php
            $conexion = mysqli_connect("localhost", "root", "", "Tienda");

            $query_rol = mysqli_query($conexion, "SELECT * FROM rol");
            $result_rol = mysqli_num_rows($query_rol);
          ?>

          <select class="rol" name="rol" id="rol">
            <?php
              if ($result_rol > 0)
              {
                while($rol = mysqli_fetch_array($query_rol))
                {
            ?>
                <option value="<?php echo $rol['id_rol']; ?>"><?php echo $rol['rol']; ?></option>
            <?php
                }
              }
            ?>
          </select>
          <input type="submit" name="" value="Registrar Usuario" class="btn-submit">
        </form>
    </div>
  </section>
</body>
</html>
