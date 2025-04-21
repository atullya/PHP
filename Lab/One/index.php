<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['cart'] = $_POST['product'];
    header('Location: signup.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Add to Cart</title>
</head>
<body>
    <h1>Select a Product</h1>
    <form method="POST">
        <label>
            <input type="radio" name="product" value="Laptop" required> Laptop
        </label><br>
        <label>
            <input type="radio" name="product" value="Smartphone"> Smartphone
        </label><br><br>
        <input type="submit" value="Add to Cart & Continue">
    </form>
</body>
</html>
