<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DonationData";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from form
$input_username = $_POST['username'];
$input_password = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("SELECT password FROM Signupdetails WHERE email = ?");
$stmt->bind_param("s", $input_username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($stored_password);
$stmt->fetch();

if ($stmt->num_rows > 0) {
    // Verify the password
    if ($stored_password === $input_password) {
        header("Location: index1.html");
    } else {
        echo '<script type="text/javascript">
            alert("Incorrect password");
            window.location.href = "login.html";
          </script>';
    }
} else {
          echo '<script type="text/javascript">
            alert("This account does not exist, please sign up.");
            window.location.href = "signup.html";
          </script>';
}

// Close connection
$stmt->close();
$conn->close();
?>