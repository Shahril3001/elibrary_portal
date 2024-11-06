<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>E-Library | Edit Catalogue</title>
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
							<h2 class='statbox-title-h2'>Edit Catalogue</h2>
							<hr>
							<div class="task-container">
								<?php
									if(isset($_GET['staffEmail'])&& isset($_GET['role'])){
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
											<p>Required fields are marked with an asterisk (*).</p>
											<form method='POST' enctype='multipart/form-data' action='staff-editcatalogue2.php?staffEmail=".$staffEmail."&role=".$role."&ISBN=".$ISBN."'>
												<table id='formtable'>
													<tr>
														<th colspan='2'>Edit Catalogue</th>
													</tr>
													<tr>
														<td><b>*ISBN:</b></td>
														<td><input type='text' name='ISBN' class='forminput' placeholder='ISBN...' value='$ISBN' required></td>
													</tr>
													<tr>
														<td><b>*Title:</b></td>
														<td><input type='text' name='Title' class='forminput' placeholder='Title...' value='$Title' required></td>
													</tr>
													<tr>
														<td><b>*Cover:</b></td>
															<td><p><input type='file' name='Image' required>Old picture: <img src='$Image' alt='' height='70px' width='50px'></p>
															<p class='readOnly'>*PNG/JPG/JPEG file only.</p></td>
													</tr>
													<tr>
														<td><b>*Edition:</b></td>
														<td><input type='text' name='Edition' class='forminput' placeholder='Edition...' value='$Edition' required></td>
													</tr>
													<tr>
														<td><b>*Volume:</b></td>
														<td><input type='text' name='Volume' class='forminput' placeholder='Volume...' value='$Volume' required></td>
													</tr>
													<tr>
														<td><b>*Author:</b></td>
														<td><input type='text' name='Authors' class='forminput' placeholder='Author...' value='$Authors' required></td>
													</tr>
													<tr>
														<td><b>*Publisher:</b></td>
														<td><input type='text' name='Publishers' class='forminput' placeholder='Publisher...' value='$Publishers' required></td>
													</tr>
													<tr>
														<td><b>*Publication Year:</b></td>
														<td><input type='number' name='PublicationYear' class='forminput' placeholder='Publication Year...' value='$PublicationYear' min='1930' max='2030' required></td>
													</tr>
													<tr>
														<td><b>*Type:</b></td>
														<td>
															<select name='Type' class='forminput' required>
																<option value='$Type'>$Type</option>
																<option>Select a Type...</option>
																<option value='Book'>Book</option>
															  <option value='Magazine'>Magazine</option>
															  <option value='E-Book'>E-Book</option>
															  <option value='Audiobook'>Audiobook</option>
															  <option value='DVD'>DVD</option>
															</select>
														</td>
													</tr>
													<tr>
														<td><b>*Genre:</b></td>
														<td><input type='text' name='Genre' class='forminput' placeholder='Genre...' value='$Genre' required></td>
													</tr>

													<tr>
														<td><b>*Synopsis:</b></td>
														<td><textarea name='Synopsis' id='editor1' rows='5' cols='40%' placeholder='Synopsis...' required>$Synopsis</textarea></td>
													</tr>
													<tr>
														<td style='border:none;' colspan='2'  id='buttonrow'>
															<center>
																<input id='submitBtn' class='button' type='submit' name='Submit' value='Submit'>
																<input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>
															</center>
														</td>
													</tr>
												</table>
											</form>
											<script>
												CKEDITOR.replace( 'editor1' );
											</script>
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
