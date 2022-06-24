<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" type="text/css" href="css/Estilos.css">
</head>
<body>
     
    <form action="Inicio_sesion.php" method="POST" class="form-box">
        
        <img src="img/logo.jpg" class="logo">
        <input type="text" placeholder="Ingrese su correo" name="Correo">
        <input type="password" placeholder="Ingrese su contraseña" name="Contrasena">
        <button type="submit" name="ingresar"> Ingresar </button>

        <p>¿No tienes una cuenta? <a href="Registrarse.php">Registrate aqui</a></p>

    </form>

</body> 
</html>
 
<?php 
session_start(); 
include ("Controladores/Database.php");
$usuarios = new Database; //Creamos un objeto
				
	if(isset($_POST) && !empty($_POST)){
		$Correo = $usuarios->sanitize($_POST['Correo']); 
		$Contrasena = $usuarios->sanitize($_POST['Contrasena']); //Se verifica que los campos no estenvacios y se toman las variables de los campos
   
        $_SESSION['CorreoUsu'] = $Correo; //Se inicia una session y se guarda la variable Correo 
				
        if ($Correo == "" || $Contrasena == "") {
            echo '<script>alert("Ingrese todos los datos")</script>'; //Alerta para cuando no se ingresan los datos
        }else{

            $res = $usuarios->inicioUsuario($Correo, $Contrasena);

			if($res){
				header('location: http://localhost/PROYECTO/Perfil.php'); //Si es correcto se le envia al perfil
			}else{
				echo '<script>alert("Correo o Contraseña incorrectos")</script>'; //Alerta para cuando los datos no coincidan 
			}
        }
	}
    


?>

