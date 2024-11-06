<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>E-Library | Services - Circulation</title>
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
					<div>
						<img src='icon/circulation.png' class='statbox-title-img'/>
						<h2 class='statbox-title-h2'>Circulation Services</h2>
						<hr>
						<div class='policy'>
							<p>Borrowers are responsible for understanding the policies related to any library material they check out. Disregarding library policies may result in the suspension of UTB Library borrowing privileges.</p>
							<p>The Main Counter is located just inside the main entrance of the library. A staff member is available during all hours of operation to offer directions pertaining to the location of the library resources and services. They can assist you when the resources you are searching for are not on the shelf. You may also inquire if a book is missing or checked out and also the date of its return.</p>
							<p>Periodicals are arranged alphabetically by title and categorised under subject order. Virtually all books and government documents are circulating except for reference books, periodicals and any materials which have the Reference Only sticker. The library may be used by the general public, but only registered UTB Staff, Students and External Users can borrow the library materials. You must present your ID card whenever you wish to check out books or other materials.</p>
							<p>The loan period can be checked out under
								<?php
								if (isset($_GET['memberEmail'])&&isset($_GET['role'])) {
										$memberEmail = $_GET['memberEmail'];
										$role = $_GET['role'];
										echo"<a href='services-loanduration.php?memberEmail=".$memberEmail."&role=".$role."'>Loan Duration and Services.</a>";
								}else{
									echo"<a href='services-loanduration.php'>Loan Duration and Services.</a>";
								}
								?>
							</p>
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
