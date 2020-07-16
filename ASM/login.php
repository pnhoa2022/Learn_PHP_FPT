<?php
if (isset($_POST['login'])) {
    //Kết nốt DB
    include_once 'includes/dbh.inc.php';

    //Lấy data từ form
    $UserName_Form = $_POST['UserName'];
    $Password_Form = $_POST['Password'];

    //Lấy data từ DB
    $query_select = "SELECT * FROM Users WHERE UserName = '$UserName_Form';";
    $result = $connection->query($query_select);
    if ($result->num_rows === 0) {
        die("Account does not exist");
    } else {
        $data = $result->fetch_array(MYSQLI_ASSOC);
        $Password_DB = $data['Password'];

        if ($Password_DB === $Password_Form) {
            setcookie("UserName", $UserName_Form);
            header("Location: index.php");
        } else {
            die('Invalid password');
        }
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

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

<?php include_once 'includes/nav.inc.php'?>

<div class="container-fluid">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">

                <h3 class="mb-4">Log into the system</h3>

                <form action="login.php" method="post">

                    <div class="form-group">
                        <label for="UserName">User name</label>
                        <input type="text" class="form-control" id="UserName" name="UserName" required>
                    </div>

                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="Password" name="Password" required>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="CheckMeOut">
                        <label class="form-check-label" for="CheckMeOut">Check me out</label>
                    </div>

                    <button type="submit" id="login" name="login" class="btn btn-primary">Login</button>
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
