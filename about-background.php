<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>E-Library | About - Background</title>
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
					<img src='icon/history.png' class='statbox-title-img'/>
					<h2 class='statbox-title-h2'>History Background</h2>
					<hr>
						<div class="aboutRow">
							<div class="aboutColumn">
								 <img class='aboutimg' src="img/building1.png" alt="elibrary" height='254em' width='100%'/>
								 <figcaption>E-Library</figcaption>
							</div>
							<div class="aboutColumn">
								<h1>About System</h1>
								<hr>
								<center><img src='icon/logo.png' id='title-header-logo' /></center>
								<p>
									A web application that is intended to provide a comprehensive solution to the library's management needs. It will include an automated check-in and check-out process, MySQL database for resource management, real-time availability information for users, and employees reporting services.
									This web-based approach operates on the XAMPP platform and uses PHP for dynamic web content and MySQL for data storage. Additionally, the approach allows for the establishment of adaptable and sustainable technology that is compatible with current web development standards.
								</p>
							</div>
						</div>
						<img src='icon/icons8-goal-96.png' class='statbox-title-img'/>
						<h2 class='statbox-title-h2'>Aims and Objectives</h2>
						<hr>
						<p>The aim of the system is to improve the book lending and return processes, ensuring that the library's operations are efficient and user-friendly by creating a web application integrated with a fully functional database system which allows for easy access, storage, and management of information.</p>
						<div class="aboutRow">
						 		<div class="aboutGoal">
						   		<h1>Automated Processes</h1>
									<img src='icon/automation.png' alt='' width='68px' height='68px'>
						   		<p>Eliminate manual load and potential errors, implement an automated check-in and check-out system.</p>
						  	</div>
						  	<div class="aboutGoal">
						   		<h1>Database Management</h1>
									<img src='icon/databasemanagement.png' alt='' width='68px' height='68px'>
						   		<p>Create a centralized MySQL database to store and manage library resource information.</p>
						  	</div>
								<div class="aboutGoal">
						   		<h1>Real-time Availability</h1>
									<img src='icon/real-time.png' alt='' width='68px' height='68px'>
						   		<p>Provide users with real-time availability information for books and other resources.</p>
						  	</div>
						  	<div class="aboutGoal">
						   		<h1>Reporting</h1>
									<img src='icon/reporting.png' alt='' width='68px' height='68px'>
						   		<p>Make it possible for librarians to gather reports on book loans, overdue items, and resource usage.</p>
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
