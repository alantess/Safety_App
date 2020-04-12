<?php
session_start();

// if (!isset($_SESSION['username'])) {
//     $_SESSION['msg'] = "You must log in first";
//     header('location: index.php');
// }

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'true') {
    header("location: index.php");
    exit;
}

if (!isset($_SESSION['userlevel']) && $_SESSION['userlevel'] == '1') {
    echo '<script src = "admin.js"></script>';
}

?>

<!DOCTYPE html>
<html>

<head>
    <?php include 'includes/head.php'; ?>
</head>

<body>

    <?php if (isset($_SESSION['loggedin'])) : ?>
        <div class="error success">
            <h3>
                <?php
                // echo $_SESSION['success'];
                unset($_SESSION['loggedin']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <header>

        <?php include 'includes/navbar.php'; ?>
    </header>

    <div id="content" data-target="#navbarNavAltMarkup">
        <div id="banner"></div>

        <h1>Welcome <?php echo $_SESSION['username'] ?></h1>

        <!-- <button id="dismiss">Dismiss</button> -->


        <!-- Google Calendar -->
        <div mbsc-page class="demo-google-calendar">
            <div id="demo-google-cal-form">
                <div class="mbsc-grid">
                    <div class="mbsc-row">
                        <div class="mbsc-col-sm-12 mbsc-col-md-4">
                            <div class="mbsc-form-group">
                                <button mbsc-button id="demo-google-auth" class="mbsc-btn-block">Connect Google Calendars</button>
                                <button type="button" data-toggle="modal" data-target="#exampleModal" id="calendarSettings" class="mbsc-btn-block" style="display:none">Settings</button>
                                <!-- Calendar Seetings Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="exampleModalLabel">Calendar Settings</h2>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="demo-google-cal-list"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mbsc-col-sm-12 mbsc-col-md-8">
                            <div class="mbsc-form-group">
                                <div id="demo-google-cal"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- This script Loads the google calendar -->
    <script src="js/calendar.js"></script>


    <footer>
        <?php include 'includes/foot.php'; ?>
    </footer>
</body>

</html>