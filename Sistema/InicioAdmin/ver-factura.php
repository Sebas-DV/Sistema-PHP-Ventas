<?php
  $conexion = mysqli_connect("localhost", "root", "", "Tienda");


  if(empty($_REQUEST['id']))
  {
    header('location: lista-clientes.php');
  }
  else
  {
    $id_usuario = $_REQUEST['id'];

    $query = mysqli_query($conexion, "SELECT f.id_factura, r.nombre, r.apellido, r.direccion, r.telefono
											                        FROM facturadora f
                                              INNER JOIN cliente r ON f.id_cliente = r.id_cliente
                                              WHERE $id_usuario = f.id_factura");

    $datos_p = mysqli_query($conexion, "SELECT f.id_factura, t.nombre, t.apellido, t.direccion, t.telefono
											                        FROM facturadora f
                                              INNER JOIN proveedor t ON f.id_proveedor = t.id_proveedor
                                              WHERE $id_usuario = f.id_factura");

    $datos_prod = mysqli_query($conexion, "SELECT f.id_factura, p.nombre_producto, p.precio
											                        FROM facturadora f
                                              INNER JOIN productos p ON f.id_producto = p.id_producto
                                              WHERE $id_usuario = f.id_factura");

    $result = mysqli_num_rows($query);

    if($result > 0)
    {
      while ($data = mysqli_fetch_array($query))
      {
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $telefono = $data['telefono'];
        $direccion = $data['direccion'];

        while ($data_proveedor = mysqli_fetch_array($datos_p))
        {
          $nombre_p = $data_proveedor['nombre'];
          $apellido_p = $data_proveedor['apellido'];
          $telefono_p = $data_proveedor['telefono'];
          $direccion_p = $data_proveedor['direccion'];

          while ($data_prod = mysqli_fetch_array($datos_prod))
          {
            $nombre_prod = $data_prod['nombre_producto'];
            $precio_prod = $data_prod['precio'];
          }
        }
      }

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

          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Productos
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="crear-producto.php">Crear Producto</a></li>
            <li><a href="lista-productos.php">(Actualizar | Eliminar) Productos</a></li>
          </ul>
          </li>

          <li class="dropdown active">
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
      <h3>Detalle de Compra</h3>
      <hr>
      <div class="eliminar-datos">
        <h2>Detalle de Factura</h2>
        <h3>Datos Personales</h3>
        <p>Nombre: <span><?php echo $nombre; ?></span></p>
        <p>Apellido: <span><?php echo $apellido; ?></span></p>
        <p>Direccion: <span><?php echo $direccion; ?></span></p>
        <p>Telefono: <span><?php echo $telefono; ?></span></p>

        <h3>Datos del Proveedor</h3>
        <p>Proveedor: <span><?php echo $nombre_p." ".$apellido_p; ?></span></p>
        <p>Direccion: <span><?php echo $direccion_p; ?></span></p>
        <p>Telefono: <span><?php echo $telefono_p; ?></span></p>

        <h3>Producto</h3>
        <p>Nombre: <span><?php echo $nombre_prod; ?></span></p>
        <p>Precio Total: <span><?php echo $precio_prod; ?></span></p>
        <form class="formulario" action="" method="post">
          <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
          <a class="eliminar-btn" href="lista-facturas.php">Aceptar</a>
        </form>
      </div>
    </div>
  </section>
</body>
</html>
