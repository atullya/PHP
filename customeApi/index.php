<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");
if($_SERVER['REQUEST_METHOD'] == "POST"){

$servername = "localhost";  
$username = "root";
$pass = "";
$dbname = "users";

// Create connection
$conn = mysqli_connect($servername, $username, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

$arr = [];

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $arr[] = [
                'username' => $row['username'],
                'password' => $row['password'],
                'date' => $row['date']
            ];

        }
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo json_encode($arr);

// Close connection
mysqli_close($conn);
}

?>
