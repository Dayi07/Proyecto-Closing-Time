<?php 
    session_start();

    include ("Controladores/Database.php");			
    $usuarios= new Database();

    #Obtener el id del usuario
    $Correo = $_SESSION['CorreoUsu'];
    $res = $usuarios->datosUsuario($Correo);
    $fila = mysqli_fetch_array($res);
    $contrActual = $fila['Contraseña_usuario'];
    $id = $fila['Id_usuario'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
    <link rel="stylesheet" type="text/css" href="css/Estilos.css">
</head>
<body>
    
    <form action="Cambiar_contrasena.php" class="form-box" method="POST">
        
        <h2>Cambiar contraseña</h2>    
        <input type="password" placeholder="Contraseña actual" name="ContActual">
        <input type="password" placeholder="Contraseña nueva" name="ContraNueva">      
        <input type="password" placeholder="Confirmar contraseña" name="ConfNueva">
        <button type="submit"> Cambiar </button>
        <button type="submit"><a  href="perfil.php"> Cancelar </a></button>
        
    </form>

</body>
</html>

<?php
				
	if(isset($_POST) && !empty($_POST)){
		$ContActual = $usuarios->sanitize($_POST['ContActual']);
		$ContraNueva = $usuarios->sanitize($_POST['ContraNueva']);       
		$ConfNueva = $usuarios->sanitize($_POST['ConfNueva']);
			

        if ($ContActual ==  $contrActual) {
            if ($ContraNueva == $ConfNueva) {
                
                $res = $usuarios->cambiarContrasena($ContraNueva, $id);

                if ($res) {
                    echo '<script>alert("Contraseña cambiada con exito")</script>';
                    header('location: http://localhost/PROYECTO/perfil.php');
                }else{
                    echo '<script>alert("ERROR: No se pudo cambiar la contraseña")</script>';
                }

            }else{
                echo '<script>alert("ERROR: Las contraseñas nuevas no coinciden")</script>';
            }
        }else{
            echo '<script>alert("ERROR: La contraseña ingresada no es la actual")</script>';
        }

		

}
             
?>

