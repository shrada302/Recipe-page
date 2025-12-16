<?php
$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "_dbconnection.php";
    
    $username = $_POST["Email"] ?? "";
    $password = $_POST["Password"] ?? "";
    $cpassword = $_POST["cpassword_confirm"] ?? ""; 
    
    $exist = false; 

    if (($password == $cpassword) && $exist == false) {

        $sql = "INSERT INTO `visitors` (`username`, `password`, `date`)
                VALUES ('$username', '$password', current_timestamp())";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $showAlert = true; 
        } else {
            $showError = "Database error: " . mysqli_error($conn);
        }
    } else {
        $showError = "Passwords do not match!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

    <div class="card shadow-lg p-4" style="width: 100%; max-width: 450px;">
        <h1 class="card-title text-center mb-4">🔐Sign Up</h1>

        <?php
        // Display Success Alert and include the redirect
        if ($showAlert === true) {
            // Meta Refresh tag added to redirect after 3 seconds
            echo '<meta http-equiv="refresh" content="3;url=login.php">';
            
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> You have signed up!!! Redirecting to login page...
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

        <form action="signup.php" method="post">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="Email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="Password" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="cpassword_confirm" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>