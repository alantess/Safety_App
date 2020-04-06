<?php
require_once('db_connect.php');
session_start();

if(isset($_POST('alert'))){
    $alert = 1;
    $t_start = date(DATE_RFC822);
    $query = "INSERT INTO ALERT_LOG(CAT,T_START) 
               VALUES(:cat,:t_start)";
    $stid = oci_parse($conn, $query);
    oci_bind_by_name($stid, ":cat", $alert);
    oci_bind_by_name($stid,':t_start',$t_start);
    
    oci_execute($stid);
    oci_free_statement($stid);
    oci_close($conn);
}
?>