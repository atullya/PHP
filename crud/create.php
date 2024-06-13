<?php

$servername="localhost";
$username="root";
$pass="";
$dbname="crud";

$conn=mysqli_connect($servername,$username,$pass,$dbname);

if(!$conn){
    die("Connection failed"). mysqli_connect_error;
}

$name="";
$email="";
$phone="";
$address="";

$errormessage="";

$successMessage="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];

do{
if(empty($name)||empty($email)||empty($phone)||empty($address)){
    $errormessage="All the fields are required";
    break;

}

//add new client to database
 $sql= "insert into clients(name,email,phone,address)".
 "values ('$name','$email','$phone','$address')";
 $result=$conn->query($sql);

if(!$result){
    $errormessage="Invalid Query".$connection->error;
    break;
}
$name="";
$email="";
$phone="";
$address="";

$successMessage="Clients added succesfully";

header("location: /crud/index.php");
}while(false);
}
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

<div class="container my-5">
    <h2>New Client</h2>
<?php

if(!empty($errormessage)){
    echo"
    <div class='row mb-3'>
    <div class='offset-sm-3 col-sm-6'>
<div class='alert alert-warning alert-dismissible fade show' role='alert'>
<strong>$errormessage</strong>
<button type='button' class='btn-close' aria-label='Close'>X</button>
</div>
</div>
</div>

    ";
}
?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="row mb-3">
        <label class='col-sm-3 col-form-label'> Name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
        </div>
    </div>

    <div class="row mb-3">
        <label class='col-sm-3 col-form-label'> Email</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
        </div>
    </div>

    <div class="row mb-3">
        <label class='col-sm-3 col-form-label'> Phone</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
        </div>
    </div>

    <div class="row mb-3">
        <label class='col-sm-3 col-form-label'> Address</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
        </div>
    </div>

     <?php
if(!empty($successMessage)){
    echo"
   <div class='row mb-3'>
<div class='alert alert-warning alert-dismissible fade show' role='alert'>
<strong>$successMessage</strong>
<button type='button' class='btn-close ' data-bs-dismiss='alert' aria-label='Close'></button>
</div>
   </div>
    ";
}

?>
    <div class="row mb-3">
    <div class="offset-sm-3 col-sm-3 d-grid">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <div class="col-sm-3 d-grid">
        <a href="/crud/index.php" class="btn btn-outline-primary" role="button">Cancel</a>
    </div>
    </div>
    </form>
</div>
    
</body>
</html>