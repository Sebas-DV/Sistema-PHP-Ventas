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
    </div>
  </nav>

  <section id="container">
    <div class="form-r">
      <h3>Registro de Facturas</h3>
      <hr>
        <form class="" action="../php/reg-factura.php" method="post">
          <?php
            $conexion = mysqli_connect("localhost", "root", "", "Tienda");

            $query_proveedor = mysqli_query($conexion, "SELECT * FROM proveedor");
            $result_proveedor = mysqli_num_rows($query_proveedor);

            $query_producto = mysqli_query($conexion, "SELECT * FROM productos");
            $result_producto = mysqli_num_rows($query_producto);

            $query_cliente = mysqli_query($conexion, "SELECT * FROM cliente");
            $result_cliente = mysqli_num_rows($query_cliente);

          ?>
          <label for="tipo-usuario">Cliente</label>
          <select class="rol" name="cliente" id="rol">
            <?php
              if ($result_cliente > 0)
              {
                while($cliente = mysqli_fetch_array($query_cliente))
                {
            ?>
                <option value="<?php echo $cliente ['id_cliente']; ?>"><?php echo $cliente ['nombre']." ".$cliente['apellido'];?></option>
            <?php
                }
              }
            ?>
          </select>

          <label for="tipo-usuario">Producto</label>
          <select class="rol" name="producto" id="rol">
            <?php
              if ($result_producto > 0)
              {
                while($producto = mysqli_fetch_array($query_producto))
                {
            ?>
                <option value="<?php echo $producto ['id_producto']; ?>"><?php echo $producto ['nombre_producto'];?></option>
            <?php
                }
              }
            ?>
          </select>

          <label for="tipo-usuario">Proveedor</label>
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
          <input type="submit" name="" value="Registrar Usuario" class="btn-submit">
        </form>
    </div>
  </section>
</body>
</html>
