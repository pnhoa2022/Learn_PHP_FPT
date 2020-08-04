<?php

$str_json = '[{"link":"link 1"},{"link":"link 2"},{"link":"link 3"}]';
$arr_link = json_decode($str_json,true);

foreach ($arr_link as $item) {
    echo $item['link'] . '<br>';
}
?>