<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>E-Library | Opening Hours</title>
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
				<!-- ABOUT SECTION -->


				<div class="main-container">
					<img src='icon/openinghour.png' class='statbox-title-img'/>
					<h2 class='statbox-title-h2'>Opening Hours</h2>
					<hr>
					<table id='openinghourtable'>
							<tr>
									<th width='40%'>Day/ Area</th>
									<th width='30%'>Library</th>
									<th width='30%'>24/7 Study Room</th>
							</tr>
							<tr>
									<td>Monday & Tuesday</td>
									<td>8:00 AM - 9:00 PM</td>
									<td>24 Hours</td>
							</tr>
							<tr>
									<td>Wednesday, Thursday, Saturday</td>
									<td>8:00 AM - 5:00 PM</td>
									<td>24 Hours</td>
							</tr>
							<tr>
									<td>Friday</td>
									<td>Closed</td>
									<td>2:00 PM - 9:00 PM</td>
							</tr>
							<tr>
									<td>Sunday & Public Holiday</td>
									<td>Closed</td>
									<td>Closed</td>
							</tr>
					</table>
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
