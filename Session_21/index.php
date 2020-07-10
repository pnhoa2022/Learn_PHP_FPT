<?php
    session_start();

    echo "The session ID is: " . session_id() . '<br>';

    $_SESSION['myName'] = "Hieu iceTea";

    echo $_SESSION['myName']; echo '<br>';

    //session_unset(); //Free all session variables
    //session_destroy(); //Destroys all data registered to a session

    echo "The session ID is: " . session_id() . '<br>'; echo '<br>';
    echo $_SESSION['myName']; echo '<br>';

?>
