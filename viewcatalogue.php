<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>E-Library | View Catalogue</title>
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
		<!--===============================================================================================-->
		<script src="ckeditor/ckeditor.js"></script>
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

				<!--===============================================================================================-->

				<main>
					<div class="main-container">
						<!--===============================================================================================-->
						<div>
							<img src='icon/catalogue.png' class='statbox-title-img'/>
							<h2 class='statbox-title-h2'>View Catalogue</h2>
							<hr>
							<div class="task-container">
								<?php
									if(isset($_GET['ISBN'])){
									$ISBN=$_GET['ISBN'];
									include 'connection.php';
									include 'book.php';

									$query = dbConn()->prepare('SELECT * FROM book WHERE ISBN="'. $ISBN .'"');
									$query->execute();
									$bookData = $query->fetch(PDO::FETCH_ASSOC);
									if ($bookData) {

				            $book = new Book(
				                $bookData['ISBN'],
				                $bookData['Title'],
				                $bookData['Image'],
				                $bookData['Edition'],
				                $bookData['Volume'],
												$bookData['Authors'],
												$bookData['Publishers'],
												$bookData['PublicationYear'],
												$bookData['Type'],
												$bookData['Genre'],
												$bookData['Synopsis'],
				                $bookData['DateAcquired'],
				            );

										if (isset($book)) {
		                    $ISBN = $book->getISBN();
		                    $Title = $book->getTitle();
		                    $Image = $book->getImage();
		                    $Edition = $book->getEdition();
		                    $Volume = $book->getVolume();
												$Authors = $book->getAuthors();
												$Publishers = $book->getPublishers();
												$PublicationYear = $book->getPublicationYear();
												$Type = $book->getType();
												$Genre = $book->getGenre();
												$Synopsis = $book->getSynopsis();
		                    $DateAcquired = $book->getDateAcquired();
		                }

										echo "
												<table id='formtable'>
													<tr>
														<th colspan='2'>Catalogue Detail</th>
													</tr>
													<tr>
														<td rowspan='10' width='35%'><center><a href='$Image'><img src='$Image' class='book' alt='' height='100%' width='85%'></a></center></td>
														<td><b>ISBN:</b> $ISBN</td>
													</tr>
													<tr>
														<td><b>Title:</b> $Title</td>
													</tr>
													<tr>
														<td><b>Edition:</b> $Edition</td>
													</tr>
													<tr>
														<td><b>Volume:</b> $Volume</td>
													</tr>
													<tr>
														<td><b>Author:</b> $Authors</td>
													</tr>
													<tr>
														<td><b>Publisher:</b> $Publishers</td>
													</tr>
													<tr>
														<td><b>Publication Year:</b> $PublicationYear</td>
													</tr>
													<tr>
														<td><b>Type:</b> $Type</td>
													</tr>
													<tr>
														<td><b>Genre:</b> $Genre</td>
													</tr>
													<tr>
														<td><b>Synopsis:</b> $Synopsis</td>
													</tr>
													<tr>
														<td style='border:none;' colspan='2'  id='buttonrow'>
															<center>
																<a href='login.php'><button class='button' id='returnBtn'>Add to Cart</button></a>
																<input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>
															</center>
														</td>
													</tr>
												</table>
										";
										}
									}
								?>
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
