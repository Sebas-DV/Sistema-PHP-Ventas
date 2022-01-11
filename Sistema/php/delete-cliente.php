<?php
  $conexion = mysqli_connect("localhost", "root", "", "Tienda");

  if(!empty($_POST))
  {
    $id_usuario = $_POST['id_usuario'];
    $query_delete = mysqli_query($conexion, "DELETE FROM cliente WHERE id_cliente = $id_usuario");

    if($query_delete)
    {
      echo '<script type="text/javascript">
            alert("Cliente Eliminado Correctamente.");
            window.location.href="../InicioAdmin/lista-clientes.php";
          </script>';
    }
    else
    {
      echo '<script type="text/javascript">
            alert("Error: El Cliente seleccionado no se pudo eliminar.");
            window.location.href="../InicioAdmin/lista-clientes.php";
          </script>';
    }
  }
?>
