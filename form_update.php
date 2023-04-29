<?php
include('./db.php');

//Recibimos por GET el id del registro a borrar
$id = $_GET['id'];

// sentencia SQL para OBTENER un registro
$sql = "SELECT * FROM datos_personales WHERE id=$id";
if ($cons = mysqli_query($conn, $sql)) {
	$reg = mysqli_fetch_assoc($cons);
?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<title><?= $reg['nombre'] ?></title>
	</head>

	<body>
		<div class="container">

			<form action="update_exe.php" method="post">
				<div class="row">
					<label for="nombre">Nombre</label><input type="text" name="nombre" class="form-control col-md-12" pattern="[ a-zA-Z]+" required value="<?php echo $reg['nombre']; ?>">
				</div>
				<div class="row">
					<input type="text" name="appat" class="form-control col-md-6" placeholder="Apellido Paterno" pattern="[ a-zA-Z]+" required value="<?= $reg['appat'] ?>">
					<input type="text" name="apmat" class="form-control col-md-6" placeholder="Apellido Materno" pattern="[ a-zA-Z]+" required value="<?= $reg['apmat'] ?>">
					<input maxlength="10" minlength="10" type="text" name="nTelefono" class="form-control col-md-6" placeholder="Numero Telefonicio" pattern="[0-9]+" required value="<?= $reg['nTelefono'] ?>">

				</div>
				<div class="row">
					<input type="email" name="mail" class="form-control col-md-12" placeholder="Correo Electrónico" value="<?= $reg['mail'] ?>" required>
				</div>
				<div class="form-group row">
					<label for="fecha_nac"></label><input type="date" name="fecha_nac" class="form-control col-md-6" value="<?= $reg['fecha_nac'] ?>" required>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="edo_civil" id="solt" value="0" required <?php if ($reg['estado_civil'] == 0) {
																														echo "checked";
																													} ?>>
						<label class="form-check-label" for="solt">
							Soltero
						</label>
					</div>
					<div class="form-check">

						<input class="form-check-input" type="radio" name="edo_civil" id="casado" value="1" required <?php if ($reg['estado_civil'] == 1) {
																															echo "checked";
																														} ?>>
						<label class="form-check-label" for="casado">
							Casado
						</label>
					</div>

					<script>
						function validar() {
							var Validacion = document.getElementById('carrera');
							if (Validacion.value == "") {
								alert("Selecciona una opcion para continuar");
								Validacion.focus();
							} else alert("Opcion guardada");
							Validacion.focus();
						}
					</script>


					<div class="col-md-6 form-group has-feedback">
						<label>Carrera</label>
						<div>
							<select name="carrera" id="carrera" class="form-control input-lg" required>
								<option selected disabled value=""> Seleccione carrera</option>
								<?php
								$strcarr = mysqli_query($conn, 'SELECT * FROM carreras');
								while ($filas = mysqli_fetch_assoc($strcarr)) { ?>
									<option value="<?= $filas['id'] ?>" <?php if ($filas['id'] == $reg['carreraL'])  echo 'selected'; ?>> <?= $filas['carrera'] ?> </option>


								<?php } ?>
							</select>
							<div class="invalid-feedback">
								Por favor, elija un nombre de usuario.
							</div>
						</div>
					</div>

					<input type="hidden" name="id" value="<?= $reg['id'] ?>">
				</div>
				<br>

				<input type="submit" onclick="validar();" class="btn btn-info" value="Actualizar">
			</form>
			<br>
			<p><a class="btn btn-success" href="tabla.php">Ver tabla de Usuarios</a></p>

		</div>
	</body>

	</html>
<?php }
mysqli_close($conn);
?>