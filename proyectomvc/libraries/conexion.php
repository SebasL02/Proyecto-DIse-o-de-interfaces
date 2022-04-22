<?php
if (!defined('CONFIG_PATH')) {
    define('CONFIG_PATH', '../config/');
}

require_once(CONFIG_PATH . "config.php");

class Conexion
{
    public static function getConnection()
    {
        $conector = new mysqli(HOST, USER, PASSWORD, DB);
        if (mysqli_connect_errno()) {
            //echo "error conectándose a la BD";
        }
        return $conector;
    }
}
//print_r(Conexion::getConnection());
