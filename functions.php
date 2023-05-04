<?php
function sum_format($number)
{
    $number = ceil($number);
    if ($number > 1000){
        $number = number_format($number, 0, '', ' ');
    }
    return $number . ' ₽';
}

function get_dt_range($date)
{
   date_default_timezone_set('Asia/Irkutsk');
   $final_date = date_create($date);
   $current_date = date_create();

   $diff = date_diff($final_date, $current_date);
   $format_diff = date_interval_format($diff, "%d %H %I");
   $arr = explode(" ", $format_diff);

   $hours = $arr[0] * 24 + $arr[1];
   $minutes = intval($arr[2]);

   $hours = str_pad($hours, 2, "0", STR_PAD_LEFT);
   $minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT);

   $res[] = $hours;
   $res[] = $minutes;

   return $res;
}

function get_arrow($result_query){
    $row = mysqli_num_rows($result_query);
    if ($row === 1){
        $arrow = mysqli_fetch_assoc($result_query);
    }
    if ($row > 1){
        $arrow = mysqli_fetch_all($result_query, MYSQLI_ASSOC);
    }
    return $arrow;
}
?>

