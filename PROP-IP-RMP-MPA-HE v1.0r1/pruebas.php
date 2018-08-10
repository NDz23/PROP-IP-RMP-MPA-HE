<?php
include_once "class/class_conexion.php";
    $conexion = new Conexion();
    $sql = 'SELECT * FROM `tbl_deudas` WHERE `CANTIDAD`>`CANT_PAGADA`';
    $res = $conexion->ejecutarConsulta($sql);

	/*$filas=array();

	while ($filas = $res->fetch_assoc()) {
		$filas[]=$res;
	}*/
	$filas=array();

	while ($filas=$conexion->obtenerFila($res)) {
		$filas[]=$res;
	}

	var_dump($sql);
	var_dump($res);
	var_dump($filas);
	$conexion->cerrarConexion();
?>