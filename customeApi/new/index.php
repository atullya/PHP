<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");
$servername="localhost";
$username="root";
$pass="";
$dbname="users";

$conn=mysqli_connect($servername,$username,$pass,$dbname);

if(!$conn){
    die("Connection Error".mysqli_connect_error());
}

$sql="Select * from data";

$result=mysqli_query($conn,$sql);
$arr=[];
if($result){
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $arr[] = [
            'name' => $row['name'],
            'phone' => $row['phone'],
            'email' => $row['email']
        ];
    }
}
echo json_encode($arr);  


}




?>