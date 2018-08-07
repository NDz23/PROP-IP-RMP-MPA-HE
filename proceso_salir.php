<?php

include_once "./class/class_sesion.php";

//Destruye la sesión actual.
if(!isset($_SESSION)){ 
	Sesion::crearSesion();   
}
Sesion::destruirSesion();

//Redirige hacia la página de login.
header('Location: index.php');
?>
