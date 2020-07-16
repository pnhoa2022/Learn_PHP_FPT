<?php
if (isset($_COOKIE['UserName'])) {
    $UserName = $_COOKIE['UserName'];
    $FullName = $_COOKIE['FullName'];

    echo "Welcome $FullName !!!";
} else {
    echo 'You are not logged in';
}
?>