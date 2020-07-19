<?php
    require_once '../login.php';

    $connect_mysql = new mysqli($hn, $un, $pw, $db);

    $connect_mysql2 = mysqli_connect($hn, $un, $pw, $db);

    $mysqli_db = mysqli_select_db($connect_mysql, $db);

    if ($connect_mysql) {
        echo 'Connect Complete';
    }
    else {
        die('Connection failed');
    }

    echo '<br>';

    $query = "SHOW TABLES FROM publications";

    $result = $connect_mysql2->query($query);


    if ($result) {
        echo "<br> The tables from the database are: <br><br>";

        $row_count = $result->num_rows;
        echo 'Has '.  $row_count . ' table:' . '<br><br>';

//        while ($row = $result->fetch_row()) {
//            echo "Table: {$row[0]}<br>";
//        }


//        for ($i = 0; $i < $row_count; ++$i) {
//            $row = $result->fetch_row();
//            echo "Table: {$row[0]}<br>";
//        }

        for ($i = 0; $i < $row_count; ++$i) {
            $row = $result->fetch_array();
            echo "Table: {$row[0]}<br>";
        }

        echo '<br><br>';

        
        $field = $result->fetch_field();
        echo $field->name, '<br>';

        $num_fields = mysqli_num_fields($result);
        echo $num_fields;

    } else {
        echo "False";
        exit();
    }



    $connect_mysql->close();
    $connect_mysql2->close();

    echo "<br>> The connection to the database has been closed.<br>"
?>