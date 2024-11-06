<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>E-Library | Book Loan</title>
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
					<img src='icon/loan.png' class='statbox-title-img'/>
					<h2 class='statbox-title-h2'>Book Loan</h2>
					<hr>
					<?php
							include 'connection.php';
							include 'loan.php';
							$cloneID = 0;
							$loan = new Loan('', '', '', '');
							$loanlist = [];
							$loanlist = $loan->getAllLoan();

							if (!empty($loanlist)) {
									echo "<p class='center-contents'><b>Result:</b> There are " . count($loanlist) . " loan(s) shown below:-</p>";
									echo "<div class='box-container'>";
									echo "<table id='listtable'>";
									echo "<tr>
									<th width='20px'>#</th>
									<th>Book</th>
									<th width='12%'>Date Borrowed</th>
									<th width='13%'>Actual Return Date</th>
									<th width='11%'>Return Date</th>
									<th width='13%'>Overdue Fees</th>
									<th>Status</th>
									<th width='15%'>Action</th>
									</tr>";
									$cloneID = 0;
									foreach ($loanlist as $loanItem) {
											 $cloneID++;
											 $loanID = $loanItem->loanID;
											 $ISBN = $loanItem->ISBN;
											 $Title = $loanItem->Title;
											 $memberID = $loanItem->memberID;
											 $Quantity = $loanItem->Quantity;
											 $dateBorrowed = $loanItem->dateBorrowed;
											 $returnDate = $loanItem->returnDate;
											 $actualreturnDate = $loanItem->actualreturnDate;
											 $memberName = $loan->getMemberNameByID($memberID);
											 $overdueFees = $loan->calculateOverdueFees($returnDate, $actualreturnDate);
											 $fees = $overdueFees['fees'];
											 $days = $fees * 10;
											 echo "
											 <tr>
													 <td>$cloneID</td>
													 <td class='justify-contents'>
															 <b>ISBN:</b> <a href='staff-editcatalogue.php?staffEmail=$staffEmail&ISBN=$ISBN&role=$role'>$ISBN</a><br>
															 <b>Title:</b> $Title<br>
															 <b>Quantity:</b> $Quantity<br>
															 <b>Borrower:</b> <a href='staff-editmember.php?staffEmail=$staffEmail&memberID=$memberID&role=$role'>$memberName</a><br>
													 </td>
													 <td>$dateBorrowed</td>
													 <td>$actualreturnDate</td>
													 <td>$returnDate</td>
													 <td>";
													 if ($fees <= 0) {
															 echo "<i class='good'>$$fees</i>";
													 } else {
															 echo "<i class='bad'>$" . ($days == 1 ? "$fees | $days day" : "$fees | $days days") . "</i>";
													 }
													 echo"</td>
													 <td>";
													 if ($returnDate === '0000-00-00') {
														 	 echo "<i class='bad'>Not yet Return</i>";
													 } else {
															 echo "<i class='good'>Returned</i>";
													 }
													 echo"</td>
													 <td>";
															 echo " <a href='staff-deletebookloan.php?staffEmail=$staffEmail&loanID=$loanID&role=$role'>
																	 <button class='button' id='cancelBtn'>&#128465; Delete</button>
															 </a>";
													 echo"</td>
											 </tr>";
									 }
								 echo "</table>";
								 echo "</div>";
						 } else {
								 echo "<p class='center-contents'><b>Result:</b> There are no results found.</p>";
								 echo "<p class='center-contents'>
										 <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>
								 </p>";
								 echo "<script>
										 function goBack(){
												 window.history.back();
										 }
								 </script>";
						 }
					?>
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