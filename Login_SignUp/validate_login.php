<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "STLA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

// Check if email exists
$sql = "SELECT * FROM Users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User exists, now check password
    $row = $result->fetch_assoc();
    if($row['password'] == $password){
        // Password is correct
        echo "<script type='text/javascript'>
            alert('Logged In Successfully');
            window.location.href = '../index.html';
        </script>";
    } else {
        // Wrong password
        echo "<script type='text/javascript'>
        if (confirm('Wrong password, Click \'OK\' to reset the password, Click \'Cancel\' to try again.')) {
            window.location.href = '../Login_SignUp/reset.html';
        } else {
            window.location.href = '../Login_SignUp/login.html';
        }
    </script>";
    }
} else {
    // User does not exist
    echo "<script type='text/javascript'>
        alert('You do not have an account, Please SignUp');
        window.location.href = '../Login_SignUp/signup.html';
    </script>";
}

$conn->close();
?>