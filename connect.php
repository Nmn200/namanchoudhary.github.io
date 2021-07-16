<?php
$name = $_POST['Name'];
$email = $_POST['Email'];
$subject = $_POST['Subject'];
$message = $_POST['Message'];

$conn = new mysqli('localhost','root','','test1');
if($conn->connect_error){
    die('Connection failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into contact(name, email, subject, message)
    values(?, ?, ?, ?)");
    $stmt->bind_param("sssss",$name, $email, $subject, $message);
    $stmt->execute();
    echo "Submiited, Thank you!";
    $stmt->close();
    $conn->close();
}
?>