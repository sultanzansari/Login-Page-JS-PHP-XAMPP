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
        $email = $_POST['email'];
        $password = $_POST['password'];
        echo "username: $username <br>";
        echo "email: $email <br>";
        echo "password: $password <br>";
        // connect to the database
        $conn = mysqli_connect('localhost', 'root', '', 'login_form');
    // check if the connection was successful
    if (!$conn) {
      die("<p class='error'>Connection failed: " . mysqli_connect_error() . "</p>");
    }

    // query the database for the user
    $sql = "INSERT INTO login2_info (username, email, password) VALUES ('$username', '$email', '$password')";
    echo "SQL: $sql <br>";
    $check_email = "SELECT email FROM login2_info WHERE email = '$email'";
    echo "checkemail: $check_email";
    $result = mysqli_query($conn, $check_email);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<p class='error'>The email already exists.</p>";
    } else {
        if (mysqli_query($conn, $sql)) {
            // the INSERT statement was successful
            echo "<h1 class='success'>REGISTRATION SUCCESSFUL</h1>";
            echo "<p class='success'>User, Email, and Password inserted successfully</p>";
        } else {
            // the INSERT statement failed
            echo "<p class='error'>Insertion failed: " . mysqli_error($conn) . "</p>";
        }
    }

    // close the database connection
    mysqli_close($conn);
  }
?>
  </body>
</html>