<?php
    if(isset($_POST['submit'])) {

        //Lấy  dữ liệu từ POST
        $newFileName = $_POST['filename'];
        $imageTitle = $_POST['filetitle'];
        $imageDesc = $_POST['filedesc'];
        $file = $_FILES['file'];

        //Xử lý dữ liệu [Tên file]
        if (empty($newFileName)) {
            $newFileName = 'gallery';
        } else {
            $newFileName = strtolower(str_replace(" ", "-", $newFileName));
        }

        //Xử lý dữ liệu [chi tiết thuộc tính file]
        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileTempName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];

        //Xử lý dữ liệu [đuôi file]
        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array("jpg", "jpeg", "png");

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 3000000) {
                    $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
                    $fileDestination = "../img/gallery/" . $imageFullName;

                    include_once "dbh.inc.php";
                    if (empty($imageTitle) || empty($imageDesc)) {
                        echo "upload empty";
                        //header("Location: ../gallery.php?upload=empty");
                        exit();
                    } else {
                        $query_select = "SELECT * FROM gallery;";
                        $connection = new mysqli($hn, $un, $pw, $db);
                        $stmt = $connection->stmt_init();
                        if (!$stmt->prepare($query_select)) {
                            echo "SQL Statment failed!";
                        } else {
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $rowCount = $result->num_rows;
                            $setImageOrder = $rowCount + 1;

                            $query_insert = "INSERT INTO gallery
                                                (titleGallery, descGallery, imgFullNameGallery, orderGallery)
                                                VALUES (?, ?, ?, ?);";
                            if (!$stmt->prepare($query_insert)) {
                                echo "SQL Statment failed!";
                            } else {
                                $stmt->bind_param("ssss", $imageTitle, $imageDesc, $imageFullName, $setImageOrder);
                                $stmt->execute();

                                move_uploaded_file($fileTempName, $fileDestination);

                                echo "upload success";
                                //header("Location: ../gallery.php?upload=success");
                            }
                        }
                    }
                } else {
                    echo "File size is too big!";
                    exit();
                }
            } else {
                echo "You had an error!";
                exit();
            }
        } else {
            echo "You need to upload a proper file type!";
            exit();
        }
    }
?>