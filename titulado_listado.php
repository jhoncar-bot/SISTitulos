<?php
	include("conexion.php");
	include("cabecera.php");
	$id = isset($_GET['id'])?$_GET['id']:'';
	$dni  = "";
	$cod_mod  = "";
	$num_titulo = "";
	$fecha_titulo = "";
	$link = "";
	$titulo_id  = "";
	if($id != ''){
		$sql = "SELECT * FROM tituloxpersonal WHERE num_titulo='{$id}'";
		if (!$resultado = $conn->query($sql)) die("Error en la consulta");
		$reg = $resultado->fetch_assoc();
		$cod_mod  = $reg['cod_mod'];
		$num_titulo = $reg['num_titulo'];
		$fecha_titulo = $reg['fecha_titulo'];
		$dni = $reg['persona'];
		$link = $reg['link'];
		$titulo_id  = $reg['titulo_id'];
	}
	$query = "SELECT *  FROM persona ORDER BY dni";
	$resultado1=$conn->query($query);
	$query1 = "SELECT  titulo_id,nom_titulo FROM titulo ORDER BY titulo_id ";
	$resultado2=$conn->query($query1);
	$query3 = "SELECT  cod_mod,nombre_inst FROM institucion ORDER BY cod_mod ";
	$resultado3=$conn->query($query3);
?>
<div class="jumbotron text-center ">
	<h2 class="text-muted">AGREGUE UN TITULADO!</h2>
</div>
<div class="row">
	<div class="col-sm-4">
		<form class="form-horizontal" action="titulado_evalua.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="form-group">
				<label  class="col-sm-12 ">DNI: </label>
				<div class="col-sm-12">
					<select type="text" style="width: 100%"class=" form-control js-example-basic-single" name="dni" required>
						<option value="">Elija una Opción</option>
						<?php WHILE($reg =$resultado1->fetch_assoc()) { ?>
							<option value="<?php echo $reg['dni']; ?>" <?php if($dni==$reg['dni']) echo 'selected'; ?>><?php echo $reg['dni']."-> (".$reg['nombre']." ".$reg['ape_pat']." ".$reg['ape_mat'].")"; ?>
							</option>
						<?php	}?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label  class="col-sm-12 ">N° de titulo:</label>
			<div class="col-sm-12">
				<input type="text" class="form-control"  name="num_titulo" value="<?php echo $num_titulo; ?>" placeholder="N° de titulo" required>
			</div>
		</div>
		<div class="form-group">
			<label  class="col-sm-12 ">Codigo de la Institucion: </label>
			<div class="col-sm-12">
				<select type="text" class="form-control js-example-basic-single" style="width: 100%" name="cod_mod" required >
					<option value=" " >Elija una Opción</option>
					<?php WHILE($reg =$resultado3->fetch_assoc()) { ?>
						<option value="<?php echo $reg['cod_mod']; ?>" <?php if($cod_mod==$reg['cod_mod']) echo 'selected'; ?>><?php echo $reg['cod_mod']." (".$reg['nombre_inst'].")"; ?>
					</option>
				<?php	}?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label  class="col-sm-12 ">Fecha de Titulo: </label>
		<div class="col-sm-12">
			<input type="date" class="form-control"  name="fecha_titulo" value="<?php echo $fecha_titulo; ?>" placeholder="Fecha" required>
		</div>
	</div>
	<div class="form-group">
		<label  class="col-sm-12 ">Link: </label>
		<div class="col-sm-12">
			<input type="text" class="form-control"  name="fecha_regis" value="<?php echo $link; ?>" placeholder="Link">
		</div>
	</div>
	<div class="form-group">
		<label  class="col-sm-12 ">ID de Titulo: </label>
		<div class="col-sm-12">
			<select type="text" class="form-control js-example-basic-single" style="width: 100%" name="titulo_id" required>
				<option value=" " >Elija una Opción</option>
				<?php WHILE($reg =$resultado2->fetch_assoc()) { ?>
					<option value="<?php echo $reg['titulo_id']; ?>"<?php if($titulo_id==$reg['titulo_id']) echo 'selected'; ?>><?php echo $reg['titulo_id']." -> (".$reg['nom_titulo'].")"; ?>
				</option>
			<?php	}?>
		</select>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" class="btn btn-primary">Guardar</button>
		<a href="titulado_listado.php" class="btn btn-danger">Cancelar</a>
	</div>
</div>
</form>
</div>
<div class="col-sm-8">
	<?php
	$sql = "SELECT * FROM tituloxpersonal";
	if (!$resultado = $conn->query($sql)) die("Error en la consulta");
	echo "<table class='display ' id='tabla'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>DNI</th>";
	echo "<th>N°deTitulo</th>";
	echo "<th>COD.<br>Institucion</th>";
	echo "<th>Fecha<br>Titulo</th>";
	echo "<th>ID Del<br>Titulo</th>";
	echo "<th>Link</th>";
	echo "<th>Opciones</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	while ($reg = $resultado->fetch_assoc()) {
		echo "<tr>";
		echo "<td class='persona'>".$reg['persona']."</td>";
		echo "<td>".$reg['num_titulo']."</td>";
		echo "<td>".$reg['cod_mod']."</td>";
		echo "<td>".$reg['fecha_titulo']."</td>";
		echo "<td>".$reg['titulo_id']."</td>";
		echo($reg['link']==''?"<td></td>":"<td><a href='".$reg['link']."' target='_blank'><span class='glyphicon glyphicon-new-window'></span></a></td>");
		echo "<td class='text-right'>
		<a href='titulado_evalua.php?op=eliminar&id=".$reg['num_titulo']."' class='btn btn-danger confirmar'><span class='glyphicon glyphicon-remove '></span></a>
		<a href='titulado_listado.php?id=".$reg['num_titulo']."' class='btn btn-success '><span class='glyphicon glyphicon-pencil'></span></a>
		</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";

	?>
</div>
</div>
<?php	include("pie.php");?>
