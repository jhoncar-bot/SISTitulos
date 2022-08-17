<?php
	include("conexion.php");
	$op = isset($_GET['op'])?$_GET['op']:'';
	$id = $_GET['id'];
	echo $id;

	if($op=="eliminar"){
		$sql = "DELETE FROM persona WHERE dni='{$id}'";
		echo $sql;
		if (!$resultado = $conn->query($sql)) die("Error en la consulta");
	}else if($id!=''){
		$dni = $_GET['dni'];
		$apePat = $_GET['apePat'];
		$apeMat = $_GET['apeMat'];
		$nombre = $_GET['nombre'];
		
		$sql = "UPDATE persona SET dni='{$dni}',ape_pat='{$apePat}',ape_mat='{$apeMat}',nombre='{$nombre}' WHERE dni='{$id}'";
		echo $sql;
		if (!$resultado = $conn->query($sql)) die("Error en la consulta");
	}else{
		$dni = $_GET['dni'];
		$apePat = $_GET['apePat'];
		$apeMat = $_GET['apeMat'];
		$nombre = $_GET['nombre'];
		$sql = "INSERT INTO persona(dni,ape_pat,ape_mat,nombre) VALUES('{$dni}','{$apePat}','{$apeMat}','{$nombre}')";
		//echo $sql;
		if (!$resultado = $conn->query($sql)) die("Error en la consulta");
	}

	header("location:persona_listado.php")
?>
