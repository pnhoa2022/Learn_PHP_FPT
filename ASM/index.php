<?php
if (isset($_COOKIE['UserName'])) {
include_once 'admin_view.php';
} else {
    header("Location: login.php");
}
?>