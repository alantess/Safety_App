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

    <?php
// to change a session variable, just overwrite it
$_SESSION["favcolor"] = "yellow";
print_r($_SESSION);
?>

    <footer>
        <!-- LEAVE THIS-->
        <?php include 'includes/foot.php'; ?>
    </footer>
</body>

</html>