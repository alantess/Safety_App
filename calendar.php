<!-- This is a blank template for us to use.
Add what you need but leave the calls that are marked. 
Just copy and paste the code below to ensure the new page has the basic
functionality of the rest. -->
<!DOCTYPE html>
<html>

<head>
    <!-- LEAVE THIS-->
    <?php include 'includes/head.php'; ?>
</head>

<body>

    <header>
        <!-- LEAVE THIS-->
        <?php include 'includes/navbar.php'; ?>
    </header>

    <!-- Google Calendar -->
    <div mbsc-page class="demo-google-calendar mt-5 pt-5 mx-auto">
        <div id="demo-google-cal-form">
            <div class="mbsc-grid">
                <div class="mbsc-row">
                    <div class="mbsc-col-sm-12 mbsc-col-md-4">
                        <div class="mbsc-form-group">
                            <button mbsc-button id="demo-google-auth" class="mbsc-btn-block">Connect Google Calendars</button>
                            <div id="demo-google-cal-list"></div>
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

    <!-- This script Loads the google calendar -->
    <script src="js/calendar.js"></script>

    <footer>
        <!-- LEAVE THIS-->
        <?php include 'includes/foot.php'; ?>
    </footer>
</body>

</html>