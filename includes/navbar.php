<!--- Navigation -->
<nav class="navbar navbar-dark bg-dark navbar-expand-md fixed-top">
    <div class="container-fluid">

        <!--Home Button-->
        <a class="navbar-brand" href="home.php">Home</a>

        <!--Navigation menu button (while small)-->
        <button class="navbar-toggler" data-target="#navbarResponsive" data-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!--Navigation menu-->
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Attendance</a>
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
            <span class="glyphicon glyphicon-bell" style="font-size:24px;"></span>
        </a>

        <!--Emergency Button-->
        <button type="button" href="#" class="btn btn-danger" id="emergency">Emergency</button>

    </div>

</nav>
<!--- End Navigation -->