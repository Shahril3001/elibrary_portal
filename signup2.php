<!DOCTYPE html>
<html>
	<head>
		<title>Add Submission Process</title>
		<link rel="icon" href="icon/icons8-improvement-64.png">
		<link rel="stylesheet" href="style.css">
	</head>
	<body class="bgcover">
	<?php
		echo "<center>";
		include 'connection.php';
		include 'member.php';
		if(isset($_POST['Submit']))
		{

			$memberName = $_POST['memberName'];
	    $memberEmail = $_POST['memberEmail'];
			$memberPhone = $_POST['memberPhone'];
			$memberDOB = $_POST['memberDOB'];
	    $memberAddress = $_POST['memberAddress'];
	    $memberPassword = $_POST['memberPassword'];
	    $memberCPassword = $_POST['memberCPassword'];

			$target_dir = "data/img/member/";
			$target_dir = $target_dir . basename($_FILES["memberProfileImg"]["name"]);
			$fileimg_extension = pathinfo($target_dir, PATHINFO_EXTENSION);
			$fileimg_extension = strtolower($fileimg_extension);
			$valid_extension = array("png", "jpeg", "jpg");

	    if (empty($memberName) || empty($memberEmail) || empty($memberPhone) || empty($memberDOB) || empty($memberPassword)) {
					echo "<div class='pos'>";
					echo "<img src='icon/icons8-error-96.png'/>";
					echo "<h2>Invalid Value!</h2>";
					echo "Some of fields is empty. You can't proceed.</br>
					<p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>
					<script>
						function goBack(){
							window.history.back();
						}
					</script>";
					echo "</div>";
	    } else {
	        if ($memberPassword == $memberCPassword) {
							if (in_array($fileimg_extension, $valid_extension)) {
									move_uploaded_file($_FILES["memberProfileImg"]["tmp_name"], $target_dir);
									$imageup = $target_dir;
									$member = new Member('', $memberName, $memberEmail, $memberPhone,	$memberDOB, $imageup, $memberAddress, $memberPassword, '00/00/0000');

			            if ($member->addMember($memberName, $memberEmail, $memberPhone, $memberDOB, $imageup, $memberAddress, $memberPassword)) {
			                echo "<div class='pos'>";
											echo "<img src='icon/icons8-success-64.png'/>";
											echo "<h2>Success!</h2>";
											echo "<p id='valid'>Member is successfully added.</p>
											<p>Click <a href='login.php'><input id='returnBtn' class='button' type='button' name='return' value='Return'></a> to return.</p>
											";
											echo "</div>";
			            } else {
			                echo "<div class='pos'>";
											echo "<img src='icon/icons8-error-96.png'/>";
											echo "<h2>Member account has already been created.</h2>";
											echo "<p id='invalid'>Unable to submit. Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
											echo "</div>";
			            }
							}else{
									echo "<div class='pos'>";
									echo "<img src='icon/icons8-error-96.png'/>";
									echo "<h2>Invalid Image File!</h2>";
									echo "<p id='invalid'>Unable to submit. Please try again.</p>
											<p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
									echo "</div>";
							}
	        } else {
	            echo "<div class='pos'>";
							echo "<img src='icon/icons8-error-96.png'/>";
							echo "<h2>Password doesn't match.</h2>";
							echo "<p id='invalid'>Unable to submit. Please try again.</p>
							<p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
							echo "</div>";
	        }
	    }
		}
		echo "</center>";
	?>
	<script>
		function goBack(){
			window.history.back();
		}
	</script>
	</body>
</html>
