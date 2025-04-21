<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $product = $_POST['product'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO orders (user_id, product_name) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $product);
    $stmt->execute();

    echo "<h3>Order placed successfully for '$product'!</h3>";
    echo "<a href='products.php'>Order Another</a> | <a href='login.php'>Logout</a>";
}
?>
