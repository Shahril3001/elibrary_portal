<?php
	if(isset($_GET['role'])){
		$role=$_GET['role'];
		if($role=="admin"){
			$staffEmail=$_GET['staffEmail'];
			echo"
			<div class='footer-bottom'>
			 <div class='footer-menu'>
				<ul class='f-menu'>
					<li><a href='#' onclick='myCreator()'>Group 3</a></li>
					<li><a href='#' onclick='myDisclaimer()'>Disclaimer</a></li>
					<li><a href='#'>Software Engineering</a></li>
				</ul>
			 </div>
			<div class='footer-trademark'>
				<p>&copy; 2023 <a href='mailto:elibrary.com.bn'>E-Library</a>. All rights reserved.</p>
			</div>
		 </div>
			";
		}else{
			echo"
			<div class='footer-content'>
			 <h3>Connect with Us</h3>
			 <p>Support your library and find more events through our social media.</p>
			 <ul class='socials'>
				<li><a href='#'><img src='icon/icons8-facebook-48.png'/></a></li>
				<li><a href='#'><img src='icon/icons8-youtube-48.png'/></a></li>
				<li><a href='#'><img src='icon/icons8-instagram-48.png'/></i></a></li>
				<li><a href='#'><img src='icon/icons8-twitter-48.png'/></a></li>
				<li><a href='#'><img src='icon/icons8-telegram-app-48.png'/></i></a></li>
			 </ul>
			</div>
			<div class='footer-bottom'>
			 <div class='footer-menu'>
				<ul class='f-menu'>
					<li><a href='#' onclick='myCreator()'>Group 3</a></li>
					<li><a href='#' onclick='myDisclaimer()'>Disclaimer</a></li>
					<li><a href='#'>Software Engineering</a></li>
				</ul>
			 </div>
			<div class='footer-trademark'>
				<p>&copy; 2023 <a href='mailto:elibrary.com.bn'>E-Library</a>. All rights reserved.</p>
			</div>
			</div>
			";
		}
	}
	else{
		echo"
		<div class='footer-content'>
		 <h3>Connect with Us</h3>
		 <p>Support your library and find more events through our social media.</p>
		 <ul class='socials'>
			<li><a href='#'><img src='icon/icons8-facebook-48.png'/></a></li>
			<li><a href='#'><img src='icon/icons8-youtube-48.png'/></a></li>
			<li><a href='#'><img src='icon/icons8-instagram-48.png'/></i></a></li>
			<li><a href='#'><img src='icon/icons8-twitter-48.png'/></a></li>
			<li><a href='#'><img src='icon/icons8-telegram-app-48.png'/></i></a></li>
		 </ul>
		</div>
		<div class='footer-bottom'>
			<div class='footer-menu' id='footer-mobile'>
				<ul class='f-menu'>
					<li><a href='#' onclick='myCreator()'>Group 3</a></li>
					<li><a href='#' onclick='myDisclaimer()'>Disclaimer</a></li>
					<li><a href='#'>Software Engineering</a></li>
				</ul>
		 	</div>
			<div class='footer-trademark' id='footer-mobile'>
				<p>&copy; 2023 <a href='mailto:elibrary.com.bn'>E-Library</a>. All rights reserved.</p>
			</div>
		</div>
		";
	}
	echo"<script>
	function myDisclaimer() {
		alert('Disclaimer: All content and information on the website is for informational and educational purposes only.');
	}

	function myCreator() {
		alert('CREATED BY:- HAFIZUDDIN(B20210019), SHAHRIL(B20210020), AZAMUDDIN(B20210058), ASHRAFA(B20210028) & SHARIFAH(B20210293)');
	}
	</script>";
?>
