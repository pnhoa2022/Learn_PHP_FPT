<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    echo 'Today is: ' . date('l d/m/yy h:i:s a');


    $Today_Date = getdate();
    $current_month = $Today_Date['month'];

    echo '<br>';
    echo 'Current month is: ';
    echo $current_month, '<br>';

    $num1 = 0;

    if ($num1 == 0) {
        echo 'Chia cho 0';
        trigger_error('Khong the chia cho 0');
//        set_error_handler('hihi');
//        error_reporting(E_USER_ERROR);
    }

    function increment(&$num) {
        $num++;
    }

    $num2 = 11;

    increment($num2);

    echo $num2;
?>
