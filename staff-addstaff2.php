<!DOCTYPE html>
<html>
<head>
    <title>Add Submission Process</title>
    <link rel="icon" href="icon/icons8-improvement-64.png">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bgcover">
<?php
echo "<center>";
include 'connection.php'; // Include your database connection
include 'staff.php'; // Include the Staff class

if (isset($_POST['Submit'])) {
    $staffEmail = $_GET['staffEmail'];
    $role = $_GET['role'];

    $staffName = $_POST['staffName'];
    $staffEmail = $_POST['staffEmail'];
    $staffPhone = $_POST['staffPhone'];
    $staffPassword = $_POST['staffPassword'];
    $staffCPassword = $_POST['staffCPassword'];

    $staff = new Staff('', $staffName, $staffEmail, $staffPhone, $staffPassword, '00/00/0000');

    if (empty($staffName) || empty($staffEmail) || empty($staffPhone) || empty($staffPassword)) {
        echo "<div class='pos'>";
        echo "<img src='icon/icons8-error-96.png'/>";
        echo "<h2>Invalid Value!</h2>";
        echo "<p id='invalid'>Some of the fields are empty. You can't proceed.</p>
            <p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>";
        echo "</div>";
    } else {
        if ($staffPassword == $staffCPassword) {
            if ($staff->addStaff($staffName, $staffEmail, $staffPhone, $staffPassword)) {
                echo "<div class='pos'>";
                echo "<img src='icon/icons8-success-64.png'/>";
                echo "<h2>Success!</h2>";
                echo "<p id='valid'>Staff is successfully added.</p>
                    <p>Click <a href='staff-stafflist.php?staffEmail=".$staffEmail."&role=".$role."'><input id='returnBtn' class='button' type='button' name='return' value='Return'></a> to return.</p>";
                echo "</div>";
            } else {
                echo "<div class='pos'>";
                echo "<img src='icon/icons8-error-96.png'/>";
                echo "<h2>Staff Account is already created.</h2>";
                echo "<p id='invalid'>Unable to submit. Please try again.</p>
                    <p>Please click <input id='backBtn' class='button' type='button' name 'back' value='Back' onclick='goBack()'> to re-attempt creating a new staff account.</p>
                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script>";
                echo "</div>";
            }
        } else {
            echo "<div class='pos'>";
            echo "<img src='icon/icons8-error-96.png'/>";
            echo "<h2>Passwords don't match.</h2>";
            echo "<p id='invalid'>Unable to submit. Please try again.</p>
                <p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>
                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script>";
            echo "</div>";
        }
    }
}
echo "</center>";
?>
</body>
</html>
