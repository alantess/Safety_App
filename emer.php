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

<script>
    $.get("includes/getSessionInfo.php", function(data) {

        if (data.level == '1') {
            $('#dismissButton').show();
        } else {
            $('#dismissButton').hide();
        }

    }, 'json');
</script>

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

        </form>
    </div>

    <!-- Form Buttons-->
    <div>
        <div class="col-6 col-md-4 mt-2  mx-auto w-50">
            <!-- Cancel button  clears form -->
            <button type="reset" class="btn btn-primary" form="EmerForm" style="width: 70px" id="cancel">Cancel</button>
            <!-- submit button  launches confirmation modal -->
            <button type="reset" class="btn btn-primary" style="width: 70px" id="submitmodal1" data-toggle="modal" data-target="#modalValidation">Submit</button>
        </div>
        <div id='dismissButton' class="col-6 col-md-4 mt-1 mx-auto">
            <!-- Dismiss button   dismisses curerent emergency alert (ADMIN ONLY) -->
            <button type="reset" class="btn btn-primary mt-5 mx-auto">Dismiss Emergency</button>
        </div>
    </div>

    <!-- Emergency Confirmation Modal -->

    <!-- Small modal -->

    <div class="modal fade " tabindex="-1" role="dialog" id="modalValidation">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Emergency Validation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <Form>
                        <!-- verification submit -->
                        <div class="form-check">
                            <label class="form-check-label">
                                Are you sure you want to submit Emergency for 
                            </label>
                        </div>
                    </Form>
                </div>
                <div class="modal-footer">
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <!-- Cancel button -->
                        <button type="button" class="btn btn-primary mr-auto" id='cancelModal' data-dismiss="modal">Cancel</button>

                        <!-- Submit Button -->
                        <button type="button" class="btn btn-primary mr-auto" id ='submitEmergency' data-dismiss="modal">Submit</button>
                    </div>
                </div>
            </div>


            <footer>
                <!-- LEAVE THIS-->
                <?php include 'includes/foot.php'; ?>
            </footer>
</body>

</html>