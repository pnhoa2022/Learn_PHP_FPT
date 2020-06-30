<?php
    $arr1 = array('hihi', 'hehe', 'haha');
    $arr2 = array( 1 => 'hihi', 5 => 'hehe', 10 => 'haha');
    $arr3 = array( 'a' => 'hihi', 'b' => 'hehe', 10 => 'haha');

    $arr4[0] = 'hihi';
    $arr4[1] = 'haha';

    echo $arr2[5], '<br>';
    echo $arr3['b'], '<br>';
    echo $arr4[2], '<br>';


    for ($i = 0; $i < count($arr4); ++$i) {
        $rec = each($arr4);
        echo "$rec[key] $rec[value]";

        echo '<br>';
    }
    echo '<br>';

    $array_merge =  array_merge($arr1, $arr2);

    foreach ($array_merge as $item) {
        $rec = each($array_merge);
        echo "$rec[key] $rec[value]";

        echo '<br>';
    }

    $arr_multi = array( array('haha', 'hihi'), array('huhu', 'hic hic'), array('woa', 'lala'));

    echo $arr_multi[1][1];
?>