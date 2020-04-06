<!--user login -->

<?php
session_start();
require_once('db_connect.php');
$error = false;

// prevent sql injections/ clear user invalid inputs
$username = trim($_POST['username']);
$username = strip_tags($username);
$username = htmlspecialchars($username);

$pass = trim($_POST['password']);
$pass = strip_tags($pass);
$pass = htmlspecialchars($pass);

if (empty($username)) {
    $error = true;
    $userError = "Please enter your user name.";
}


if (empty($pass)) {
    $error = true;
    $passError = "Please enter your password.";
}


if (!$error) {

    // salting and hashing passwords
    $salt = "ThisIsASalt";
    $password = hash('sha256', $pass.$salt); // password hashing using SHA256
    
    // oracle query
    $query = "SELECT * FROM login where username = '$username' and password = '$password'";
    $stid = oci_parse($conn, $query);
    oci_execute($stid);
    $row = oci_fetch_array($stid, OCI_ASSOC);

    echo $row['PASSWORD'];
    // check query return
    if($row['PASSWORD'] === $password){
        $_SESSION['username'] = $row['USERNAME'];
        $_SESSION['loggedin']=true;
        header("location:home.php");
    }else{
        header('location: index.php');
        $errMSG = "Incorrect Credentials, Try again...";
    }

}

// free query and close connection
oci_free_statement($stid);
oci_close($conn);

?>