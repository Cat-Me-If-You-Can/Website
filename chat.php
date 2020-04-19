<?php 
require_once 'init.php';
 
        global $connect;

        $matchid = $_POST['matchid'];
        $mycatid = $_POST['mycatid'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/style.css">
    <title>Chat</title>
</head>
<body>
    <div class="container">
        <div id="logo">
            <img src="static/images/logo.png" alt="">
            </div>
            <div class="chatHeader">
            <h1>Chat</h1>
            <div class="form">
                <form action="unmatch.php" method="post">
                <input type = "hidden" name = "matchid" value = <?php echo $matchid;?> />
                <input type = "hidden" name = "mycatid" value = <?php echo $mycatid;?> />
                <!-- <input type="submit" name="register"value="Unmatch" class="bottomButton inputButton"> -->
                </div>
            <!-- Unmatch should prompt a confirmation dialog, then on confirm, unmatch -->
            <div class="unmatch" id="unmatch"><h1>Unmatch</h1></div>
            <div class="modal" id="modal">
                <div class="modalContent">
                    <p>Unmatch with user?</p>
                    <div id="confirmDialogue">
                    <button id="confirmUnmatch">Yes
                
                </form>
                    </button>
                    <button id="cancelUnmatch">No</button>
                    </div>
                </div>
            </div>
            
        </div>
            <div class="chat">
                <div class="receiveMessageWindow">

                </div>
                <div class="sendMessageWindow">
                    <input type="text">
                </div>
            </div>
    </div>

    <script>
        let modal = document.getElementById("modal");
        let btn = document.getElementById("unmatch");
		let close = document.getElementById("cancelUnmatch");
        btn.onclick = () => {
            modal.style.display = "block";
        }
		close.onclick = () => {
            modal.style.display = "none";
        }

        window.onclick = (event) => {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
<?php include 'navbar.php' ?>
</html>