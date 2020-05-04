<?php 
require_once 'init.php';
 
        global $connect;
		$matchidfrommatchphp = $_POST['matchid'];
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
		 

		 $yes = "yes";

		 $sql = "SELECT * FROM matchestable where ((likeID1 = '".$id."') OR (likeID2 = '".$id."')) AND matched = '$yes'";
		 $query2 = $connect->query($sql);


		 
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
        <p id="cmiyc">Cat Me If You Can</p>
        <p><a href="matches.php">Matches</a></p>
        <p><a href="logout.php">Sign out</a></p>
	</div>
    <div class="container">
        <div class="chatHead">
                <img class="headerPic" src="static/images/cutecat1.jpg" alt="">
            <div class="chatTitle">Messages</div>
            <div class="messageListBox">
            <?php 
        if ($query2->num_rows > 0) {
    // output data of each row
    while($row2 = $query2->fetch_assoc()) {
        ?>
        <div class="message">
                <?php
                
                 $likeID1=$row2["likeID1"];
                 $likeID2=$row2["likeID2"];

                 if($likeID1 == $id)
                 {
                    $matchid = $likeID2;
                 }
                 else {
                    $matchid = $likeID1;
                }       
                    $sql5="select * from profile where id='".$matchid."'";
                    $query = $connect->query($sql5);
                    $row5 = $query->fetch_assoc();

                     $id5=$row5["id"];
                     $picture5=$row5["picture"];
                     $name5=$row5["name"];
                     $gender5=$row5["gender"];
                     $playful5=$row5["playful"];
                     $angry5=$row5["angry"];
                     $somber5=$row5["somber"];
                     $independent5=$row5["independent"];
                     $cuddly5=$row5["cuddly"];
                     $likes5=$row5["likes"];
                     $dislikes5=$row5["dislikes"];
                     $location5=$row5["location"];
                ?>

                <div class="messageSender"><?php echo $name5;?></div>
                <div class="form">
                <form action="chat.php" method="post">
                <input type = "hidden" name = "matchid" value = <?php echo $matchid;?> />
                <input type = "hidden" name = "mycatid" value = <?php echo $id;?> />
                <input type = "hidden" name = "mycatname" value = <?php echo $name;?> />
                <input type="submit" name="register"value="Chat" class="pillButton">
                </div>
                </form>
                </a>
                <!-- Match's name -->
            </div>
            <?php
    }
        }
    
         else {
        echo "0 results";
		}
		$matchid = $matchidfrommatchphp;
        ?>
			
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
						<p class="chatButton" id="report"><br>Report</p>
                        <div class="modal" id="reportModal">
                            <form action="report.php" method="post">
                                <input type="hidden" name="reportingCatId" value="<?php echo $mycatid; ?>" />
                                <input type="hidden" name="reportedCatId" value="<?php echo $matchid; ?>" />
                                    <div class="modalContent">
                                        <p>Please fill out the details for your report below.</p>
										<input type="textarea" name="reportDetails" value="" />
                                        <div id="confirmReportDialogue">
                                            <input type="submit" class="pillButton" id="confirmReport" value="Submit Report" />
                            </form>
                                    <input type="button" class="pillButton" id="cancelReport" value="Cancel Report" />
                                        </div>
                                    </div>
                            </form>
                        </div>
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
					<button class="chatButton" name="submit">send</button>
				</form>
				
            </div>
			<div class="form">
                <form action="chat.php" method="post" id="chatform">
                <input type = "hidden" name = "matchid" value = <?php echo $matchid;?> />
                <input type = "hidden" name = "mycatid" value = <?php echo $id;?> />
                <input type = "hidden" name = "mycatname" value = <?php echo $name;?> />
                <input type="submit" class="chatButton" name="register"value="refresh">
                </div>
                </form>
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
		let reportModal = document.getElementById("reportModal");
        let reportBtn = document.getElementById("report");
        let reportClose = document.getElementById("cancelReport");
        btn.onclick = () => {
            modal.style.display = "block";
        }
		close.onclick = () => {
            modal.style.display = "none";
        }

		reportBtn.onclick = () => {
            reportModal.style.display = "block";
        }
		reportClose.onclick = () => {
            reportModal.style.display = "none";
        }

        window.onclick = (event) => {
            if (event.target == modal || event.target == reportModal) {
                modal.style.display = "none";
                reportModal.style.display = "none";
            }
        }
    </script>
</body>
</html>
</body>
</html>
