<!DOCTYPE html>
<html>
<head>
    <title>Update Submission Process</title>
    <link rel="icon" href="icon/icons8-improvement-64.png">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bgcover">
<?php
echo "<center>";
include 'connection.php';
include 'js_connection.php';
include 'member.php'; // Include the Member class

if (isset($_POST['Submit'])) {
    $staffEmail = $_GET['staffEmail'];
    $memberID = $_GET['memberID'];
    $role = $_GET['role'];

    $memberName = $_POST['memberName'];
    $memberEmail = $_POST['memberEmail'];
    $memberPhone = $_POST['memberPhone'];
    $memberDOB = $_POST['memberDOB'];
    $memberAddress = $_POST['memberAddress'];
    $memberPassword = $_POST['memberPassword'];
    $memberCPassword = $_POST['memberCPassword'];
		$lastLogin = $_POST['lastLogin'];

    $target_dir = "data/img/member/";
    $target_file = $target_dir . basename($_FILES["memberProfileImg"]["name"]);

    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);
    $valid_extensions = array("png", "jpeg", "jpg");

    if (empty($memberName) || empty($memberPhone) || empty($memberDOB) || empty($memberPassword) || empty($memberCPassword)) {
          echo "<div class='pos'>";
          echo "<img src='icon/icons8-error-96.png'/>";
          echo "<h2>Invalid Value!</h2>";
          echo "Some of the fields are empty. You can't proceed.</br>
              <p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
          echo "</div>";
    } else {
      if ($memberPassword == $memberCPassword) {
        if (in_array($file_extension, $valid_extensions)) {
               if (move_uploaded_file($_FILES["memberProfileImg"]["tmp_name"], $target_file)) {
               $imageup = $target_file;
               $member = new Member(
               $memberID,
               $memberName,
               $memberEmail,
               $memberPhone,
               $memberDOB,
               $imageup,
               $memberAddress,
               $memberPassword,
               $lastLogin
                   );

                   $profileUpdated = $member->updateProfile();

                   if ($profileUpdated) {
                       echo "<div class='pos'>";
                       echo "<img src='icon/icons8-success-64.png'/>";
                       echo "<h2>Success!</h2>";
                       echo "<p id='valid'>Profile is successfully updated.</p>
                             <p>Click <a href='staff-memberlist.php?staffEmail=" . $staffEmail . "&role=" . $role . "'>
                             <input id='returnBtn' class='button' type='button' name='return' value='Return'></a> to return.</p>";
                       echo "</div>";
                   } else {
                       echo "<div class='pos'>";
                       echo "<img src='icon/icons8-error-96.png'/>";
                       echo "<h2>Invalid Value!</h2>";
                       echo "<p id='invalid'>Unable to submit. Please try again.</p>
                               <p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
                       echo "</div>";
                   }
                 }else {
                       echo "<div class='pos'>";
                       echo "<img src='icon/icons8-error-96.png'/>";
                       echo "<h2>Error!</h2>";
                       echo "<p id='invalid'>Sorry, there was an error uploading your file.</p>
                             <p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
                       echo "</div>";
                 }
         }else {
           echo "<div class='pos'>";
           echo "<img src='icon/icons8-error-96.png'/>";
           echo "<h2>Invalid Image File!</h2>";
           echo "<p id='invalid'>Unable to submit. Please try again.</p>
               <p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>
               <script>
                 function goBack(){
                   window.history.back();
                 }
               </script>";
           echo "</div>";
         }
      }else {
         echo "<div class='pos'>";
         echo "<img src='icon/icons8-error-96.png'/>";
         echo "<h2>Password doesn't match.</h2>";
         echo "<p id='invalid'>Unable to submit. Please try again.</p>
              <p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
         echo "</div>";
      }
    }
}
echo "</center>";
?>
</body>
</html>
