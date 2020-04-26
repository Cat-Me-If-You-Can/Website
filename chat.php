<?php 
require_once 'init.php';
 
        global $connect;

        $matchid = $_POST['matchid'];
        $mycatid = $_POST['mycatid'];



        $sql4="select * from profile where id='".$matchid."'";
        $query = $connect->query($sql4);
        $row4 = $query->fetch_assoc();

         $id4=$row4["id"];
         $picture4=$row4["picture"];
         $name4=$row4["name"];
         $gender4=$row4["gender"];
         $playful4=$row4["playful"];
         $angry4=$row4["angry"];
         $somber4=$row4["somber"];
         $independent4=$row4["independent"];
         $cuddly4=$row4["cuddly"];
         $likes4=$row4["likes"];
         $dislikes4=$row4["dislikes"];
         $location4=$row4["location"];

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
        <p><a href="profile.php">Your Cats</a></p>
        <p><a href="viewpotentials.php">Look for dates</a></p>
        <p>Cat Me If You Can</p>
        <p><a href="matches.php">Matches</a></p>
        <p><a href="logout.php">Sign out</a></p>
	</div>
    <div class="container">
        <div class="chatHead">
                <img class="headerPic" src="static/images/cutecat1.jpg" alt="">
            <div class="chatTitle">Messages</div>
            <div class="messageListBox">
                <div class="message">
                    <div class="messageSender"><?php echo $name4;?></div>
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
            <div class="chattingTo">Chat with <?php echo $name4;?></div>
                <div class="chatBoxLinks">
                    <p class="chatButton" id="unmatch"><br>Unmatch</p>
                        <div class="modal" id="modal">
                        <form action="unmatch.php" method="post">
                        <input type = "hidden" name = "matchid" value = <?php echo $matchid;?> />
                        <input type = "hidden" name = "mycatid" value = <?php echo $mycatid;?> />
                            <div class="modalContent">
                                <p>Unmatch with user?</p>
                                <div id="confirmDialogue">
                                <input type = "submit" class="chatButton" id="confirmUnmatch"value="Yes"></input>
                            </form>
                               
                                <p class="chatButton" id="cancelUnmatch"><br>No</p>
                                </div>
                            </div>
                        </div>
                    <p class="chatButton"><br>Report</p>
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