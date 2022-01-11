<?php
  error_reporting (5);
  $conexion = mysqli_connect("localhost", "root", "", "Tienda");

  $proveedor = $_POST['proveedor'];
  $cliente = $_POST['cliente'];
  $producto = $_POST['producto'];

  if(empty($cliente) || empty($producto) ||empty($proveedor))
  {
    header("Location: ../InicioAdmin/reporteria.php");
    exit();
  }
  else
  {
    $query_factura = mysqli_query($conexion, "INSERT INTO facturadora (id_producto, id_proveedor, id_cliente)
                                              VALUES ('$producto', '$proveedor', '$cliente')");



    if($query_factura)
    {
      $data = mysqli_fetch_array();

      $idFactura = $data['id_factura'];
      echo '<script type="text/javascript">
            alert("Factura Registrada.");
            window.location.href="../InicioAdmin/lista-facturas.php";
          </script>';
    }
    else
    {
      echo '<script type="text/javascript">
            alert("Error al registrar la factura.");
            window.location.href="../InicioAdmin/crear-facturas.php";
          </script>';
    }
  }
?>
