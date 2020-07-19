<?php
session_start();

if (isset($_POST['save'])) {
    $UserName = $_POST['UserName'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $FullName = $_POST['FullName'];
    $Type = $_POST['Type'];

    $IDUser = $_POST['IDUser'];

    //connect DB
    include_once 'includes/config.php';

    $query_update = "UPDATE Users 
                        SET UserName = '$UserName', Email = '$Email', Phone = '$Phone', FullName = '$FullName', Type = $Type 
                        WHERE IDUser = $IDUser;";

    $result_update = $conn->query($query_update);

    if ($result_update) {
        $noti = 'Update complete!';
    } else {
        $noti = 'Update fail!';
    }
}

if (isset($_GET['IDUser'])) {
    //get IDUser from form
    $IDUser = $_GET['IDUser'];

    //get data from DB
    include_once 'includes/config.php';
    $query_select = "SELECT * FROM Users WHERE IDUser = $IDUser;";
    $result_select = $conn->query($query_select);
    if ($result_select->num_rows === 1) {
        $rowData = $result_select->fetch_array(MYSQLI_ASSOC);

        $UserName = $rowData['UserName'];
        $Email = $rowData['Email'];
        $Phone = $rowData['Phone'];
        $FullName = $rowData['FullName'];
        $Type = $rowData['Type'];
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
    <title>Edit</title>

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
    <h5 class="center-align" style="color: red"><?php echo isset($noti) ? $noti : '' ?></h5>

    <div class="row">
        <div class="section">

            <div class="row center-align">
                <h4>Edit</h4>
            </div>

            <form action="edit.php?IDUser=<?php echo $IDUser?>" method="post" class="col s12">

                <div class="row">
                    <div class="input-field col s12">
                        <i class="prefix fas fa-user-circle"></i>
                        <input id="FullName" name="FullName" type="text" class="validate" value="<?php echo $FullName?>">
                        <label for="FullName">Full Name</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <i class="prefix fas fa-key"></i>
                        <input id="UserName" name="UserName" type="text" class="validate" value="<?php echo $UserName?>">
                        <label for="UserName">User Name</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <i class="prefix fas fa-envelope"></i>
                        <input id="Email" name="Email" type="email" class="validate" value="<?php echo $Email?>">
                        <label for="Email">Email</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                    </div>

                    <div class="input-field col s6">
                        <i class="prefix fas fa-phone-alt"></i>
                        <input id="Phone" name="Phone" type="tel" class="validate" value="<?php echo $Phone?>">
                        <label for="Phone">Phone</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <i class="prefix fas fa-user-cog"></i>
                        <select id="Type" name="Type" >
                            <option value="">Choose type account</option>
                            <option <?php echo $Type == 0 ? 'selected' : ''?> value=0>Host</option>
                            <option <?php echo $Type == 1 ? 'selected' : ''?> value=1>Admin</option>
                            <option <?php echo $Type == 2 ? 'selected' : ''?> value=2>User</option>
                        </select>
                        <label>Type account</label>
                    </div>
                </div>

                <div class="row center-align">
                    <div class="input-field col s12">
                        <input type="hidden" name="IDUser" value="<?php echo $IDUser?>">

                        <button class="btn waves-effect waves-light" type="submit" name="save" id="save">
                            Save
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
