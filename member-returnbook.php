<!DOCTYPE html>
<html>
<head>
		<title>Update Submission Process</title>
		<link rel="icon" href="icon/icons8-improvement-64.png">
		<link rel="stylesheet" href="style.css">
</head>
<body class="bgcover">
<?php
include 'connection.php';
include 'js_connection.php';
include 'loan.php';

$memberEmail = $_GET['memberEmail'];
$role = $_GET['role'];
$loanID = $_GET["loanID"];
$addReturnDate = new Loan($loanID, '', '', '');

if ($addReturnDate->addReturnDate()) {
		echo "<div class='pos'>";
		echo "<img src='icon/icons8-success-64.png'/>";
		echo "<h2>Success!</h2>";
		echo "<p id='valid'>Book Loan has successfully returned.</p>
          <p>Click <a href='member-bookloanlist.php?memberEmail=" . $memberEmail . "&role=" . $role . "'>
          <input id='returnBtn' class='button' type='button' name='return' value='Return'></a> to return.</p>";
    echo "</div>";
} else {
    echo "<div class='pos'>";
    echo "<img src='icon/icons8-error-96.png'/>";
    echo "<h2>Failed to Update Data!</h2>";
    echo "<p>Failed to upfate data.</p>
          <p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
    echo "</div>";
}
?>
</body>
</html>
