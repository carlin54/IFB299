<?php
    session_start();
    session_destroy();
    unset($_SEESION['EMPLOYEE_USERNAME']);
    $_SESSION['message'] = "YOU are now logged out";
    header("location: loginstaff.php");
    
?>
