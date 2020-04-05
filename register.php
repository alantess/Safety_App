<?php
session_start();
require_once('db_connect.php');
$error = false;


// prevent sql injections/ clear user invalid inputs
$username = trim($_POST['username']);
$username = strip_tags($username);
$username = htmlspecialchars($username);

$email = trim($_POST['email']);
$email = strip_tags($email);
$email = htmlspecialchars($email);

$pass = trim($_POST['password']);
$pass = strip_tags($pass);
$pass = htmlspecialchars($pass);

if (empty($username)) {
    $error = true;
    $userError = "Please enter your user name.";
}
if(empty($email)){
    $error = true;
    $emailError = "Please enter your Email Address";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = true;
    $emailError = "Please enter a valid email.";
}

if (empty($pass)) {
    $error = true;
    $passError = "Please enter your password.";
}



$salt = "ThisIsASalt";
$password = hash('sha256', $pass . $salt); // password hashing using SHA256

$query = "SELECT * FROM login where username = '$username' and email ='$email'";
$stid = oci_parse($conn, $query);
oci_execute($stid);
$row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);

// check if return in true
if($row){
    if($row['USERNAME'] === $username){
        $errMSG = "Username already exists";
    }
    if($row['EMAIL'] ===$email){
        $errMSG = 'Email aready exists';
    }
}
// query statement to create a new request
oci_free_statement($stid);

if(!$error){

    // still working on inserting new user to the database
    $query = "INSERT INTO login(USERNAME,EMAIL, PASSWORD) 
               VALUES(':usr', ':email', ':pass')";
    $stid = oci_parse($conn,$query);
    oci_bind_by_name($stid,':usr',$username);
    oci_bind_by_name($stid,':email',$email);
    oci_bind_by_name($stid,':pass',$password);
    oci_execute($stid);
    
    $_SESSION['username'] = $username;
    $_SESSION['loggedin'] = true;
    header('location: home.php');

}else{
    header('location: index.php');
    $errMSG = "Incorrect Credentials, Try again...";
}


// free the query and close the oracle connection
oci_free_statement($stid);
oci_close($conn);

?>