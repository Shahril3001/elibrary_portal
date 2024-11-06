<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-Library | Catalogue</title>
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
	    <?php
	    include 'connection.php';
	    include 'book.php'; // Include the Book class

	    $book = new Book('', '', '', '', '', '', '', '', '', '', '', '', '');
	    $booklists = [];

	    if (isset($_GET['Type'])) {
	        $Type = $_GET['Type'];
	        $booklists = $book->getAllBooks($Type);
	    } else {
	        $booklists = $book->getAllBooks();
	    }

	    $num_count = count($booklists);

	    echo "
	    <img src='icon/catalogue.png' class='statbox-title-img'/>
	    <a href='staff-addcatalogue.php?staffEmail=".$staffEmail."&role=".$role."'><button class='button' id='statbox-addBtn'>&plus; Add</button></a>
	    <h2 class='statbox-title-h2'>Catalogue</h2>
	    <hr>
			<div id='deptCategory'>
					<form method='POST' enctype='multipart/form-data' action='staff-findcatalogue.php?staffEmail=".$staffEmail."&role=".$role."'>
							<input type='text' name='Title' placeholder='Title...' class='deptCategoryelement'>
							<input type='text' name='Authors' placeholder='Author(s)...' class='deptCategoryelement'>
              <input type='text' name='Years' placeholder='Year...' class='deptCategoryelement'>
							<select name='Type' class='deptCategoryelement'>
									<option value='Book'>Book</option>
									<option value='Magazine'>Magazine</option>
									<option value='Ebook'>E-Book</option>
									<option value='Audiobook'>Audiobook</option>
									<option value='DVD'>DVD</option>
							</select>
							<input id='returnBtn' class='button' type='submit' name='Submit' value='Search'>
					</form>
			</div>";

	    if ($num_count != 0) {
	        echo "<p class='center-contents'><b>Result:</b> There are $num_count catalogue(s) shown below:-</p>
	        <div class='row'>
	            <table id='listtable'>
	                <tr>
	                    <th width='20px'>#</th>
	                    <th width='20%'>Cover</th>
	                    <th>Details</th>
	                    <th width='15%'>Action</th>
	                </tr>";

	        $cloneID = 0;
	        foreach ($booklists as $bookitem) {
	            $cloneID++;
	            $ISBN = $bookitem->ISBN;
	            $Title = $bookitem->Title;
	            $Title = (strlen($Title) < 55) ? $Title : substr($Title, 0, 55) . "...";
	            $Image = $bookitem->Image;
	            $Edition = $bookitem->Edition;
	            $Volume = $bookitem->Volume;
	            $Authors = $bookitem->Authors;
	            $Publishers = $bookitem->Publishers;
	            $PublicationYear = $bookitem->PublicationYear;
	            $Type = $bookitem->Type;
	            $Genre = $bookitem->Genre;
	            $Synopsis = $bookitem->Synopsis;
	            $DateAcquired = $bookitem->DateAcquired;

	            echo "
	            <tr>
	                <td>$cloneID</td>
	                <td><img src='$Image' id='catalogueCover' alt=''></td>
	                <td class='justify-contents'>
	                    <b>Title:</b> $Title<br>
	                    <b>Type:</b> $Type<br>
	                    <b>Author:</b> $Authors<br>
	                    <b>Publisher:</b> $Publishers<br>
	                    <b>Date Acquired:</b> $DateAcquired<br>
	                </td>
	                <td>
	                    <a href='staff-editcatalogue.php?staffEmail=".$staffEmail."&ISBN=".$ISBN."&role=".$role."'><button class='button' id='editBtn'>&#10227; Edit</button></a>
	                    <a href='staff-deletecatalogue.php?staffEmail=".$staffEmail."&ISBN=".$ISBN."&role=".$role."'><button class='button' id='deleteBtn'>&#128465; Delete</button></a>
	                </td>
	            </tr>";
	        }
	        echo "</table></div>";
	    } else if ($num_count == 0) {
	        echo "<p><b>Result:</b> There are no results found.</p>
	        <p><input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'></p>
	        <script>
	            function goBack() {
	                window.history.back();
	            }
	        </script>";
	    } else {
	        echo "<p>Something went wrong with the database.</p>";
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
