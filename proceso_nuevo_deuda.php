<?php
include_once "./class/class_sesion.php";
    Sesion::crearSesion();
    Sesion::setId();

$descripcion = filter_input(INPUT_POST, 'descripcion');
$fecha = filter_input(INPUT_POST, 'fecha');
$cantidad = filter_input(INPUT_POST, 'cantidad');
$acreedor = filter_input(INPUT_POST, 'acreedor');
$cantidad_paga = filter_input(INPUT_POST, 'cantidad_paga');
if ($descripcion === '' || $cantidad === '' || $acreedor === '' || $cantidad_paga === '') {
    header('Location: inicio.php?pag=deudas&alerta=1');
    exit();
}else if (!is_numeric($cantidad) || !is_numeric($cantidad_paga)) {
	header('Location: inicio.php?pag=deudas&alerta=2');
    exit();
}

//INSERTAR DEUDA A LA BASE DE DATOS

header('Location: inicio.php?pag=deudas&alerta=3');
?>