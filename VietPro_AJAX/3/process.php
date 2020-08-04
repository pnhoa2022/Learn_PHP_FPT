<?php

if (isset($_GET['n']) && $_GET['n'] !== '') {
    if (isset($_GET['q']) && $_GET['q'] !== '') {

        $nguon_bao = $_GET['n'];
        $input = $_GET['q'];

        $xml_link = $nguon_bao . $input . '.rss';

        $xmlDoc = simplexml_load_file($xml_link);

        $title = $xmlDoc->channel->title;
        $link = 'https://vnexpress.net/' . $input;
        $description = $xmlDoc->channel->description;

        echo '<a target="_blank" href="' . $link . '">' . '<h2> ' . $title . '</h2>' . '</a>' . '<br>';
        echo $description . '<hr>';

        $items = $xmlDoc->channel->item;

        foreach ($items as $item) {
            echo '<a target="_blank" href="' . $item->link . '">' . '<h3>' . $item->title . '</h3>' . '</a>' . '<br>';
            echo $item->description . '<br>';
            echo $item->pubDate . '<br>';
            echo '<hr>';
        }
    } else {
        echo '<h4 style="color: red">' . '> NOTI: Chưa chọn tin tức' . '</h4>';
    }
} else {
    echo '<h4 style="color: red">' . '> NOTI: Chưa chọn nguồn báo' . '</h4>';
}

?>