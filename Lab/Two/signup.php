<?php include 'db.php'; ?>
<h2>Sign Up</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <input type="text" name="address" placeholder="Address" required><br><br>
    <input type="submit" name="register" value="Sign Up">
</form>

<?php
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, address) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $pass, $address);
    if ($stmt->execute()) {
        echo "Signup successful. <a href='login.php'>Login here</a>";
    } else {
        echo "Email already exists!";
    }
}
?>
