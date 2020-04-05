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

$pass = trim($_POST['password1']);
$pass = strip_tags($pass);
$pass = htmlspecialchars($pass);

$pass2 = trim($_POST['password2']);
$pass2 = strip_tags($pass2);
$pass2 = htmlspecialchars($pass2);


$firstname = trim($_POST['firstname']);
$firstname = strip_tags($firstname);
$firstname = htmlspecialchars($firstname);

$lastname = trim($_POST['lastname']);
$lastname = strip_tags($lastname);
$lastname = htmlspecialchars($lastname);

if (empty($username)|| preg_match('/\s/',$username)|| strlen($username)< 3 || strlen($username) > 20) {
    $error = true;
    $userError = "Please enter valid user name.";
    echo $userError;
}
if(empty($email)){
    $error = true;
    $emailError = "Please enter your Email Address";
    echo $emailError;
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = true;
    $emailError = "Please enter a valid email.";
    echo $emailError;
}

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $pass);
$lowercase = preg_match('@[a-z]@', $pass);
$number    = preg_match('@[0-9]@', $pass);
$specialChars = preg_match('@[^\w]@', $pass);

if (empty($pass)||preg_match('/\s/',$pass) || !$uppercase ||
    !$lowercase || !$number || !$specialChars || strlen($pass) < 8 || strlen($pass) > 20){
    $error = true;
    $passError = "Please enter valid password.";
    echo $passError;
}
if($pass != $pass2){
    $error = true;
    $passError = "Please enter valid password.";
    echo $passError;
}


$salt = "ThisIsASalt";
$password = hash('sha256', $pass . $salt); // password hashing using SHA256


$query = "SELECT * FROM login2 WHERE username = '$username'";
$stid = oci_parse($conn, $query);
oci_execute($stid);
$row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);

// check if return in true
if($row){
    if($row['USERNAME'] === $username){
        $error = true;
        $errMSG = "Username already exists";
    }
    // if($row['EMAIL'] === $email){
    //     $error = true;
    //     $errMSG = 'Email aready exists';
    // }
}
// query statement to create a new request
oci_free_statement($stid);

if(!$error){
    // still working on inserting new user to the database
    $query = "INSERT INTO login2(USERNAME,PASSWORD) 
               VALUES(:usr, :password)";
    $stid = oci_parse($conn,$query);
    // oci_bind_by_name($stid,":id",$id);
    oci_bind_by_name($stid,":usr",$username);
    oci_bind_by_name($stid,":password",$password);
    
    oci_execute($stid);
    echo $username;
    echo $pass ;
    echo $email;

    oci_free_statement($stid);
    $query = "INSERT INTO USERS(FNAME,LNAME,EMAIL)
                VALUES(:fname,:lname,:email)";
    $stid = oci_parse($conn,$query);
    oci_bind_by_name($stid,":fname",$firstname);
    oci_bind_by_name($stid,":lname",$lastname);
    oci_bind_by_name($stid,":email", $email);
    oci_execute($stid);

    print "created new user";
    $_SESSION['username'] = $username;
    $_SESSION['loggedin'] = true;

    // free the query and close the oracle connection
    oci_free_statement($stid);
    // header('location: home.php');


}else{
    // header('location: index.php');
    $errMSG = "Incorrect Credentials, Try again...";
    echo $errMSG;
}



oci_close($conn);

?>