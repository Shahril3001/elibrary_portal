<?php
session_start();
?>
<!-- Header Bar -->
<?php
	if(isset($_GET['role'])){
		$role=$_GET['role'];
		if($role=="admin"){
			$staffEmail=$_GET['staffEmail'];
			echo"
			<header>
				<div id='side-left'>
					<div class='header-side' id='side-nav-btn' onclick='openNav()'>
						<a>
							<i class='fa fa-bars'></i>
						</a>
					</div>
				</div>
				<a href='staff-index.php?staffEmail=".$staffEmail."&role=".$role."'>
					<h1 class='title-header'>
						<img src='icon/logo.png' id='title-header-logo' />
					</h1>
				</a>
				<div id='minimize'>
					<nav>
						<div class='navmenu'>
							<li><a href='javascript:void(0)' onclick='myDropnav()' class='dropbtn'><i class='fa fa-search'></i> Search</a>
								<div id='myDropdown' class='navmenu-navcontent'>
									<form method='POST' enctype='multipart/form-data' action='staff-findcatalogue.php?staffEmail=".$staffEmail."&role=".$role."'>
										<input type='text' name='Title' placeholder='Title...' class='deptCategoryHeader'>
										<input type='text' name='Authors' placeholder='Author(s)...' class='deptCategoryHeader'>
										<input type='text' name='Years' placeholder='Year...' class='deptCategoryHeader'>
										<select name='Type' class='deptCategoryHeader'>
											<option value='Book'>Book</option>
											<option value='Magazine'>Magazine</option>
											<option value='E-Book'>E-Book</option>
											<option value='Audiobook'>Audiobook</option>
											<option value='DVD'>DVD</option>
										</select>
										<input id='returnBtn' class='button' type='submit' name='Submit' value='Search'>
									</form>
								</div>
							</li>
						</div>
						<div class='navmenu'>
							<li><a href='staff-bookloanlist.php?staffEmail=".$staffEmail."&role=".$role."' class='dropbtn'><i class='fa fa-inbox'></i> Loan</a></li>
						</div>
						<div class='navmenu'>
							<li><a href='javascript:void(0)' onclick='myDropnav2()' class='dropbtn'><i class='fa fa-user-circle-o'></i> " . $staffEmail . "</a>
								<div id='myDropdown2' class='navmenu-navcontent'>
									<a href='staff-profile.php?staffEmail=".$staffEmail."&role=".$role."'><img src='icon/profile.png' class='side-nav-icon' />Profile</a>
									<a  href='javascript:void(0);' onclick='confirmstaffLogout()'><img src='icon/logout.png' class='side-nav-icon' />Log Out</a>
								</div>
								<script>
									function confirmstaffLogout() {
											const confirmation = confirm('Are you sure you want to logout?');

											if (confirmation) {
													window.location.href = 'staff-logout.php?staffEmail=" . $staffEmail . "&role=" . $role . "';
											} else {
													// If 'No' is clicked, do nothing or close the notification
											}
									}
							</script>
							</li>
						</div>
					</nav>
				</div>
			</header>
			";
		}else{
			if(isset($_GET['memberEmail'])&& isset($_GET['role'])){
			$memberEmail=$_GET['memberEmail'];
			include 'connection.php';

			$query = dbConn()->prepare('SELECT * FROM member WHERE memberEmail="'. $memberEmail .'"');
			$query->execute();
			$memberData = $query->fetchAll(PDO::FETCH_OBJ);
				// Create a Member object and populate it with data
			foreach($memberData as $member){
				$memberProfileImg = $member->memberProfileImg;
				if (!isset($_SESSION['cart'])) {
					$_SESSION['cart'] = [];
				}
				$totalQuantity=0;
				$totalQuantity = array_reduce($_SESSION['cart'], function ($carry, $item) {
						return $carry + $item['quantity'];
				}, 0);
				echo"
				<header>
					<div id='side-left'>
						<div class='header-side' id='side-nav-btn' onclick='openNav()'>
							<a>
								<i class='fa fa-bars'></i>
							</a>
						</div>
					</div>
					<a href='member-index.php?memberEmail=".$memberEmail."&role=".$role."'>
						<h1 class='title-header'>
							<img src='icon/logo.png' id='title-header-logo' />
						</h1>
					</a>
					<div id='minimize'>
						<nav>
							<div class='navmenu'>
								<li><a href='javascript:void(0)' onclick='myDropnav()' class='dropbtn'><i class='fa fa-search'></i> Search</a>
									<div id='myDropdown' class='navmenu-navcontent'>
										<form method='POST' enctype='multipart/form-data' action='member-findcatalogue.php?memberEmail=".$memberEmail."&role=".$role."'>
											<input type='text' name='Title' placeholder='Title...' class='deptCategoryHeader'>
											<input type='text' name='Authors' placeholder='Author(s)...' class='deptCategoryHeader'>
											<input type='text' name='Years' placeholder='Year...' class='deptCategoryHeader'>
											<select name='Type' class='deptCategoryHeader'>
												<option value='Book'>Book</option>
												<option value='Magazine'>Magazine</option>
												<option value='E-Book'>E-Book</option>
												<option value='Audiobook'>Audiobook</option>
												<option value='DVD'>DVD</option>
											</select>
											<input id='returnBtn' class='button' type='submit' name='Submit' value='Search'>
										</form>
									</div>
								</li>
							</div>
							<div class='navmenu'>
								<li><a href='member-cart.php?memberEmail=".$memberEmail."&role=".$role."' class='dropbtn'><i class='fa fa-shopping-cart'></i> Cart <i id='countCartQty'>$totalQuantity</i></a></li>
							</div>
							<div class='navmenu'>
								<li><a href='javascript:void(0)' onclick='myDropnav2()' class='dropbtn'><img src='$memberProfileImg' id='profileImage' />" . $memberEmail . "</a>
									<div id='myDropdown2' class='navmenu-navcontent'>
										<a href='member-profile.php?memberEmail=".$memberEmail."&role=".$role."'><img src='icon/profile.png' class='side-nav-icon' />Profile</a>
										<a href='javascript:void(0);' onclick='confirmmemberLogout()'><img src='icon/logout.png' class='side-nav-icon' />Log Out</a>
									</div>
									<script>
										function confirmmemberLogout() {
												const confirmation = confirm('Are you sure you want to logout?');
												if (confirmation) {
														window.location.href = 'member-logout.php?memberEmail=" . $memberEmail . "&role=" . $role . "';
												} else {
														// If 'No' is clicked, do nothing or close the notification
												}
										}
								</script>
								</li>
							</div>
						</nav>
					</div>
				</header>
				";
				}
			}
		}
	}
	else{
		echo"
		<header>
			<div id='side-left'>
				<div class='header-side' id='side-nav-btn' onclick='openNav()'>
					<a>
						<i class='fa fa-bars'></i>
					</a>
				</div>
			</div>
				<a href='index.php'>
					<h1 class='title-header'>
						<img src='icon/logo.png' id='title-header-logo' />
					</h1>
				</a>
				<div id='minimize'>
					<nav>
						<div class='navmenu'>
							<li><a href='javascript:void(0)' onclick='myDropnav()' class='dropbtn'><i class='fa fa-search'></i> Search</a>
								<div id='myDropdown' class='navmenu-navcontent'>
									<form method='POST' enctype='multipart/form-data' action='findcatalogue.php'>
										<input type='text' name='Title' placeholder='Title...' class='deptCategoryHeader'>
										<input type='text' name='Authors' placeholder='Author(s)...' class='deptCategoryHeader'>
										<input type='text' name='Years' placeholder='Year...' class='deptCategoryHeader'>
										<select name='Type' class='deptCategoryHeader'>
											<option value='book'>Book</option>
											<option value='magazine'>Magazine</option>
											<option value='ebook'>E-Book</option>
											<option value='audiobook'>Audiobook</option>
											<option value='dvd'>DVD</option>
										</select>
										<input id='returnBtn' class='button' type='submit' name='Submit' value='Search'>
									</form>
								</div>
							</li>
						</div>
						<div class='navmenu'>
							<li><a href='login.php' class='dropbtn'><i class='fa fa-shopping-cart'></i> Cart <i id='countCartQty'>0</i></a></li>
						</div>
						<div class='navmenu'>
							<li><a href='javascript:void(0)' onclick='myDropnav2()' class='dropbtn'><i class='fa fa-user-circle-o'></i> Account</a>
								<div id='myDropdown2' class='navmenu-navcontent'>
									<a href='login.php'><img src='icon/login.png' class='side-nav-icon' />Login</a>
									<a href='signup.php'><img src='icon/signup.png' class='side-nav-icon' />Sign Up</a>
								</div>
							</li>
						</div>
					</nav>
				</div>
			</header>
		";
	}
?>
