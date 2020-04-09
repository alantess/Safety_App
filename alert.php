<?php
include('db_connect.php');
session_start();



if(isset($_POST['view'])){

    if ($_POST['view']=='YES') {
        
            $alert = 1;
            $t_start = date(DATE_RFC822);
            $query = "INSERT INTO ALERT_LOG(CAT,T_START) 
                    VALUES(:cat,:t_start)";
            $stid = oci_parse($conn, $query);
            oci_bind_by_name($stid, ":cat", $alert);
            oci_bind_by_name($stid,':t_start',$t_start);
            
            oci_execute($stid);
            oci_free_statement($stid);
        
    }else if($_POST['view']== 'NO'){


        if ($_SESSION['userlevel'] == 1) {
            $t_end = date(DATE_RFC822);
            $_seen = 'NO';
            // $query = "UPDATE ALERT_LOG SET T_END = :t_end WHERE T_END IS NULL";
            $query = "UPDATE ALERT_LOG SET IS_ACT = 'N', T_END = :t_end WHERE T_END IS NULL";
            $stid = oci_parse($conn, $query);
            oci_bind_by_name($stid, ':t_end', $t_end);
            oci_execute($stid);
            oci_free_statement($stid);

            $query = "SELECT * FROM ALERT_LOG WHERE T_END = (SELECT MAX(T_END) FROM ALERT_LOG) and IS_ACT = 'N'";
            $stid = oci_parse($conn,$query);
            oci_execute($stid);
            $result = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
            $isact = $result['IS_ACT'];


            // $isact = 'N';

            // $data = array(
            //     'act' => $isact
            // );


            // echo json_encode($data);
            oci_free_statement($stid);


        }else{

        }
       
    }else{

        // $query = "SELECT * FROM ALERT_LOG WHERE T_END IS NULL";
        

        $query = "SELECT * FROM ALERT_LOG WHERE T_START = (SELECT MAX(T_START) FROM ALERT_LOG)";

        $stid = oci_parse($conn, $query);
        oci_execute($stid);
        $result = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
        $output = '';
        $isact = $result['IS_ACT'];
        

            if ($result > 0){
                switch($result['CAT']){
                    case 0 :
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
                    break;

                    case 1:
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
                    break;

                    case 2:
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
                    break;
                    case 3:
                    break;
                    case 4:
                    break;
                    default:
                
                }

                
            }

        

        $data = array(
            'alert' => $output,
            'act' => $isact
        );
        echo json_encode($data);
        oci_free_statement($stid);
    }

        oci_close($conn);
}



?>