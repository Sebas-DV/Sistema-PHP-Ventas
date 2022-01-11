<?php
  error_reporting (5);
  $conexion = mysqli_connect("localhost", "root", "", "Tienda");

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $telefono = $_POST['telefono'];
  $direccion = $_POST['direccion'];

  if(empty($nombre) || empty($apellido) ||empty($telefono) || empty($direccion))
  {
    header("Location: ../InicioAdmin/crear-proveedor.php");
    exit();
  }
  else
  {
    $query_insert = mysqli_query($conexion, "INSERT INTO proveedor (nombre, apellido, telefono, direccion)
                                               VALUES ('$nombre', '$apellido', '$telefono', '$direccion')");

    if($query_insert)
    {
      echo '<script type="text/javascript">
            alert("Proveedor Creado Con Exito.");
            window.location.href="../InicioAdmin/crear-proveedor.php";
          </script>';
    }
    else
    {
      echo '<script type="text/javascript">
            alert("Error: No se pudo Crear el Proveedor.");
            window.location.href="../InicioAdmin/crear-proveedor.php";
          </script>';
    }
  }
?>
