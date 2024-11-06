<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Log Out - Librarian</title>
  </head>
  <body>

  <?php
    include 'connection.php';
    $date=date("Y-m-d h:i:sa");
    $staffEmail=$_GET['staffEmail'];
    $query = dbConn()->prepare("UPDATE staff SET lastLogin=:date WHERE staffEmail='".$staffEmail."'");
    $query->bindParam(":date", $date);
    $query -> execute();
    session_start();
    session_unset();
    session_destroy();
    header("location:index.php");
    exit();
  ?>
  </body>
</html>
