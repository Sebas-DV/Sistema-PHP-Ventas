<?php
  error_reporting (5);
  $conexion = mysqli_connect("localhost", "root", "", "Tienda");

  $idUsuario = $_POST['idUsuario'];
  $nombre = $_POST['nombre'];
  $precio = $_POST['precio'];
  $proveedor = $_POST['proveedor'];

  if(empty($nombre) || empty($precio) || empty($proveedor))
  {
    header("Location: ../InicioAdmin/lista-productos.php");
    exit();
  }
  else
  {
    $query = mysqli_query($conexion, "SELECT * FROM productos
                                      WHERE (nombre_producto='$nombre' AND id_producto != $idUsuario)");

    $result = mysqli_fetch_array($query);

    if ($result > 0)
    {
      echo '<script type="text/javascript">
            alert("Error: Producto ya existente.");
            window.location.href="../InicioAdmin/lista-productos.php";
          </script>';
    }
    else
    {
        $sql_update = mysqli_query($conexion, "UPDATE productos
                                               SET id_proveedor='$proveedor' , nombre_producto='$nombre', precio = '$precio'
                                               WHERE id_producto = $idUsuario");


      if($sql_update)
      {
        echo '<script type="text/javascript">
              alert("Producto Actualizado Con Exito.");
              window.location.href="../InicioAdmin/lista-productos.php";
            </script>';
      }
      else
      {
        echo '<script type="text/javascript">
              alert("Error: No se pudo Actualizar el Producto.");
              window.location.href="../InicioAdmin/lista-productos.php";
            </script>';
      }
    }
  }

?>
