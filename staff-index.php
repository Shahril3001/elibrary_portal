<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>E-Library | Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--===============================================================================================-->
		<link rel="stylesheet" href="style.css">
		<!--===============================================================================================-->
		<link rel="icon" href="icon/icons8-improvement-64.png">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
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
						<div class='greeting'>
							<div class='greetingitem' id='discover'>
								<?php
									if(isset($_GET['staffEmail'])&& isset($_GET['role'])){
										$staffEmail=$_GET['staffEmail'];
										$role=$_GET['role'];
										include 'connection.php';
										$query1 = dbConn()->prepare('SELECT * FROM staff WHERE staffEmail="'. $staffEmail .'"');
										$query1->execute();
										$staffs = $query1->fetchAll(PDO::FETCH_OBJ);
										foreach($staffs as $staff){
											$staffName = $staff->staffName;
											$staffPhone = $staff->staffPhone;
											$staffEmail = $staff->staffEmail;
											$staffPassword = $staff->staffPassword;
											$lastLogin = $staff->lastLogin;
											$lastLogin = date('d F Y H:i:s A',strtotime($lastLogin));
										}

									echo"<center><h3>WELCOME ".strtoupper($staffName)."</h3></br>
									Last Login: $lastLogin";
								?>
								<div class="wave"></div>
							</div>
						</div>
						<!--===============================================================================================-->
						<div>
							<h1 class="title-container">Librarian Dashboard</h1>
							<img src='icon/query.png' class='statbox-title-img'/><h2 class='statbox-title-h2'>Activity</h2><hr>
							<?php
								function countTotalactivity($complaintStatus) {
									$conditionquery = dbConn()->prepare("SELECT * FROM $complaintStatus");
									$conditionquery->execute();
									$conditionnum_count = $conditionquery->rowCount();
									return number_format($conditionnum_count);
								}
							?>
							<div class='statbox-item'>
								<div class='statbox-title'>Librarian</div>
								<?php
									$tableName="staff";
									echo "<div class='statbox-pie' style='--p:". countTotalactivity($tableName) .";'>". countTotalactivity($tableName) ." item</div>";
								?>
							</div>
							<div class='statbox-item'>
								<div class='statbox-title'>Member</div>
								<?php
									$tableName="member";
									echo "<div class='statbox-pie' style='--p:". countTotalactivity($tableName) .";'>". countTotalactivity($tableName) ." item</div>";
								?>
							</div>
							<div class='statbox-item'>
								<div class='statbox-title'>Catalogue</div>
								<?php
									$tableName="book";
									echo "<div class='statbox-pie' style='--p:". countTotalactivity($tableName) .";'>". countTotalactivity($tableName) ." item</div>";
								?>
							</div>
							<div class='statbox-item'>
								<div class='statbox-title'>Loan</div>
								<?php
									$tableName="loan";
									echo "<div class='statbox-pie' style='--p:". countTotalactivity($tableName) .";'>". countTotalactivity($tableName) ." item</div>";
								?>
							</div><br><br>
							<button id='printBtn' class='button' onclick='window.print()'>&#9113; Print this page</button>
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
				}
			?>
	</body>
</html>
