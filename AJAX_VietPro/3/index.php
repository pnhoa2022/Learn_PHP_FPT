<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo AJAX 3</title>
</head>
<body>
<div>
    <form>
        <label for="nguon_bao">Nguồn báo</label>
        <select name="nguon_bao" id="nguon_bao" onchange="showFunction()">
            <option value="">-- Chọn nguồn báo --</option>
            <option value="https://vnexpress.net/rss/">Vn Express</option>
            <option value="https://tuoitre.vn/rss/">Tuổi trẻ</option>
            <option value="https://vietnamnet.vn/rss/">Vietnam Net</option>
            <option value="https://baodautu.vn/">Báo đầu tư</option>
        </select>

        <br><br>

        <label for="input">Loại tin tức</label>
        <select name="input" id="input" onchange="showFunction()">
            <option value="">-- Chọn tin tức muốn hiện thị --</option>
            <option value="tin-moi-nhat">Tin mới nhất</option>
            <option value="thoi-su">Thời sự</option>
            <option value="the-gioi">Thế giới</option>
            <option value="the-thao">Thể thao</option>
            <option value="suc-khoe">Sức khỏe</option>
            <option value="du-lich">Du lịch</option>
            <option value="so-hoa">Số hóa</option>
            <option value="khoa-hoc">Khoa học</option>
            <option value="giai-tri">Giải trí</option>
            <option value="cuoi">Cười</option>
        </select>
    </form>
</div>

<div id="output">

</div>

<script type="text/javascript">
    function showFunction() {
        var xmlHttp;

        //Kiểm tra và tạo dối tượng xmlHttpRequest
        if (window.XMLHttpRequest) {
            xmlHttp = new XMLHttpRequest();
        } else {
            xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
        }

        //Kiểm tra trạng thái & Nhận dữ liệu trả về
        xmlHttp.onreadystatechange = function () {
            if (xmlHttp.readyState === 4) {
                document.getElementById('output').innerHTML = xmlHttp.responseText;
            }
        }

        var input = document.getElementById('input').value;
        var nguon_bao = document.getElementById('nguon_bao').value;

        //Gửi request
        xmlHttp.open('get', 'process.php?q=' + input + '&n=' + nguon_bao, true);
        xmlHttp.send();
    }
</script>
</body>
</html>