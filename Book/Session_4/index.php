<?php
    error_reporting(0);

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $hidden = $_POST["hidden"];

//    $firstName = $_GET["firstName"];
//    $lastName = $_GET["lastName"];


    echo "firstName: " . $firstName, "<br>";
    echo "lastName: " . $lastName, "<br>";
    echo "hidden: " . $hidden, "<br>";
?>
