<!--attendance -->
<!DOCTYPE html>
<html>

<head>
    <?php
    require_once('db_connect.php');
    include 'includes/head.php'; ?>
</head>

<body>
    <header>
        <?php include 'includes/navbar.php'; ?>
    </header>
    <?php

    // oracle query
    $query = "SELECT s.fname, s.lname FROM student s WHERE s.TID = 100";
    $stid = oci_parse($conn, $query);
    oci_execute($stid);
    $row = oci_fetch_array($stid, OCI_ASSOC);

    // Fetch the results of the query
    //while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
    //  $fname = $row['FNAME'];
    //$lname = $row['LNAME'];
    //print "<tr>\n";
    //foreach ($row as $item) {
    //    print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    //}
    //print "</tr>\n";

    //JavaScript for list creation
    echo '<script type="text/JavaScript">
           
           
            </script>';

    //Prints out each row resulting from DB Query



    echo "<form method='post' class='col-md-8 mt-5 pt-5 mx-auto w-75'> ";

    while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {

        $fname = $row['FNAME'];
        $lname = $row['LNAME'];

        echo "<p>
        <input type='checkbox' name='checklist[]' value='$fname'/>
        <label for='checklist[]'>$fname $lname</label><br>\n </p>";
    };

    echo "<p><input type='submit' name='submit' value='Submit'/></p>";


    echo "</form>";

    //echo $fname." ";
    //echo $lname."<br>\n";


    //}

    // echo "<form method='post'>
    //       <p><input type='submit' name='submit' value='Submit'/></p>
    //   </form>";


    if (isset($_POST["submit"])) {
        if (!empty($_POST["checklist"])) {
            echo '<h3>You Selected The Following Students:</h3>';
            foreach ($_POST['checklist'] as $checklist) {
                echo '<p>' . $checklist . '</p>';
            }
        } else {
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