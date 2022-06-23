<?php 
    session_start();
    $CorreoUsu = $_SESSION['CorreoUsu']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    
    <form action="Cambiar_contrasena.php" class="form-box" method="POST">
        
        <img src="img/logo.jpg" class="logo">  
        <h3>Cambiar contraseña</h3>    
        <input type="text" placeholder="Correo" name="Correo">
        <input type="password" placeholder="Contraseña nueva" name="ContraNueva">      
        <input type="password" placeholder="Confirmar contraseña" name="ConfNueva">
        <button type="submit"> Cambiar </button>
        <button type="submit"><a href="perfil.php"> Cancelar </a></button>

        
    </form>

</body>
</html>

<?php
include ("Database.php");
				
$usuarios= new Database();
				
	if(isset($_POST) && !empty($_POST)){
		$Correo = $usuarios->sanitize($_POST['Correo']);
		$ContraNueva = $usuarios->sanitize($_POST['ContraNueva']);       
		$ConfNueva = $usuarios->sanitize($_POST['ConfNueva']);
			

        if ($Correo == "" || $ContraNueva == "" || $ConfNueva == "") {
            echo '<script>alert("Ingrese todos los datos")</script>';

            
        }else if($ContraNueva == $ConfNueva and $Correo == $CorreoUsu){
                $res = $usuarios->cambiarContrasena($ContraNueva, $Correo);
                
                if($res){
                    echo '<script>alert("Contraseña cambiada con exito")</script>';
                    header('location: http://localhost/PROYECTO/perfil.php');
                }else{
                    echo '<script>alert("No se pudo cambiar la contraseña")</script>';
                }
        }else{
            echo '<script>alert("ERROR: Las contraseñas no coinciden o el correo ingresado no es el actual")</script>';
        }


		

}
             
?>

