<?php
session_start();

// if (!isset($_SESSION['username'])) {
//     $_SESSION['msg'] = "You must log in first";
//     header('location: index.php');
// }

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}



?>

<!DOCTYPE html>
<html>

<head>
    <title>School Safe TEST</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- bootstrap code -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <!--Jquery Modal-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <!--Google Script-->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!--Add an API key-->
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="fetch.js"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css">
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <a class="navbar-brand" href="alert.php?alert.php" id="alert">Alert</a> -->
            <p class="navbar-brand" type="submit" href="#" name='alertButton'>Alert<p>
            <a class="navbar-brand" href="">Emergency</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="#" id="attendanceT">Attendance</a>
                    <a class="nav-item nav-link" href="#" id="messagesT">Messages</a>
                    <a class="nav-item nav-link" href="#">Classes</a>
                    <a class="nav-item nav-link" href="#">Settings</a>
                    <a class="nav-item nav-link" href="#">Help</a>
                    <a class="nav-item nav-link" href="logout.php?logout='1'" id=" logout">Logout</a>
                </div>
            </div>
        </nav>
    </header>

    <div id="content" data-target="#navbarNavAltMarkup">
        <div id="banner"></div>

        <h1>Welcome <?php echo $_SESSION['username'] ?></h1>

        <button id="alertOff">Dismiss</button>
    </div>

    <footer>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Home</a>
            <a class="navbar-brand" href="#">Cal.</a>
            <a class="navbar-brand" href="#" id="attendanceB">Att.</a>
            <a class="navbar-brand" href="#" id="messagesB">Messages</a>
        </nav>
    </footer>
</body>

</html>