<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>E-Library | Login</title>
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
					<img src='icon/login.png' class='statbox-title-img'/>
					<h2 class='statbox-title-h2'>Login</h2>
					<hr>
						<div class="row">
							<div class="logincontainer">
								<button class="logintab" id="citizenLogBtn"><h5>Member</h5></button>
								<button class="logintab" id="adminLogBtn"><h5>Librarian</h5></button>
								<div class="detail" id="citizenTab">
									<p>Required fields are marked with an asterisk (*).</p>
									<form method="POST" action="member-login.php">
										<table id="formtable" width='97%'>
											<tr>
												<th colspan="2">Member</th>
											</tr>
											<tr>
												<td><b>*Email:</b></td>
												<td><input type="email" name="memberEmail" class='forminput'  placeholder='Enter an email address'  title='Must be a email address.' required></td>
											</tr>
											<tr>
												<td><b>*Password:</b></td>
												<td><input type="password" name="memberPassword" class='forminput' id='showPassword' pattern='^[A-Za-z\d]{1,20}$' title='Password must be at most 20 characters long and alphanumeric.' placeholder='Enter a password (up to 20 characters)' required></br><input type='checkbox' onclick='myShowPassword()'> Show Password</td>
											</tr>
											<tr>
												<td style="border:none;" colspan="2"  id="buttonrow">
													<input id="submitBtn" class="button" type="submit" name="Submit1" value="Submit">
													<input id="resetBtn" class="button" type="reset" name="reset" value="Reset"/>
												</td>
											</tr>
										</table>
									</form>
									<p>Forgot email or password? Please click <a href='find-account.php'>Find Account</a>.</p>
									<p>Don't have any account yet? Click <a href='signup.php'>Sign Up</a> to create new account.</p>
								</div>
								<div class="detail" id="adminTab">
									<p>Required fields are marked with an asterisk (*).
										<span id='onlyforAdmin'> #Restricted site. Only for librarians.</span>
									</p>
									<form method="POST" action="staff-login.php">
										<table id="formtable" width='97%'>
											<tr>
												<th colspan="2">Librarian</th>
											</tr>
											<tr>
												<td><b>*Email:</b></td>
												<td><input type="email" name="staffEmail" class='forminput'  placeholder='Enter an email address' title='Must be a email address.' required></td>
											</tr>
											<tr>
												<td><b>*Password:</b></td>
												<td><input type="password" name="staffPassword" class='forminput' id='showPassword2' pattern='^[A-Za-z\d]{1,20}$' title='Password must be at most 20 characters long and alphanumeric.' placeholder='Enter a password (up to 20 characters)' required></br><input type='checkbox' onclick='myShowPassword2()'> Show Password</td>
											</tr>
											<tr>
												<td style="border:none;" colspan="2"  id="buttonrow">
													<input id="submitBtn" class="button" type="submit" name="Submit" value="Submit">
													<input id="resetBtn" class="button" type="reset" name="reset" value="Reset"/>
												</td>
											</tr>
										</table>
									</form>
								</div>
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
