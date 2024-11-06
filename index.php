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
								<?php
								$quotes[] = 'Empowering Minds, Igniting Innovation: Your Gateway to Knowledge.';
							  $quotes[] = 'Building a Better World Through Books.';
							  $quotes[] = 'Explore, Expand, Evolve with Us.';
							  $quotes[] = 'Igniting Curiosity, Inspiring Knowledge.';
							  $quotes[] = 'Where Ideas Come to Life.';

							  srand ((double) microtime() * 1000000);
							  $random_number = rand(0,count($quotes)-1);

								echo"
								<div class='greetingitem' id='discover'>
									<h3>DISCOVER E-LIBRARY</h3>
									<i>$quotes[$random_number]</i>
								</div>";
								?>
							<div class="wave"></div>
						</div>
						</br>
						<img src='icon/recently.png' class='statbox-title-img'/>
						<a href='catalogue.php'><button class='button' id='statbox-viewAllBtn'><i class='fa fa-eye'></i> View All Catalogue</button></a>
						<h2 class='statbox-title-h2'>Recently Added</h2><hr>
						<div class="partner">
							<div class="wrapper">
									<?php
									$cloneID = 0;
									include 'connection.php';
									include 'book.php'; // Include the Book class
									$book = new Book('', '', '', '', '', '', '', '', '', '', '', '');
									$booklists = [];
									$booklists = $book->getRecentlyAddedBooks();
									$num_count = count($booklists);
									if ($num_count !=0){
											foreach($booklists as $bookitem){
											$ISBN = $bookitem->ISBN;
											$Title = $bookitem->Title;
											$Image = $bookitem->Image;
											$Title = (strlen($Title) < 55) ? $Title : substr($Title, 0, 55). "...";
											echo "
											<div class='item'>
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
												</div>
											</div>
										";
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
				</br>
				<img src='icon/ebook.png' class='statbox-title-img'/>
				<h2 class='statbox-title-h2'>E-Book</h2><hr>
				<div class="partner">
					<div class="wrapper">
							<?php
							$cloneID = 0;
							$book = new Book('', '', '', '', '', '', '', '', '', '', '', '');
							$booklists = [];
							$booklists = $book->getBookByTypeEBook();
							$num_count = count($booklists);
							if ($num_count !=0){
									foreach($booklists as $bookitem){
									$ISBN = $bookitem->ISBN;
									$Title = $bookitem->Title;
									$Image = $bookitem->Image;
									$Title = (strlen($Title) < 55) ? $Title : substr($Title, 0, 55). "...";
									echo "
									<div class='item'>
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
										</div>
									</div>
								";
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
				</br>
					<div id="slideshow">
						<div id="slides">
								<?php
								$cloneID = 0;

									$slideshows = [
	 									 [
	 											 'slideshowID' => 1,
	 											 'slideshowImg' => 'img/banner1.png', // Update with the correct image path
	 											 'slideshowCaption' => 'Read, Learn, Grow',
	 									 ],
	 									 [
	 											 'slideshowID' => 2,
	 											 'slideshowImg' => 'img/banner2.png', // Update with the correct image path
	 											 'slideshowCaption' => 'Your Gateway to Knowledge',
	 									 ],
	 									 [
	 											 'slideshowID' => 3,
	 											 'slideshowImg' => 'img/banner3.png', // Update with the correct image path
	 											 'slideshowCaption' => 'Digital Library: Explore, Discover, Connect',
	 									 ],
	 									 [
	 											 'slideshowID' => 4,
	 											 'slideshowImg' => 'img/banner4.png', // Update with the correct image path
	 											 'slideshowCaption' => 'Library: The Heart of the Community',
	 									 ],
	 									 [
	 											 'slideshowID' => 5,
	 											 'slideshowImg' => 'img/banner5.png', // Update with the correct image path
	 											 'slideshowCaption' => 'More Than Just Books',
	 									 ],
	 							 ];

								foreach($slideshows as $slideshow){
										$cloneID++;
										$slideshowID = $slideshow['slideshowID'];
										$slideshowImg = $slideshow['slideshowImg'];
										$slideshowCaption = $slideshow['slideshowCaption'];

										echo"<div class='slide show' data-slide='$cloneID'>
												<img src='$slideshowImg' alt='$slideshowCaption'>

												<div class='slide-content'>
														<span class='slide-title'>$slideshowCaption</span>
												</div>
										</div>";
								}
								?>

								<div class="slide-btn next">
										<span>&raquo;</span>
								</div>

								<div class="slide-btn prev">
										<span>&laquo;</span>
								</div>
						</div>

								<div id="gallery">
								<?php
									foreach($slideshows as $slideshow){
											$slideshowID = $slideshow['slideshowID'];
											$slideshowImg = $slideshow['slideshowImg'];
											$slideshowCaption = $slideshow['slideshowCaption'];

											echo"<div class='thumbnail' data-slide='$slideshowID'>
													<img src='$slideshowImg' alt='$slideshowCaption'>

													<div class='slide-content'>
															<span class='slide-title'>$slideshowCaption</span>
													</div>
											</div>";
											}
								 ?>
								</div>
						</div>
					<img src='icon/news.png' class='statbox-title-img'/>
					<h2 class='statbox-title-h2'>News</h2>
					<hr>
					<div class="roleRow">
						<div class="roleBox">
							<h1>Summer Reading Program Kickoff</h1>
							<img src='img/news1.pNg' class='news-imgs' alt=''>
							<p>Join us for the Summer Reading Program kickoff event! Enjoy fun activities, book recommendations, and reading challenges for all ages.</p>
						</div>
						<div class="roleBox">
							<h1>Tech Workshop: Introduction to Coding</h1>
							<img src='img/news2.png' class='news-imgs' alt=''>
							<p>Interested in coding? Join our free tech workshop and learn the basics of programming in a beginner-friendly environment.</p>
						</div>
						<div class="roleBox">
							<h1>Local Art Exhibition at the Library</h1>
							<img src='img/news3.png' class='news-imgs' alt=''>
							<p>Explore the creativity of local artists at our library's art exhibition. Discover a diverse range of artworks from talented members of our community.</p>
						</div>
						<div class="roleBox">
							<h1>Library Hosts Virtual Book Club</h1>
							<img src='img/news4.png' class='news-imgs' alt=''>
							<p>Join our virtual book club and engage in lively discussions about this month's selected book. All book enthusiasts are welcome!</p>
						</div>
						<div class="roleBox">
							<h1>Library Receives Grant for STEM Programs</h1>
							<img src='img/news5.png' class='news-imgs' alt=''>
							<p>Thanks to a generous grant, we'll be expanding our STEM (Science, Technology, Engineering, and Mathematics) programs for children and teens. Get ready for exciting hands-on activities!</p>
						</div>
					</div>
					<div class='greeting' id='support'>
							<center>
								<div class='greetingitem'>
									<h3><i class='fa fa-envelope'></i> Support library!</h3>
									<p>There are lots of ways you can help!</p>
									<button class="button">Learn more</button>
								</div>
							</center>
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
				include 'slideshow_connection.php';
			?>

			<script>

			</script>
	</body>
</html>
