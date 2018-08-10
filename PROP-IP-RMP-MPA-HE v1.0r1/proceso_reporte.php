<?php
include_once "./class/class_sesion.php";
    Sesion::crearSesion();
    Sesion::setId();

$op = filter_input(INPUT_POST, 'op');
switch ($op) {
    case '0':
        header('Location: reportes.php?op=deudas-pendientes');
		exit();
        break;
    case '1':
        header('Location: reportes.php?op=deudas-saldadas');
			exit();
        break;
    case '2':
        header('Location: reportes.php?pag=deudas&op=saldadas');
			exit();
        break;
    default:
    	header('Location: reportes.php?pag=deudas');
        break;
} 
?>