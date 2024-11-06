<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>E-Library | Profile</title>
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
							<img src='icon/profile.png' class='statbox-title-img'/>
							<h2 class='statbox-title-h2'>My Profile</h2>
							<hr>
							<div class="task-container">
								<?php
									if(isset($_GET['memberEmail'])&& isset($_GET['role'])){
									$memberEmail=$_GET['memberEmail'];
									include 'member.php';

									$query = dbConn()->prepare('SELECT * FROM member WHERE memberEmail="'. $memberEmail .'"');
									$query->execute();
									$memberData = $query->fetch(PDO::FETCH_ASSOC);
									if ($memberData) {
				            // Create a Member object and populate it with data
				            $member = new Member(
				                $memberData['memberID'],
				                $memberData['memberName'],
				                $memberData['memberEmail'],
				                $memberData['memberPhone'],
												$memberData['memberDOB'],
												$memberData['memberProfileImg'],
				                $memberData['memberAddress'],
												$memberData['memberPassword'],
				                $memberData['lastLogin'],
				            );

										if (isset($member)) {
		                    $memberID = $member->getMemberID();
		                    $memberName = $member->getMemberName();
		                    $memberEmail = $member->getMemberEmail();
												$memberPhone = $member->getMemberPhone();
												$memberDOB = $member->getMemberDOB();
		                    $memberProfileImg = $member->getMemberProfileImg();
		                    $memberAddress = $member->getMemberAddress();
												$memberPassword = $member->getMemberPassword();
		                    $lastLogin = $member->getlastLogin();
		                }

										echo "
											<p>Required fields are marked with an asterisk (*).</p>
											<form method='POST' enctype='multipart/form-data' action='member-profile2.php?memberEmail=".$memberEmail."&role=".$role."'>
												<input type='hidden' name='memberID' value='$memberID'>
												<input type='hidden' name='lastLogin' value='$lastLogin'>
												<table id='formtable'>
													<tr>
														<th colspan='2'>Profile Detail</th>
													</tr>
													<tr>
														<td><b>*Profile Picture:</b></td>
															<td><p><input type='file' name='memberProfileImg' required>Current picture: <a href='$memberProfileImg'><img src='$memberProfileImg' alt='' id='memberProfileImg'></a></p>
															<p class='readOnly'>*PNG/JPG/JPEG file only.</p></td>
													</tr>
													<tr>
														<td><b>*Name:</b></td>
														<td><input type='text' name='memberName'  class='forminput' placeholder='Enter a name' value='$memberName' required></td>
													</tr>
													<tr>
														<td><b>Email:</b><p class='readOnly'>*Read Only</p></td>
														<td><input type='email'  class='forminput' placeholder='Enter an email address' value='$memberEmail' readonly></td>
													</tr>
													<tr>
														<td><b>*Phone:</b></td>
														<td><input type='number' name='memberPhone'  class='forminput' id='removeNumpointer' placeholder='Enter a phone number' value='$memberPhone' maxlength='7' required></td>
													</tr>
													<tr>
														<td><b>*Date of Birth:</b></td>
														<td><input type='date' name='memberDOB' value='$memberDOB' required></td>
													</tr>
													<tr>
														<td><b>Address:</b></td>
														<td>
															<textarea name='memberAddress' id='editor1' rows='4' cols='46%'>$memberAddress</textarea>
														</td>
													</tr>
													<tr>
														<td><b>*Password:</b></td>
														<td><input type='password' name='memberPassword' id='showPassword' class='forminput' placeholder='Enter a password (up to 20 characters)' value='$memberPassword' pattern='^[A-Za-z\d]{1,20}$' title='Password must be at most 20 characters long and alphanumeric.' required></br><input type='checkbox' onclick='myShowPassword()'> Show Password</td>
													</tr>
													<tr>
														<td><b>*Confirm Password:</b></td>
														<td><input type='password' name='memberCPassword' id='showPassword2' class='forminput' placeholder='Enter a confirm password (up to 20 characters)' value='$memberPassword' pattern='^[A-Za-z\d]{1,20}$' title='Password must be at most 20 characters long and alphanumeric.' required></br><input type='checkbox' onclick='myShowPassword2()'> Show Password</td>
													</tr>
													<tr>
														<td style='border:none;' colspan='2'  id='buttonrow'>
															<input id='submitBtn' class='button' type='submit' name='Submit' value='&#10227; Update'>
															<input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>
														</td>
													</tr>
												</table>
											</form>
											<script>
												CKEDITOR.replace( 'editor1' );
											</script>
										";
									}
								}
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
