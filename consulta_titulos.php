<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SISTitulos DREP</title>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<link rel="icon" type="image/x-icon" href="logogrdrep">
	<link rel="stylesheet" href="jscss/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="jscss/bootstrap/css/bootstrap-theme.min.css" />
	<link rel="stylesheet" href="./css/estilloConsulta.css">
	<script src="jscss/jquery.js"></script>
	<script src="jscss/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="lib/select2.min.js"></script>
	<script type="text/javascript" src="lib/jquery.dataTables.min.js"></script>
</head>
<body >
	<header class="header-principal container">
		<div class="row">
			<div class="col-sm-12 logo1">
				<a href="https://www.drepuno.gob.pe/" target="_blank"><img class="img-responsivo" src="logogrdrep.png" /></a>
				<a href="https://www.drepuno.gob.pe/" target="_blank"><img class="img-responsivo logotwo" src="logochacana.png" /></a>
			</div>
		</div>
	</header>
	<div class="well well-lg contenedor1">
		<div class="container titulos">
			<h2 class="subtitulo">Dirección Regional de Educación Puno</h2>
			<h1 class="titulo">Consulta de títulos de instituciones tecnológicas y pedagógicas</h1>
		</div>
	</div>
	<div class="well container contenedor formConsulta">
		<form class="" action="consulta_titulos.php">
			<div class="consultaTitulos  ">
				<label  >DNI :</label>
				<input type="number" class="form-control" id="inputPassword2" placeholder="Ingrese su DNI" name="dni"  required>
				<div class="g-recaptcha captcha"  data-sitekey="6LdjtfogAAAAAGn2lsCKep4ab_ly7j3UWhNmBxwk" ></div>
			</div>
			<div class="botones" >
				<button type="submit" name="consultar" class="btn btn-info btn-lg" ><span class="glyphicon glyphicon-search"></span> Consultar</button>
				<a href="consulta_titulos.php" class="btn btn-danger btn-lg " ><span class="glyphicon glyphicon-retweet"></span> Reiniciar</a>
			</div>
		</form>
	</div>
	<div class="container">
		<?php
		if (isset($_GET['consultar'])) {
			$dni=$_GET['dni'];
			$ip = $_SERVER['REMOTE_ADDR'];
			$captcha = $_GET['g-recaptcha-response'];
			$sql = "SELECT * FROM consulta_titulados WHERE dni=$dni";
			$secretkey="6LdjtfogAAAAAKqchbKdw0upPffmzpfTHXf41anu";
			$respuesta= file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");
			$atributos = json_decode($respuesta, TRUE);
			if($atributos['success']==true){
				echo "<br>";
				if (!$resultado = $conn->query($sql)) die("Error en la consulta");
				echo "<table class='table table-hover table-bordered'>";
				echo "<thead class='tabla'>";
				echo "<tr >";
				echo "<th class='th1'>GRADUADO</th>";
				echo "<th class='th2'>GRADO O TITULO</th>";
				echo "<th class='th3'>INSTITUCION</th>";
				echo "</tr>";
				echo "</thead>";
				echo "<tbody >";
				while($reg = $resultado->fetch_assoc()){
					if($reg['dni']==$dni){
						echo "<tr class='tablaTbody'>";
						echo "<td class='th1 text-uppercase'>".$reg['apellidos']." ".$reg['nombre']."<br>"."DNI: ".$reg['dni']."</td>";
						echo "<td class='th2 text-uppercase'>".$reg['nom_titulo']."<br> Fecha del Titulo: ".$reg['fecha']."<br> Tipo de Institucion: ".$reg['instituto']."</td>";
						echo "<td class='th3 text-uppercase'>".$reg['nombre_inst']."<br>".$reg['lugar']."</td>";
						echo "</tr>";
					}}
					echo "</tbody>";
					echo "</table>";
				}else{
					echo "<div class='alert alert-danger alerta' role='alert'>Verifique el CAPTCHA</div>";
				}
			}
			echo "</br>";
			echo "</br>";
			include("pie.php");
			echo "</div>";
			?>
		</body>
	</div>
	</html>
