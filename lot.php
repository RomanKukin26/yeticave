<?php

require_once("init.php");
require_once("models.php");
require_once("helpers.php");
require_once("functions.php");

// Получение идентификатора лота
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
// Получение списка категорий
$categories = get_categories($con);
// Формирование шаблона "Страница не найдена"
$page_404 = include_template("404.php", [
    "categories" => $categories
]);

if ($id){
    $sql = get_lot_by_id($id);
}
else {
    print($page_404);
    die();
}

if ($res = mysqli_query($con, $sql)){
    $lot = get_arrow($res);
}
else {
    $error = mysqli_error($con);
}

if (!$lot){
    print($page_404);
    die();
}

$page_content = include_template("main-lot.php", [
    "lot" => $lot
]);

$layout_content = include_template("layout.php", [
    "page_content" => $page_content,
    "is_auth" => true,
    "user_name" => "Roman",
    "categories" => $categories,
    "page_name" => $lot['title']
]);

print($layout_content);
?>