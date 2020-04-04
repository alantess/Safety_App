<?php
session_start();
require_once('db_connect.php');
$error = false;


// prevent sql injections/ clear user invalid inputs
$username = trim($_POST['username']);
$username = strip_tags($username);
$username = htmlspecialchars($username);

// $email = trim($_POST['email']);
// $email = strip_tags($email);
// $email = htmlspecialchars($email);

$pass = trim($_POST['password']);
$pass = strip_tags($pass);
$pass = htmlspecialchars($pass);
// prevent sql injections / clear user invalid inputs

if (empty($username)) {
    $error = true;
    $userError = "Please enter your user name.";
}

if (empty($pass)) {
    $error = true;
    $passError = "Please enter your password.";
}


if (!$error) {

    $salt = "ThisIsASalt";
    $password = hash('sha256', $pass.$salt); // password hashing using SHA256
    
    $query = "SELECT * FROM login where username = '$username' and password = $pass";
    $stid = oci_parse($conn, $query);
    oci_execute($stid);
    $row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);

    // if($row['password'] == $password){
    if($row > 1){
        
        $_SESSION['username'] = $row['username'];
        $_SESSION['loggedin']=true;
        header("location:home.php");
        echo [$row];
    }else{
        $errMSG = "Incorrect Credentials, Try again...";
    }

}else{
    header('location:index.php');
}



// if ($row > 1) {
//     $_SESSION['username'] = $username;
//     $_SESSION['success'] = "You are now logged in";
//     header('location: home.php');
// } else {
//     echo 'INCORRECT INFORMATION ';
// }


oci_free_statement($stid);
oci_close($conn);


?>