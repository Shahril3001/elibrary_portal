<!DOCTYPE html>
<html>
<head>
    <title>Delete Process</title>
    <link rel="icon" href="icon/icons8-improvement-64.png">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bgcover">
<?php
include 'connection.php';
include 'js_connection.php';
include 'member.php'; // Include the Member class

$staffEmail = $_GET['staffEmail'];
$role = $_GET['role'];
$memberID = $_GET["memberID"];

$member = new Member($memberID, '', '', '', '', '', '', '', '');

if ($member->deleteMember()) {
    echo "<div class='pos'>";
    echo "<img src='icon/icons8-success-64.png'/>";
    echo "<h2>Success!</h2>";
    echo "<p id='valid'>Data is successfully deleted.</p>
    <p>Click <a href='staff-memberlist.php?staffEmail=" . $staffEmail . "&role=" . $role . "'>
    <input id='returnBtn' class='button' type='button' name='return' value='Return'></a> to return.</p>
    ";
    echo "</div>";
} else {
    echo "<div class='pos'>";
    echo "<img src='icon/icons8-error-96.png'/>";
    echo "<h2>Failed to Delete Data!</h2>";
    echo "<p>Failed to delete data.</p>
    <p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
    echo "</div>";
}
?>
</body>
</html>
