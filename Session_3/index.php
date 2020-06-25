<?php
    echo 8/3, "<br>";
    echo intdiv(8, 3), "<br>";

    echo 2 <=> 3, "<br>";

    $x = 5;
    $y = 10;
    echo $x . " <=> " . $y . " is: ", $x <=> $y, "<br>";

//    $first_name = "Hieu";
    $name = $first_name ?? "Guest";
    echo $name, "<br>";

    $d = new Boston();
    $d->say();

    //Snippet_9
    class Greetings {
        private $word = "Hello";
    }

    $closure = function($whom) {
        echo "$this->word $whom", "<br>";
    };

    $obj = new Greetings();

    $closure->call($obj, "John");
    $closure->call($obj, "Kevin");


    srand();
    function random_numbers ($k) {
        for ($i = 0; $i < $k; $i++) {
            $r = rand(1, 10);
            yield $r;
        }
        return -1;
    }

    $rns = random_numbers(10);
    foreach ($rns as $item) {
        echo $item, "<br>";
    }
    echo $rns->getReturn(), "<br>";

    //Snippet_9
    function f1() {
        yield from f2();
        yield "f1() 1";
        yield "f1() 2";
        yield from [3, 4];
        yield "f1() 3";
        yield "f1() END";
    }
    function f2() {
        yield "f2() 1";
        yield "f2() 2";
        yield "f2() 3";
        yield "f2() END";
    }
    $f1 = f1();
    foreach ($f1 as $item) {
        echo $item, "<br>";
    }

    $path = "/foo/bar/bat/baz";

    echo dirname($path, 2);
?>

<?php

    class Boston {
        function say() {
            echo "hihi Boston" , "<br>";
        }
    }

?>
