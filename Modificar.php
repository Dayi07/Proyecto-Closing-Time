<?php 
include ("Controladores/Database.php"); 
include ("Controladores/DocumentoController.php"); 				
$usuarios = new DocumentoController();

$id = $_GET['id'];

$resultado = $usuarios->buscarDocumento($id);
$fila = mysqli_fetch_array($resultado);

if(isset($_POST) && !empty($_POST)){
    $TipoArc = ($_POST['TipoArchivo']);
    $Estado = $_POST['Estado'];

    $res = $usuarios->Modificar($TipoArc, $Estado, $id);

    if ($res) {
       echo '<script>alert("Se Modifico el archivo")</script>';
    }else{
       echo '<script>alert("No Se Modifico el archivo")</script>';
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos</title>
    <link rel="stylesheet" type="text/css" href="css/Nuevo.css">
</head>
<body>

<form action="Modificar.php?id=<?php echo $id ?>" method="POST" class="form-box" enctype="multipart/form-data">

    <center><h2>Modificar Archivo </h2></center>

    Archivo: <button type="text"> <?php echo $fila['Archivo'] ?></button> <br>

    Fecha y Hora de entrega: <button type="text" > <?php echo $fila['Fecha_Hora_entrega'] ?></button><br>
   

    Tipo de Archivo: <select name="TipoArchivo">
                        <option <?php if ($fila['Tipo_documento'] == "Word") {
                            echo 'selected'; } 
                        ?>> Word</option> 

                        <option <?php if ($fila['Tipo_documento'] == "PDF") {
                            echo 'selected'; } 
                        ?>>PDF</option>   

                        <option <?php if ($fila['Tipo_documento'] == "Excel") {
                            echo 'selected'; } 
                        ?>>Excel</option>   

                        <option <?php if ($fila['Tipo_documento'] == "PowerPoint") {
                            echo 'selected'; } 
                        ?>>PowerPoint</option>   

                        <option <?php if ($fila['Tipo_documento'] == "JPG") {
                            echo 'selected'; } 
                        ?>>JPG</option>
                    </select><br>    
    
    Estado: <select name="Estado">
                        <option <?php if ($fila['Estado'] == "Pendiente") {
                            echo 'selected'; } 
                        ?>>Pendiente</option>   
                        
                        <option <?php if ($fila['Estado'] == "Terminado") {
                            echo 'selected'; } 
                        ?>>Terminado</option>   
                        
                        <option <?php if ($fila['Estado'] == "Entregado") {
                            echo 'selected'; } 
                        ?>>Entregado</option>
                    </select><br>


   <center>
       <button type="submit" name="ModificarDoc"> Modificar </button>
       <button type="submit" name="Cancelar"> <a  href="Documentos.php"> Cancelar </a></button>
    </center>


</form>
</body>
</html>

