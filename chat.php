<?php 
require_once 'init.php';
 
        global $connect;

        $matchid = $_POST['matchid'];
        $mycatid = $_POST['mycatid'];
        $name = $_POST['mycatname'];
		$id = $mycatid;
		
		echo $matchid;
		echo $mycatid;

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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
				<div id="scrolling_to_bottom" class="col-md-12 header-contentChat">
				<?php
					$sel_msg = "select * from messages where (sendID='$id' AND receiveID='$id4') OR (receiveID='$id' AND sendID='$id4') ORDER by 1 ASC"; 
					$run_msg = mysqli_query($connect,$sel_msg);		
					while($row=mysqli_fetch_array($run_msg)){
						$sendID = $row['sendID'];
						$receiveID = $row['receiveID'];
						$msg_content = $row['content'];
						?>
						<ul>
						<?php
							if($id == $sendID AND $id4 == $receiveID){
								echo"
									<li>
										<div class='right-chat'>
											<span>$name</span><br><br>
											<p>$msg_content</p>
										</div>
									</li>
								";
							}

							else if($id == $receiveID AND $id4 == $sendID){
								echo"
									<li>
										<div class='left-chat'>
											<span>$name4</span><br><br>
											<p>$msg_content</p>
										</div>
									</li>
								";
							}

						?>
						</ul>
					<?php
					}
					?>
				</div>
            </div>
            <div class="sendMessageBox">
				<!-- 
					check message valid, then put into table with send id recieve id match id
				-->
				<form method="post"><!-- this breaks as the user you are chatting to isnt passed into session -->
					<input type="text" name="msg_content" placeholder="Send message...">
					<input type = "hidden" name = "matchid" value = <?php echo $matchid;?> />
                <input type = "hidden" name = "mycatid" value = <?php echo $id;?> />
                <input type = "hidden" name = "mycatname" value = <?php echo $name;?> />
					<button class="chatButton" name="submit">
				</form>
            </div>
        </div>



    </div>
	
	<?php
		if(isset($_POST['submit'])){
			$msg = htmlentities($_POST['msg_content']);
				
			if($msg == ""){
				echo"

				<div class='alert alert-danger'>
				  <strong><center>Message was unable to send!</center></strong>
				</div>

				";
			}else if(strlen($msg) > 100){
				echo"

				<div class='alert alert-danger'>
				  <strong><center>Message is Too long! Use only 100 characters</center></strong>
				</div>

				";
			}
			else{
				
			$insert = "insert into messages(sendID,receiveID,content) values ('$id','$id4','$msg')";
			
			$run_insert = mysqli_query($connect,$insert);
			?>
			<p class="matchName"><?php echo "Name: " . $name4;?></p>

                <div class="form">
                <form action="chat.php" method="post" id="chatform">
                <input type = "hidden" name = "matchid" value = <?php echo $matchid;?> />
                <input type = "hidden" name = "mycatid" value = <?php echo $id;?> />
                <input type = "hidden" name = "mycatname" value = <?php echo $name;?> />
                <input type="submit" name="register"value="Chat" class="pillButton">
                </div>
                </form>
				<script type="text/javascript">
					document.getElementById('chatform').submit(); // SUBMIT FORM
				</script>
				<?php
			}
		}
	?>
	
    
<script>
		$('#scrolling_to_bottom').animate({
		scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight}, 1000);
	</script>
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