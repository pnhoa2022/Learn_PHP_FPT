<?php
    declare(strict_types=1)

    define("Name", "value");
    echo Name, "<br>";

    echo $_SERVER['SERVER_SOFTWARE'], "<br>";
    echo $_SERVER['SERVER_NAME'], "<br>";
    echo $_SERVER['SERVER_PROTOCOL'], "<br>";
    echo $_SERVER['SERVER_PORT'], "<br>";

    $Month = 86400 + time();
    setcookie('Name', 'Jerry', $Month);
    echo "The cookie has been set.", "<br>";

    if (isset($_COOKIE['Name'])) {
        $last = $_COOKIE['Name'];
        echo "Welcome back! <br> Your name is " . $last, "<br>";
    }

    echo $_SERVER['HTTP_USER_AGENT'], "<br>";
    echo $_SERVER['HTTP_ACCEPT'], "<br>";
    echo $_SERVER['HTTP_FROM'], "<br>";

    function hieu(int $k, $s) {

    }

    class TenClass {
        //dinh nghia class o day
        public $a = 'a';
        public $b = 'b';
        const c = 'c';
    }

    $obj = new TenClass();
    $obj::c;

    $obj2 = new class() {
        //dinh nghia class o day
    };

?>