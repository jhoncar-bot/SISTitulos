<?php
	include("conexion.php");
	include("cabecera.php");

	$id = isset($_GET['id'])?$_GET['id']:'';

	$apellidoPat = "";
	$apellidoMat = "";
	$nombre = "";
	if($id != ''){
		$sql = "SELECT * FROM persona WHERE dni='{$id}'";
		echo $sql;
		if (!$resultado = $conn->query($sql)) die("Error en la consulta");
		$reg = $resultado->fetch_assoc();
		$apellidoPat  = $reg['ape_pat'];
		$apellidoMat  = $reg['ape_mat'];
		$nombre  = $reg['nombre'];
	}
?>
<div class="jumbotron text-center ">
	<h2 class="text-muted">AGREGUE UN USUARIO!</h2>
</div>
<div class="row">
	<div class="col-sm-4">
		<form class="form-horizontal" action="persona_evalua.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="form-group">
				<label class="col-sm-12 ">DNI: </label>
				<div class="col-sm-12">
					<input type="number" class="form-control"  name="dni" value="<?php echo $id; ?>" placeholder="DNI">
				</div>
			</div>
			<div class="form-group">
				<label for="area" class="col-sm-12 ">Apellido Paterno:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control"  name="apePat" value="<?php echo $apellidoPat; ?>" placeholder="Apellido Paterno">
				</div>
			</div>
			<div class="form-group">
				<label for="area" class="col-sm-12 ">Apellido materno:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control"  name="apeMat" value="<?php echo $apellidoMat; ?>" placeholder="Apellido materno">
				</div>
			</div><div class="form-group">
				<label for="area" class="col-sm-12 ">Nombre:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" placeholder="Nombre">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Guardar</button>
					<a href="persona_listado.php" class="btn btn-danger">Cancelar</a>
				</div>
			</div>
		</form>
	</div>
	<div class="col-sm-8">
		<?php

		$sql = "SELECT * FROM persona";
		if (!$resultado = $conn->query($sql)) die("Error en la consulta");
		echo "<table class='display ' id='tabla'>";
		echo "<thead>";
		echo "<tr class='info'>";
		echo "<th>DNI</th>";
		echo "<th>Apellido Paterno</th>";
		echo "<th>Apellido Materno</th>";
		echo "<th>Nombre</th>";

		echo "<th>Opciones</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		while ($reg = $resultado->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$reg['dni']."</td>";
			echo "<td>".$reg['ape_pat']."</td>";
			echo "<td>".$reg['ape_mat']."</td>";
			echo "<td>".$reg['nombre']."</td>";

			echo "<td class='text-right'>
			<a href='persona_evalua.php?op=eliminar&id=".$reg['dni']."' class='btn btn-danger confirmar'><span class='glyphicon glyphicon-remove'></span></a>
			<a href='persona_listado.php?id=".$reg['dni']."' class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></a>
			</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		?>
	</div>
</div>
<?php include("pie.php");?>
