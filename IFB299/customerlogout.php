<?php
    session_start();
    session_destroy();
    unset($_SEESION['CUSTOMER_USERNAME']);
    $_SESSION['message'] = "YOU are now logged out";
    header("location: login.php");

?>
