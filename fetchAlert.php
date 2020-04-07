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
            $output .='
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
        if($result['CAT'] == 1){
            echo "fire on campus";
            $output .= '
            <div class="container">
	            <div class="row">
	            <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="close" data-dismiss="alert">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                    </button>
                    <strong><i class="fa fa-warning"></i> Danger!</strong> <marquee><p style="font-family: Impact; font-size: 18pt">Fire on Campus! Evacuate Immediately </p></marquee>
                    </div>
	            </div>
            </div>';

        }
        if ($result['CAT'] == 2) {
            echo "Natural on campus";
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
            echo "Medical Alert";
            
        }
        if ($result['CAT'] == 4) {
            echo "Fight Alert";
            
        }

        $data = array(
            'alert'=> $output
        );
        echo json_encode($data);

    }

}


?>