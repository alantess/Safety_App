<?php
include('db_connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'includes/head.php'; ?>
</head>

<body>
  <header>
    <?php include 'includes/navbar.php'; ?>
  </header>


  <div id="content" data-target="#navbarNavAltMarkup">

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-app.js"></script>

    <!-- Include firebase database -->
    <script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-database.js"></script>


    <!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->

    <script>
      // Your web app's Firebase configuration
      var firebaseConfig = {
        apiKey: "AIzaSyCOpYIaKz7l1440pcumXKsdmREdBbtUOY0",
        authDomain: "live-chat-56911.firebaseapp.com",
        databaseURL: "https://live-chat-56911.firebaseio.com",
        projectId: "live-chat-56911",
        storageBucket: "live-chat-56911.appspot.com",
        messagingSenderId: "949686903412",
        appId: "1:949686903412:web:c33a996318d1645f90a721"
      };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);
      // This variable grabs the name of the user.
      // Instead of using a prompt. Grab the session name and set it equal to this variable
      function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
      let name = capitalizeFirstLetter('<?php echo $_SESSION['username'] ?>')

      var myName = name;

      function sendMessage() {
        // get message
        var message = document.getElementById("message").value;
        var today = new Date();
        var date = (today.getMonth() + 1) + '/' + today.getDate() + '/' + today.getFullYear();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        let timeSent = date + ' at ' + time;

        // save in database
        firebase.database().ref("messages").push().set({
          "sender": myName,
          "message": message,
          "time": timeSent
        });

        // prevent form from submitting





        return false;

      }





      // listen for incoming messages
      firebase.database().ref("messages").on("child_added", function(snapshot) {

        var html = "";
        html += "<i>" + snapshot.val().time + "</i>"
        // give each message a unique ID
        if (snapshot.val().sender != myName) {
          html += "<li class='green' id='message-" + snapshot.key + "'><p class='title'>";
        } else {
          html += "<li class='blue' id='message-" + snapshot.key + "'><p class='title'>";
        }
        // show delete button if message is sent by me
        if (snapshot.val().sender == myName) {
          html += "<button  data-id='" + snapshot.key + "' onclick='deleteMessage(this);'>";
          html += "X";
          html += "</button>";


        }
        html += snapshot.val().sender + "</p> " + snapshot.val().message;
        html += "</li>";

        document.getElementById("messages").innerHTML += html;
      });

      function deleteMessage(self) {
        // get message ID
        var messageId = self.getAttribute("data-id");

        // delete message
        firebase.database().ref("messages").child(messageId).remove();
      }

      // attach listener for delete message
      firebase.database().ref("messages").on("child_removed", function(snapshot) {
        // remove message node
        document.getElementById("message-" + snapshot.key).innerHTML = "<i>This message has been removed</i>";
      });
    </script>



    <script>
      function timeout_trigger() {
        $('#message').val('');
        $(".wrap").css("visibility", "visible ");
        setTimeout(() => {
          $(".wrap").css("visibility", "hidden ");
        }, 400)

      }

      function timeout_init() {


        setTimeout('timeout_trigger()', 400);
      }
    </script>




    <!-- Form to send messages -->


    <div class="center-chat">

      <div class="wrap" id="wrap">
        <div class="dot dot-1"></div>
        <div class="dot dot-2"></div>
        <div class="dot dot-3"></div>
      </div>

      <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
        <defs>
          <filter id="goo">
            <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 21 -7" />
          </filter>
        </defs>
      </svg>

      <div class="messages">
        <ul id="messages"></ul>

      </div>
      <form class="chat" id='myForm' onsubmit="return sendMessage();">
        <!-- Create a list -->
        <div>


          <textarea class=" footer" id="message" placeholder="Enter message" autocomplete="off" required></textarea>

          <input class="btn btn-primary btn-lg text-center" type="submit" value="Send" onclick="timeout_init()">

      </form>
      <div>


      </div>

      <footer>
        <?php include 'includes/foot.php'; ?>
      </footer>
<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyCOpYIaKz7l1440pcumXKsdmREdBbtUOY0",
    authDomain: "live-chat-56911.firebaseapp.com",
    databaseURL: "https://live-chat-56911.firebaseio.com",
    projectId: "live-chat-56911",
    storageBucket: "live-chat-56911.appspot.com",
    messagingSenderId: "949686903412",
    appId: "1:949686903412:web:c33a996318d1645f90a721"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  // This variable grabs the name of the user.
  // Instead of using a prompt. Grab the session name and set it equal to this variable
  function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}
let name = capitalizeFirstLetter('<?php echo $_SESSION['username'] ?>')

  var myName = name;

  function sendMessage() {
		// get message
		var message = document.getElementById("message").value;
		var today = new Date();
		var date = (today.getMonth()+1)+'/'+today.getDate() +'/'+today.getFullYear();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  let timeSent = date + ' at ' + time;
  
		// save in database
		firebase.database().ref("messages").push().set({
			"sender": myName,
			"message": message,
			"time": timeSent
		});
		
		// prevent form from submitting

	
		return false;

	}

	
	// listen for incoming messages
	firebase.database().ref("messages").on("child_added", function (snapshot) {

		var html = "";
		html += "<i>" +  snapshot.val().time + "</i>"
		// give each message a unique ID
		if (snapshot.val().sender != myName){
			html += "<li class='green' id='message-" + snapshot.key + "'><p class='title'>";
		}else{
		html += "<li class='blue' id='message-" + snapshot.key + "'><p class='title'>";}
		// show delete button if message is sent by me
		if (snapshot.val().sender == myName) {
			html += "<button  data-id='" + snapshot.key + "' onclick='deleteMessage(this);'>";
				html += "X";
			html += "</button>";
		
			
		}
		html += snapshot.val().sender + "</p> " + snapshot.val().message;
		html += "</li>";

		document.getElementById("messages").innerHTML += html;
	});

  function deleteMessage(self) {
	// get message ID
	var messageId = self.getAttribute("data-id");

	// delete message
	firebase.database().ref("messages").child(messageId).remove();
}

// attach listener for delete message
firebase.database().ref("messages").on("child_removed", function (snapshot) {
	// remove message node
  document.getElementById("message-" + snapshot.key).innerHTML = "<i>This message has been removed</i>";
  
});



</script>



<script>
function timeout_trigger() {
	$('#message').val('');
	$(".wrap").css("visibility", "visible ");
	setTimeout(()=>{
		$(".wrap").css("visibility", "hidden ");
	},400)

}

function timeout_init() {

	
    setTimeout('timeout_trigger()', 400);
}


</script>
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



<!-- Form to send messages -->


<div class="center-chat">

<div class="wrap" id="wrap">
  <div class="dot dot-1"></div>
  <div class="dot dot-2"></div>
  <div class="dot dot-3"></div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" version="1.1">
  <defs>
    <filter id="goo">
      <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 21 -7"/>
    </filter>
  </defs>
</svg>

 <div class="messages">   
<ul id ="messages"></ul>

 </div>
<form class="chat" id='myForm'  onsubmit="return sendMessage();">
<!-- Create a list -->
<div>
	
  <textarea  class=" footer"  id="message" placeholder="Enter message" autocomplete="off" required></textarea>

  <input class="btn btn-primary btn-lg text-center" type="submit" value="Send" onclick="timeout_init()" >
  
</form>
<div>

        
    </div>

	

</body>

</html>