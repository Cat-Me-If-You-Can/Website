<!-- /**
get chats - service that gets chat data from the database
Versions 1.4
@authors Patrick Jones
 */ -->

<?php
require_once 'init.php';
 
        global $connect;
        
        $id = $_POST['id'];
        $id4 = $_POST['id4'];
		//gets chats from id being user logged in, and id4 being user you are chatting to 
        ?>
<div class="receiveMessageBox">
				<div id="scrolling_to_bottom" class="col-md-12 header-contentChat">
				<?php
					//gets chats from db
					$sel_msg = "select * from messages where (sendID='$id' AND receiveID='$id4') OR (receiveID='$id' AND sendID='$id4') ORDER by 1 ASC"; 
					$run_msg = mysqli_query($connect,$sel_msg);		
					while($row=mysqli_fetch_array($run_msg)){
						$sendID = $row['sendID'];
						$receiveID = $row['receiveID'];
						$msg_content = $row['content'];
						?>
						<ul>
						<?php
						//accouts for which row the ids are in and flips accordingly
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