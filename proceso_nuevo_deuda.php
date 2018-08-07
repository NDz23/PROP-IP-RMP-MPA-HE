<?php
include_once "./class/class_sesion.php";
include_once "./class/class_conexion.php";
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
$conexion = new Conexion();
$sql="CALL SP_INSERTAR_DEUDA('".$descripcion."','".$fecha."',".$cantidad.",".$cantidad_paga.",'".$acreedor."')";
if(!$conexion->ejecutarConsulta($sql)){
	header('Location: inicio.php?pag=deudas&alerta=10');
	$conexion->cerrarConexion();
	exit();
}
$conexion->cerrarConexion();
header('Location: inicio.php?pag=deudas&alerta=3');
?>