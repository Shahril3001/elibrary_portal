<?php
session_start();
?>
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
    $memberEmail = $_GET['memberEmail'];
    $role = $_GET['role'];
    include 'connection.php';
    include 'loan.php';
    $loan = new Loan('', '', '', '');


    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
    }

    $ISBN = $_POST['ISBN'];
    $Title = $_POST['Title'];

    // Validate ISBN and Title
    if (!empty($ISBN) && !empty($Title)) {
        $totalQuantity = array_reduce($_SESSION['cart'], function ($carry, $item) {
            return $carry + $item['quantity'];
        }, 0);

          $maxTotalQuantity = 10;
          $count = 0;
          $count = $loan->calculateTotalBookLoanQuantity($memberEmail);

          if (($count == $maxTotalQuantity)) {
              echo '<div class="pos">';
              echo '<img src="icon/icons8-error-96.png"/>';
              echo "<h2>Fail!</h2>";
              echo "<p id='invalid'>You have already borrowed 10 books. You cannot borrow any more books.</p>";
              echo '<p>Please click <input id="backBtn" class="button" type="button" name="back" value="Back" onclick="goBack()"/>.</p>';
              echo '</div>';
          }elseif($totalQuantity==$maxTotalQuantity){
              echo "<div class='pos'>";
              echo "<img src='icon/icons8-error-96.png'/>";
              echo "<h2>Fail!</h2>";
              echo "<p id='invalid'>You've reached the maximum limit of 10 items in your cart. You cannot add more items.</p>
                  <p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
              echo "</div>";
          }elseif (($totalQuantity+$count)==$maxTotalQuantity) {
              echo "<div class='pos'>";
              echo "<img src='icon/icons8-error-96.png'/>";
              echo "<h2>Fail!</h2>";
              echo "<p id='invalid'>You've reached the maximum limit.</br> You have already borrowed $count books and have $totalQuantity books inside your cart.</p>
                  <p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
              echo "</div>";
          }else{
          if ($totalQuantity < $maxTotalQuantity) {
              $itemIndex = array_search($ISBN, array_column($_SESSION['cart'], 'ISBN'));

              if ($itemIndex !== false) {
                  $_SESSION['cart'][$itemIndex]['quantity']++;
                  echo "Success";
                  header("location:member-catalogue.php?memberEmail=" . $memberEmail . "&role=" . $role . "");
              } else {
                  $_SESSION['cart'][] = ['ISBN' => $ISBN, 'Title' => $Title, 'quantity' => 1];
                  echo "Success";
                  $previousURL = $_SERVER['HTTP_REFERER'];
                  header("Location: $previousURL");
              }
          } else {
              // Display an error message for exceeding the maximum total quantity
              echo "<div class='pos'>";
              echo "<img src='icon/icons8-error-96.png'/>";
              echo "<p id='invalid'>You've reached the maximum total of 10 items in cart, cannot add more items.</p>
                  <p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
              echo "</div>";
          }
        }
    } else {
        // Display an error message for missing ISBN or Title
        echo "<div class='pos'>";
        echo "<img src='icon/icons8-error-96.png'/>";
        echo "<p id='invalid'>Invalid ISBN or Title. Please make sure to provide valid values.</p>
            <p>Please click <input id='backBtn' class 'button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
        echo "</div>";
    }

echo "</center>";
?>
<script>
function goBack(){
    window.history.back();
}
</script>
</body>
</html>
