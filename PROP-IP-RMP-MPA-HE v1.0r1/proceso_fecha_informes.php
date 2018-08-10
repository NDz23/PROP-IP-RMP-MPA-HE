<?php
include_once "./class/class_sesion.php";
    Sesion::crearSesion();
    Sesion::setId();

$periodo = filter_input(INPUT_POST, 'per');
$fecha = filter_input(INPUT_POST, 'fecha');
$location = 'Location: inicio.php?pag=informes&per='.$periodo.'&fecha='.$fecha;
header($location);
?>