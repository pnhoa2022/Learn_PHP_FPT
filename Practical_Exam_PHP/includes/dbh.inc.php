<?php
$hn = 'localhost'; //hostName
$un = 'root'; //userName
$pw = ''; //password
$db = 'Practical_Exam_PHP'; //dataBase Name

$connection = new mysqli($hn, $un, $pw, $db);

if (!$connection) {
    die("Connection fail!");
}
?>