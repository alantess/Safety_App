<!-- This is a blank template for us to use.
Add what you need but leave the calls that are marked. 
Just copy and paste the code below to ensure the new page has the basic
functionality of the rest. -->

<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <!-- LEAVE THIS-->
    <?php include 'includes/head.php'; ?>
</head>

<body style="overflow:hidden">

    <header>
        <!-- LEAVE THIS-->
        <?php include 'includes/navbar.php'; ?>
    </header>

    <div class="col-md-8 mt-5 pt-5 mx-auto w-75">
    <?php include "includes/banner.php"; ?>
        <form id="EmerForm" action="emer.php">
            <!-- Active Shooter -->
            <div class="form-check">
                <input class="form-check-input" type="radio" name="RadioButton" id="shooterRadio" value="option0">
                <label class="form-check-label" for="shooterRadio">
                    Active Shooter
                </label>
            </div>
            <!-- Fire -->
            <div class="form-check">
                <input class="form-check-input" type="radio" name="RadioButton" id="fireRadio" value="option1">
                <label class="form-check-label" for="fireRadio">
                    Fire
                </label>
            </div>
            <!-- Nat. Disaster -->
            <div class="form-check">
                <input class="form-check-input" type="radio" name="RadioButton" id="natDisasterRadio" value="option2">
                <label class="form-check-label" for="natDisasterRadio">
                    Natural Disaster
                </label>
            </div>
            <!-- Medical -->
            <div class="form-check">
                <input class="form-check-input" type="radio" name="RadioButton" id="medicalRadio" value="option3">
                <label class="form-check-label" for="medicalRadio">
                    Medical Emergency
                </label>
            </div>
            <!-- Fight -->
            <div class="form-check">
                <input class="form-check-input" type="radio" name="RadioButton" id="fightRadio" value="option4">
                <label class="form-check-label" for="fightRadio">
                    Fight!
                </label>
            </div>
            <!-- Other -->
<!--             <div class="form-check">
                <input class="form-check-input" type="radio" name="RadioButton" id="otherRadio" value="option5">
                <label class="form-check-label" for="otherRadio">
                    Other
                </label>
            </div> -->
            <!-- Other inputbox-->
<!--             <div class="form-group">
                <label for="otherTextArea">Enter Emergency</label>
                <textarea class="form-control rounded-0" id="otherTextArea" rows="3"></textarea>
            </div> -->
        </form>
    </div>

    <!-- Form Buttons-->
    <div>
        <div class="col-md-8 mt-2  mx-auto w-50">
            <!-- Cancel button  clears form -->
            <button type="reset" class="btn btn-primary" form="EmerForm" style="width: 75px" id="cancel">Cancel</button>
            <!-- submit button  launches confirmation modal -->
            <button type="reset" class="btn btn-primary" style="width: 75px"  id="submitModal2">Submit</button>
        </div>
        <div id='dismissModal' class="col-md-8 mt-1  mx-auto w-50">
            <!-- Dismiss button   dismisses curerent emergency alert (ADMIN ONLY) -->
            <button type="reset" class="btn btn-primary mt-5 mx-auto"  >Dismiss Emergency</button>
        </div>
    </div>

    <!-- Emergency Confirmation Modal -->


    <footer>
        <!-- LEAVE THIS-->
        <?php include 'includes/foot.php'; ?>
    </footer>
</body>

</html>