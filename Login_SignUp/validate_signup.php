<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "STLA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];


$sqlCheck = "SELECT * FROM Users WHERE email='$email'";
$result = $conn->query($sqlCheck);

if ($result->num_rows > 0) {
    echo "<script>
    alert('You Already Register, Please Log In');
    window.location.href='../Login_SignUp/login.html';
   </script>";
} else {
    $sqlInsert = "INSERT INTO Users (name, email, password, phone) VALUES ('$name','$email', '$password','$phone')";
    if ($conn->query($sqlInsert) === TRUE) {
        echo "<script>
                   alert('Successfully Register');
                   window.location.href='../index.html';
                  </script>";
    } else {
        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
    }
}

$conn->close();
?>