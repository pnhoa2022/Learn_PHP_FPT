<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo AJAX 2</title>
</head>
<body>
<div>
    <label for="input"></label>
    <input type="text" name="input" id="input" placeholder="Nhập vào đi cưng ơi!" onkeyup="ajaxFunction2(this.value)">
</div>

<div>
    <p>Bạn vừa nhập: <span id="output"></span></p>
</div>


<script type="text/javascript">
    function ajaxFunction2(input) {
        var xmlHttp;

        //Kiểm tra và khởi tạo đối tượng XmlHttpRequest
        if (window.XMLHttpRequest) {
            xmlHttp = new XMLHttpRequest();
        } else {
            xmlHttp = ActiveXObject('Microsoft.XMLHTTP');
        }

        //Kiểm tra trạng thái & Tiếp nhận yêu cầu
        xmlHttp.onreadystatechange = function () {
            if (xmlHttp.readyState === 4) {
                // document.getElementById('output').innerText = input;
                document.getElementById('output').innerText = xmlHttp.responseText;
            }
        }

        xmlHttp.open('GET', 'process.php?q=' + input ,true)
        xmlHttp.send(null);
    }
</script>
</body>
</html>