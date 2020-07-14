<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php-cookies</title>
</head>

<body>
    <p> ahihi, Cookies nè</p>

    <?php
    $test = 'false';
    if (isset($_COOKIE['test']))
        $test = $_COOKIE['test'];
    echo "The value of the cookies is: $test";
    setcookie('test', 'I love cookies');
    echo '<br>';

    //Set the cookies
    setcookie("cookies['three']", "cookieThree");
    setcookie("cookies['two']", "cookieTwo");
    setcookie("cookies['one']", "cookieOne");

    // after the page reload, print them out
    if (isset($_COOKIE['cookies'])) {
        foreach ($_COOKIE['cookies'] as $name => $value) {
            $name = htmlspecialchars($name);
            $value = htmlspecialchars($value);
            echo "$name : $value <br>";
        }
    }
    ?>
</body>
</html>