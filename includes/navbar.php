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
            <i class="material-icons" style="font-size:36px">notifications</i>
        </a>

        <!--Emergency Button-->
        <button type="button" href="#" class="btn btn-danger" data-target="#EmergencyModal" data-toggle="modal" id="emergency">Emergency</button>
        <div class="modal" id="EmergencyModal">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Select Emergency</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form>
                        <!-- Active Shooter -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="RadioButton" id="shooterRadio" value="option1">
                            <label class="form-check-label" for="shooterRadio">
                                Active Shooter
                            </label>
                        </div>
                        <!-- Fire -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="RadioButton" id="fireRadio" value="option2">
                            <label class="form-check-label" for="fireRadio">
                                Fire
                            </label>
                        </div>
                        <!-- Nat. Disaster -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="RadioButton" id="natDisasterRadio" value="option3">
                            <label class="form-check-label" for="natDisasterRadio">
                                Natural Disaster
                            </label>
                        </div>
                        <!-- Medical -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="RadioButton" id="medicalRadio" value="option4">
                            <label class="form-check-label" for="medicalRadio">
                                Medical Emergency
                            </label>
                        </div>
                        <!-- Fight -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="RadioButton" id="fightRadio" value="option5">
                            <label class="form-check-label" for="fightRadio">
                                Fight!
                            </label>
                        </div>
                        <!-- Other -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="RadioButton" id="otherRadio" value="option6">
                            <label class="form-check-label" for="fightRadio">
                                Other
                            </label>
                        </div>
                        <!-- Other inputbox-->
                        <div class="form-group">
                            <label for="otherTextArea">Enter Emergency</label>
                            <textarea class="form-control rounded-0" id="otherTextArea" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                    <!-- Dismiss button -->
                    <button type="button" class="btn btn-primary mr-auto" id='dismissModal' data-dismiss="modal">Dismiss Emergency</button>

                    <!-- submit button -->
                    <button type="button" class="btn btn-primary" id="submitModal1">Submit</button>
                </div>
            </div>

            <div class="modal fade" id="modalVarification">
            <div class="modal" id="modalVarification">
                <div class="modal-dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal" id="modalVarification">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Verify Submition</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form>
                                <!-- Verification Submit -->
                                <div class="form-check">
                                    <label class="form-check-label">
                                        Are you sure you want to submit an Emergency for
                                    </label>
                                </div>
                            </form>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <!-- Cancel Button -->
                                <button type="button" class="btn btn-primary mr-auto" id="cancelModal" data-dismiss="modal">Cancel</button>

                                <!-- submit button -->
                                <button type="button" id="submitModal2" data-dismiss="modal" class="btn btn-primary">Submit</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!--- End Navigation -->