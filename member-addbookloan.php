<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>E-Library | Contact</title>
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
		<!--===============================================================================================-->
		<script src="ckeditor/ckeditor.js"></script>
	</head>
	<body>
		<!--===============================================================================================-->
		<div id="wrapper">
			<?php
				include 'header_bar.php';
			?>

			<!-- Sidebar -->
			<!-- Sidebar -->
			<div id="mySidenav" class="side-nav"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				<!-- - -->
				<?php
				include 'side.php';
				?>
				<!-- - -->
			</div>

			<!--===============================================================================================-->
			<main>
				<!--===============================================================================================-->
				<div class="main-container">
					<img src='icon/icons8-feedback-96.png' class='statbox-title-img'/>
					<h2 class='statbox-title-h2'>Contact Us</h2>
					<hr>
					<div class='contact-item'>
						<b><p>Leave a Comment</p></b>
						<p>Your email address will not be published. Required fields are marked *</p>
						<?php
							if(isset($_GET['memberEmail'])&& isset($_GET['role'])){
							$memberEmail=$_GET['memberEmail'];
							include 'connection.php';

							$query = dbConn()->prepare('SELECT * FROM member WHERE memberEmail="'. $memberEmail .'"');
							$query->execute();
							$members = $query->fetchAll(PDO::FETCH_OBJ);
							foreach($members as $member){
								$memberID = $member->memberID;
								$memberName = $member->memberName;
								$memberEmail = $member->memberEmail;
								$memberPhone = $member->memberPhone;
								$memberAddress = $member->memberAddress;
								$memberPassword = $member->memberPassword;
								echo"
								<form method='POST' action='' id='formpage'>
									<table id='formtable'>
										<tr>
											<th colspan='2'>Feedback</th>
										</tr>
										<tr>
											<td><b>*Fullname:</b></td>
											<td><input type='text' name='citizenName' class='forminput' placeholder='Fullname...' value='$memberName' readonly></td>
										</tr>
										<tr>
											<td><b>*Email:</b></td>
											<td><input type='email' name='emailF' class='forminput' placeholder='Email...' value='$memberEmail' readonly></td>
										</tr>
										<tr>
											<td><b>*Subject:</b></td>
											<td><input type='text' name='subjectF' class='forminput' placeholder='Subject...'></td>
										</tr>
										<tr>
											<td><b>*Type:</b></td>
											<td>
												<select name='feedbackType' id='feedbackType' class='forminput'>
													<option>Select a type...</option>
													<option value='Suggestion'>Suggestion</option>
													<option value='Complain'>Complain</option>
													<option value='Report'>Report</option>
												</select>
											</td>
										</tr>
										<tr>
											<td><b>*Message:</b></td>
											<td><textarea name='commentF'  id='editor1' rows='5' cols='35%' placeholder='Comment..'></textarea></td>
										</tr>
										<tr>
											<td colspan='2'  id='buttonrow'>
												<input id='submitBtn' class='button' type='submit' name='Submit' value='Submit'>
												<input id='resetBtn' class='button' type='reset' name='reset' value='Reset'/></td>
										</tr>
									</table>
								</form>";
							}
						}
						?>
						<script>
						CKEDITOR.replace( 'editor1' );
						</script>
					</div>
					<div class='contact-item' id="contact-right-side">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16846.627165538885!2d114.89525465722976!3d4.89366284877766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3222f557ca25b52b%3A0x202cd68248048c3b!2sPusat%20Kebangsaan%20E-Kerajaan!5e0!3m2!1sms!2sbn!4v1663037423021!5m2!1sms!2sbn" width="100%" height="465px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
