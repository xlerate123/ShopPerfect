<?php
include 'connection.php';

$name=mysqli_real_escape_string($conn, $_POST['name']);
$email=mysqli_real_escape_string($conn, $_POST['email']);
$phone=mysqli_real_escape_string($conn, $_POST['phone']);
$subject=mysqli_real_escape_string($conn, $_POST['subject']);
$message=mysqli_real_escape_string($conn, $_POST['message']);

header("location:contactus.html"); 

$conn=new mysqli('localhost','root','','shop');
if($conn->connect_error)
{
    die("Connection Unsuccessfully".$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into contact( name , email, phone, subject, message) values(?,?,?,?,?)");
    $stmt->bind_param("ssiss",$name,$email,$phone,$subject,$message);
    $stmt->execute();
    echo "Successfull";
    $stmt->close();
    $conn->close();
}
?>