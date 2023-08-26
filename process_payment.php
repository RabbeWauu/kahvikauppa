<?php
include_once "./assets/header.php";
$orderNumber = generateOrderNumber();

$redirectDelay = 5; // Delay in seconds
$redirectUrl = "index.php"; // URL to redirect after countdown
?>

<?php
// After the payment is processed and successful
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitPayment'])) {

    // Display a thank-you message
    $thankYouMessage = "Thank you for placing your order! Your order has been successfully processed.\n";
    $thankYouMessage .= "Order Number: $orderNumber\n";

    // Reset the cart after successful payment
    $_SESSION['cart'] = [];

    // Display the thank-you message
    echo '<div class="alert alert-success">' . $thankYouMessage . '</div>';

    // Redirect after 3 seconds
    echo '<meta http-equiv="refresh" content="3;url=index.php">';

    // Display a link if not redirected
    echo 'If you\'re not redirected, <a href="index.php">click here</a>.';
}

?>