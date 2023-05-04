<?php

require_once('init.php');
require_once('helpers.php');
require_once('functions.php');
require_once('models.php');

if (!$con){
    $error = mysqli_connect_error();
}
// Получение списка категорий
else {
    $sql = "SELECT character_code, name FROM categories;";
    $res = mysqli_query($con, $sql);
    if ($res){
        $categories = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
    else {
        $error = mysqli_error($con);
    }
}

$sql = get_query_list_lots();
$result = mysqli_query($con, $sql);
if ($result){
    $lots = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
else {
    $error = mysqli_error($con);
}

$page_content = include_template("main.php", [
    "categories" => $categories,
    "lots" => $lots
]);

$layout_content = include_template("layout.php", [
    "page_content" => $page_content,
    "categories" => $categories,
    "page_name" => "Главная",
    "is_auth" => "true",
    "user_name" => "Roman"
]);

print($layout_content);
?>