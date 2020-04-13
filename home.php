<?php
session_start();
?>

<?php
if (!isset($_SESSION['username'])) {
    header("location: index.php");
    exit;
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


    <div class="col-md-8 mt-5 pt-5 mx-auto w-75" id="content" data-target="#navbarNavAltMarkup">
        <h1>Welcome <?php echo $_SESSION['firstname'] ?> <?php echo $_SESSION['lastname'] ?></h1>
        <?php include 'includes/banner.php'; ?>
    </div>

    <footer>
        <?php include 'includes/foot.php'; ?>
    </footer>
</body>

</html>