<?php

require_once('db_connect.php');
session_start();
if (isset($_SESSION['user']) != "") {
    header("Location: home.php");
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


    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>

    <!--print error msg to screen -->
    <?php if (isset($userError) || isset($errMSG) || isset($passError)) { ?>
        <div role="alert" class="alert  alert-danger  text-center">
        <?php
        if (isset($userError)) {
            echo $userError;
        }
        if (isset($passError)) {
            echo $passError;
        }
        if (isset($errMSG)) {
            echo $errMSG;
        }
    }
        ?>
        </div>


        <header>
            <!-- Top navbar  -->
            <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="">Alert</a>
            <a class="navbar-brand" href="">Emergency</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="#" id="attendanceT">Attendance</a>
                    <a class="nav-item nav-link" href="#" id="messagesT">Messages</a>
                    <a class="nav-item nav-link" href="#">Classes</a>
                    <a class="nav-item nav-link" href="#">Settings</a>
                    <a class="nav-item nav-link" href="#">Help</a>
                    <a class="nav-item nav-link" href="#">Logout</a>
                </div>
            </div>
        </nav> -->


        </header>

        <!-- <div id="content" data-target="#navbarNavAltMarkup"></div> -->
        <div id="content" data-target="#navbarNavAltMarkup">
            <!-- register modal -->
            <article class="card-body">
                <form id="login-form" class="modal" role="form" action="register.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="password1" name="password1">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="password2" name="password2">
                    </div>

                    <div class="form-group">
                        <label for="firstname">First Name:</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name:</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="signup btn btn-primary btn-block">Sign Up</button>
                    </div>
                </form>
                <div class="g-signin2 float-right" data-onsuccess="onSignIn"></div>
                <a href="#login-form" class="float-right btn btn-outline-primary id" rel="modal:open"> Sign up </a>

                <h4 class="card-title mb-4 mt-1"> Sign in </h4>
                <!--user login -->
                <form role="form" action="authenticate.php" method="post">
                    <div class="form-group">
                        <label> Your Username </label>
                        <input id="username" name="username" class="form-control" placeholder="Username" type="text" required>
                    </div>
                    <div class="form-group">
                        <a class="float-right" href="#"> Forgot? </a>
                        <label> Your password </label>
                        <input id="password" name="password" class="form-control" placeholder="******" type="password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" value="Submit"> Login </button>
                    </div>
                </form>
            </article>
        </div>'
        </div>

        <!-- <footer>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Home</a>
            <a class="navbar-brand" href="#">Cal.</a>
            <a class="navbar-brand" href="#" id="attendanceB">Att.</a>
            <a class="navbar-brand" href="#" id="messagesB">Messages</a>
        </nav>
    </footer> -->
</body>


</html>