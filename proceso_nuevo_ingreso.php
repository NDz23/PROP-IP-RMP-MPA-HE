<?php
include_once "./class/class_sesion.php";
include_once "./class/class_conexion.php";
    Sesion::crearSesion();
    Sesion::setId();
$tipo = filter_input(INPUT_POST, 'tipo');
$fecha = filter_input(INPUT_POST, 'fecha');
$descripcion;
$cantidad;
$cant_leche;
$precio_leche;
if ($tipo === 'leche') {
	echo "El ingreso es por concepto de leche.";
	$cant_leche = filter_input(INPUT_POST, 'cantidad_leche');
	$precio_leche = filter_input(INPUT_POST, 'precio_leche');
	if ($cant_leche === '' || $precio_leche === '') {
	    header('Location: inicio.php?pag=ingresos&alerta=1');
	    exit();
	}else if (!is_numeric($cant_leche) || !is_numeric($precio_leche)) {
		header('Location: inicio.php?pag=ingresos&alerta=2');
    	exit();
	}
	$cantidad = $cant_leche*$precio_leche;
	$descripcion = "Venta de leche (Litros: ".$cant_leche." Precio: Lps.".$precio_leche.")";
}else if ($tipo === 'normal') {
	$descripcion = filter_input(INPUT_POST, 'descripcion');
	$cantidad = filter_input(INPUT_POST, 'cantidad');
	if ($descripcion === '' || $cantidad === '') {
	    header('Location: inicio.php?pag=ingresos&alerta=1');
	    exit();
	}else if (!is_numeric($cantidad)) {
		header('Location: inicio.php?pag=ingresos&alerta=2');
	    exit();
	}
}
$conexion = new Conexion();
$sql="CALL SP_INSERTAR_INGRESO('".$descripcion."','".$fecha."',".$cantidad.")";
if(!$conexion->ejecutarConsulta($sql)){
	header('Location: inicio.php?pag=ingresos&alerta=10');
	$conexion->cerrarConexion();
	exit();
}
$conexion->cerrarConexion();
header('Location: inicio.php?pag=ingresos&alerta=3');
?>