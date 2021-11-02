<?php

$host= "localhost";
$user="root";
$password="";
$dbname="galeria";

try {
    $dsn = "mysql:host=$host;dbname=$dbname";
    $conexion = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}

?>