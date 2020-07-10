<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_errno) {
        die('Fatal Error');
    }
    else {
        echo 'Well Done! Connected to database.' . '<br> <br>';
    }

    $query = 'SELECT * FROM classics';
    $result = $conn->query($query);
    if (!$result) die('Querry Execute Error');

    $rows = $result->num_rows;

//    for ($i = 0; $i < $rows; ++$i) {
//        $result->data_seek($i);
//        echo 'Author: ' . $result->fetch_assoc()['author'] . '<br>';
//
//        $result->data_seek($i);
//        echo 'Title: ' . $result->fetch_assoc()['title'] . '<br>';
//
//        $result->data_seek($i);
//        echo 'Category: ' . $result->fetch_assoc()['category'] . '<br>';
//
//        $result->data_seek($i);
//        echo 'Year: ' . $result->fetch_assoc()['year'] . '<br>';
//
//        $result->data_seek($i);
//        echo 'isbn: ' . $result->fetch_assoc()['isbn'] . '<br> <br>';
//    }

    for ($i = 0; $i < $rows; ++$i) {
        $row = $result->fetch_array(MYSQLI_ASSOC);

        echo 'Author: ' . $row['author'] . '<br>';

        echo 'Title: ' . $row['title'] . '<br>';

        echo 'Category: ' . $row['category'] . '<br>';

        echo 'Year: ' . $row['year'] . '<br>';

        echo 'isbn: ' . $row['isbn'] . '<br> <br>';
    }

    $result->close();
    $conn->close();
?>