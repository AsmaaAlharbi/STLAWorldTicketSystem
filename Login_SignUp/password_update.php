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
$newpassword = $_POST["newpassword"];
$confirmpassword = $_POST["confirmpassword"];

if ($newpassword == $confirmpassword) {

    $sql="UPDATE Users SET password = '$newpassword' WHERE email = '$email'";

    if($conn->query($sql) === TRUE){
        echo "<script>
        alert('Password updated successfully');
        window.location.href='../Login_SignUp/login.html';
        </script>";
    }else{
        echo "<script>
        alert('Failed to update password');
        window.location.href='../Login_SignUp/reset.html';
        </script>";
    }

}else{
    echo "<script>
    alert('New password and confirm password do not match, Please try again');
    window.location.href='../Login_SignUp/reset.html';
   </script>";
}

$conn->close();
?>