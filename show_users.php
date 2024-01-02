<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>STLA World - HomePage</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <header>
    <div class="topnav">
      <div class="MainPages">
        <img src="images/miniLogo.png" height="45" width="120" class="miniSTLALogo" />
        <a href="index.html">Home</a>
        <a href="events.html">Events</a>
        <a href="contact.html">Contact</a>
        <a href="Offers.html">Offers</a>
      </div>

      <div class="signup-login">
        <a href="Login_SignUp/login.html">Log In</a>
        <a href="Login_SignUp/signup.html">Sign Up</a>
        <a class="active" href="show_users.php">All Users</a>
      </div>
    </div>
    <br>
    <span class="STLALogo">
      <img src="images/STLA World.png" alt="STLA World Logo" height="212" width="415" />
    </span>

  </header>

  <main>
    <article>
      <h3>All Users</h3>
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "STLA";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT name, email FROM users"; 
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
      echo "<table>
        <tr>
          <th>Name</th>
          <th>Email</th>
        </tr>";
        while($row = $result->fetch_assoc()) {
        echo "<tr>
          <td>" . $row["name"]. "</td>
          <td>" . $row["email"]. "</td>
        </tr>";
        }
        echo "
      </table>";
      } else {
        echo "<table>
        <tr>
          <th>Name</th>
          <th>Email</th>
        </tr>
        <tr>
        <td colspan='2' style='text-align: center;'> NO USRES </td>
        </tr>
        </table> ";
      }
      $conn->close();

      ?>
    </article>
  </main>

  <footer>
    <p>
      The perfect website to book your tickets without waiting!
      <br>
      ________________________________________________________________
      <br>
      Copyright &copy;
      <script>document.write(new Date().getFullYear());</script>, STLA WORLD.
    </p>
  </footer>

</body>

</html>