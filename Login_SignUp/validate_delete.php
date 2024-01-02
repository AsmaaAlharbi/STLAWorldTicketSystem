<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "STLA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST["email"];

// First check if the user exists
$sqlCheck = "SELECT * FROM Users WHERE email='$email'";
$result = $conn->query($sqlCheck);

if($result->num_rows > 0) {
    // If the user exists
    $sqlDelete = "DELETE FROM Users WHERE email='$email'";

    if ($conn->query($sqlDelete) === TRUE) {
        echo "<script>
            alert('User deleted successfully');
            window.location.href='../index.html';
            </script>";
    } else {
        echo "<script>
            alert('Failed to delete user');
            window.location.href='../Login_SignUp/delete.html';
            </script>";
    }
} else {
    // If the user doesn't exist
    echo "<script>
        alert('No such email found');
        window.location.href='../Login_SignUp/delete.html';
        </script>";
}

$conn->close();
?>