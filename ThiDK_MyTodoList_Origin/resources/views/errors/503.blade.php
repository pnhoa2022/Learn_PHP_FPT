<?php

?>

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Be right back.</title>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">

            @if(count($errors) > 0)
                Be right back.
                <div class="alert alert-danger">
                    <strong>Có lỗi rồi nè</strong>
                    <br><br>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>

            @endif
        </div>
    </div>
</div>
</body>
</html>
