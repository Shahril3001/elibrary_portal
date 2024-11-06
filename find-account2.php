<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>E-Library | Find Account</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--===============================================================================================-->
		<link rel="stylesheet" href="style.css">
		<!--===============================================================================================-->
		<link rel="icon" href="icon/icons8-improvement-64.png">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<!--===============================================================================================-->
		<div id="wrapper">
			<?php
				include 'header_bar.php';
			?>

			<!-- Sidebar -->
			<div id="mySidenav" class="side-nav"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				<!-- - -->
				<?php
				include 'side.php';
				?>
				<!-- - -->
			</div>
			<!-- Sidebar -->
			<!--===============================================================================================-->
			<main>
				<!--===============================================================================================-->
				<div class="main-container">
					<img src='icon/find-account.png' class='statbox-title-img'/>
					<h2 class='statbox-title-h2'>Find Account</h2>
					<hr>
						<?php
						$memberName = $_POST['memberName'];
						$memberEmail = $_POST['memberEmail'];

						include 'connection.php';
						include 'member.php';

						if(empty($memberName) || empty($memberEmail)) {
							echo "<p><b>Result:</b> There are no results were found due to empty some of inputs.</p>
							<p><input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'></p>
							<script>
								function goBack(){
									window.history.back();
								}
							</script></p>";
						}else{
							$members = Member::findMembers($memberName, $memberEmail);
							if(count($members) > 0)
							{
							echo"
							<div class='row'>";
							foreach($members as $member){
								$memberID = $member->memberID;
								$memberName = $member->memberName;
								$memberEmail = $member->memberEmail;
								$memberPassword = $member->memberPassword;
								echo"<table id='formtable' class='findaccounttable'>
									<tr>
										<th colspan='2'>Profile Detail</th>
									</tr>
									<tr>
										<td width='240px'><b>Name:</b></td>
										<td>$memberName</td>
									</tr>
									<tr>
										<td><b>Email:</b></td>
										<td>$memberEmail</td>
									</tr>
									<tr>
										<td><b>Password:</b></td>
										<td><input type='text' value='$memberPassword' id='copyPassword'> <button onclick='copyClipboard()'><i class='fa fa-clipboard'></button></td>
									</tr>
									<tr>
										<td style='border:none;' colspan='2'  id='buttonrow'><a href='login.php'><button id='viewBtn' class='button'>Login</button></a></td>
									</tr>
									</table>
                  ";

							}
							}else if (count($members) == 0){
							echo "<p class='center-contents'><b>Result:</b> There are no results were found.</p><p class='center-contents'><input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'></p>
							<script>
								function goBack(){
									window.history.back();
								}
							</script></p>";
							}else{
							echo "<p>Something wrong on database.</p>";
							}
						}
						?>
					</div>
				</div>

			</main>
			<!--===============================================================================================-->
			<footer>
				<?php
					include 'footer_bar.php';
				?>
	    </footer>
			<!--===============================================================================================-->
		</div>

		<!-- Back to top -->
		<?php
			include 'btnBacktoTop.php';
			include 'js_connection.php';
		?>
	</body>
</html>
