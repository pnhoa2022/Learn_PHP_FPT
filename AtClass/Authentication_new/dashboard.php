<?php
session_start();

if (isset($_POST['edit'])) {
    $IDUser = $_POST['IDUser'];

    header("Location: edit.php?IDUser=$IDUser");
}

if (isset($_POST['delete'])) {
    $IDUser = $_POST['IDUser'];

    include_once 'includes/config.php';

    $query_delete = "UPDATE Users SET Enabled = FALSE WHERE IDUser = $IDUser;";
    $result_delete = $conn->query($query_delete);

    if (!$result_delete) {
        $noti = 'Delete fail!';
    } else {
        $noti = 'Delete complete!';
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
    <title>Document</title>

    <!-- materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- fontawesome -->
    <link rel="stylesheet" href="css/fontawesome-free-5.14.0-web/css/all.css">

    <!-- my style -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php
if (isset($_COOKIE['username'])) {
    $user = $_COOKIE['username'];
    $type = $_COOKIE['type'];
}

if (isset($_SESSION['user'])) {
    $type = $_SESSION['type'];
    $user = $_SESSION['user'];
}

if (!isset($user)) {
    echo "Unauthorized access. Please <a href='login.php'>Login</a>";
    die();
}
$disabled = '';

if ($type != 0) {
    $disabled = 'disabled';
}

$Type_array = array("Host", "Admin", "User");
?>

<div class="container">
    <h5 class="center-align" style="color: red"><?php echo isset($noti) ? $noti : '' ?></h5>

    <h5 class="center-align" style="color: red">
        Welcome <?php echo $user; ?>
        <br>
        You are <?php echo $Type_array[$type]; ?>
        <br>
        <a href="logout.php" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
    </h5>

    <div class="row">
        <div class="section">
            <h5>Dashboard</h5>
        </div>
        <div class="divider"></div>
    </div>

    <div class="row">
        <div class="col s3">
            <div class="section">
                <h5>Menu</h5>
                <div class="divider"></div>

                <ul>
                    <li><a href="">Quản lý tài khoản</a></li>
                    <li><a href="">Quản lý đơn hàng</a></li>
                    <li><a href="">Quản lý kho</a></li>
                    <li><a href="">Thiết lập giao diện</a></li>
                    <li><a href="">Cài đặt chung</a></li>
                </ul>
            </div>
        </div>

        <div class="col s9">
            <div class="section">
                <h5>
                    List
                        <a <?php echo $disabled?> style="float: right;" href="register.php" class="btn-floating btn-small cyan pulse">
                            <i class="fas fa-user-plus"></i>
                        </a>
                </h5>

                <div class="divider"></div>

                <table class="highlight">
                    <thead>
                    <tr>
                        <th>IDUser</th>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>Type</th>
                        <th>Function</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php
                    include_once 'includes/config.php';
                    $query_select = "select * from Users WHERE Enabled = TRUE";
                    $result_select = $conn->query($query_select);
                    while ($rowData = $result_select->fetch_array(MYSQLI_ASSOC)) {
                        //get data from DB:
                        $IDUser = $rowData['IDUser'];
                        $UserName = $rowData['UserName'];
                        $Password = $rowData['Password'];
                        $Email = $rowData['Email'];
                        $Phone = $rowData['Phone'];
                        $FullName = $rowData['FullName'];
                        $Type = $rowData['Type'];

                        echo <<<_END
                    <tr>
                        <td>$IDUser</td>
                        <td>$UserName</td>
                        <td>$FullName</td>
                        <td>$Type_array[$Type]</td>
                        <td>
                            <form action="dashboard.php" method="post">

                                <button type="submit" name="edit" $disabled>
                                    <i class="fas fa-edit"></i>
                                </button>

                                <button type="submit" name="delete" $disabled onclick="return confirm('Are you sure you want to delete this item?')">
                                    <i class="far fa-trash-alt"></i>
                                </button>

                                <input type="hidden" name="IDUser" value="$IDUser">
                            </form>
                        </td>
                    </tr>
_END;
                    }
                    ?>



                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

<!--materialize JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>