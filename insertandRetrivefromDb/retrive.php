<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $servername = "localhost";
            $username = "root";
            $pass = "";
            $dbname = "practise";

            // Create connection
            $conn = mysqli_connect($servername, $username, $pass, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT name, age, email, gender FROM user";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . ($row['name']) . '</td>';
                    echo '<td>' . ($row['age']) . '</td>';
                    echo '<td>' . ($row['email']) . '</td>';
                    echo '<td>' . ($row['gender']) . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="4">No records found</td></tr>';
            }

            mysqli_close($conn);
        ?>
        </tbody>
    </table>
</body>
</html>
