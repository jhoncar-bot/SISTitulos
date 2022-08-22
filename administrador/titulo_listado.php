<?php
include("conexion.php");
include("cabecera.php");
$id = isset($_GET['id'])?$_GET['id']:'0';
$nombre_titulo = '';
$nivel='';
$instituto='';
if(!empty($id)){
	$sql = "SELECT * FROM titulo WHERE titulo_id='{$id}'";
	if (!$resultado = $conn->query($sql)) die("Error en la consulta");
	$reg = $resultado->fetch_assoc();
	$nombre_titulo  = $reg['nom_titulo'];
	$nivel=$reg['nivel'];
	$instituto=$reg['instituto'];
}
?>
<div class="jumbotron text-center ">
	<h2 class="text-muted">AGREGUE UN TÍTULO!</h2>
</div>
<div class="row">
	<div class="col-sm-4">
		<form class="form-horizontal" action="titulo_evalua.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="form-group">
				<label class="col-sm-12" >Nombre del titulo: </label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="nombres" name="titulo" value="<?php echo $nombre_titulo; ?>" placeholder="Nombre titulo" required>
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-12">Nivel:</label>
				<div class="col-sm-12">
					<select class="form-control" id="nivel" name="nivel" required>
						<option value="" >SELECIONE UN NIVEL</option>
						<option value="PRIMARIA-SECUNDARIA" <?php if($nivel=='PRIMARIA-SECUNDARIA') echo 'selected'; ?>>PRIMARIA-SECUNDARIA</option>
						<option value="SECUNDARIA" <?php if($nivel=='SECUNDARIA') echo 'selected'; ?>>SECUNDARIA</option>
						<option value="INICIAL" <?php if($nivel=='INICIAL') echo 'selected'; ?>>INICIAL</option>
						<option value="PRIMARIA" <?php if($nivel=='PRIMARIA') echo 'selected'; ?>>PRIMARIA</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="area" class="col-sm-12 ">Instituto:</label>
				<div class="col-sm-12">
					<select class="form-control" id="instituto" name="instituto" required>
						<option value="" >SELECIONE UN INSTITUTO</option>
						<option value="TECNOLOGICO" <?php if($instituto=='TECNOLOGICO') echo 'selected'; ?>>TECNOLOGICO</option>
						<option value="PEDAGOGICO" <?php if($instituto=='PEDAGOGICO') echo 'selected'; ?>>PEDAGOGICO</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Guardar</button>
					<a href="titulo_listado.php" class="btn btn-danger">Cancelar</a>
				</div>
			</div>
		</form>
	</div>
	<div class="col-sm-8">
		<?php
		$sql = "SELECT * FROM titulo";
		if (!$resultado = $conn->query($sql)) die("Error en la consulta");
		echo "<table class='display' id='tabla'>";
		echo "<thead>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Nombre</th>";
		echo "<th>Nivel</th>";
		echo "<th>Instituto</th>";
		echo "<th>Opciones</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		while ($reg = $resultado->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$reg['titulo_id']."</td>";
			echo "<td>".$reg['nom_titulo']."</td>";
			echo "<td>".$reg['nivel']."</td>";
			echo "<td>".$reg['instituto']."</td>";
			echo "<td class='text-right'>
			<a href='titulo_evalua.php?op=eliminar&id=".$reg['titulo_id']."' class='btn btn-danger confirmar'><span class='glyphicon glyphicon-remove'></span></a>
			<a href='titulo_listado.php?id=".$reg['titulo_id']."' class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></a>
			</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		?>
	</div>
</div>
<?php
include("pie.php");
?>
