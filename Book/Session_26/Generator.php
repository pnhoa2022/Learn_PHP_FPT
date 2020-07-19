<?php
function print_range_of_values ($min_val, $max_val) {
    for ($i = $min_val; $i <= $max_val; $i++) {
        yield $i;
    }
}
foreach (print_range_of_values(1, 10) as $key => $value) {
    echo "$key => $value", '<br>';
}
?>