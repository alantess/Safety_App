<?php
require_once('../db_connect.php');
session_start();

$data =array(
    'name'=> $_SESSION['username'],
    'level'=> $_SESSION['userlevel'],
    
);

echo json_encode($data);

?>