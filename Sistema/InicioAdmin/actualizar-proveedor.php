<?php
  error_reporting (5);
  $conexion = mysqli_connect("localhost", "root", "", "Tienda");

  if(empty($_GET['id']))
  {
    header('Location: lista-clientes.php');
  }
  $iduser = $_GET['id'];

  $sql = mysqli_query($conexion, "SELECT p.id_proveedor, p.nombre, p.apellido, p.telefono, p.direccion
                                  FROM proveedor p
                                  WHERE id_proveedor = $iduser");


  $result_sql = mysqli_num_rows($sql);

  if($result_sql == 0)
  {
    header("Location: lista-proveedores.php");
  }
  else
  {
    $option = '';
    while ($data = mysqli_fetch_array($sql))
    {
      $iduser = $data['id_proveedor'];
      $nombre = $data['nombre'];
      $apellido = $data['apellido'];
      $correo = $data['telefono'];
      $usuario = $data['direccion'];
    }
  }
?>
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
        <li class=""><a href="index.php">Inicio</a></li>

        <li class="dropdown">
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

        <li class="dropdown active">
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
    </div>
  </nav>

  <section id="container">
    <div class="form-r">
      <h3>Actualizar Proveedor</h3>
      <hr>
        <form class="" action="../php/act-proveedor.php" method="post">
          <input type="hidden" name="idCliente" value="<?php echo $iduser; ?>">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
          <label for="nombre">Apellido</label>
          <input type="text" name="apellido" id="apellido" value="<?php echo $apellido; ?>">
          <label for="email">Telefono</label>
          <input type="number" name="telefono" id="telefono" value="<?php echo $correo; ?>">
          <label for="usuario">Direccion</label>
          <input type="text" name="direccion" id="direccion" value="<?php echo $usuario; ?>">

          <input type="submit" name="" value="Actualizar Proveedor" class="btn-submit">
        </form>
    </div>
  </section>
</body>
</html>
