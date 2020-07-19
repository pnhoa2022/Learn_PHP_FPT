<!-- Login_ac.php will process the data send to it via PHP method.
It will query the database against the data entered by the user.
If a match found, it will set the session variables. -->

<?php
session_start();
include 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>PHP Login System with Remember me feature</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body style="padding:40px;">

<?php
if (isset($_POST['submit'])) {

    $user_name = $_POST['user_name'];
    $user_pass = $_POST['user_pass'];

    $query = "SELECT * FROM Users WHERE UserName = '$user_name' AND Enabled = TRUE;";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $num_rows = mysqli_num_rows($result);

    $type = $row['Type'];
    $password_verify = password_verify($user_pass, $row['Password']);

    if ($num_rows == 1 && $password_verify) {
        $_SESSION['logged'] = 1;
        $_SESSION['user'] = $user_name;
        $_SESSION['valid_user'] = 1;
        $_SESSION['type'] = $type;

        if (($_POST['remember_me'] == 1) || ($_POST['remember_me'] == 'on')) {
            $hour = time() + 3600 * 24 * 30;
            setcookie('userid', $row['IDUser'], $hour);
            setcookie('username', $user_name, $hour);
            setcookie('active', 1, $hour);
            setcookie('type', $type, $hour);
        }
        header("Location:dashboard.php");
    }//valid user
    else {
        header("Location:login.php?error=1");
    }//invalid user
} else {
    echo "Unauthorized access. Please <a href='login.php'>Login</a>";
    die();
}
?>
</body>
</html>