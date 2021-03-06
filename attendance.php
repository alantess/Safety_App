<!--attendance -->

<!DOCTYPE html>
<html>
<head>
    <?php
    require_once('db_connect.php');
    include 'includes/head.php';
       ?>
</head>

<body>
    
<header>    
    <?php include 'includes/navbar.php'; ?>
</header>  
<?php 
    
    //Prints out userid of user currently logged in   
     //$userid = $_SESSION['userid'];
     //echo '<p>'.$userid.'</p>';   
    
    
    // Oracle query to select from Student table
    $query = "SELECT s.fname, s.lname FROM student s WHERE s.tid = 100";
    $stid = oci_parse($conn, $query);
    oci_execute($stid);
    $row = oci_fetch_array($stid, OCI_ASSOC);


    
    //Prints out each row resulting from DB Query
     echo "<form method='post' class='col-md-8 mt-5 pt-5 mx-auto w-75'> ";
     while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
                  $fname = $row['FNAME'];
                  $lname = $row['LNAME'];
                  echo "<p><input type='checkbox' name='checklist[]' value='$fname $lname'/>$fname $lname<br>\n </p>";
                };
                
                echo "<p><input class='btn btn-primary btn-lg text-center textInput col-md-4'  type='submit' name='submit' value='Submit'/></p>";
                echo "</form>";
    
    //Oracle Query to update Student table
   // $query = "SELECT * FROM login WHERE username = '$username'and email ='$email'";
    //$stid = oci_parse($conn, $query);
    //oci_execute($stid);


if(isset($_POST["submit"])){
    if(!empty($_POST["checklist"])){
        echo '<h3>Students Accounted For:</h3>';
        foreach($_POST['checklist'] as $checklist){
        echo '<p>'.$checklist.'</p>';
           
        }
    }else{
        echo 'Please Select At Least One Student';
    }
    
}
      
    // free query and close connection
    oci_free_statement($stid);
    oci_close($conn);

?>
    <footer>
        <?php include 'includes/foot.php'; ?>
    </footer>
    </body>
</html>
