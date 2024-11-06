<!DOCTYPE html>
<html>
	<head>
		<title>Login Submission Process</title>
			<link rel="icon" href="icon/icons8-improvement-64.png">
			<link rel="stylesheet" href="style.css">
			<script>
				var countDownDate = new Date();
				countDownDate.setTime(countDownDate.getTime() + 15000)
				var x = setInterval(function() {
				var now = new Date().getTime();
				var distance = countDownDate - now;
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);

				document.getElementById("countDown").innerHTML = seconds + "<span>s</span>";

				if (distance < 0) {
					clearInterval(x);
					document.getElementById("countDown").innerHTML = "End";
				}
				}, 1000);
			</script>
	</head>
	<body class="bgcover">
	<?php
	session_start();
	include 'connection.php';
	include 'staff.php';
	echo "<center>";
	if (isset($_POST['Submit'])) {
	    $staffEmail = $_POST['staffEmail'];
	    $staffPassword = $_POST['staffPassword'];

	    $staff = new Staff('','','','','','');
			if(empty($staffEmail) || empty($staffPassword)) {
				echo "<div class='pos'>";
				echo "<img src='icon/icons8-error-96.png'/>";
				echo "<h2>Empty field!</h2>";
				echo "<p>Some of fields is empty. You can't proceed.</p>
				<p>Please click <a href='login.php'><button id='backBtn' class='button'>Back</button></a> to re-login.</p>";
				echo "</div>";
			} else {
				 $loginResult = $staff->login($staffEmail, $staffPassword);

				if ($loginResult["success"]) {
					$loginNotification .= "alert('You Have Successfully Logged In.');\n";
					header("location:staff-index.php?staffEmail=" . $loginResult["staffEmail"] . "&role=" . $loginResult["role"]);
				} else {
					if(!isset($_SESSION["user-valid"])){
						$_SESSION['user-valid']=0;
					}
					$_SESSION['user-valid']++;

					if($_SESSION['user-valid']<=2){
						$_SESSION['user-valid']++;
						echo "<div class='pos'>";
						echo "<img src='icon/icons8-error-96.png'/>";
						echo "<h2>" . $loginResult["message"] . "</h2>";
						echo "<p>Email or password is incorrect. You have made " . $_SESSION['user-valid'] . "x login attempts.</p>";
						echo "<p>Please click <a href='login.php'><button id='backBtn' class='button'>Back</button></a>.</p>";
						echo "</div>";
					} else {
						// Display the countdown and message for multiple unsuccessful login attempts.
						echo "<div class='pos'>";
						echo "<img src='icon/icons8-timer-64.png'/>";
						echo "<h2>" . $loginResult["message"] . "</h2>";
						$_SESSION['user-valid'] = 0;
						echo "<p id='invalid'>Oops! Sorry, Email or Password is incorrect. You have to wait for 15 seconds for re-attempt.</p>";
						echo " <div id='countDown'></div>";
						echo "<meta http-equiv='refresh' content='15; url=login.php'/>";
						echo "</div>";
					}
				}
			}
	}
	echo "</center>";
	?>
	<script>
			<?php echo $loginNotification; ?>
	</script>
	</body>
</html>
