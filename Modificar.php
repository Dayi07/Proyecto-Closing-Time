<?php 
include ("Database.php"); 
include ("GuardarDoc.php"); 				
$usuarios = new GuardarDoc();

$id = $_GET['id'];

$resultado = $usuarios->buscarDocumento($id);
$fila = mysqli_fetch_array($resultado);

if(isset($_POST) && !empty($_POST)){
    $TipoArc = ($_POST['TipoArchivo']);
    $FechaHora = $_POST['Fecha_hora'];
    $Archivo = ($_FILES['Archivo']);
    $NomArchivo = $_FILES['Archivo']['name'];


    /*$res = $usuarios->Modificar($TipoArc, $FechaHora, $Archivo, $id);
    if ($res) {
       echo '<script>alert("Se Modifico el archivo")</script>';
    }else{
       echo '<script>alert("No Se Modifico el archivo")</script>';
    }*/

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos</title>
    <link rel="stylesheet" type="text/css" href="css/NuevoDoc.css">
</head>
<body>

<form action="Modificar.php?id=<?php echo $id ?>" method="POST" class="form-box" enctype="multipart/form-data">

    <center><h2>Modificar Archivo <?php echo $fila['Fecha_Hora_entrega']; ?></h2></center>
    
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
    
    <?php $formato = 'Y-m-d H:i:s';
    $fecha = DateTime::createFromFormat($formato, $fila['Fecha_Hora_entrega']); ?>
    
    Fecha y Hora de entrega: <input type="datetime-local" name="Fecha_hora" ><br>

    
    
    Archivo: <input type="file" name="Archivo"><br>

    
    
    Estado: <select name="Estado">
                        <option <?php if ($fila['Estado_documento'] == "Pendiente") {
                            echo 'selected'; } 
                        ?>>Pendiente</option>   
                        
                        <option <?php if ($fila['Estado_documento'] == "Terminado") {
                            echo 'selected'; } 
                        ?>>Terminado</option>   
                        
                        <option <?php if ($fila['Estado_documento'] == "Entregado") {
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

