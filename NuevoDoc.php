
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos</title>
    <link rel="stylesheet" type="text/css" href="css/nuevoDoc.css">
</head>
<body>
<?php
session_start();
include ("Controladores/Database.php"); 
include ("Controladores/DocumentoController.php"); 				
$usuarios = new DocumentoController();
$registro = new Database();

#$limitekb = 200;
#$_FILES['Archivo']["size"] <= $limitekb*1024

     if(isset($_POST) && !empty($_POST)){

        #Obtener el id del usuario
        $Correo = $_SESSION['CorreoUsu'];
        $res = $registro->datosUsuario($Correo);
        $fila = mysqli_fetch_array($res);
        $id = $fila['Id_usuario'];
        
        #Declaramos las variables
        $TipoArc =  $_POST['TipoArchivo'];
        $FechaHora = $_POST['Fecha_hora'];
        $formated_DATETIME = date($FechaHora);
        $Archivo = $_FILES['Archivo'];
        $NomArchivo = $_FILES['Archivo']['name'];
        $Estad = $_POST['Estado'];

        #Ruta y nombre del archivo
        $ruta = "files/";
        $nombrefinal = trim($_FILES['Archivo']['name']);
        $nombrefinal = mb_ereg_replace(" ", "", $nombrefinal);
        $upload = $ruta . $nombrefinal;


        if (move_uploaded_file($_FILES['Archivo']['tmp_name'], $upload)) {

            $res = $usuarios->insertarArchivo($id, $TipoArc, $FechaHora, $nombrefinal, $Estad);
            
            if ($res) { 
				header('location: http://localhost/PROYECTO/Documentos.php'); //Si es correcto se le envia al perfil
            }else{
                echo "ERROR al subir a la bd";
            }
             
        }else {
            echo '<script>alert("Error al subir")</script>';
        }

        
    }

?>

<form action="NuevoDoc.php" method="POST" class="form-box" enctype="multipart/form-data">
        
    Tipo de Archivo: <select name="TipoArchivo">
                        <option>Word</option>   <option>PDF</option>   <option>Excel</option>   <option>PowerPoint</option>   <option>JPG</option>
                    </select><br>
    Fecha y Hora de entrega: <input type="datetime-local" name="Fecha_hora"><br>

    Archivo: <input type="file" name="Archivo"><br>

    Estado: <select name="Estado">
                        <option>Pendiente</option>   <option>Terminado</option>   <option>Entregado</option>
                    </select><br>

   <center>
       <button type="submit" name="AgregarDoc"> Agregar Documento </button>
       <button type="submit" name="Cancelar"><a  href="Documentos.php"> Cancelar </a></button>
    </center>

</form> 

</body>
</html>