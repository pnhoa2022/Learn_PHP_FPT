<?php
function computeDiv($num) {
    if ($num === 0) {
        throw new Exception("Division by zero.");
    }
    return 1/$num;
}

try {
    echo computeDiv(0);
} catch (Exception $ex) {
    echo $ex->getMessage() . "<br>";
} finally {
    echo "Finally" . "<br>";
}

echo "Ahihi" . "<br>";
?>

<?php
error_reporting(E_ERROR);
function handle_error($err_no, $err_str, $err_file, $err_line) {
    echo "<b>Error:</b> [$err_no] $err_str - $err_file:$err_line";
    echo "<br>";
    echo "Terminating PHP Script";
    die();
}

//set error handler
set_error_handler("handle_error", E_RECOVERABLE_ERROR);

//trigger error
myFunction();

?>
