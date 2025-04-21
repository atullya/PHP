<?php
session_start();
if (!isset($_SESSION['cart'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Sign Up</title>
</head>
<body>
    <h2>Sign Up to Place Order for: <?php echo $_SESSION['cart']; ?></h2>
    <form method="POST" action="save_order.php">
        <input type="text" name="name" placeholder="Full Name" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="text" name="address" placeholder="Address" required><br><br>
        <input type="submit" value="Place Order">
    </form>
</body>
</html>
