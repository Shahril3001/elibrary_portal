<?php
	if(isset($_GET['role'])){
		$role=$_GET['role'];
		if($role=="admin"){
			$staffEmail=$_GET['staffEmail'];
			echo"
			<a href='staff-index.php?staffEmail=".$staffEmail."&role=".$role."'><img src='icon/icons8-home-48.png' class='side-nav-icon' />Dashboard</a>
			<a href='staff-profile.php?staffEmail=".$staffEmail."&role=".$role."' id='maximize'><img src='icon/profile.png' class='side-nav-icon' />Profile</a>
			<a href='staff-cataloguelist.php?staffEmail=".$staffEmail."&role=".$role."'><img src='icon/catalogue.png' class='side-nav-icon' />Catalogue</a>
			<a href='staff-stafflist.php?staffEmail=".$staffEmail."&role=".$role."'><img src='icon/librarian.png' class='side-nav-icon' />Librarian</a>
			<a href='staff-memberlist.php?staffEmail=".$staffEmail."&role=".$role."'><img src='icon/members.png' class='side-nav-icon' />Member</a>
			<a href='staff-bookloanlist.php?staffEmail=".$staffEmail."&role=".$role."'><img src='icon/loan.png' class='side-nav-icon' />Book Loan</a>
			<a href='staff-logout.php?staffEmail=".$staffEmail."&role=".$role."' id='maximize'><img src='icon/logout.png' class='side-nav-icon' />Log Out</a>
			";
		}else{
			$memberEmail=$_GET['memberEmail'];
			echo"
			<a href='member-index.php?memberEmail=".$memberEmail."&role=".$role."'><img src='icon/icons8-home-48.png' class='side-nav-icon' />Dashboard</a>

			<a href='member-profile.php?memberEmail=".$memberEmail."&role=".$role."' id='maximize'><img src='icon/profile.png' class='side-nav-icon' />Profile</a>
			<a href='member-cart.php?memberEmail=".$memberEmail."&role=".$role."'  id='maximize'><img src='icon/shopping-cart.png' class='side-nav-icon' />Cart</a>

			<a href='#' class='sidenavdropdown-btn'><img src='icon/catalogue.png' class='side-nav-icon' />Catalogue <i class='arrowdown'>&#9660</i></a>
			<div class='dropdown-sidenav'>
				<a href='member-catalogue.php?memberEmail=".$memberEmail."&role=".$role."'><img src='icon/allbooks.png' class='side-nav-icon' />All Books</a>
				<a href='#' class='sidenavdropdown-btn'><img src='icon/genre.png' class='side-nav-icon' />Genres <i class='arrowdown'>&#9660</i></a>
				<div class='dropdown-sidenav'>
					<a href='member-catalogue.php?memberEmail=".$memberEmail."&role=".$role."&Genre=Action'><img src='icon/action.png' class='side-nav-icon' />Action</a>
					<a href='member-catalogue.php?memberEmail=".$memberEmail."&role=".$role."&Genre=Advanture'><img src='icon/adventure.png' class='side-nav-icon' />Advanture</a>
					<a href='member-catalogue.php?memberEmail=".$memberEmail."&role=".$role."&Genre=Biography'><img src='icon/biography.png' class='side-nav-icon' />Biography</a>
					<a href='member-catalogue.php?memberEmail=".$memberEmail."&role=".$role."&Genre=Children'><img src='icon/kids.png' class='side-nav-icon' />Children</a>
					<a href='member-catalogue.php?memberEmail=".$memberEmail."&role=".$role."&Genre=Comedy'><img src='icon/comedy.png' class='side-nav-icon' />Comedy</a>
					<a href='member-catalogue.php?memberEmail=".$memberEmail."&role=".$role."&Genre=Crime'><img src='icon/crime.png' class='side-nav-icon' />Crime</a>
					<a href='member-catalogue.php?memberEmail=".$memberEmail."&role=".$role."&Genre=Drama'><img src='icon/drama.png' class='side-nav-icon' />Drama</a>
					<a href='member-catalogue.php?memberEmail=".$memberEmail."&role=".$role."&Genre=Education'><img src='icon/educational.png' class='side-nav-icon' />Education</a>
					<a href='member-catalogue.php?memberEmail=".$memberEmail."&role=".$role."&Genre=Fantasy'><img src='icon/fantasy.png' class='side-nav-icon' />Fantasy</a>
					<a href='member-catalogue.php?memberEmail=".$memberEmail."&role=".$role."&Genre=Historical'><img src='icon/historical.png' class='side-nav-icon' />Historical</a>
					<a href='member-catalogue.php?memberEmail=".$memberEmail."&role=".$role."&Genre=Horror'><img src='icon/horror.png' class='side-nav-icon' />Horror</a>
					<a href='member-catalogue.php?memberEmail=".$memberEmail."&role=".$role."&Genre=Mystery'><img src='icon/mystery.png' class='side-nav-icon' />Mystery</a>
					<a href='member-catalogue.php?memberEmail=".$memberEmail."&role=".$role."&Genre=Romance'><img src='icon/romance.png' class='side-nav-icon' />Romance</a>
					<a href='member-catalogue.php?memberEmail=".$memberEmail."&role=".$role."&Genre=Science Fiction'><img src='icon/science-fiction.png' class='side-nav-icon' />Science Fiction</a>
					<a href='member-catalogue.php?memberEmail=".$memberEmail."&role=".$role."&Genre=Thriller'><img src='icon/thriller.png' class='side-nav-icon' />Thriller</a>
				</div>
			</div>

			<a href='member-bookloanlist.php?memberEmail=".$memberEmail."&role=".$role."'><img src='icon/loan.png' class='side-nav-icon' />Book Loan</a>
			<a href='#' class='sidenavdropdown-btn'><img src='icon/service.png' class='side-nav-icon' />Services <i class='arrowdown'>&#9660</i></a>
			<div class='dropdown-sidenav'>
				<a href='services-circulation.php?memberEmail=".$memberEmail."&role=".$role."'><img src='icon/circulation.png' class='side-nav-icon' />Circulation Services</a>
				<a href='services-loanduration.php?memberEmail=".$memberEmail."&role=".$role."'><img src='icon/loan.png' class='side-nav-icon' />Loan Duration and Services</a>
			</div>
			<a href='member-contact.php?memberEmail=".$memberEmail."&role=".$role."'><img src='icon/icons8-mailboxes-64.png' class='side-nav-icon' />Contact</a>
			<a href='member-logout.php?memberEmail=".$memberEmail."&role=".$role."' id='maximize'><img src='icon/logout.png' class='side-nav-icon' />Log Out</a>
			";
		}
	}
	else{
		echo"
		<a href='index.php'><img src='icon/icons8-home-48.png' class='side-nav-icon' />Home</a>
		<a href='#' class='sidenavdropdown-btn'><img src='icon/icons8-more-info-48.png' class='side-nav-icon' />About <i class='arrowdown'>&#9660</i></a>
		<div class='dropdown-sidenav'>
			<a href='about-background.php'><img src='icon/history.png' class='side-nav-icon' />Background</a>
			<a href='about-openinghour.php'><img src='icon/openinghour.png' class='side-nav-icon' />Opening Hours</a>
			<a href='about-policy.php'><img src='icon/policy.png' class='side-nav-icon' />Rules and Regulations</a>
		</div>

		<a href='#' class='sidenavdropdown-btn' id='maximize'><img src='icon/profile.png' class='side-nav-icon' />Account <i class='arrowdown'>&#9660</i></a>
		<div class='dropdown-sidenav' id='maximize'>
			<a href='login.php'><img src='icon/login.png' class='side-nav-icon' />Login</a>
			<a href='signup.php'><img src='icon/signup.png' class='side-nav-icon' />Sign Up</a>
		</div>
		<a href='login.php' id='maximize'><img src='icon/shopping-cart.png' class='side-nav-icon' />Cart</a>

		<a href='#' class='sidenavdropdown-btn'><img src='icon/catalogue.png' class='side-nav-icon' />Catalogue <i class='arrowdown'>&#9660</i></a>
		<div class='dropdown-sidenav'>
			<a href='catalogue.php'><img src='icon/allbooks.png' class='side-nav-icon' />All Books</a>
			<a href='#' class='sidenavdropdown-btn'><img src='icon/genre.png' class='side-nav-icon' />Genres <i class='arrowdown'>&#9660</i></a>
			<div class='dropdown-sidenav'>
				<a href='catalogue.php?Genre=Action'><img src='icon/action.png' class='side-nav-icon' />Action</a>
				<a href='catalogue.php?Genre=Advanture'><img src='icon/adventure.png' class='side-nav-icon' />Advanture</a>
				<a href='catalogue.php?Genre=Biography'><img src='icon/biography.png' class='side-nav-icon' />Biography</a>
				<a href='catalogue.php?Genre=Children'><img src='icon/kids.png' class='side-nav-icon' />Children</a>
				<a href='catalogue.php?Genre=Comedy'><img src='icon/comedy.png' class='side-nav-icon' />Comedy</a>
				<a href='catalogue.php?Genre=Crime'><img src='icon/crime.png' class='side-nav-icon' />Crime</a>
				<a href='catalogue.php?Genre=Drama'><img src='icon/drama.png' class='side-nav-icon' />Drama</a>
				<a href='catalogue.php?Genre=Education'><img src='icon/educational.png' class='side-nav-icon' />Education</a>
				<a href='catalogue.php?Genre=Fantasy'><img src='icon/fantasy.png' class='side-nav-icon' />Fantasy</a>
				<a href='catalogue.php?Genre=Historical'><img src='icon/historical.png' class='side-nav-icon' />Historical</a>
				<a href='catalogue.php?Genre=Horror'><img src='icon/horror.png' class='side-nav-icon' />Horror</a>
				<a href='catalogue.php?Genre=Mystery'><img src='icon/mystery.png' class='side-nav-icon' />Mystery</a>
				<a href='catalogue.php?Genre=Romance'><img src='icon/romance.png' class='side-nav-icon' />Romance</a>
				<a href='catalogue.php?Genre=Science Fiction'><img src='icon/science-fiction.png' class='side-nav-icon' />Science Fiction</a>
				<a href='catalogue.php?Genre=Thriller'><img src='icon/thriller.png' class='side-nav-icon' />Thriller</a>
			</div>
		</div>

		<a href='#' class='sidenavdropdown-btn'><img src='icon/service.png' class='side-nav-icon' />Services <i class='arrowdown'>&#9660</i></a>
		<div class='dropdown-sidenav'>
			<a href='services-circulation.php'><img src='icon/circulation.png' class='side-nav-icon' />Circulation Services</a>
			<a href='services-loanduration.php'><img src='icon/loan.png' class='side-nav-icon' />Loan Duration and Services</a>
		</div>
		<a href='contact.php'><img src='icon/icons8-mailboxes-64.png' class='side-nav-icon' />Contact</a>";
	}
?>
