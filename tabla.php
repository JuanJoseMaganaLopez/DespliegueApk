<?php include('./db.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

</head>


<body>
	<div class="container"> <!-- Apertura del container-->
		<h1>Usuarios Registrados</h1>

		<?php
		$sql = "SELECT * FROM datos_personales order by id DESC";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
		?>
			<table class="table table-bordered">
				<tr>
					<th>Id </th>
					<th>Nombre </th>
					<th>Fecha Nacimiento </th>
					<th>Estado Civil </th>
					<th>Carrera </th>

					<th>Acciones</th>

				</tr>
				<?php
				while ($row = mysqli_fetch_assoc($result)) {
					$newFecha = date("d/m/Y", strtotime($row["fecha_nac"]));
				?>
					<tr>
						<td><?= $row["id"] ?></td>
						<td><?= $row["nombre"] . " " . $row["appat"] . " " . $row["apmat"] ?><br>
							<small><em>Fecha registro: <?= $row["fecha_registro"] ?></em></small>
						</td>
						<td><?= $newFecha ?></td>
						<td><?php
							if ($row["estado_civil"] == 0) {
								echo "Soltero";
							} else {
								echo "Casado";
							}
							?></td>
						<td> <?php
								$carrera = $row["carreraL"];
								$strcarr = mysqli_query($conn, "SELECT * FROM carreras WHERE id = $carrera");
								$carrera = mysqli_fetch_assoc($strcarr)['carrera'];
								echo "$carrera";
								?>
						</td>

						<!-- ?id= Se usa para pasar por get una variable de nombre id y despues del signo = se coloca el valor de la variable, en este caso se tomará de la variable $row['id'] -->
						<td><a class="btn btn-warning" href="form_update.php?id=<?= $row['id'] ?>">Editar</a>
							<a href="delete_exe.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return Del();">Borrar</a>
							<a class="btn btn-danger" href="detalles.php?id= <?= $row['id'] ?>">Detalles</a>

						</td>
					</tr>
				<?php
				}

				?>
			</table>
		<?php
		} else {
			echo "No existen registros";
		}

		mysqli_close($conn);

		?>
		<a class="btn btn-success" href="form.php">Agregar Usuario</a>

	</div> <!-- Cierre del container-->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->


	<script src="./confirmacion.js"> </script>
	<script src="js/jquery-3.4.1.slim.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>