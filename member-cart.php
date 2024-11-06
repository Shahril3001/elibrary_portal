<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-Library | Cart</title>
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
            <div class="main-container">
							<img src='icon/shopping-cart.png' class='statbox-title-img'/>
							 <?php
								echo "<a href='member-deleteallitemfromcart.php?memberEmail=".$memberEmail."&role=".$role."'><button class='button' id='statbox-deleteBtn'>&#128465; Remove All</button></a>";
							 ?>

							 <button class='button' id='statbox-refreshBtn'>&#10227; Refresh</button>
							 <h2 class='statbox-title-h2'>Cart</h2>
							 <hr>

                <?php
                include 'member.php';
                include 'loan.php';
                $loan = new Loan('', '', '', '');
                $loanlist = [];
                $reminders = $loan->getOverdueReminders($memberEmail);
                $reminderScript = '';
                if (count($reminders) > 0) {
                    foreach ($reminders as $reminder) {
                         $reminderScript .= "alert('Your Book Loan: \"$reminder\" is overdue!');\n";
                    }
                }

                if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    echo "<table id='listtable'>
                    <tr>
                      <th>ISBN</th>
                      <th>Title</th>
                      <th>Quantity</th>
                      <th width='15%'>Action</th>
                    </tr>";
                    foreach ($_SESSION['cart'] as $item) {
                        $ISBN = isset($item['ISBN']) ? $item['ISBN'] : '';
                        $Title = isset($item['Title']) ? $item['Title'] : '';

                        echo "
												<form method='post' action='member-deleteitemfromcart.php?memberEmail=".$memberEmail."&role=".$role."'>
													<tr>
	                            <td>{$ISBN}<input type='hidden' name='ISBN' value='{$ISBN}'></td>
	                            <td>{$Title}</td>
	                            <td>{$item['quantity']}</td>
	                            <td><input class='button' id='deleteBtn' type='submit' value='&#128465; Remove'></td>
	                        </tr>
												</form>
												";
                    }
										echo"
										<tr>
											<td style='border:none;' colspan='4'  id='buttonrow'>
												<a href='member-cart2.php?memberEmail=".$memberEmail."&role=".$role."'><button class='button' id='returnBtn'>&#10003; Proceed</button></a>
											</td>
                    </tr>";
                    echo "</table>";
                } else {
                    echo "<p class='center-contents'>Your cart is empty.</p>
                    <p class='center-contents'><a href='member-catalogue.php?memberEmail=".$memberEmail."&role=".$role."' class='center-contents'>
										<button id='backBtn' class='button' type='button' name='back'><i class='fa fa-book'></i> Go to Catalogue</button></a></p>";
                }
                ?>
								<script>
                    document.getElementById('statbox-refreshBtn').addEventListener('click', function () {
                        location.reload();
                    });
                    <?php echo $reminderScript; ?>
                </script>
            </div>
        </main>

				<footer>
					<?php
						include 'footer_bar.php';
					?>
				</footer>
    </div>
		<!-- Back to top -->
		<?php
			include 'btnBacktoTop.php';
			include 'js_connection.php';
		?>
</body>
</html>
