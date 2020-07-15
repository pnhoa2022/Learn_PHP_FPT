<?php
$hn = 'localhost'; //hostName
$un = 'root'; //userName
$pw = ''; //password
$db = 'ASM_PHP'; //dataBase Name

$connection = new mysqli($hn, $un, $pw, $db);

if (!$connection) {
    die("Connection fail!");
}
?>