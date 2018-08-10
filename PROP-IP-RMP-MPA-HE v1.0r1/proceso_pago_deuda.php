<?php
include_once "./class/class_sesion.php";
include_once "./class/class_conexion.php";
    Sesion::crearSesion();
    Sesion::setId();
$id = filter_input(INPUT_POST, 'id');
$cant = filter_input(INPUT_POST, 'cant');
	if ($cant === '') {
	    header('Location: inicio.php?pag=deudas&alerta=1');
	    exit();
	}else if (!is_numeric($cant)) {
		header('Location: inicio.php?pag=deudas&alerta=2');
	    exit();
	}

$conexion = new Conexion();
$sql="CALL SP_ACTUALIZAR_DEUDA(".$id.",".$cant.")";
if(!$conexion->ejecutarConsulta($sql)){
	header('Location: inicio.php?pag=deudas&alerta=10');
	$conexion->cerrarConexion();
	exit();
}
$conexion->cerrarConexion();
header('Location: inicio.php?pag=deudas&alerta=3');
?>