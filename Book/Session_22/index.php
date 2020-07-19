<?php

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Email</title>
</head>
<body>

<?php
$to = "Hieu.iceTea@gmail.com";
$from = "DinhHieu8896@gmail.com";
$subject = "Test E-Mail PHP";
$body = "This is an example for showing the usage of the mail() function.";

$send = mail($to, $subject, $body, $from);

if ($send) {
    echo "Mail sent to $to address!";
} else {
    echo "Mail could not be sent to $to address!";
}

?>

</body>
</html>