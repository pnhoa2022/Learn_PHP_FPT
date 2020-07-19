<?php
session_start();
if (isset($_POST['register'])) {
    //Get data from form
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $FullName = $_POST['FullName'];
    $Type = $_POST['Type'];

    //connect DB
    include_once 'includes/config.php';

    //check duplicate
    $query_select = "select * from Users WHERE UserName = '$UserName';";
    $result_select = $conn->query($query_select);
    if ($result_select->num_rows != 0) {
        $noti = "Account [$UserName] already exists";
    } else {
        //password_hash
        $Password = password_hash($Password, PASSWORD_DEFAULT);

        //insert
        $query_insert = "INSERT INTO Users (UserName, Password, Email, Phone, FullName, Type)
                    VALUES ('$UserName', '$Password', '$Email', '$Phone', '$FullName', $Type);";

        $result_insert = $conn->query($query_insert);

        if (!$result_insert) {
            $noti = "Register fail!";
        } else {
            $noti = "Register complete!";
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
    <title>Register</title>

    <!-- materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- fontawesome -->
    <link rel="stylesheet" href="css/fontawesome-free-5.14.0-web/css/all.css">

    <!-- my style -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


<div class="container">
    <h5 class="center-align" style="color: red">
        <?php echo isset($noti) ? $noti : '' ?>
    </h5>

    <div class="row">
        <div class="section">

            <div class="row center-align">
                <h4>Register</h4>
            </div>

            <form action="register.php" method="post" class="col s12">

                <div class="row">
                    <div class="input-field col s12">
                        <i class="prefix fas fa-user-circle"></i>
                        <input id="FullName" name="FullName" type="text" class="validate">
                        <label for="FullName">Full Name</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <i class="prefix fas fa-key"></i>
                        <input id="UserName" name="UserName" type="text" class="validate">
                        <label for="UserName">User Name</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <i class="prefix fas fa-lock"></i>
                        <input id="Password" name="Password" type="password" class="validate">
                        <label for="Password">Password</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <i class="prefix fas fa-envelope"></i>
                        <input id="Email" name="Email" type="email" class="validate">
                        <label for="Email">Email</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                    </div>

                    <div class="input-field col s6">
                        <i class="prefix fas fa-phone-alt"></i>
                        <input id="Phone" name="Phone" type="tel" class="validate">
                        <label for="Phone">Phone</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <i class="prefix fas fa-user-cog"></i>
                        <select id="Type" name="Type">
                            <option value="">Choose type account</option>
                            <option value=0>Host</option>
                            <option value=1>Admin</option>
                            <option value=2>User</option>
                        </select>
                        <label>Type account</label>
                    </div>
                </div>

                <div class="row center-align">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light" type="submit" name="register" id="register">
                            Register
                            <i class="fas fa-paper-plane"></i>
                        </button>

                        <a href="dashboard.php" class="btn waves-effect waves-light" id="cancel">
                            Cancel
                            <i class="fas fa-times-circle"></i>
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<!--jquery-->
<script src="js/jquery-3.5.1.min.js"></script>

<!--materialize JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src="js/script.js"></script>

</body>
</html>
