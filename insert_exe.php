 <?php
    date_default_timezone_set('America/Mexico_City');
    include('./db.php');

    $nombre = $_POST['nombre'];
    $appat = $_POST['appat'];
    $apmat = $_POST['apmat'];
    $nTelefono = $_POST['nTelefono'];
    $fecha_nac = $_POST['fecha_nac'];
    $edo_civil = $_POST['edo_civil'];
    $mail = $_POST['mail'];
    $carrera = $_POST['carrera'];


    $fecha_registro = date("Y-m-d H:i:s");

    $sql = "INSERT INTO datos_personales (nombre,appat,apmat,nTelefono,fecha_nac,estado_civil,fecha_registro, mail, carreraL) 
	VALUES ('$nombre','$appat','$apmat','$nTelefono','$fecha_nac','$edo_civil','$fecha_registro','$mail', '$carrera')";

    /* if (mysqli_query($conn, $sql)) {
        echo "Datos insertados correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
*/
    if (mysqli_query($conn, $sql)) {
        echo "<script>+alert('Datos guardados correctamente'); window.location.href='./tabla.php'</script>
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