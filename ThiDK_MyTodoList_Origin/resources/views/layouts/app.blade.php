<?php

?>

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">

    <title>My Todo List [Hieu iceTea]</title>
</head>
<body>
    <div class="container">
        <div class="navbar navbar-default">
            {{-- navbar content --}}
        </div>
    </div>

    @yield('content')
</body>
</html>
