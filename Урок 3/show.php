<?php
if (!$_GET['img']) die("Нет изображений для показа");

require_once "Twig-1.35.0/lib/Twig/Autoloader.php";
require_once "core/Database.php";

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem("templates");

$twig = new Twig_Environment($loader);

$template = $twig->loadTemplate('show.tmpl');

$mysqli = Database::getInstance();

$id=intval($_GET['img']);

$result = $mysqli->query("SELECT * FROM gallery WHERE id=$id LIMIT 1");

if (!$result->num_rows) die("Нет изображений для показа");

$img = $result->fetch_assoc();

$mysqli->query("UPDATE gallery SET views=views+1 WHERE id=$id LIMIT 1");

echo $template->render([
    'img' => $img
]);