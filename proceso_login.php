<?php
include_once "./class/class_sesion.php";
if (empty($_POST)) {
    header('Location: index.php?error=3');
    exit();
}

$user = filter_input(INPUT_POST, 'user');
$password = filter_input(INPUT_POST, 'password'); 
$usuario="habib";
$con="1234";
    if ($usuario === $user) {
        if ($con === $password) {
            echo 'Log correcto.';
            Sesion::crearSesion();
            Sesion::setId();
            Sesion::setValor('usuario',$usuario);
            header('Location: inicio.php');
            exit();
        }
        else{//retorna el login porque las contraseñas no coinciden
            echo 'Mala contraseña.';
            header('Location: index.php?error=2');
            exit();
        }
    }

//retorna al login si no encuentra el usuario
echo 'No existe el usuario.';
header('Location: index.php?error=1');
?>

