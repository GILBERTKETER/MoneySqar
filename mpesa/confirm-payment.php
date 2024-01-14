<?php
session_start();

echo '<a href="index.php">Home<br /></a>';

if (isset($_SESSION["MerchantRequestID"]) && isset($_SESSION["CheckoutRequestID"]) && isset($_SESSION["phone"]) && isset($_SESSION["orderNo"])) {
    // Retrieve the saved session data
    $MerchantRequestID = $_SESSION["MerchantRequestID"];
    $CheckoutRequestID = $_SESSION["CheckoutRequestID"];
    $phone = $_SESSION["phone"];
    $orderNo = $_SESSION["orderNo"];

    // Display the transaction details
    echo "<h1>Confirm Payment</h1>";
    echo "<p>Order No: $orderNo</p>";
    echo "<p>Phone Number: $phone</p>";

    // Add a form for user confirmation
    echo '<form action="express-stk.php" method="post">';
    echo '<input type="hidden" name="phone_number" value="' . htmlspecialchars($phone) . '">';
    echo '<input type="hidden" name="orderNo" value="' . htmlspecialchars($orderNo) . '">';
    echo '<button type="submit">Confirm Payment</button>';
    echo '</form>';
} else {
    echo "<p>Transaction data not found. Please initiate the transaction from the checkout page.</p>";
}
