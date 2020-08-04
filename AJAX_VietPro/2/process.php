<?php

if (isset($_GET['q']) && $_GET['q'] != '') {
    $data = $_GET['q'];
    echo $data;
} else {
    echo 'Bạn chưa nhập gì';
}


?>