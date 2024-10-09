<?php
$servername="localhost";
$usernanme ="root";
$password="";
$databasename="DonationData";
$conn = new mysqli($servername,$usernanme,$password );
if($conn->connect_error)
die("Connection Failed".$conn->connect_error);
$conn = new mysqli($servername,$usernanme,$password,$databasename);
if($conn->connect_error)
die("Connection Failed ".$conn->connect_error);
$table ="DonarDetails";
$sql = $conn->query("SHOW TABLES LIKE '$table'");
if(!$sql->num_rows> 0 )
{
    $sql = "CREATE TABLE DonarDetails(
        Donarname VARCHAR(50) NOT NULL,
        mobilenumber VARCHAR(10) NOT NULL,
        Donar_location VARCHAR(100) NOT NULL,
        foodtype VARCHAR(255) NOT NULL,
        quantity VARCHAR(255) NOT NULL
    )";
    if($conn->query($sql)){
        
    }
}
$donarname = $_POST['Donarname'];
$number = $_POST['number'];
$donarlocation = $_POST['location'];
$foodtype=$_POST['foodtype'];
$quantity =$_POST['quantity'];
$sql="insert into DonarDetails(Donarname,mobilenumber,Donar_location,foodtype,quantity)values('$donarname','$number','$donarlocation','$foodtype','$quantity')";
if($conn->query($sql)==true)
{
    echo '<script type="text/javascript">
            alert("We have successfully received your request. we will contact you as possible as soon.");
            window.location.href = "index1.html";
          </script>';
}