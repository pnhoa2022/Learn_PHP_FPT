<?php
//Kết nốt đến DataBase:
    require_once '../../login.php';
    $connection = new mysqli($hn, $un, $pw, $db);

    if ($connection) {
        echo 'Kết nốt thành công | Chọn DB cũng thành công. Ahihi. <br><br>';
    } else {
        die('Lỗi kết nối tới DataBase. <br><br>');
    }

//Xử lý XOÁ
    if (isset($_POST['delete']) && isset($_POST['isbn'])) {
        $isbn = get_post($connection, 'isbn');

        $query_delete = "DELETE FROM classics WHERE isbn = '$isbn'";
        $result = $connection->query($query_delete);

        if ($result) echo "<b>[THÔNG BÁO]</b> Xoá thành công bản ghi có mã : $isbn";
        else echo "<b>[THÔNG BÁO]</b> Lỗi khi xoá bản ghi có mã : $isbn";
    }

//Xử lý THÊM MỚI
    if (isset($_POST['author']) && isset($_POST['title']) && isset($_POST['category']) &&
            isset($_POST['year']) && isset($_POST['isbn'])) {

        $author = get_post($connection, 'author');
        $title = get_post($connection, 'title');
        $category = get_post($connection, 'category');
        $year = get_post($connection, 'year');
        $isbn = get_post($connection, 'isbn');

        $query_insert = "INSERT INTO classics (author, title, category, year, isbn)
                VALUES ('$author', '$title', '$category', $year, '$isbn')";

        $result =  $connection->query($query_insert);

        if ($result) {
            echo '<b>[THÔNG BÁO]</b> Thêm bản ghi thành công';
        } else {
            echo '<b>[THÔNG BÁO]</b> Lỗi khi thêm bản ghi';
            mysqli_error();
        }
    }

//FORM Thêm dữ liệu
    echo <<<_END
    <h3>Nhập dữ liệu nào cưng ơi</h3>
    <form action="index.php" method="post">
        <pre>
  author <input name="author" id="author" type="text">
  
   title <input name="title" id="title" type="text">
   
category <input name="category" id="category" type="text">

    year <input name="year" id="year" type="text">
    
    isbn <input name="isbn" id="isbn" type="text">
    
         <input name="submit" id="submit" type="submit" value="ADD RECORD">
        </pre>
    </form>
_END;

//Hiện thị dũ liệu
    echo '<table border="1" bgcolor="aqua">';
    echo '<tr>';
    echo '<th>author</th> <th>title</th> <th>category</th> <th>year</th> <th>isbn</th>';
    echo '<DBQUERY q> SELECT * FROM classics';
    echo '<DBROW><tr><td><? q.author></td> <td><? q.title></td> <td><? q.category></td> <td><? q.year></td> <td><? q.isbn></td></tr>';
    echo '</DBQUERY>';
    echo '</tr>';
    echo '</table>';

    $query_select = 'SELECT * FROM classics';
    $result = $connection->query($query_select);
    if (!$result) die('Lỗi khi lấy dữ liệu');

    $num_rows = $result->num_rows;

    if ($num_rows == 0) echo '<h5>Không có bản ghi nào</h5>';
    else echo '<h4>Danh sách bản ghi:</h4>';

    for ($i = 0; $i < $num_rows; ++$i) {
        $row = $result->fetch_array(MYSQLI_ASSOC);

        $author = $row['author'];
        $title = $row['title'];
        $category = $row['category'];
        $year = $row['year'];
        $isbn = $row['isbn'];

        echo <<<_END
<pre>
      author : $author
       title : $title
    category : $category
        year : $year
        isbn : $isbn
</pre>
    <form action="index.php" method="post">
        <input type="hidden" name="delete" value="yes">
        <input type="hidden" name="isbn" value="$isbn">
        <input type="submit" value="DELETE RECORD">
    </form>
<br>
_END;
    }

//Đóng kết nối
    $connection->close();

//Xử lý chuỗi nhập vào từ Form
    function get_post($conn, $var) {
        return mysqli_real_escape_string($conn, $_POST[$var]);
    }
?>
