<?php
  error_reporting (5);
  $conexion = mysqli_connect("localhost", "root", "", "Tienda");

  $nombre = $_POST['nombre'];
  $precio = $_POST['precio'];
  $proveedor = $_POST['proveedor'];

  if(empty($nombre) || empty($precio) ||empty($proveedor))
  {
    header("Location: ../InicioAdmin/crear-producto.php");
    exit();
  }
  else
  {
    $query = mysqli_query($conexion, "SELECT * FROM productos WHERE nombre_producto='$nombre'");
    $result = mysqli_fetch_array($query);

    if ($result > 0)
    {
      echo '<script type="text/javascript">
            alert("Error: Producto ya existente.");
            window.location.href="../InicioAdmin/crear-producto.php";
          </script>';
    }
    else
    {
      $query_insert = mysqli_query($conexion, "INSERT INTO productos (id_proveedor, nombre_producto, precio)
                                               VALUES ('$proveedor', '$nombre', '$precio')");

      if($query_insert)
      {
        echo '<script type="text/javascript">
              alert("Producto Creado Con Exito.");
              window.location.href="../InicioAdmin/crear-producto.php";
            </script>';
      }
      else
      {
        echo '<script type="text/javascript">
              alert("Error: No se pudo Crear el Producto.");
              window.location.href="../InicioAdmin/crear-producto.php";
            </script>';
      }
    }
  }
?>
