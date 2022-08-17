<?php
	include("conexion.php");
	$op = isset($_GET['op'])?$_GET['op']:'';
	$id = $_GET['id'];
	echo $id;

	if($op=="eliminar"){
		$sql = "DELETE FROM institucion WHERE cod_mod='{$id}'";
		echo $sql;
		if (!$resultado = $conn->query($sql)) die("Error en la consulta");
	}else if($id!=''){
		$codigo = $_GET['codigo'];
		$institucion = $_GET['institucion'];
		$pais = $_GET['pais'];
		$region = $_GET['region'];
		$sql = "UPDATE institucion SET cod_mod='{$codigo}',nombre_inst='{$institucion}',pais='{$pais}',region='{$region}' WHERE cod_mod='{$id}'";
		echo $sql;
		if (!$resultado = $conn->query($sql)) die("Error en la consulta");
	}else{
		$codigo = $_GET['codigo'];
		$institucion = $_GET['institucion'];
		$pais = $_GET['pais'];
		$region = $_GET['region'];
		$sql = "INSERT INTO institucion(cod_mod,nombre_inst,pais,region) VALUES('{$codigo}','{$institucion}','{$pais}','{$region}')";
		if (!$resultado = $conn->query($sql)) die("Error en la consulta");
	}

	header("location:institucion_listado.php")
?>
