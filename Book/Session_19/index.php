<?php
    $val = "Hieu iceTea";
    setcookie("uname", $val);

    //setcookie("uname"); //xoá

    echo $_COOKIE['uname'];
    echo '<br>';


    setrawcookie('id', '8896');

    echo $_COOKIE['id'];
?>
