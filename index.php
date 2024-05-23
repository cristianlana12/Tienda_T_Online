<?php
require_once ("./config/app.php");
require_once ("./autoload.php");
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

    <?php require_once ("./app/views/inc/script.php"); ?>
</body>

</html>