<?php

define('CONTROLLER_PATH', '../Controllers/');
define('VIEWS_PATH', '../Views/');
define('MODELS_PATH', '../Models/');
define('LIBRARIES_PATH', '../libraries/');

require_once(LIBRARIES_PATH."Conexion.php");
$db = Conexion::getConnection();
$query = "SELECT * FROM Usuarios WHERE correo = '" . $_POST["correo"] . "' AND clave = '" . $_POST["clave"] . "' ";
$result = $db->query($query);
if ($result->num_rows > 0) {
    //echo "Datos Correctos";
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["rol"] == 0) { //Usuario con menos privilegios
            header("Location:".VIEWS_PATH."user/home_user.php");
        }
        if ($row["rol"] == 1) { //Administrador
            header("Location:".VIEWS_PATH."admin/home_admin.php");
        }
    }
    //header("Location:".VIEWS_PATH."home_user.php");
} else {
    //echo "Datos Incorrectos";
    header("Location:".VIEWS_PATH."login.php?info=1");
}
?>