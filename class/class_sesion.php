<?php

class Sesion 
{

    private static $id;

    public static function crearSesion() 
    {
        session_start();
    }

    public static function destruirSesion() 
    {
        session_start();
        session_unset();
        session_destroy();
        self::$id = null;
    }

    public static function getId() 
    {
        return self::$id;
    }

    public static function setId() 
    {
        self::$id = session_id();
    }

    public static function setValor($clave, $valor) 
    {
        $_SESSION[$clave] = $valor;
    }

    public static function getValor($clave) 
    {
        return $_SESSION[$clave];
    }

}
