<?php
include("Database.php");
include ("GuardarDoc.php"); 
$usuarios = new GuardarDoc();

$id = $_GET['id'];

$res = $usuarios->eliminarDocumento($id);

if ($res) {
    header('location: http://localhost/PROYECTO/Documentos.php'); //Si es correcto se le envia al perfil
}else{
    echo '<script>alert("El archivo no se elmino")</script>';
}
?>