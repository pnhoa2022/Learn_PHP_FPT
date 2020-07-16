<?php
$page_title = '';

$page_notification_message = '';
$page_notification_type = '';
$page_notification_show = '';

if (isset($_POST['AddNew_Edit'])) {
    //Lấy Data từ form:
    $Name_Form = $_POST['Name'];
    $Description_Form = $_POST['Description'];
    $ImageFile_Form = $_FILES['Image'];

    //Xử lý file [Thuộc tính]
    $fileName = $ImageFile_Form['name'];
    $fileType = $ImageFile_Form['type'];
    $fileTempName = $ImageFile_Form['tmp_name'];
    $fileError = $ImageFile_Form['error'];
    $fileSize = $ImageFile_Form['size'];

    //Xử lý file [Đuôi file]
    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array("jpg", "jpeg", "png");

    $file_only_Name = str_replace("." . $fileActualExt, "", $fileName);

    //Hoàn thiện tên file và đường dẫn thư mục
    $imageFullName = $file_only_Name . "." . uniqid("", true) . "." . $fileActualExt;
    $fileDestination = "img/" . $imageFullName;

    if (isset($_POST['IDProduct']) && $_POST['IDProduct'] !== '') {
        $IDProduct = $_POST['IDProduct'];

        $result_move_uploaded_file = move_uploaded_file($fileTempName, $fileDestination);
        if (!$result_move_uploaded_file) {
            $page_notification_message = "Upload file fail!";
            $page_notification_type = 'danger';
            $page_notification_show = 'show';
        }

        include_once 'includes/dbh.inc.php';

        $query_update = "UPDATE Product SET Name = '$Name_Form', Description = '$Description_Form', Image = '$imageFullName' WHERE IDProduct = $IDProduct;";

        $result_update = $connection->query($query_update);

        if (!$result_update) {
            $page_notification_message = "Insert record fail!";
            $page_notification_type = 'danger';
            $page_notification_show = 'show';
        } else {
            //xoá ảnh cũ:
            $Current_Image_fileName = $_POST['Current_Image_fileName'];
            unlink('img/' . $Current_Image_fileName);

            $page_notification_message = "Upload file & Edit record complete!";
            $page_notification_type = 'success';
            $page_notification_show = 'show';
        }
    } else {
        $result_move_uploaded_file = move_uploaded_file($fileTempName, $fileDestination);
        if (!$result_move_uploaded_file) {
            $page_notification_message = "Upload file fail!";
            $page_notification_type = 'danger';
            $page_notification_show = 'show';
        }

        include_once 'includes/dbh.inc.php';

        $query_insert = "INSERT INTO Product (Name, Description, Image)
                            VALUES ('$Name_Form', '$Description_Form', '$imageFullName');";

        $result_insert = $connection->query($query_insert);

        if (!$result_insert) {
            $page_notification_message = "Insert record fail!";
            $page_notification_type = 'danger';
            $page_notification_show = 'show';
        } else {
            $page_notification_message = "Upload file & Insert record complete!";
            $page_notification_type = 'success';
            $page_notification_show = 'show';
        }
    }
}

//Tải data để hiện thị page

$IDProduct = '';
$Name_DB = '';
$Description_DB = '';
$Image_DB = '';

if (isset($_POST['IDProduct']) && $_POST['IDProduct'] !== '') {
    $page_title = 'Edit';

    $IDProduct = $_POST['IDProduct'];

    include_once 'includes/dbh.inc.php';
    $query_select = "SELECT * FROM Product WHERE IDProduct = $IDProduct;";
    $result = $connection->query($query_select);
    $rowData = $result->fetch_array(MYSQLI_ASSOC);

    $Name_DB = $rowData['Name'];
    $Description_DB = $rowData['Description'];
    $Image_DB = $rowData['Image'];
} else {
    $page_title = 'Add New';
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $page_title ?></title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

<?php include_once 'includes/nav.inc.php'?>

<div class="container-fluid">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 ">

                <h3 class="mb-4"><?php echo $page_title ?></h3>

                <form action="AddNew_Edit.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="Name" name="Name" maxlength="128" required
                               value="<?php echo $Name_DB ?>">
                    </div>

                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea class="form-control" id="Description" name="Description" rows="3" maxlength="128"
                                  required><?php echo $Description_DB ?></textarea>
                    </div>

                    <div class="container-fluid m-0 p-0">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Image">New Image</label>
                                    <input type="file" class="form-control-file" id="Image" name="Image" required>
                                </div>
                            </div>

                            <?php
                            if (isset($Image_DB) && $Image_DB !== '') {
                                echo <<<_END
                                <div class="col-md-6">
                                    <label for="Image">Current Image</label>
                                    <img src="img/$Image_DB" class="card-img-top" alt="pic">
                                </div>
_END;
                            }
                            ?>

                        </div>
                    </div>

                    <input type="hidden" id="IDProduct" name="IDProduct" value="<?php echo $IDProduct?>">
                    <input type="hidden" id="Current_Image_fileName" name="Current_Image_fileName" value="<?php echo $Image_DB?>">

                    <button type="submit" id="AddNew_Edit" name="AddNew_Edit"
                            class="btn btn-primary mt-3"><?php echo $page_title ?></button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-8 ">
                <div class="alert alert-<?php echo $page_notification_type ?> alert-dismissible fade <?php echo $page_notification_show ?>" role="alert">
                    <strong><?php echo $page_notification_type ?></strong> <?php echo $page_notification_message ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
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
