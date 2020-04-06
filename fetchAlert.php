<?php
include('db_connect.php');



if(isset($_POST['alert'])){
    if ($_POST('alert' != '')) {

        $update_query = "UPDATE ALERT_LOG SET CAT =  WHERE comment_status=0";
        mysqli_query($con, $update_query);

    }
}


?>