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
include 'book.php';

if (isset($_POST['Submit'])) {
    $staffEmail = $_GET['staffEmail'];
    $role = $_GET['role'];
    $ISBN = $_GET['ISBN'];
    $Title = $_POST['Title'];
    $Edition = $_POST['Edition'];
    $Volume = $_POST['Volume'];
    $Authors = $_POST['Authors'];
    $Publishers = $_POST['Publishers'];
    $PublicationYear = $_POST['PublicationYear'];
    $Type = $_POST['Type'];
    $Genre = $_POST['Genre'];
    $Synopsis = $_POST['Synopsis'];

    $target_dir = "data/img/book/";
    $target_file = $target_dir . basename($_FILES["Image"]["name"]);

    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);
    $valid_extensions = array("png", "jpeg", "jpg");

    if (in_array($file_extension, $valid_extensions)) {
        if (move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file)) {
            $imageup = $target_file;

  					$currentDate = date("Y-m-d");
            $book = new Book(
                $ISBN,
                $Title,
                $imageup,
                $Edition,
                $Volume,
                $Authors,
                $Publishers,
                $PublicationYear,
                $Type,
                $Genre,
                $Synopsis,
                $currentDate,
            );

            if ($book->updateBook()) {
                echo "<div class='pos'>";
                echo "<img src='icon/icons8-success-64.png'/>";
                echo "<h2>Success!</h2>";
                echo "<p id='valid'>Catalogue is successfully updated.</p>
                      <p>Click <a href='staff-cataloguelist.php?staffEmail=" . $staffEmail . "&role=" . $role . "'>
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
        } else {
            echo "<div class='pos'>";
            echo "<img src='icon/icons8-error-96.png'/>";
            echo "<h2>Error!</h2>";
            echo "<p id='invalid'>Sorry, there was an error uploading your file.</p>
                  <p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
            echo "</div>";
        }
    } else {
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
}
echo "</center>";
?>
</body>
</html>
