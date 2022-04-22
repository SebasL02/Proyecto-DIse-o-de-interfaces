<?php

if (!defined('LIBRARIES_PATH')) {
    define('LIBRARIES_PATH', '../libraries/');
}

if (!defined('VIEWS_PATH')) {
    define('VIEWS_PATH', '../Views/');
}

require_once(LIBRARIES_PATH . "Conexion.php");

//crear función
function getAllViajes()
{
    $db = Conexion::getConnection();
    //crear variable para hacer consultas SQL
    $queryViajes = "SELECT * FROM viajes";
    $result = $db->query($queryViajes);
    return $result;
}

//Con el punto se concatena
function getOneViaje($id)
{
    $db = Conexion::getConnection();
    $queryViaje = "SELECT * FROM viajes WHERE id=" . $id;
    $result = $db->query($queryViaje);
    if ($result->num_rows > 0) {
        return $result;
    }
    return null;
}

//crear función
function updateOneViaje($id, $destino, $tipo_hospedaje, $precio, $calificacion)
{
    $db = Conexion::getConnection();
    //crear variable para hacer consultas SQL
    $queryViajes = "UPDATE viajes SET destino ='$destino', tipo_hospedaje ='$tipo_hospedaje', precio ='$precio', precio ='$calificacion' WHERE id=" . $id;
    $db->query($queryViajes);
    header("Location:".VIEWS_PATH."admin/gestion_viajes.php");
}
//crear función
function deleteOneViaje($id)
{
    $db = Conexion::getConnection();
    //crear variable para hacer consultas SQL
    $queryViajes = "DELETE FROM viajes WHERE id=" . $id;
    //echo $queryViajes;
    $db->query($queryViajes);
    header("Location:".VIEWS_PATH."admin/gestion_viajes.php");
}
if (isset($_POST['actualiza_viaje'])) {
    updateOneViaje($_POST["id"], $_POST["destino"], $_POST["tipo_hospedaje"], $_POST["precio"], $_POST["calificacion"]);
    header("Location:".VIEWS_PATH."admin/gestion_viajes.php");
}
