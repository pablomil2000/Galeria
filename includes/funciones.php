<?php
function vali_str($cadena)                  //Valida los datos en str
{
    $nombre = filter_var(stripslashes($cadena), FILTER_SANITIZE_STRING);
    return $nombre;
}


function es_img($img)
{
    $tam = getimagesize($img);

    if ($tam) {
        return true;
    } else {
        return false;
    }
}

function guardar(){
    global $conexion;
    $tabla ='fotos';

    $titulo = vali_str($_POST['titulo']);
    $imagen = generar_id().'.jpg';
    $texto = vali_str($_POST['texto']);

    $sql = "INSERT INTO $tabla(titulo, imagen, texto) VALUES (:titulo, :imagen, :texto)";
    $sentencia = $conexion->prepare($sql);
    $sentencia -> bindParam(':titulo', $titulo);
    $sentencia-> bindParam(':imagen', $imagen);
    $sentencia -> bindParam(':texto', $texto);

    $res = $sentencia->execute();

    var_dump($res);

    return $imagen;
}

function generar_id(){
    global $conexion;

    $sql_id = "SELECT Auto_increment
        FROM information_schema.tables
        WHERE table_name='fotos'";
    $resultado = $conexion->query($sql_id);

    $id = $resultado->fetchAll();
    return $id[0]['Auto_increment'];
}

function numero_de_productos($tabla)      //Numero de productos en la consulta
{
    global $conexion;
    $lineas = "SELECT SQL_CALC_FOUND_ROWS * from $tabla";
    $resultado = $conexion->query($lineas);

    $total = $resultado->rowCount();

    return $total;
}