<?php
include_once "./class/class_sesion.php";
    Sesion::crearSesion();
    Sesion::setId();

$op = filter_input(INPUT_POST, 'op');
switch ($op) {
    case '0':
        header('Location: inicio.php?pag=deudas&op=nueva');
			exit();
        break;
    case '1':
        header('Location: inicio.php?pag=deudas&op=pendientes');
			exit();
        break;
    case '2':
        header('Location: inicio.php?pag=deudas&op=saldadas');
			exit();
        break;
    default:
    	header('Location: inicio.php?pag=deudas');
        break;
} 
?>