<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET["id"])) {
    $id = ($_GET["id"]); // Ensure the ID is treated as an integer
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "crud";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $pass, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM clients WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Record deleted successfully
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}

header("Location: /crud/index.php");
exit;
?>
