<?php
  error_reporting (5);
  $conexion = mysqli_connect("localhost", "root", "", "Tienda");

  $idCliente = $_POST['idCliente'];
  $nombre = $_POST['nombre'];

  if(empty($nombre))
  {
    header("Location: ../InicioAdmin/lista-tipo-usuarios.php");
    exit();
  }
  else
  {
      $sql_update = mysqli_query($conexion, "UPDATE rol
                                             SET rol='$nombre'
                                             WHERE id_rol= $idCliente");

      if($sql_update)
      {
        echo '<script type="text/javascript">
              alert("Tipo Usuario Actualizado Con Exito.");
              window.location.href="../InicioAdmin/lista-tipo-usuarios.php";
            </script>';
      }
      else
      {
        echo '<script type="text/javascript">
              alert("Error: No se pudo Actualizar el Tipo Usuario.");
              window.location.href="../InicioAdmin/lista-tipo-usuarios.php";
            </script>';
      }
    }


?>
