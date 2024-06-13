<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <a  role="button" class="btn btn-primary" href="/crud/create.php">New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>Email</th>
                    <th>PHONE</th>
                    <th>Address</th>
                    <th>Created AT</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername="localhost";
                $username="root";
                $pass="";
                $dbname="crud";

                $conn=mysqli_connect($servername,$username,$pass,$dbname);

                if(!$conn){
                    die("Connection failed"). mysqli_connect_error;
                }

                $sql ="Select * from clients";
                $result=mysqli_query($conn,$sql);

                if(!$result){
                    die("Invalid query:").mysqli_connect_error;
                }

                while($row=mysqli_fetch_assoc($result)){
echo"
     <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a class='btn btn-primary' href='/crud/edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger' href='/crud/delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>

";
                }
                ?>
           
            </tbody>
        </table>
    </div>
    
</body>
</html>