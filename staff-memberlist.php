<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-Library | Member</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		<div id="wrapper">

		<?php include 'header_bar.php'; ?>

		<!-- Sidebar -->
		<div id="mySidenav" class="side-nav">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				<?php include 'side.php'; ?>
		</div>

    <main>
        <div class="main-container">
            <img src="icon/members.png" class="statbox-title-img"/>
            <?php
                echo "
                <a href='staff-addmember.php?staffEmail=" . $staffEmail . "&role=" . $role . "'>
                    <button class='button' id='statbox-addBtn'>&plus; Add</button>
                </a>";
            ?>
            <h2 class="statbox-title-h2">Member</h2>
            <hr>
            <?php
                include 'connection.php';
                include 'member.php'; // Include the Member class

                $member = new Member('', '', '', '', '','', '', '', '');

                $members = $member->getAllMember();

								if (!empty($members)) {
									 echo "<p class='center-contents'><b>Result:</b> There are " . count($members) . " member(s) shown below:-</p>";
									 echo "<div class='box-container'>";
									 echo "<table id='listtable'>";
									 echo "<tr>
													 <th width='20px'>#</th>
													 <th colspan='2'>Detail</th>
													 <th width='15%'>Action</th>
												 </tr>";

									$cloneID = 0;
					        foreach ($members as $memberItem) {
					             $cloneID++;
					             $memberID = $memberItem->memberID;
					             $memberName = $memberItem->memberName;
					             $memberEmail = $memberItem->memberEmail;
                       $memberPhone = $memberItem->memberPhone;
					             $memberProfileImg = $memberItem->memberProfileImg;

											 echo "
											 <tr>
                           <td>$cloneID</td>
													 <td width='10%'><a href='$memberProfileImg'><img src='$memberProfileImg' id='memberProfileImg' alt=''></a></td>
													 <td class='justify-contents'>
															 <b>Name:</b> $memberName<br>
															 <b>Email:</b> $memberEmail<br>
															 <b>Phone:</b> $memberPhone<br>
													 </td>
													 <td>
															 <a href='staff-editmember.php?staffEmail=$staffEmail&memberID=$memberID&role=$role'>
																	 <button class='button' id='editBtn'>&#10227; Edit</button>
															 </a>
															 <a href='staff-deletemember.php?staffEmail=$staffEmail&memberID=$memberID&role=$role'>
																	 <button class='button' id='deleteBtn'>&#128465; Delete</button>
															 </a>
													 </td>
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
