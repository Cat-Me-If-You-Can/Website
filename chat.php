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
    <link rel="stylesheet" href="static/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="header">
        <p>Your Cats</p>
        <p>Look for dates</p>
        <p>Cat Me If You Can</p>
        <p>Matches</p>
        <p>Sign out</p>
</div>
    <div class="container">
        <div class="chatHead">
                <img class="headerPic" src="static/images/cutecat1.jpg" alt="">
            <div class="chatTitle">Messages</div>
            <div class="messageListBox">
                <div class="message">
                    <div class="messageSender">Catty Bates</div>
                </div>
                <div class="message">
                    <div class="messageSender">Meowngela Lansbury</div>
                </div>
                <div class="message">
                    <div class="messageSender">Pawl Bettany</div>
                </div>
            </div>
        </div>

        <div class="chatBox">
            <div class="chatBoxHeader">
            <div class="chattingTo">Chat with Catty Bates</div>
                <div class="chatBoxLinks">
                    <p id="unmatch">Unmatch</p>
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
                    <p>Report</p>
                </div>
            </div>
            <div class="receiveMessageBox">

            </div>
            <div class="sendMessageBox">
                <input type="text" placeholder="Send message...">
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
</html>