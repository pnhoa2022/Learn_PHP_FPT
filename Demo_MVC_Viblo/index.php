<?php

//https://viblo.asia/p/cai-dat-ung-dung-php-thuan-su-dung-mvc-va-oop-4P856aA3lY3

//Kết nối đến DB
require_once('connection.php');

//Lấy dữ liệu từ URL bằng _GET
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'index';
    }
} else {
    $controller = 'pages';
    $action = 'home';
}

require_once ('routes.php');

?>


