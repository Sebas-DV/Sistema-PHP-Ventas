<?php
  error_reporting (5);
  $conexion = mysqli_connect("localhost", "root", "", "Tienda");

  $idUsuario = $_POST['idUsuario'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $correo = $_POST['correo'];
  $usuario = $_POST['usuario'];
  $contrasena = $_POST['contrasena'];
  $rol = $_POST['rol'];

  if(empty($nombre) || empty($apellido) ||empty($correo) || empty($usuario) || empty($rol))
  {
    header("Location: ../InicioAdmin/lista-usuarios.php");
    exit();
  }
  else
  {
    $query = mysqli_query($conexion, "SELECT * FROM usuarios
                                      WHERE (username='$usuario' AND id_usuario != $idUsuario)
                                      OR (correo = '$correo' AND id_usuario != $idUsuario)");

    $result = mysqli_fetch_array($query);

    if ($result > 0)
    {
      echo '<script type="text/javascript">
            alert("Error: Usuario o Correo ya existentes.");
            window.location.href="../InicioAdmin/lista-usuarios.php";
          </script>';
    }
    else
    {
      if(empty($_POST['contrasena']))
      {
        $sql_update = mysqli_query($conexion, "UPDATE usuarios
                                               SET nombre='$nombre', apellido='$apellido', correo='$correo', username= '$usuario', id_rol='$rol'
                                               WHERE id_usuario = $idUsuario");
      }
      else
      {
        $sql_update = mysqli_query($conexion, "UPDATE usuarios
                                               SET nombre='$nombre', apellido='$apellido', correo='$correo', username= '$usuario', password = '$contrasena',id_rol='$rol'
                                               WHERE id_usuario = $idUsuario");

      }

      if($sql_update)
      {
        echo '<script type="text/javascript">
              alert("Usuario Actualizado Con Exito.");
              window.location.href="../InicioAdmin/lista-usuarios.php";
            </script>';
      }
      else
      {
        echo '<script type="text/javascript">
              alert("Error: No se pudo Actualizar el Usuario.");
              window.location.href="../InicioAdmin/lista-usuarios.php";
            </script>';
      }
    }
  }

?>
