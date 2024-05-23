<?php
require_once ("./config/app.php");
require_once ("./autoload.php"); //Con esto incluye solo el nombre de las clases directamente
require_once ("./app/views/inc/session_start.php");
use App\Controllers\viewsControllers1;


if (isset($_GET['views'])) {
    $url = explode("/", $_GET['views']);   //aqui partiremos la url
} else {
    $url = ["login"];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once ("./app/views/inc/head.php"); ?>
</head>

<body>

    <?php
    use App\Controllers\viewsControllers; //incluimos el archivo con bara invertida y el nombre de la clase

    $viewsController = new viewsControllers();
    $vista = $viewsController->obtenerVistasControlador($url[0]); //porque la pos 0? por que los posibles valores de la url pediremos la pos 0

    if ($vista == "login" || $vista == "404") { //En caso de que tenga la vista el login o 404 manda toda la ruta que teniamos de nuevo
        require_once("./app/views/content/" . $vista . "-view.php");
    }else{ //En caso que las dos condiciones mandamos la vista completa ya que trae toda la ruta
        require_once($vista);
    }
    require_once ("./app/views/inc/script.php");
    ?>
</body>

</html>