<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['cart'])) {
    $product = $_SESSION['cart'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Save user
    $stmt = $conn->prepare("INSERT INTO users (name, email, address) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $address);
    $stmt->execute();
    $user_id = $stmt->insert_id;
    $stmt->close();

    // Save order
    $stmt2 = $conn->prepare("INSERT INTO orders (user_id, product_name) VALUES (?, ?)");
    $stmt2->bind_param("is", $user_id, $product);
    $stmt2->execute();
    $stmt2->close();

    echo "<h2>Order Placed Successfully for $product!</h2>";
    session_destroy();
} else {
    echo "Invalid access!";
}
?>
