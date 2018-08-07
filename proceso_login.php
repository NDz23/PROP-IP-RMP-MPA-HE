<?php
include_once "./class/class_sesion.php";
include_once "./class/class_conexion.php";
if (empty($_POST)) {
    header('Location: index.php?error=3');
    exit();
}
$conexion = new Conexion();
$sql="SELECT * FROM `tbl_usuarios`";
$res = $conexion->ejecutarConsulta($sql);
if(!$res){
	header('Location: index.php?error=10');
	$conexion->cerrarConexion();
	exit();
}
$user = filter_input(INPUT_POST, 'user');
$password = filter_input(INPUT_POST, 'password'); 
while ($fila = $res->fetch_assoc()) {
    if ($fila['NOMBRE'] === $user) {
        if ( $fila['CONTRASENIA'] === $password) {
            echo 'Log correcto.';
            Sesion::crearSesion();
            Sesion::setId();
            Sesion::setValor('usuario',$user);
            $conexion->cerrarConexion();
            header('Location: inicio.php');
            exit();
        }
        else{//retorna el login porque las contraseñas no coinciden
            echo 'Mala contraseña.';
            $conexion->cerrarConexion();
            header('Location: index.php?error=2');
            exit();
        }
    }
}

$conexion->cerrarConexion();
//retorna al login si no encuentra el usuario
echo 'No existe el usuario.';
header('Location: index.php?error=1');
?>

