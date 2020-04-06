<?php
require_once('db_connect.php');
session_start();





if(isset($_POST('alert'))){
    $alert = 1;
    $query = "INSERT INTO ALERT_LOG() 
               VALUES(:alert)";
    $stid = oci_parse($conn, $query);
    oci_bind_by_name($stid, ":alert", $alert);
    
    
    oci_execute($stid);
    oci_free_statement($stid);
    oci_close($conn);
}


?>