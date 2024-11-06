<?php
session_start();
?>

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
    include 'loan.php';

    $memberEmail = $_GET['memberEmail'];
    $loan = new Loan('', '', '', '');

    $role = $_GET['role'];
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
				foreach ($_SESSION['cart'] as $item) {
						$ISBN = isset($item['ISBN']) ? $item['ISBN'] : '';
						$Quantity = isset($item['quantity']) ? $item['quantity'] : 0;
						$success = $loan->addLoan($ISBN, $memberEmail, $Quantity);
						if ($success) {
								unset($_SESSION['cart']);
								echo "<div class='pos'>";
								echo "<img src='icon/icons8-success-64.png'/>";
								echo "<h2>Success!</h2>";
								echo "<p id='valid'>Your loan has successfully added.</p>";
								echo "<p>Click <a href='member-cart.php?memberEmail=".$memberEmail."&role=".$role."'><input id='returnBtn' class='button' type='button' name='return' value='Return'></a> to return.</p>";
								echo "</div>";
						} else {
								echo "<div class='pos'>";
								echo "<img src='icon/icons8-error-96.png'/>";
								echo "<p id='invalid'>An error occurred.</p>";
								echo "<p>Please try again or contact support.</p>";
								echo "<p><input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'></p>";
								echo "</div>";
						}
				}
    } else {
        echo "<div class='pos'>";
        echo "<img src='icon/icons8-error-96.png'/>";
        echo "<p id='invalid'>Your cart is empty.</p>";
        echo "<p>Please click <input id='backBtn' class='button' type='button' name='back' value='Back' onclick='goBack()'>.</p>";
        echo "</div>";
    }
    echo "</center>";
    ?>
</body>

</html>
