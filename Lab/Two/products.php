<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Select a Product</h2>
<form method="POST" action="place_order.php">
    <input type="radio" name="product" value="Laptop" required> Laptop<br>
    <input type="radio" name="product" value="Smartphone"> Smartphone<br>
    <input type="radio" name="product" value="Headphones"> Headphones<br><br>
    <input type="submit" value="Place Order">
</form>
