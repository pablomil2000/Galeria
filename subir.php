<?php include_once('includes/conexion.php'); ?>
<?php include_once('includes/funciones.php'); ?>
<?php

$mensaje ='';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    if (es_img($_FILES['img']['tmp_name'])) {
        $carpeta ="fotos/";

        $img = guardar();
        
        move_uploaded_file($_FILES['img']['tmp_name'],$carpeta. $img);

        $mensaje = "<div class='error'>Imagen subida</div>";
    }else {
        $mensaje = "<div class='error'>No es una imagen</div>";
    }
}




?>
<?php require_once('views/subir.view.php');?>