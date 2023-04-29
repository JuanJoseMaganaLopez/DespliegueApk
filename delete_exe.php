<?php
include('./db.php');

//Recibimos por GET el id del registro a borrar
$id = $_GET['id'];

// sentencia SQL para eliminar un registro
$sql = "DELETE FROM datos_personales WHERE id=$id";

/*if (mysqli_query($conn, $sql)) {
  echo "Registro eliminado satisfactoriamente";
} else {
  echo "Error borrando el registro: " . mysqli_error($conn);
}*/

if (mysqli_query($conn, $sql)) {
  echo "<script>+alert('Datos eliminados correctamente'); window.location.href='./tabla.php'</script>
<noscript><a href='../tabla.php'>Datos guardados correctamente. Click aqui si no es redireccionado.</a></noscript>";
} else {
  echo "<script>+alert('Ocurrio un error:" . $sql . "<br>" . mysqli_error($conn) . ". Intentalo mas tarde'); window.location.href='./tabla.php'</script>
<noscript><a href='../tabla.php'>Ocurrio un error. Intentalo mas tarde. Click aqui si no es redireccionado.</a></noscript>";
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