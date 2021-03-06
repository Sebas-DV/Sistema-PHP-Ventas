<?php
  error_reporting (5);
  $conexion = mysqli_connect("localhost", "root", "", "Tienda");

  if(empty($_GET['id']))
  {
    header('Location: lista-usuario.php');
  }
  $iduser = $_GET['id'];

  $sql = mysqli_query($conexion, "SELECT o.id_producto, o.nombre_producto, o.precio, (o.id_proveedor) as id_proveedor, (r.nombre), (r.apellido) as apellido
                                  FROM productos o
                                  INNER JOIN proveedor r
                                  ON o.id_proveedor = r.id_proveedor
                                  WHERE id_producto = $iduser");


  $result_sql = mysqli_num_rows($sql);

  if($result_sql == 0)
  {
    header("Location: lista-productos.php");
  }
  else
  {
    $option = '';
    while ($data = mysqli_fetch_array($sql))
    {
      $iduser = $data['id_producto'];
      $nombre = $data['nombre_producto'];
      $precio = $data['precio'];
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

        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Proveedores
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="crear-proveedor.php">Crear Proveedor</a></li>
          <li><a href="lista-proveedores.php">(Actualizar | Eliminar) Proveedores</a></li>
        </ul>
        </li>

        <li class="dropdown active">
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
      <h3>Actualizar Producto</h3>
      <hr>
        <form class="" action="../php/act-producto.php" method="post">
          <input type="hidden" name="idUsuario" value="<?php echo $iduser; ?>">
          <label for="nombre">Nombre del Producto</label>
          <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
          <label for="nombre">Precio</label>
          <input type="precio" name="precio" id="precio" value="<?php echo $precio; ?>">
          <label for="tipo-usuario">Proveedor</label>

          <?php
            $conexion = mysqli_connect("localhost", "root", "", "Tienda");

            $query_proveedor = mysqli_query($conexion, "SELECT * FROM proveedor");
            $result_proveedor = mysqli_num_rows($query_proveedor);
          ?>

          <select class="rol" name="proveedor" id="rol">
            <?php
              if ($result_proveedor > 0)
              {
                while($proveedor = mysqli_fetch_array($query_proveedor))
                {
            ?>
                <option value="<?php echo $proveedor['id_proveedor']; ?>"><?php echo $proveedor['nombre']." ".$proveedor['apellido']; ?></option>
            <?php
                }
              }
            ?>
          </select>
          <input type="submit" name="" value="Actualizar Usuario" class="btn-submit">
        </form>
    </div>
  </section>
</body>
</html>
