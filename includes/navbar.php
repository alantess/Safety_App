<!--- Navigation -->
<nav class="navbar navbar-dark bg-dark navbar-expand-md fixed-top">
    <div class="container-fluid">

        <!--Navigation menu button (while small)-->
        <button class="navbar-toggler" data-target="#navbarResponsive" data-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!--Home Button-->
        <a class="navbar-brand" href="home.php">Home</a>
        
        <!--Navigation menu-->
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="calendar.php">Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="attendance.php">Attendance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="message.php" id="messagesT">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php?logout='1'" id="logout">Logout</a>
                </li>
            </ul>
        </div>

        <!--Notification Bell-->
        <a href="#" class="navbar-brand" id="alert">
            <span class="label label-pill label-danger count" style="border-radius:10px;"></span>
            <i class="material-icons" style="font-size:36px">notifications</i>
        </a>

        <!--Emergency Button-->
        <a type="button" href="emer.php" class="btn btn-danger" id="emergency">Emergency</a>


    </div>
</nav>
<!--- End Navigation -->