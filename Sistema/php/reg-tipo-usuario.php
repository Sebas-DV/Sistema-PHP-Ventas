<?php
  error_reporting (5);
  $conexion = mysqli_connect("localhost", "root", "", "Tienda");

  $nombre = $_POST['nombre'];

  if(empty($nombre))
  {
    header("Location: ../InicioAdmin/crear-tipo-usuarios.php");
    exit();
  }
  else
  {
    $query = mysqli_query($conexion, "SELECT * FROM rol WHERE rol='$nombre'");
    $result = mysqli_fetch_array($query);

    if ($result > 0)
    {
      echo '<script type="text/javascript">
            alert("Error: Tipo de Usuario ya existente.");
            window.location.href="../InicioAdmin/crear-tipo-usuarios.php";
          </script>';
    }
    else
    {
      $query_insert = mysqli_query($conexion, "INSERT INTO rol (rol)
                                               VALUES ('$nombre')");

      if($query_insert)
      {
        echo '<script type="text/javascript">
              alert("Tipo de Usuario Creado Con Exito.");
              window.location.href="../InicioAdmin/crear-tipo-usuarios.php";
            </script>';
      }
      else
      {
        echo '<script type="text/javascript">
              alert("Error: Tipo de Usuario ya existente.");
              window.location.href="../InicioAdmin/crear-tipo-usuarios.php";
            </script>';
      }
    }
  }
?>
