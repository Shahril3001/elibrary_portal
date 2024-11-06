<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>E-Library | Add Staff</title>
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
					<div class="main-container">
						<!--===============================================================================================-->
						<div>
							<img src='icon/librarian.png' class='statbox-title-img'/>
							<h2 class='statbox-title-h2'>Add Librarian</h2>
							<hr>
							<div class="task-container">
								<?php
										echo "
											<p>Required fields are marked with an asterisk (*).</p>
											<form method='POST' action='staff-addstaff2.php?staffEmail=".$staffEmail."&role=".$role."'>
												<table id='formtable'>
													<tr>
														<th colspan='2'>Sign Up</th>
													</tr>
													<tr>
														<td><b>*Name:</b></td>
														<td><input type='text' name='staffName' class='forminput' placeholder='Enter a name' minlength='10' required></td>
													</tr>
													<tr>
														<td><b>*Email:</b></td>
														<td><input type='email' name='staffEmail' class='forminput' placeholder='Enter an email address' required></td>
													</tr>
													<tr>
														<td><b>*Phone:</b></td>
														<td><input type='number' name='staffPhone'  id='removeNumpointer' class='forminput' placeholder='Enter a phone number' maxlength='7' required></td>
													</tr>
													<tr>
														<td><b>*Password:</b></td>
														<td><input type='password' name='staffPassword' id='showPassword' class='forminput' placeholder='Enter a password (up to 20 characters)' pattern='^[A-Za-z\d]{1,20}$' title='Password must be at most 20 characters long and alphanumeric.' required></br><input type='checkbox' onclick='myShowPassword()'> Show Password</td>
													</tr>
													<tr>
														<td><b>Confirm Password:</b></td>
														<td><input type='password' name='staffCPassword' id='showPassword2' class='forminput' placeholder='Enter a confirm password (up to 20 characters)' pattern='^[A-Za-z\d]{1,20}$' title='Password must be at most 20 characters long and alphanumeric.' required></br><input type='checkbox' onclick='myShowPassword2()'> Show Password</td>
													</tr>
													<tr>
														<td style='border:none;' colspan='2'  id='buttonrow'>
															<input id='submitBtn' class='button' type='submit' name='Submit' value='Submit'>
															<input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>
														</td>
													</tr>
												</table>
											</form>
											<script>
												CKEDITOR.replace( 'editor1' );
											</script>
										";
								?>
							</div>
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
