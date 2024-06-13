<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label>Name:</label>
        <input type="text" name="name" ><br>
        <label>Age:</label>
        <input type="text" name="age" ><br>
        <label>Email:</label>
        <input type="email" name="email" ><br>
        <label>Gender:</label>
        <input type="radio" name="gender" value="Male">Male 
        <input type="radio" name="gender" value="Female">Female<br>
        <input type="submit" value="Send">
        <input type="reset" value="Clear">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $servername = "localhost";
        $username = "root";
        $pass = "";
        $dbname = "practise";

        // Create connection
        $conn = mysqli_connect($servername, $username, $pass, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $name = $_POST["name"];
        $age = $_POST["age"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $sql = "INSERT INTO `user` (`name`, `age`, `email`, `gender`) VALUES ('$name', '$age', '$email', '$gender');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Successfully Inserted";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>
</body>
</html>
