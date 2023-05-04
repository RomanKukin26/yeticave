<?php

require_once("init.php");
require_once("models.php");
require_once("helpers.php");

if (!$con){
    $error = mysqli_connect_error();
}
else {
    $categories = get_categories($con);
    $content = include_template("main-add.php", ["categories" => $categories]);

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        
    }
}
?>