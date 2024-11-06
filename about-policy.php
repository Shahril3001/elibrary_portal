<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>E-Library | Policy</title>
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
					<img src='icon/policy.png' class='statbox-title-img'/>
					<h2 class='statbox-title-h2'>Policy</h2>
					<hr>
						<div class='policy'>
							<p>1. <b>Quiet Environment:</b> Maintain a quiet atmosphere within the library to facilitate study and reading. Conversations should be kept to a minimum, and cell phones should be set to silent mode.</p>
							<p>2. <b>Library Card:</b> A valid library card is required to borrow materials. Lost or stolen cards should be reported immediately.</p>
							<p>3. <b>Borrowing Policies:</b> Loan periods and renewal options will vary depending on the type of material borrowed (e.g., books, DVDs, etc.). Check due dates on materials. Overdue fines may apply for late returns. Please return materials on time to avoid fines.</p>
							<p>4. <b>Respect for Materials:</b> Handle library materials with care. Do not mark, underline, or damage them in any way. Report any damaged materials to library staff.</p>
							<p>5. <b>Quiet Study Areas:</b> Quiet study areas are designated for individuals who need a quiet space to study or work. Group discussions and loud conversations should be held in designated group study areas.</p>
							<p>6. <b>Computer Use:</b> Computer use is for research, educational purposes, and accessing the library's online resources. Users must comply with the library's computer use policy.</p>
							<p>7. <b>Food and Drink:</b> No food is allowed in the library. Beverages in covered containers are allowed but should be consumed quietly and away from library materials.</p>
							<p>8. <b>Personal Belongings:</b> Personal belongings should not be left unattended. The library is not responsible for lost or stolen items.</p>
							<p>9. <b>Children's Area:</b> Children must be supervised by a parent or guardian at all times while in the library. Use the designated children's area for children's activities.</p>
							<p>10. <b>Respect for Others:</b> Be respectful of other library users, including library staff and fellow patrons. Use headphones for audio materials and electronic devices.</p>
							<p>11. <b>Internet and Wi-Fi:</b> Internet access and Wi-Fi are provided for research and educational purposes. Users must comply with the library's internet use policy.</p>
							<p>12. <b>Behavior and Conduct:</b> Any disruptive or inappropriate behavior will not be tolerated. Library staff may ask individuals who violate these rules to leave the library.</p>
							<p>13. <b>Donation Policy:</b> The library accepts donations of books and other materials. Please inquire with library staff for details.</p>
							<p>14. <b>Meeting Rooms:</b> Meeting rooms are available for public use, subject to reservation and availability. Meeting room users must comply with the library's meeting room policy.</p>
							<p>15. <b>Accessibility:</b> The library is committed to providing accessible services and resources to all patrons.</p>
							<p>16. <b>Feedback and Suggestions:</b> We welcome feedback and suggestions from patrons to improve our services and facilities.</p>
							<p>17. <b>Emergency Procedures:</b> Familiarize yourself with the library's emergency procedures, including evacuation routes.</p>
							<p>18. <b>Compliance with Laws:</b> Patrons are expected to comply with all local, state, and federal laws while in the library.</p>
						</div>
					<img src='icon/member.png' class='statbox-title-img'/>
					<h2 class='statbox-title-h2'>Membership</h2>
					<hr>
						<div class='policy'>
							<p>All user categories are required to:-</p>
					    <li>Complete an application form and submit it to the library.</li>
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
