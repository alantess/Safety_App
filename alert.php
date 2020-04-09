<?php
include('db_connect.php');
session_start();

if(isset($_POST['view'])){

    if ($_POST['view']!='') {
        $alert = 1;
        $t_start = date(DATE_RFC822);
        $query = "INSERT INTO ALERT_LOG(CAT,T_START) 
                VALUES(:cat,:t_start)";
        $stid = oci_parse($conn, $query);
        oci_bind_by_name($stid, ":cat", $alert);
        oci_bind_by_name($stid,':t_start',$t_start);
        
        oci_execute($stid);
        oci_free_statement($stid);

    }else{

        // $query = "SELECT * FROM ALERT_LOG WHERE T_END IS NULL";

        $query = "SELECT * FROM ALERT_LOG WHERE T_START = (SELECT MAX(T_START) FROM ALERT_LOG)";

        $stid = oci_parse($conn, $query);
        oci_execute($stid);
        $result = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
        $output = '';


        if ($result > 0) {
            if ($result['CAT'] == 0) {
                $output .= '
        <div class="container">
            <div class="row">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="close" data-dismiss="alert">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
                </button>
                <strong><i class="fa fa-warning"></i> Danger!</strong> <marquee><p style="font-family: Impact; font-size: 18pt">Active Shooter on Campus!</p></marquee>
                </div>
            </div>
        </div>';
            }
            if ($result['CAT'] == 1) {
                $output .= '
        <div class="container">
            <div class="row">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="close" data-dismiss="alert">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
                </button>
                <strong><i class="fa fa-warning"></i> Danger!</strong> <marquee><p style="font-family: Impact; font-size: 18pt">Fire on Campus! Evacuate Immediately</p></marquee>
                </div>
            </div>
        </div>';
            }
            if ($result['CAT'] == 2) {
                // echo "Natural on campus";
                $output .= '
        <div class="container">
            <div class="row">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="close" data-dismiss="alert">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
                </button>
                <strong><i class="fa fa-warning"></i> Danger!</strong> <marquee><p style="font-family: Impact; font-size: 18pt">Tornado on Campus! Take cover</p></marquee>
                </div>
            </div>
        </div>';
            }
            if ($result['CAT'] == 3) {
                // echo "Medical Alert";
            }
            if ($result['CAT'] == 4) {
                // echo "Fight Alert";
            }

            $data = array(
                'alert' => $output
            );
            echo json_encode($data);
        }

        oci_free_statement($stid);
    }

        oci_close($conn);
}

if(isset($_POST['alertOFF'])){
    $t_end = date(DATE_RFC822);
    // $query = "INSERT INTO ALERT_LOG(T_END) VALUES(:t_end) WHERE T_END IS NULL";
    $query = "INSERT INTO ALERT_LOG WHERE T_START = (SELECT MAX(T_START) FROM ALERT_LOG)";
    $stid = oci_parse($onn,$query);
    oci_bind_by_name($stid,':t_end',$t_end);
    oci_execute($stid);
    oci_free_statement($stid);

    // header('location: home.php');
    oci_close($conn);
}


?>