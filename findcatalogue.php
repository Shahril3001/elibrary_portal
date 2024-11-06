<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>E-Library | Find Catalogue</title>
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
			<?php include 'header_bar.php'; ?>
			<div id="mySidenav" class="side-nav"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				<?php include 'side.php'; ?>
			</div>
			<main>
				<div class="main-container">
					<img src='icon/catalogue.png' class='statbox-title-img'/>
					<h2 class='statbox-title-h2'>Catalogue</h2>
					<hr>
					<?php
						echo"
						<div id='deptCategory'>
							<form method='POST' enctype='multipart/form-data' action='findcatalogue.php'>
								<input type='text' name='Title' placeholder='Title...' class='deptCategoryelement'>
								<input type='text' name='Authors' placeholder='Author(s)...' class='deptCategoryelement'>
								<input type='text' name='Years' placeholder='Year...' class='deptCategoryelement'>
								<select name='Type' class='deptCategoryelement'>
									<option value='Book'>Book</option>
									<option value='Magazine'>Magazine</option>
									<option value='E-Book'>E-Book</option>
									<option value='Audiobook'>Audiobook</option>
									<option value='DVD'>DVD</option>
								</select>
								<input id='returnBtn' class='button' type='submit' name='Submit' value='Search'>
							</form>
						</div>
						";

						$cloneID = 0;
						include 'connection.php';
						include 'book.php'; // Include the Book class
						$book = new Book('', '', '', '', '', '', '', '', '', '', '', '');
						$booklists = [];
						$filters = [
						    'Type' => isset($_POST['Type']) ? $_POST['Type'] : '',
						    'Authors' => isset($_POST['Authors']) ? $_POST['Authors'] : '',
						    'Title' => isset($_POST['Title']) ? $_POST['Title'] : '',
							'Years' => isset($_POST['Years']) ? $_POST['Years'] : '',
						];
						$booklists = $book->getAllBooks($filters);
						$num_count = count($booklists);
						if ($num_count !=0){
							echo '<b>Filter by:</b>';
							foreach ($filters as $key => $value) {
							    if (!empty($value)) {
							        echo " $key: $value,";
							    }
							}
						echo"<p class='center-contents'><b>Result:</b> There is $num_count result(s) that match your search and are shown below:</p>";
						echo"<div class='box-container'>";
							foreach($booklists as $bookitem){
							$ISBN = $bookitem->ISBN;
							$Title = $bookitem->Title;
							$Image = $bookitem->Image;
							$Title = (strlen($Title) < 55) ? $Title : substr($Title, 0, 55). "...";
							echo "
							<div class='box-item'>
								<a href='viewcatalogue.php?ISBN=".$ISBN."'>
									<div class='box-img bounce-7'>
										<img src='$Image' alt=''>
									</div>
									<div class='box-title'>$Title</div>
									<div class='box-button'>
										<center>
											<a href='viewcatalogue.php?ISBN=".$ISBN."'><button class='button'><i class='fa fa-eye'></i> View</button></a>
										</center>
									</div>
								</a>
							</div>";
							}
						}else if ($num_count == 0){
							echo"
							<p class='center-contents'><b>Result:</b> There are no results were found.</p>
							<p class='center-contents'><input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'></p>
							<script>
								function goBack(){
									window.history.back();
								}
							</script>";
						}else{
							echo "<p>Something wrong on database.</p>";
						}
					?>
					</div>
				</div>
			</main>
			<footer>
				<?php
					include 'footer_bar.php';
				?>
	    </footer>
		</div>
		<?php
			include 'btnBacktoTop.php';
			include 'js_connection.php';
		?>
	</body>
</html>
