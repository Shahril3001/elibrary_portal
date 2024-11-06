<?php
	session_start();

	$memberEmail = isset($_GET['memberEmail']) ? $_GET['memberEmail'] : '';
	$role = isset($_GET['role']) ? $_GET['role'] : '';
	$ISBN = isset($_POST['ISBN']) ? $_POST['ISBN'] : '';

	if (!empty($ISBN) && !empty($_SESSION['cart'])) {
	    // Debugging: Display the cart contents before deletion
	    echo "Cart Before Deletion:<pre>";
	    print_r($_SESSION['cart']);
	    echo "</pre>";

	    $itemIndex = array_search($ISBN, array_column($_SESSION['cart'], 'ISBN'));

	    if ($itemIndex !== false) {
	        // Remove the item from the cart
	        unset($_SESSION['cart'][$itemIndex]);
	    }

	    // Debugging: Display the cart contents after deletion
	    echo "Cart After Deletion:<pre>";
	    print_r($_SESSION['cart']);
	    echo "</pre>";
	}

	// Redirect to the member-cart.php page
	header("Location: member-cart.php?memberEmail=$memberEmail&role=$role");
	exit;
?>
