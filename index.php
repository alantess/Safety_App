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
    <?php include 'includes/head.php'; ?>
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
        </div>

</body>
</html>