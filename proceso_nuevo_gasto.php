<?php
include_once "./class/class_sesion.php";
    Sesion::crearSesion();
    Sesion::setId();

$descripcion = filter_input(INPUT_POST, 'descripcion');
$fecha = filter_input(INPUT_POST, 'fecha');
$cantidad = filter_input(INPUT_POST, 'cantidad');
if ($descripcion === '' || $cantidad === '') {
    header('Location: inicio.php?pag=gastos&alerta=1');
    exit();
}else if (!is_numeric($cantidad)) {
	header('Location: inicio.php?pag=gastos&alerta=2');
    exit();
}

//INSERTAR GASTO A LA BASE DE DATOS

header('Location: inicio.php?pag=gastos&alerta=3');
?>