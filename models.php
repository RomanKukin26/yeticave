<?php

function get_query_list_lots(){
    return "SELECT lots.id, lots.title, lots.start_price, lots.img, lots.date_finish, categories.name FROM lots "
         . "JOIN categories ON lots.category_id = categories.id "
         . "WHERE lots.date_finish > NOW() ORDER BY date_creation DESC";
}

function get_lot_by_id($id){
    return "SELECT lots.date_creation, lots.title, lots.lot_description, lots.img, lots.start_price, lots.date_finish, lots.step, categories.name
            FROM lots JOIN categories ON lots.category_id = categories.id
            WHERE lots.id = " . $id;
}

function get_categories($con){
    $sql = "SELECT character_code, name FROM categories;";
    $res = mysqli_query($con, $sql);
    if ($res){
        $categories = mysqli_fetch_all($res, MYSQLI_ASSOC);
        return $categories;
    }
    else {
        $error = mysqli_error($con);
        return $error;
    }
}
?>