<?php
    require_once 'includes/dbh.inc.php';
    $connection = new mysqli($hn, $un, $pw, $db);

    if ($connection->connect_error)
        die('Fatal error');

    if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
        $un_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_USER']);
        $pw_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_PW']);

        $query = "SELECT * FROM Users WHERE UserName = '$un_temp';";
        $result = $connection->query($query);

        if (!$result)
            die("user not found");
        elseif ($result->num_rows) {

            $rowData = $result->fetch_array(MYSQLI_NUM);

            $result->close();

            //Lấy data từ DB:
            $IDUser = $rowData[0];
            $UserName = $rowData[1];
            $Password = $rowData[2];
            $Email = $rowData[3];
            $Phone = $rowData[4];
            $FullName = $rowData[5];

            //Kiểm tra password
            if (password_verify($pw_temp, $Password))
                echo htmlspecialchars("$IDUser $UserName : Hi $IDUser, you are now logged in as '$UserName'");
            else
                die("Invalid userName/password combination");
        } else
            die("Invalid userName/password combination");
    } else {
        header('WWW-Authenticate: Basic realm="Restricted Area"');
        header('HTTP/1.0 401 Unauthorized');
        die ("Please enter your username and password");
    }

    $connection->close();

    //Common function

    function mysql_entities_fix_string($connection, $string) {
        return htmlentities(mysql_fix_string($connection, $string));
    }

    function mysql_fix_string($connection, $string) {
        if (get_magic_quotes_gpc())
            $string = stripcslashes($string);
        return $connection->real_escape_string($string);
    }
?>