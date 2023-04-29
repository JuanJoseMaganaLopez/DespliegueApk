<?php include('./db.php');

$id = $_GET['id'];

$sql = "SELECT * FROM datos_personales WHERE id =$id";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);
?>
<html>

<head>

</head>

<body>
    <h1>Hoja de datos personales</h1>
    <h2>
        Nombre: <?= $row['nombre'] . " " . $row["appat"] . " " . $row["apmat"] ?>
    </h2>
    <h2>Telefono:<?= $row['nTelefono'] ?> </h2>

    <h2>Fecha de Nacimiento: <?= $row['fecha_nac'] ?> </h2>
    <h2>Estado Civil: <?php
                        if ($row["estado_civil"] == 0) {
                            echo "Soltero";
                        } else {
                            echo "Casado";
                        }
                        ?></h2>
    <h2>Correo electronico: <?= $row['mail'] ?></h2>
    <h2>Carrera:<?= $row['carreraL'] ?> </h2>


    <h2>Carrera:
        <?php
        $carrera = $row["carreraL"];
        $strcarr = mysqli_query($conn, "SELECT * FROM carreras WHERE id = $carrera");
        $carrera = mysqli_fetch_assoc($strcarr)['carrera'];
        echo "$carrera";
        ?>
    </h2>


    <p><a class="btn btn-success" href="tabla.php">Ver tabla de Usuarios</a></p>
    <a class="btn btn-success" href="form.php">Agregar Usuario</a>


</body>

</html>