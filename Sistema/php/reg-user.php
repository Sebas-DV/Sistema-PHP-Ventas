<?php
  error_reporting (5);
  $conexion = mysqli_connect("localhost", "root", "", "Tienda");

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $correo = $_POST['correo'];
  $usuario = $_POST['usuario'];
  $contrasena = $_POST['contrasena'];
  $rol = $_POST['rol'];

  if(empty($nombre) || empty($apellido) ||empty($correo) || empty($usuario) || empty($contrasena) || empty($rol))
  {
    header("Location: ../InicioAdmin/crear-usuarios.php");
    exit();
  }
  else
  {
    mysqli_set_charset( $con, 'utf8');
    $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' OR correo='$correo'");
    $result = mysqli_fetch_array($query);

    if ($result > 0)
    {
      echo '<script type="text/javascript">
            alert("Error: Usuario o Correo ya existentes.");
            window.location.href="../InicioAdmin/crear-usuarios.php";
          </script>';
    }
    else
    {
      $query_insert = mysqli_query($conexion, "INSERT INTO usuarios(nombre, apellido, username, password, id_rol, correo)
                                               VALUES ('$nombre', '$apellido', '$usuario', '$contrasena', '$rol', '$correo')");

      if($query_insert)
      {
        echo '<script type="text/javascript">
              alert("Usuario Creado Con Exito.");
              window.location.href="../InicioAdmin/crear-usuarios.php";
            </script>';
      }
      else
      {
        echo '<script type="text/javascript">
              alert("Error: No se pudo Crear el Usuario.");
              window.location.href="../InicioAdmin/crear-usuarios.php";
            </script>';
      }
    }
  }
?>
