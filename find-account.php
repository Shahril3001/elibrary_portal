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
					<form method="POST" action="find-account2.php" id="formpage">
						<table id="formtable">
							<tr>
								<th colspan="2">Find Account</th>
							</tr>
							<tr>
								<td><b>*Name:</b></td>
								<td><input type='text' name='memberName' class='forminput' placeholder='Enter a name' minlength='10' required></td>
							</tr>
							<tr>
								<td><b>*Email:</b></td>
								<td><input type='email' name='memberEmail' class='forminput' placeholder='Enter an email address' required></td>
							</tr>
							<tr>
								<td colspan="2"  id="buttonrow">
									<input id="submitBtn" class="button" type="submit" name="Submit" value="Submit">
									<input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>
								</td>
							</tr>
						</table>
					</form>
					<script>
					CKEDITOR.replace( 'editor1' );
					</script>
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
