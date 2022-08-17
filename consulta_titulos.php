<?php
	include("conexion.php");
	

	
		
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" href="jscss/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="jscss/bootstrap/css/bootstrap-theme.min.css" />
    
    <script src="jscss/jquery.js"></script>
    <script src="jscss/bootstrap/js/bootstrap.min.js"></script>
    <script src="jscss/comun.js"></script>
</head>
<body >


<header class="header-principal container">
   
<div class="row">       
<div class="col-sm-12 logo1">
    <a href="#"><img class="img-responsivo" src="logogrdrep.png" /></a>
    <a href="#"><img class="img-responsivo" src="logochacana.png" /></a>
    
</div>

           
</div>          
  <br>   
 

</header>



 <div class="well well-lg contenedor1">
        
    <div class="container titulos">
            <h2 class="subtitulo">Dirigida al público en general</h2>
            <h1 class="titulo">Consulta de títulos de instituciones tecnológicas y pedagógicas</h1>        
    </div>
        
 </div>
 
 <div class="well container contenedor formConsulta">
 


<form class="" action="consulta_titulos.php">
  
  <div class="consultaTitulos  ">
  	
	    <label  >DNI :</label>
	    <input type="number" class="form-control" id="inputPassword2" placeholder="Ingrese su DNI" name="dni"  required>
	    <div class="g-recaptcha captcha"  data-sitekey="6Lcfh28hAAAAAB6jly26PM9t0dBm3Qf-qGqQmv3r" ></div>
   
  </div>
  
  	
  
  

  <div class="botones" >
	  <button type="submit" name="consultar" class="btn btn-info btn-lg" ><span class="glyphicon glyphicon-search"></span> Consultar</button>
	  <a href="consulta_titulos.php" class="btn btn-danger btn-lg " ><span class="glyphicon glyphicon-retweet"></span> Reiniciar</a>
  </div>
</form>
 </div>
	

<style type="text/css">
* {
   /*outline: 1px red solid;*/
}
	html {

  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background-image: url('bgdre-puno.jpg');
}
.contenedor{
	background: #ffffff;

}
.contenedor1{
	background: #5B5B5F;
	

}
.subtitulo{
	color: #fff;
	font-weight: 900;
}
.titulo{
	color: #fff;
	font-weight: 900;
}

.logo1{
	display: flex;
	flex-direction: row;
	justify-content: space-between;	
}/*
.captcha{
	
	transform:scale(1);transform-origin:0 0

}*/
.consultaTitulos{
	display: grid;
  
  gap: 15px;
	

}

.consultaTitulos label{
	
	
	
	font-size: large;
	font-weight: bolder;
}
.consultaTitulos input{
	width: 303px;
	height: 50px;
	font-size: large;
	font-weight: bolder;
	
}
.formConsulta{
	display: flex;
	width: 400px;
	margin: auto;
	flex-direction: column;
	height: 400px;
	
	
}
.formConsulta form{
	
	
	margin: auto;
	display: grid;
  
  gap: 30px;
	
	
}

.botones{
	display: flex;
	flex-direction: row;
	justify-content: space-around;
}
.tabla{
	background: #5B5B5F;
	color: #fff;
}
.tablaTbody{
	background: #fff;
}
.th1{
	width: 25%;
}
.th2{
	width: 50%;
}
.th3{
	width: 25%;
}
.alerta{
	color: #5B5B5F;
	width: 400px;
	margin: auto;
	text-align: center;
	font-size: large;
	font-weight: bolder;
}
/*
@media(max-width: 1400px){
	.formConsulta{
	display: flex;
	width: 30%;
	margin: auto;
	flex-direction: column;	
}
.captcha{
	transform:scale(1);transform-origin:0 0

}

}

@media(max-width: 820px){
	.formConsulta{
	display: flex;
	width: 50%;
	margin: auto;
	flex-direction: column;

	
	
}

}
@media(max-width: 420px){
	.formConsulta{
	display: flex;
	width: 100%;
	margin: auto;
	flex-direction: column;

	
	
}
.captcha{
	transform:scale(0.95);transform-origin:0 0

}

}*/

/*#identified {
  color: #FFFFFF;
}*/
</style>					
<div class="container">
<?php 
	
	if (isset($_GET['consultar'])) {
		$dni=$_GET['dni'];
		//echo "apretaste el botoN"."<br>";

		$ip = $_SERVER['REMOTE_ADDR'];
		$captcha = $_GET['g-recaptcha-response'];
		$sql = "SELECT * FROM consulta_titulados WHERE dni=$dni";
		
		$secretkey="6Lcfh28hAAAAAP9pPNE-wKtnT0WIgNPfgPrF7HLi";

		$respuesta= file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");
		//echo $respuesta;

		$atributos = json_decode($respuesta, TRUE);
		if($atributos['success']==true){
			echo "<br>";
			//echo $sql;
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
