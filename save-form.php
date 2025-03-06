<?php
$conn = mysqli_connect("localhost","root","","ajax-form");

$name = $_POST['fullname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$country = $_POST['country'];

$sql = "INSERT INTO students(name, age, gender, country) VALUES ('{$name}',$age,'{$gender}','{$country}')";
if(mysqli_query($conn,$sql)){
    echo "Hello {$name} your record is saved.";
}else{
    echo "Cant save your data";
}
?>