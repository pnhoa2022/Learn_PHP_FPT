<?php

$arr_data = array(
    'Hieu',
    'Hieu iceTea',
    'Học AJAX',
    'Thật thú vị',
    'Ahahaha',
    'Xin chào'
);

$rand_keys = array_rand($arr_data, 1);
echo $arr_data[$rand_keys];

?>