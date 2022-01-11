<?php
  $conexion = mysqli_connect("localhost", "root", "", "Tienda");

  if(!empty($_POST))
  {
    $id_usuario = $_POST['id_usuario'];
    $query_delete = mysqli_query($conexion, "DELETE FROM proveedor WHERE id_proveedor = $id_usuario");

    if($query_delete)
    {
      echo '<script type="text/javascript">
            alert("Proveedor Eliminado Correctamente.");
            window.location.href="../InicioAdmin/lista-proveedores.php";
          </script>';
    }
    else
    {
      echo '<script type="text/javascript">
            alert("Error: El Proveedor seleccionado no se pudo eliminar.");
            window.location.href="../InicioAdmin/lista-proveedores.php";
          </script>';
    }
  }
?>
