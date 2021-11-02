<?php
session_start();

include_once('includes/conexion.php');
include_once('includes/funciones.php');
    $inicio = 0;
    $porpag = 8;

    if (isset($_SESSION['pagina'])) {
        $pagina = $_SESSION['pagina'];
    }else {
        $pagina = 1;
    }

$total = numero_de_productos('fotos'); //total de productos en bd

$total = $total / $porpag;
$total = ceil($total);

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['next'])) {
            if ($pagina < $total) {
                $pagina++;
            }
        }elseif (isset($_GET['prev'])) {
            if ($pagina != 1) {
                $pagina--;
            }
        }
    }
    $_SESSION['pagina'] = $pagina;

if (isset($pagina)) {
    if ($pagina == 1) {
        $inicio = 0;
    } else {
        $inicio = ($pagina - 1) * $porpag;
    }
} else {
    $inicio = 0;
    $pagina = 1;
}

$sql = "SELECT * FROM fotos LIMIT $inicio ,$porpag";    //COnsulta para sacar los productos por pagina
$resultados = $conexion->query($sql);

$registros = $resultados->fetchAll();

require_once('views/index.view.php');