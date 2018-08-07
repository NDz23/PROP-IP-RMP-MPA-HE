<?php
include_once "./class/class_sesion.php";
    Sesion::crearSesion();
    Sesion::setId();

$cant_leche = filter_input(INPUT_POST, 'cantidad_leche');
$precio_leche = filter_input(INPUT_POST, 'precio_leche');
if ($cant_leche === '' || $precio_leche === '') {
    header('Location: inicio.php?pag=ingresos&alerta=1');
    exit();
}else if (!is_numeric($cant_leche) || !is_numeric($precio_leche)) {
	header('Location: inicio.php?pag=ingresos&alerta=2');
    exit();
}
$_POST["descripcion"] = "Venta de leche";
$_POST["fecha"] = filter_input(INPUT_POST, 'fecha_leche');
$_POST["cantidad"] = $cant_leche*$precio_leche;
/*echo "descripcion: ".$_POST["descripcion"]."\n";
echo "fecha: ".$_POST["fecha"]."\n";
echo "cantidad: ".$_POST["cantidad"]."\n";*/
header('Location: proceso_nuevo_ingreso.php');
?>