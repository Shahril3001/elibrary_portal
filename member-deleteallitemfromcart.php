<?php
	session_start();

	$memberEmail = isset($_GET['memberEmail']) ? $_GET['memberEmail'] : '';
	$role = isset($_GET['role']) ? $_GET['role'] : '';

	if (!empty($_SESSION['cart'])) {
		// Debugging: Display the cart contents before deletion
		echo "Cart Before Deletion:<pre>";
		print_r($_SESSION['cart']);
		echo "</pre>";

		// Clear the entire cart
		unset($_SESSION['cart']);

		// Debugging: Display the cart contents after deletion
		echo "Cart After Deletion:<pre>";
		print_r($_SESSION['cart']);
		echo "</pre>";
	}

	// Redirect to the member-cart.php page
	header("Location: member-cart.php?memberEmail=$memberEmail&role=$role");
	exit;
?>
