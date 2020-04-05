<?php
    session_start();
    
    // empty session variables 
    $_SESSION = array();
    // destroy current session
    session_destroy();

    // relocate to login
    header('location: index.php');
    exit;

?>