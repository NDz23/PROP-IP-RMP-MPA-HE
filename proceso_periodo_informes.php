<?php
include_once "./class/class_sesion.php";
    Sesion::crearSesion();
    Sesion::setId();

$periodo = filter_input(INPUT_POST, 'periodo');
switch ($periodo) {
    case '0':
        header('Location: inicio.php?pag=informes&per=semanal');
			exit();
        break;
    case '1':
        header('Location: inicio.php?pag=informes&per=mensual');
			exit();
        break;
    case '2':
        header('Location: inicio.php?pag=informes&per=anual');
			exit();
        break;
    default:
    	header('Location: inicio.php?pag=informes');
        break;
} 
?>