<!DOCTYPE html>
<html>
  <head>
    <style>
      .success {
        color: green;
        font-size:30px;
        font-weight: bold;
        text-align:center;
      }
      .error {
        color: red;
        font-size:30px;
        font-weight: bold;
        text-align:center;
      }
    </style>
  </head>
  <body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get the form values
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo "username: $username <br>";
    echo "password: $password <br>";
    // connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'login_form');

    // check if the connection was successful
    if (!$conn) {
      die("<p class='error'>Connection failed: " . mysqli_connect_error());
    }

    // query the database for the user
    $sql = "SELECT * FROM `login2_info` WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    echo "SQL: $sql <br>";

    // check if the query was successful and if a user was found
    if (mysqli_num_rows($result) > 0) {
      // user was found, log them in
      echo "<h1 class='success'>Login successful</h1>";
      echo "<p class='success'>CONGRATS!!!!</p>";
    } else {
      // user was not found, show an error message
      echo "<p class='success'>Login failed</p>";
    }

    // close the database connection
    mysqli_close($conn);
}
?>
  </body>
</html>