<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    
    <form action="Recuperar_contraseña.php" class="form-box" method="POST">
        
        <img src="img/logo.jpg" class="logo">
        <input type="text" placeholder="Ingrese su correo" name="Correo">        
        <a href="" type="text"> Recuperar </a>
        <p>Enviamos una contraseña nueva a tu correo</p>

    </form>

</body>

</html>

<?php 
include ("Database.php");
				
$usuarios= new Database();
				
	if(isset($_POST) && !empty($_POST)){
		$Correo = $usuarios->sanitize($_POST['Correo']);
             
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );

        $from = "marilinlondono0@gmail.com";
        $to = $Correo;
        $subject = "Recuperacion de Contraseña";
        $message = "Su nueva contraseña es: 123456";
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);

    }
    

?>