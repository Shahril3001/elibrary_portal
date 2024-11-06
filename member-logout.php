<html>
  <head>
  <title>Log Out</title>
  </head>
  <body>
    <?php
      include 'connection.php';
      $date=date("Y-m-d h:i:sa");
      $memberEmail=$_GET['memberEmail'];
      $query = dbConn()->prepare("UPDATE member SET lastLogin=:date WHERE memberEmail='".$memberEmail."'");
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
