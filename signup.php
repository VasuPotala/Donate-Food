<?php
$servername="localhost";
$usernanme ="root";
$password="";
$conn = new mysqli($servername,$usernanme,$password );
if($conn->connect_error)
die("Connection Failed".$conn->connect_error);
$databasename="DonationData";
$checkdb =$conn->query("SHOW DATABASES LIKE '$databasename'");
if(!$checkdb->num_rows > 0)
{
    $sql = "create database DonationData";
    if($conn->query($sql)){
}
}
$conn = new mysqli($servername,$usernanme,$password,$databasename);
if($conn->connect_error)
die("Connection Failed ".$conn->connect_error);

// Create table if doesn't exist
$table = "Signupdetails";
$sql = $conn->query("SHOW TABLES LIKE '$table'");
if(!$sql->num_rows> 0 )
{
    $sql = "CREATE TABLE signupdetails(
        Username VARCHAR(50) NOT NULL,
        mobilenumber VARCHAR(10) NOT NULL,
        email VARCHAR(100) NOT NULL PRIMARY KEY,
        password VARCHAR(255) NOT NULL
    )";
    if($conn->query($sql)){
        
    }
}

$name = $_POST['name'];
$mobileno = $_POST['mobile'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO signupdetails(Username,mobilenumber,email,password)
VALUES ('$name','$mobileno','$email','$password')";
try{
if($conn->query($sql) == TRUE)
{
    header("Location: login.html");
}}
catch(Exception $e){
    echo '<script type="text/javascript">
            alert("Account already exists.");
            window.location.href = "login.html";
          </script>';
    
}
?>