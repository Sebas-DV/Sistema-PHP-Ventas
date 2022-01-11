<?php
  $conexion = mysqli_connect("localhost", "root", "", "Tienda");

  if(!empty($_POST))
  {
    $id_usuario = $_POST['id_usuario'];
    $query_delete = mysqli_query($conexion, "DELETE FROM productos WHERE id_producto = $id_usuario");

    if($query_delete)
    {
      echo '<script type="text/javascript">
            alert("Producto Eliminado Correctamente.");
            window.location.href="../InicioAdmin/lista-productos.php";
          </script>';
    }
    else
    {
      echo '<script type="text/javascript">
            alert("Error: El Producto seleccionado no se pudo eliminar.");
            window.location.href="../InicioAdmin/lista-productos.php";
          </script>';
    }
  }
?>
