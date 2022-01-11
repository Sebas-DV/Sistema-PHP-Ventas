<?php
    error_reporting (5);
    session_start();

    $conexion = mysqli_connect("localhost", "root", "", "Tienda");

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    if(empty($usuario) || empty($contrasena))
    {
      header("Location: ../index.php");
      exit();
    }

    $sql = "SELECT * FROM usuarios WHERE username='$usuario' AND password='$contrasena'";
    $result = mysqli_query($conexion, $sql);


    $rows = mysqli_num_rows($result);

    if($rows > 0)
    {
      $_SESSION['active'] = true;

      $sql_data = mysqli_query($conexion, "SELECT u.id_usuario, u.nombre, u.apellido, u.correo, u.username,
                                           r.id_rol FROM usuarios u INNER JOIN rol r ON u.id_rol = r.id_rol
                                           WHERE username='$usuario'");

      $data = mysqli_fetch_array($sql_data);

      $idrol = $data['id_rol'];

      if($idrol == 1)
      {
        echo '<script type="text/javascript">
              alert("Bienvenido Admin.");
              window.location.href="../InicioAdmin/index.php";
            </script>';
      }
      else if($idrol == 2)
      {
        echo '<script type="text/javascript">
              alert("Lo sentimos no tiene acceso al Sistema.");
              window.location.href="../InicioAdmin/index.php";
            </script>';
      }
      else if($idrol == 3)
      {
        echo '<script type="text/javascript">
              alert("Lo sentimos no tiene acceso al Sistema.");
              window.location.href="../InicioAdmin/index.php";
            </script>';
      }

    }
    else {
      echo '<script type="text/javascript">
            alert("Error, Usuario o Contraseña incorrectos");
            window.location.href="../index.php";
          </script>';
    }
    mysqli_close($conexion);
?>
