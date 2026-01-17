<?php
session_start();
$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "_dbconnection.php";

    $username = $_POST["Email"] ?? "";
    $password = $_POST["Password"] ?? "";

    // Escape input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM visitors WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    
    // FIXED: Should be $num == 1 (found a match), not == 0
    if ($num == 1) {
        $login = true;
        $_SESSION['username'] = $username; // FIXED: was $email
        header("location: contact.php");
        exit();
    } else {
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
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 450px;">
        <h1 class="card-title text-center mb-4">🔐Login</h1>

        <?php
        if ($login === true) {
            echo '<div class="alert alert-success">Login successful! Redirecting...</div>';
        }
        if (!empty($showError)) {
            echo '<div class="alert alert-danger">' . htmlspecialchars($showError) . '</div>';
        }
        ?>

        <form method="post">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="Email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="Password" required>
            </div>
            <div class="d-grid">
                <p>Don't have an account? <a href="signup.php" style="color: red;">SIGNUP</a></p>
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>