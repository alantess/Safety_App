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

$firstname = $_POST('firstname');
$lastname = $_Post('lastname');

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


$query = "SELECT * FROM login2 WHERE username = '$username' and email ='$email'";
$stid = oci_parse($conn, $query);
oci_execute($stid);
$row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);

// check if return in true
if($row){
    if($row['USERNAME'] === $username){
        $error = true;
        $errMSG = "Username already exists";
    }
    if($row['EMAIL'] === $email){
        $error = true;
        $errMSG = 'Email aready exists';
    }
}
// query statement to create a new request
oci_free_statement($stid);

// $query = "SELECT * FROM login";
// $stid = oci_parse($conn,$query);
// oci_execute($stid);


if(!$error){
    // still working on inserting new user to the database
    $query = "INSERT INTO login2(USERNAME,PASSWORD,EMAIL) 
               VALUES(:usr, :password, :email)";
    $stid = oci_parse($conn,$query);
    // oci_bind_by_name($stid,":id",$id);
    oci_bind_by_name($stid,":usr",$username);
    oci_bind_by_name($stid,":password",$password);
    oci_bind_by_name($stid, ":email", $email);
    oci_execute($stid);
    echo $username;
    echo $pass ;
    echo $email;
    
    print "created new user";
    $_SESSION['username'] = $username;
    $_SESSION['loggedin'] = true;

    // free the query and close the oracle connection
    oci_free_statement($stid);
    // header('location: home.php');


}else{
    // header('location: index.php');
    $errMSG = "Incorrect Credentials, Try again...";
}



oci_close($conn);

?>