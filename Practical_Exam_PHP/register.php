<?php
//Get data of user from Form
if (isset($_POST['register'])) {
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];
    $FullName = $_POST['FullName'];
    $Email = $_POST['Email'];

    //Encrypt password
    $Password = password_hash($Password, PASSWORD_DEFAULT);

    //Insert to database (id, fullname, email, username, password)
    include_once 'includes/dbh.inc.php';
    $query_insert = "INSERT INTO Users (UserName, Password, Email, FullName)
                        VALUES ('$UserName', '$Password', '$Email', '$FullName');";

    $result = $connection->query($query_insert);

    if ($result) {
        //echo 'Account registration successful';

        //Save username and full name to Cookie
        setcookie("UserName", $UserName);
        setcookie("FullName", $FullName);

        header("Location: welcome.php");
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

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>


<div class="container-fluid">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">

                <h3 class="mb-4">Register</h3>

                <form action="register.php" method="post">

                    <div class="form-group">
                        <label for="UserName">User name</label>
                        <input type="text" class="form-control" id="UserName" name="UserName" required>
                    </div>

                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="Password" name="Password" required>
                    </div>

                    <div class="form-group">
                        <label for="FullName">Full name</label>
                        <input type="text" class="form-control" id="FullName" name="FullName" required>
                    </div>

                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="Email" name="Email" required>
                    </div>

                    <button type="submit" id="register" name="register" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>
