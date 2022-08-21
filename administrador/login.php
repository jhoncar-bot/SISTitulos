
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="" href="../logos/logochacana.png">
  <title>Login SISTitulos</title>
  <link rel="stylesheet" href="../css/estiloLogin.css">
</head>
<body>
  <div class="login-box">
    <h2>Login <br> SISTitulos</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="user-box">
        <input type="text" name="usuario" required="">
        <label>Usuario</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required="">
        <label>Contraseña</label>
      </div>
      <a ><button class="btn" type="submit"><span></span>
        <span></span>
        <span></span>
        <span></span>
      Submit</button>
    </a>
  </form>
</div>
</body>
<?php
require "conexion.php";
session_start();
if($_POST){
  $usuario = $_POST['usuario'];
  $password= $_POST['password'];
  $sql= "select id,usuario,password,nombre from administrador where usuario='$usuario'";
  $resultado= $conn->query($sql);
  $num=$resultado->num_rows;
  if ($num>0){
    $row=$resultado->fetch_assoc();
    $pass_bd=$row['password'];
    $pass_c=sha1($password);
    if ($pass_bd==$pass_c) {
      $_SESSION['nombre']=$row['nombre'];
      $_SESSION['id']=$row['id'];
      header("Location: index.php");
    }else{
      echo "<script type='text/javascript'>alert('la contraseña no es correcta')</script>";
    }
  }else{
    echo "<script type='text/javascript'>alert('Este usuario no existe')</script>";
  }
}
?>