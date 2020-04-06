<?php
include('db_connect.php');

if(isset($_POST['alert'])){
    $query = "SELECT * FROM ALERT_LOG WHERE T_END = NULL";
    $stid = oci_parse($conn,$query);
    oci_execute($stid);
    $row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
    $output = '';

    if($result > 0){
        if($result['CAT'] == 0){
            echo "Shooter on campus";
            $output ='Shooter on campus';

        }
        if($result['CAt'] == 1){
            echo "fire on campus";
            
        }
        if ($result['CAt'] == 2) {
            echo "natural on campus";
            
        }
        if ($result['CAt'] == 3) {
            echo "Medical Alert";
            
        }
        if ($result['CAt'] == 4) {
            echo "Fight Alert";
            
        }

        $data = array(
            'alert'=> $output
        );
        echo json_encode($data);

    }


    
}


?>