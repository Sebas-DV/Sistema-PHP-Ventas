<?php
  $conexion = mysqli_connect("localhost", "root", "", "Tienda");

  if(!empty($_POST))
  {
    $id_usuario = $_POST['id_usuario'];
    $query_delete = mysqli_query($conexion, "DELETE FROM rol WHERE id_rol = $id_usuario");

    if($query_delete)
    {
      echo '<script type="text/javascript">
            alert("Tipo Usuario Eliminado Correctamente.");
            window.location.href="../InicioAdmin/lista-tipo-usuarios.php";
          </script>';
    }
    else
    {
      echo '<script type="text/javascript">
            alert("Error: El Tipo Usuario seleccionado no se pudo eliminar.");
            window.location.href="../InicioAdmin/lista-tipo-usuarios.php";
          </script>';
    }
  }
?>
