<?php
if (isset($_POST['submit'])) {

    //Kết nốt DB:
    include_once 'includes/dbh.inc.php';
    $connection = new mysqli($hn, $un, $pw, $db);

    if (!$connection) {
        echo "connection error";
        exit();
    }

    //Lấy data từ POST:
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $FullName = $_POST['FullName'];

    //Kiểm tra UserName bị trùng không:
    $query_select = "SELECT * FROM Users WHERE UserName = '$UserName';";
    $result = $connection->query($query_select);
    if ($result->num_rows !== 0) {
        echo "UserName already exists";
        exit();
    }

    //Mã hoá dữ liệu
    $Password = password_hash($Password, PASSWORD_DEFAULT);

    //Thêm bản ghi vào DB:
    $query_insert = "INSERT INTO Users (UserName, Password, Email, Phone, FullName)
    VALUES ('$UserName', '$Password', '$Email', '$Phone', '$FullName');";

    $result = $connection->query($query_insert);

    if ($result) {
        echo "Success!";
    } else {
        echo "ERROR";
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
    <title>Register</title>
</head>
<body>
<form action="Register.php" method="post">
    <p>
        <label for="UserName">UserName</label> <br>
        <input type="text" id="UserName" name="UserName" placeholder="UserName">
    </p>
    <p>
        <label for="Password">Password</label> <br>
        <input type="password" id="Password" name="Password" placeholder="Password">
    </p>
    <p>
        <label for="Email">Email</label> <br>
        <input type="email" id="Email" name="Email" placeholder="Email">
    </p>
    <p>
        <label for="Phone">Phone</label> <br>
        <input type="tel" id="Phone" name="Phone" placeholder="Phone">
    </p>
    <p>
        <label for="FullName">FullName</label> <br>
        <input type="text" id="FullName" name="FullName" placeholder="FullName">
    </p>

    <input type="submit" id="submit" name="submit" value="Register">
</form>
</body>
</html>