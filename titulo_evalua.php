<?php
	include("conexion.php");
	$op = isset($_GET['op'])?$_GET['op']:'';
	$id = $_GET['id'];
	echo $id;

	if($op=="eliminar"){
		$sql = "DELETE FROM titulo WHERE titulo_id='{$id}'";
		
		if (!$resultado = $conn->query($sql)) die("Error en la consulta");
	}else if($id!='0'){
		$titulo = $_GET['titulo'];
		$nivel = $_GET['nivel'];
		$instituto = $_GET['instituto'];
		
		$sql = "UPDATE titulo SET nom_titulo='{$titulo}',nivel='{$nivel}',instituto='{$instituto}' WHERE titulo_id='{$id}'";
		echo $sql;
		if (!$resultado = $conn->query($sql)) die("Error en la consulta");
	}else{
		$titulo = $_GET['titulo'];
		$nivel = $_GET['nivel'];
		$instituto = $_GET['instituto'];
		$sql = "INSERT INTO titulo(nom_titulo,nivel,instituto) VALUES('{$titulo}','{$nivel}','{$instituto}')";
		if (!$resultado = $conn->query($sql)) die("Error en la consulta");
	}

	header("location:titulo_listado.php");?>