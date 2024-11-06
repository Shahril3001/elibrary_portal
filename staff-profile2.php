<!DOCTYPE html>
<html>
	<head>
		<title>Update Submission Process</title>
		<link rel="icon" href="icon/icons8-improvement-64.png">
		<link rel="stylesheet" href="style.css">
	</head>
	<body class="bgcover">
	<?php
		echo "<center>";
		include 'connection.php';
		include 'js_connection.php';
		if(isset($_POST['Submit']))
		{
		$staffEmail=$_GET['staffEmail'];
		$role=$_GET['role'];

		$staffName=$_POST['staffName'];
		$staffPhone=$_POST['staffPhone'];
		$staffPassword=$_POST['staffPassword'];
		$staffCPassword=$_POST['staffCPassword'];

			// isEmpty field
			if(empty($staffName) || empty($staffPhone) || empty($staffPassword) || empty($staffCPassword)) {
				echo "<div class='pos'>";
				echo "<img src='icon/icons8-error-96.png'/>";
				echo "<h2>Invalid Value!</h2>";
				echo "Some of fields is empty. You can't proceed.</br>
				<p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
				echo "</div>";
			}
			else{
				if($staffPassword==$staffCPassword){
					$query = dbConn()->prepare("UPDATE staff SET staffName='$staffName', staffPhone='$staffPhone', staffPassword='$staffPassword' WHERE staffEmail='".$staffEmail."'");
					// Success
					if($query -> execute()){
						echo "<div class='pos'>";
						echo "<img src='icon/icons8-success-64.png'/>";
						echo "<h2>Success!</h2>";
						echo "<p id='valid'>Profile is successfully updated.</p>
						<p>Click <a href='staff-profile.php?staffEmail=".$staffEmail."&role=".$role."'><input id='returnBtn' class='button' type='button' name='return' value='Return'></a> to return.</p>
						";
						echo "</div>";
					}
					// Error
					else{
						echo "<div class='pos'>";
						echo "<img src='icon/icons8-error-96.png'/>";
						echo "<h2>Invalid Value!</h2>";
						echo "<p id='invalid'>Unable to submit. Please try again.</p>
						<p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
						echo "</div>";
					}
				}
				else{
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
	</body>
</html>
