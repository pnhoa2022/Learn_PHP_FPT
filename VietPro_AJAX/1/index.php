<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo Ajax</title>
</head>
<body>
<form>
    <input type="button" value="Get data" onclick="ajaxFunction()">
</form>

<div id="data">

</div>

<script type="text/javascript">

    function ajaxFunction() {
        var xmlHttp;

        //Khởi tạo đối tượng XML_HttpRequest
        if (window.XMLHttpRequest) { //IE 10 trở lên, Fire Fox, Safari, Chrome
            xmlHttp = new XMLHttpRequest();
        } else { //Dưới IE 10
            xmlHttp = new ActiveXObject('Microsoft.XMLHTTP')
        }

        //Tiếp nhận dữ liệu
        xmlHttp.onreadystatechange = function () {
            if (xmlHttp.readyState === 4) {
                document.getElementById('data').innerHTML = xmlHttp.responseText;
            }
        }

        //Gửi yêu cầu
        xmlHttp.open('GET', 'process.php', true);
        xmlHttp.send();
    }
</script>
</body>
</html>








