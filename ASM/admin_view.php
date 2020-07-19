<?php
if (!isset($_COOKIE['UserName']) && !isset($_SESSION['user'])) {
    header("Location: login.php");
}

if (isset($_POST['Delete'])) {
    //Lấy data từ form
    $IDProduct = $_POST['IDProduct'];

    //Cập nhật DB
    include_once 'includes/dbh.inc.php';
    $query_delete = "UPDATE Product SET Enabled = FALSE WHERE IDProduct = $IDProduct;";
    $result_delete = $connection->query($query_delete);

    if (!$result_delete) {
        die('Delete fail!');
    }

    //xoá ảnh
    $Image = $_POST['Image'];
    unlink('img/' . $Image);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin view</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>


<?php include_once 'includes/nav.inc.php'?>


<div class="container-fluid">
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <h3 class="d-inline">[ADMIN] List of products</h3>

                <form action="AddNew_Edit.php" method="post" class="d-inline float-right">
                    <button type="submit" id="AddNew" name="AddNew" class="btn btn-success">Add New</button>
                </form>

            </div>
        </div>


        <div class="row mb-2 mt-3">
            <div class="col-md-12">
                <form method="get" class="form-inline my-2 my-lg-0">
                    <input name="Filter" id="Filter" class="form-control mr-sm-2" type="search" placeholder="Search"
                           aria-label="Search">
                    <button id="Search" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>

        <div class="row">

            <?php
            include_once 'includes/dbh.inc.php';

            if (isset($_GET['Filter'])) {
                $Filter = $_GET['Filter'];
                $query_select = "SELECT * FROM Product WHERE Enabled = TRUE AND Name LIKE '%$Filter%';";
            } else {
                $query_select = "SELECT * FROM Product WHERE Enabled = TRUE;";
            }

            $result = $connection->query($query_select);

            while ($rowData = $result->fetch_array(MYSQLI_ASSOC)) {
                $IDProduct = $rowData['IDProduct'];
                $Name = $rowData['Name'];
                $Description = $rowData['Description'];
                $Image = $rowData['Image'];

                echo <<<_END
                <div class="col-md-4 mt-3 mb-3">
                    <div class="card">
                        <img src="img/$Image" class="card-img-top" alt="pic">
                        <div class="card-body">
                            <h5 class="card-title">$Name</h5>
                            <p class="card-text">$Description</p>
                            
                            <form action="AddNew_Edit.php" method="post" class="d-inline">
                                <input type="hidden" name="IDProduct" value="$IDProduct">
                                <button type="submit" id="Edit" name="Edit" class="btn btn-success">Edit</button>
                            </form>
                
                            <form method="post" class="d-inline">
                                <input type="hidden" name="delete" value="yes">
                                <input type="hidden" name="IDProduct" value="$IDProduct">
                                <input type="hidden" name="Image" value="$Image">
                                <button type="submit" id="Delete" name="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
_END;
            }
            ?>

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
