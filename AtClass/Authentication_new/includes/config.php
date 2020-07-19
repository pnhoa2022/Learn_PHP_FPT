<?php
$hn = 'localhost';
$un = 'root';
$pw = '';
$db = 'Authentication';

$conn = new mysqli($hn, $un, $pw, $db);

if (!$conn) {
    die("Connection fail!");
}
?>