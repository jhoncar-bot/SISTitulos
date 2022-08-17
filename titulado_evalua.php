<?php
	include("conexion.php");
	$op = isset($_GET['op'])?$_GET['op']:'';
	$id = $_GET['id'];
	echo $id;
	echo "<br>";

	if($op=="eliminar"){
		$sql = "DELETE FROM tituloxpersonal WHERE num_titulo='{$id}'";
		echo $sql;
		if (!$resultado = $conn->query($sql)) die("Error en la consulta");
	}else if($id!=''){
		$dni = $_GET['dni'];
		$num_titulo = $_GET['num_titulo'];
		$cod_mod  = $_GET['cod_mod'];
		$fecha_titulo = $_GET['fecha_titulo'];
		
		$link = $_GET['link'];
		$titulo_id  = $_GET['titulo_id'];
		
		$sql = "UPDATE tituloxpersonal SET persona='{$dni}',num_titulo='{$id}',cod_mod='{$cod_mod}',fecha_titulo='{$fecha_titulo}',fecha_registro='{$link}',titulo_id='{$titulo_id}' WHERE num_titulo='{$id}'";
		echo $sql;
		if (!$resultado = $conn->query($sql)) die("Error en la consulta");
	}else{
		
		$dni = $_GET['dni'];
		$num_titulo = $_GET['num_titulo'];
		$cod_mod  = $_GET['cod_mod'];
		$fecha_titulo = $_GET['fecha_titulo'];
		
		$link = $_GET['link'];
		$titulo_id  = $_GET['titulo_id'];
		$sql = "INSERT INTO tituloxpersonal(persona,num_titulo,cod_mod,fecha_titulo,link,titulo_id) VALUES('{$dni}','{$num_titulo}','{$cod_mod}','{$fecha_titulo}','{$link}','{$titulo_id}')";
		echo $sql;
		if (!$resultado = $conn->query($sql)) die("Error en la consulta");
		echo $sql;
	}
	
	header("location:titulado_listado.php");
	?>