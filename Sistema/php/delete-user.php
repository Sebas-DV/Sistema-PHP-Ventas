<?php
  $conexion = mysqli_connect("localhost", "root", "", "Tienda");

  if(!empty($_POST))
  {
    $id_usuario = $_POST['id_usuario'];
    $query_delete = mysqli_query($conexion, "DELETE FROM usuarios WHERE id_usuario = $id_usuario");

    if($query_delete)
    {
      echo '<script type="text/javascript">
            alert("Usuario Eliminado Correctamente.");
            window.location.href="../InicioAdmin/lista-usuarios.php";
          </script>';
    }
    else
    {
      echo '<script type="text/javascript">
            alert("Error: El usuario seleccionado no se pudo eliminar.");
            window.location.href="../InicioAdmin/lista-usuarios.php";
          </script>';
    }
  }
?>
