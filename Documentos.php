<?php
include ("Database.php");
include ("GuardarDoc.php"); 
$usuarios = new GuardarDoc();
$usuario = new Database();
$ruta = "files/";

$Correo = 'marilyn@gmail.com';
$res = $usuario->datosUsuario($Correo);
$fila = mysqli_fetch_array($res);
$id = $fila['Id_usuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos</title>
    <link rel="stylesheet" type="text/css" href="css/documentos.css">
    
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
    </div>
</header>

<form action="" method="POST" class="form-box">

    <center><button type="submit" name="AgregarDoc"><a  href="NuevoDoc.php"> Nuevo Documento </a></button></center>

     <?php
            $resultado = $usuarios->documentos($id);                       
            while ($fila = mysqli_fetch_array($resultado)) {
    ?>

    <div id="Campo">
        

        <div id="contenido">
            <h1>
                <?php echo "<i><a href=\"". $ruta . $fila['Archivo'] . "\">" . $fila['Archivo'] . "</a></i>"; ?>
            </h1>
            <p>Fecha Entrega: <?php echo $fila['Fecha_Hora_entrega']; ?></p>
            <p>Tipo: <?php echo $fila['Tipo_documento']; ?></p>                  
        </div>

        <div id="botones">
            <button type="" class="modificar"><a  href="Modificar.php?id=<?php echo $fila['Codigo_documento']; ?>"> Modificar </a></button><br><br><br>
            <button type="" class="eliminar"><a  href="Eliminar.php?id=<?php echo $fila['Codigo_documento']; ?>"> Eliminar </a></button>
        </div>

        <center>
            <div id="estado">
                <p><b><?php echo $fila['Estado_documento']; ?></b></p>
            </div>
        </center>

               
    </div>
    <br><br> 
    <?php } ?>   

</form>


</body>
</html>

