<?php
$conn = oci_connect("cherrera2018", "Pass123$", "oraclelinux.eng.fau.edu/r11g");
if (!$conn) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
} else {
    // print "Connected to Oracle!";
}
// Close the Oracle connection
// oci_close($conn);
?>