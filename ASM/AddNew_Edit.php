<?php
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

<div class="container-fluid">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 ">

                <h3 class="mb-4">Add new</h3>

                <form action="AddNew_Edit.php" method="post">

                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="Name" name="Name" maxlength="128" required>
                    </div>

                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea class="form-control" id="Description" rows="3" maxlength="128" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="Password">Image</label>
                        <input type="file" class="form-control-file" id="Image" name="Image" required>
                    </div>

                    <button type="submit" id="Insert" name="Insert" class="btn btn-primary mt-3">Insert</button>
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
