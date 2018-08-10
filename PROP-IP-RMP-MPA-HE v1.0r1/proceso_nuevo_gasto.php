<?php
include_once "./class/class_sesion.php";
include_once "./class/class_conexion.php";
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
$conexion = new Conexion();
$sql="CALL SP_INSERTAR_GASTO('".$descripcion."','".$fecha."',".$cantidad.")";
if(!$conexion->ejecutarConsulta($sql)){
	header('Location: inicio.php?pag=gastos&alerta=10');
	$conexion->cerrarConexion();
	exit();
}
$conexion->cerrarConexion();
header('Location: inicio.php?pag=gastos&alerta=3');
?>