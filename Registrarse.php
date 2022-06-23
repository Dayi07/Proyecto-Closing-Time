
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" type="text/css" href="css/Estilos.css">
</head>
<body>
    
    <form action="Registrarse.php" class="form-box" method="POST">
        
        <img src="img/logo.jpg" class="logo">      
        <input type="text" placeholder="Nombre" name="Nombre">
        <input type="text" placeholder="Edad" name="Edad">
        <input type="text" placeholder="Correo" name="Correo">
        <input type="password" placeholder="Contraseña" name="Contrasena">
        <button type="submit"> Registrarse </button>
        
    </form>

</body>
</html>

<?php
include ("Database.php");
				
$usuarios= new Database();

if(isset($_POST) && !empty($_POST)){
    $Nombre = $usuarios->sanitize($_POST['Nombre']);
    $Edad = $usuarios->sanitize($_POST['Edad']);
    $Correo = $usuarios->sanitize($_POST['Correo']);
    $Contrasena = $usuarios->sanitize($_POST['Contrasena']);

    session_start();
    $_SESSION['CorreoUsu'] = $Correo; 

    $confirmar = $usuarios->confirmarRegistro($Nombre, $Edad, $Correo, $Contrasena);

    if ($confirmar == true) {
		
		if(isset($_POST) && !empty($_POST)){	

            $conf = $usuarios->existenciaCorreo($Correo);

            if ($conf == false) {
                $res = $usuarios->registro($Nombre, $Edad, $Correo, $Contrasena);
                    
                if($res){
                    header('location: http://localhost/PROYECTO/perfil.php');

                }else{
                    echo '<script>alert("No se pudo completar el registro")</script>';				
                }
            }else {
                echo '<script>alert("El correo ingresado ya esta registrado")</script>';				

            }
				
				

		}
	}
    
                
}


?>



