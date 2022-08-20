<?php
include("conexion.php");
include("cabecera.php");
$id = isset($_GET['id'])?$_GET['id']:'';
$nombre_inst = '';
$pais = '';
$region = '';
if($id != ''){
	$sql = "SELECT * FROM institucion WHERE cod_mod='{$id}'";
	if (!$resultado = $conn->query($sql)) die("Error en la consulta");
	$reg = $resultado->fetch_assoc();
	$nombre_inst  = $reg['nombre_inst'];
	$pais  = $reg['pais'];
	$region  = $reg['region'];
}
?>
<div class="jumbotron text-center ">
	<h2 class="text-muted">AGREGUE UN INSTITUTO!</h2>
</div>
<br>
<div class="row">
	<div class="col-sm-4"  >
		<form class="form-horizontal" action="institucion_evalua.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="form-group">
				<label for="nombres" class="col-sm-12 ">Codigo: </label>
				<div class="col-sm-12">
					<input type="number" class="form-control" id="nombres" name="codigo" value="<?php echo $id; ?>" placeholder="Codigo Modular">
				</div>
			</div>
			<div class="form-group">
				<label for="area" class="col-sm-12 ">Nombre:</label>
				<div class="col-sm-12">
					<input type="text"  class="form-control " id="area" name="institucion" value='<?php echo $nombre_inst; ?>' placeholder="Nombre de la Institucion" >
				</div>
			</div>
			<div class="form-group">
				<label for="area" class="col-sm-12 ">Pais:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control " id="area" name="pais" value="<?php echo $pais; ?>" placeholder="Pais">
				</div>
			</div>
			<div class="form-group">
				<label for="area" class="col-sm-12 ">Region:</label>
				<div class="col-sm-12">
					<input type="text" class="form-control " id="area" name="region" value="<?php echo $region; ?>" placeholder="Region">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Guardar</button>
					<a href="institucion_listado.php" class="btn btn-danger">Cancelar</a>
				</div>
			</div>
		</form>
	</div>
	<div class="col-sm-8">
		<?php
		$sql = "SELECT * FROM institucion";
		if (!$resultado = $conn->query($sql)) die("Error en la consulta");
		echo "<table class='display ' id='tabla'>";
		echo "<thead>";
		echo "<tr class='info'>";
		echo "<th>ID</th>";
		echo "<th>Nombre</th>";
		echo "<th>Pais</th>";
		echo "<th>Region</th>";
		echo "<th>Opciones</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		while ($reg = $resultado->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$reg['cod_mod']."</td>";
			echo "<td>".$reg['nombre_inst']."</td>";
			echo "<td>".$reg['pais']."</td>";
			echo "<td>".$reg['region']."</td>";
			echo "<td class='text-right'>
			<a href='institucion_evalua.php?op=eliminar&id=".$reg['cod_mod']."' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></a>
			<a href='institucion_listado.php?id=".$reg['cod_mod']."' class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></a>
			</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		?>
	</div>
</div>
<?php include("pie.php");?>
