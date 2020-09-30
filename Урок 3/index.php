<?php

require_once "Twig-1.35.0/lib/Twig/Autoloader.php";
require_once "core/functions.php";
require_once "core/Database.php";


Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem("templates");

$twig = new Twig_Environment($loader);

$template = $twig->loadTemplate('index.tmpl');


$mysqli = Database::getInstance();
$message = '';

if($_FILES['img']) {
    if (!preg_match("/^image\/.+$/", $_FILES['img']['type'])) {
        $message = "Ошибка: неправильный тип файла!";
    } elseif ($_FILES['img']['error']) {
        $message = "Ошибка " . $_FILES['img']['error'];
    } else {
        $name = friendlyName($_FILES['img']['name']);
        $path = "img/";
        $size = $_FILES['img']['size'];
        if (move_uploaded_file($_FILES['img']['tmp_name'], $path.$name)) {
            $message = "Изображение успешно загружено!";
            $mysqli->query("INSERT INTO gallery (name, path, size) VALUES ('$name', '$path', $size)");
            create_thumbnail($path.$name, $path."small/sm_".$name, 160, 120);
        } else {
            $message = "Ошибка при загрузке изображения!";
        }
    }
}

$select = $mysqli->query("SELECT * FROM gallery ORDER BY views DESC");
$thumbnails = array();

while ($img = $select->fetch_assoc()) {
    $thumbnails[] = $img;
}


echo $template->render([
    'message'    => $message,
    'thumbnails' => $thumbnails
]);
