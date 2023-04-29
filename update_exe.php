<?php
include('./db.php');

//Recibir mediante post los campos que se van a actualizar
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$appat = $_POST['appat'];
$apmat = $_POST['apmat'];
$nTelefono = $_POST['nTelefono'];
$fecha_nac = $_POST['fecha_nac'];
$edo_civil = $_POST['edo_civil'];
$mail = $_POST['mail'];
$carrera = $_POST['carrera'];

$fecha_registro = date("Y-m-d H:i:s");


$sql = "UPDATE datos_personales SET nombre='$nombre',appat='$appat',apmat='$apmat',nTelefono='$nTelefono',fecha_nac='$fecha_nac',estado_civil='$edo_civil',mail='$mail', carreraL='$carrera' WHERE id=$id";

/*if (mysqli_query($conn, $sql)) {
    echo "Registro actualizado correctamente";
  } else {
    echo "Error actualizando registro: " . mysqli_error($conn);
  }*/

if (mysqli_query($conn, $sql)) {
  echo "<script>+alert('Datos actualizados correctamente'); window.location.href='./tabla.php'</script>
<noscript><a href='./tabla.php'>Datos guardados correctamente. Click aqui si no es redireccionado.</a></noscript>";
} else {
  echo "<script>+alert('Ocurrio un error:" . $sql . "<br>" . mysqli_error($conn) . ". Intentalo mas tarde'); window.location.href='./tabla.php'</script>
<noscript><a href='./tabla.php'>Ocurrio un error. Intentalo mas tarde. Click aqui si no es redireccionado.</a></noscript>";
}

mysqli_close($conn);
?>

<html>

<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
  <td>
    <p><a class="btn btn-success" href="tabla.php">Ver tabla de Usuarios</a></p>
    <a class="btn btn-success" href="form.php">Agregar Usuario</a>
  </td>


</body>

</html>