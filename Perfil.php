<?php
session_start();
include ("Controladores/Database.php");			 
$usuarios= new Database();

$Correo = $_SESSION['CorreoUsu'];

$res = $usuarios->datosUsuario($Correo);
$fila = mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="css/Perfil.css">
  
</head>
<body>

<header class="header">
    <div class="container">

        <div class="logo">
            <h1>Closing Time</h1>
        </div>

        <div class="boton">
            <label for="btn-menu">Menu</label>
        </div>
 
        <input type="checkbox" id="btn-menu">

        <nav class="menu" >
            <a href="Perfil.php">Perfil</a>          
            <a href="Documentos.php">Documentos</a>
            <a href="">Tiempo</a>
        </nav>
</header>

<form action="" method="POST" class="form-box">   

    <img src="img/logo.jpg" class="foto"><br><br><br>

    <h1>
        <?php   
            echo $fila['Nombre_usuario'];
        ?>
    </h1>

    <h3>
        <?php   
            echo $fila['Edad_usuario'];
        ?> 
        
    </h3>
    
    <h4>
        <?php   
            echo "ID: " . $fila['Id_usuario'];
        ?>
        </h4>

    <div class="btn-perfil">
        <button type="button" name="CerrarSes" id="boton_perfil"><a href="login.php">  Cerrar Sesion </a></button>
        <button type="button" name="CambiarCont" id="boton_perfil"><a  href="Cambiar_contrasena.php"> Cambia Contraseña </a></button>
    </div>
</form>


</body>
</html>

