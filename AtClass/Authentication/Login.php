<?php
//Kiểm tra form
if (isset($_POST['submit'])) {
    //Kết nối DB
    include_once 'includes/dbh.inc.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if (!$connection)
        die('ERROR: connect fail!');

    //Lấy data từ form:
    $UserName_form = $_POST['UserName'];
    $Password_form = $_POST['Password'];

    //Truy vấn DB
    $query_select = "SELECT * FROM Users WHERE UserName = '$UserName_form';";
    $result = $connection->query($query_select);

    //Kiểm tra tồn tại:
    if ($result->num_rows === 0) {
        die("UserName not found");
    }

    //Lấy data từ DB
    $rowData = $result->fetch_array(MYSQLI_ASSOC);

    $result->close();

    $UserName_DB = $rowData['UserName'];
    $Password_DB = $rowData['Password'];

    //Kiểm tra password:
    if (password_verify($Password_form, $Password_DB)) {
        echo "You are already logged";
        //header("Location: ../index.php?login=success");
    } else {
        die("Invalid userName/password combination");
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<form action="Login.php" method="post">
    <p>
        <label for="UserName">UserName</label> <br>
        <input type="text" id="UserName" name="UserName" placeholder="UserName">
    </p>
    <p>
        <label for="Password">Password</label> <br>
        <input type="password" id="Password" name="Password" placeholder="Password">
    </p>

    <input type="submit" id="submit" name="submit" value="Login">
</form>
</body>
</html>
