<?php
  error_reporting (5);
  $conexion = mysqli_connect("localhost", "root", "", "Tienda");

  $idCliente = $_POST['idCliente'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $telefono = $_POST['telefono'];
  $direccion = $_POST['direccion'];

  if(empty($nombre) || empty($apellido) ||empty($telefono) || empty($direccion))
  {
    header("Location: ../InicioAdmin/lista-proveedores.php");
    exit();
  }
  else
  {
      $sql_update = mysqli_query($conexion, "UPDATE proveedor
                                             SET nombre='$nombre', apellido='$apellido', telefono='$telefono', direccion= '$direccion'
                                             WHERE id_proveedor= $idCliente");

      if($sql_update)
      {
        echo '<script type="text/javascript">
              alert("Cliente Actualizado Con Exito.");
              window.location.href="../InicioAdmin/lista-proveedores.php";
            </script>';
      }
      else
      {
        echo '<script type="text/javascript">
              alert("Error: No se pudo Actualizar el Cliente.");
              window.location.href="../InicioAdmin/lista-proveedores.php";
            </script>';
      }
    }


?>
