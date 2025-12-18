<?php
session_start();
$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  include "_dbconnection.php";

  $username = $_POST["username"]??"";
  $password = $_POST["password"]??"";

 $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

  $sql = "Select * from visitors where username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 0) {
    $login = true;
 $_SESSION['username'] = $email;
    header("location: contact.php");
 exit(); //
  }
  else {
    $showError = "Invalid Credentials";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

    <div class="card shadow-lg p-4" style="width: 100%; max-width: 450px;">
        <h1 class="card-title text-center mb-4">🔐Login</h1>

        <?php
        if ($login === true) {
            echo '<meta http-equiv="refresh" content="3; url=index1.php">';

            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> You have signed up!!! Redirecting to home page...
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        }

        // Display Error Alert
        if (!empty($showError)) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> ' . $showError . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        }
        ?>

        <form action="login.php" method="post">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="Email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="Password" required>
            </div>



            <div class="d-grid">
                <p>Don't have an account?? <a href="signup.php" style="color: red; text-decoration: none;">SIGNUP</a>
                </p>
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>
