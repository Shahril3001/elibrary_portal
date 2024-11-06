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
include 'connection.php';
include 'js_connection.php';
include 'book.php';

if (isset($_POST['Submit'])) {
    $staffEmail = $_GET['staffEmail'];
    $role = $_GET['role'];

    $ISBN = $_POST['ISBN'];
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
    $target_dir = $target_dir . basename($_FILES["Image"]["name"]);
    $fileimg_extension = pathinfo($target_dir, PATHINFO_EXTENSION);
    $fileimg_extension = strtolower($fileimg_extension);
    $valid_extension = array("png", "jpeg", "jpg");

    if (in_array($fileimg_extension, $valid_extension)) {
        move_uploaded_file($_FILES["Image"]["tmp_name"], $target_dir);
        $imageup = $target_dir;

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
            '00/00/0000'
        );

        $existingBooks = $book->findBooks($ISBN, $Title);

        if (empty($existingBooks)) {
            $currentDate = date("Y-m-d");

            if ($book->addBook($ISBN, $Title, $imageup, $Edition, $Volume, $Authors, $Publishers, $PublicationYear, $Type, $Genre, $Synopsis, $currentDate)) {
                echo "<div class='pos'>";
                echo "<img src='icon/icons8-success-64.png'/>";
                echo "<h2>Success!</h2>";
                echo "<p id='valid'>Book is successfully added.</p>
                    <p>Click <a href='staff-cataloguelist.php?staffEmail=" . $staffEmail . "&role=" . $role . "'><input id='returnBtn' class='button' type='button' name='return' value='Return'></a> to return.</p>";
                echo "</div>";
            } else {
                echo "<div class='pos'>";
                echo "<img src='icon/icons8-error-96.png'/>";
                echo "<h2>Invalid Value!</h2>";
                echo "<p id='invalid'>Unable to submit. Please try again.</p>
                    <p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>
                    <script>
                        function goBack() {
                            window.history back();
                        }
                    </script></p>";
                echo "</div>";
            }
        } else {
            echo "<div class='pos'>";
            echo "<img src='icon/icons8-error-96.png'/>";
            echo "<h2>Book Already Exists!</h2>";
            echo "<p id='invalid'>This book already exists in the catalog. Please try adding a different book.</p>
                <p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'> to re-attempt adding a new book catalog.</p>
                <script>
                    function goBack() {
                        window.history back();
                    }
                </script></p>";
            echo "</div>";
        }
    } else {
        echo "<div class='pos'>";
        echo "<img src='icon/icons8-error-96.png'/>";
        echo "<h2>Invalid Image File!</h2>";
        echo "<p id='invalid'>Unable to submit. Please try again.</p>
            <p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>
            <script>
                function goBack() {
                    window.history back();
                }
            </script></p>";
        echo "</div>";
    }
}
echo "</center>";
?>
</body>
</html>
