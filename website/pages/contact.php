<?php

$conn = mysqli_connect("127.0.0.1", "root", "biralo", "users", 3307);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

session_start();
if (!isset($_SESSION['username'])) {
    // redirect to login if not logged in
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];



if (isset($_POST['post_comment'])) {
    if (!empty($_POST['comment'])) {
        $comment = mysqli_real_escape_string($conn, $_POST['comment']);
        $sql = "INSERT INTO comments (username, comment) VALUES ('$username', '$comment')";
        mysqli_query($conn, $sql);
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Hamro व्यंजन / Contact</title>

</head>

<body>


    <nav class="navbar navbar-expand-lg  px-3 sticky-top" style="font-size: 0.8em;background:#8B0000; ">
        <a class="navbar-brand" href="/index/index1.html" style="text-decoration:none;">
            <h1 class="m-0" style="color: green;">Hamro <span style="color: yellow;">व्यंजन</span></h1>
        </a>

        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav gap-5">
                <li class="nav-item">
                    <a class="nav-link" href="index1.php">
                        <h2 class="m-0 text-white">Home</h2>
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link" href="index3.php">
                        <h2 class="m-0 text-white">Recipe</h2>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">
                        <h2 class="m-0" style="color:yellow;">Contact</h2>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="main bg-light p-5">
        <div class="row full-height">
            <div class="col-md-6 d-flex flex-column justify-content-center image-description-col">
                <div class="text-center mb-4">
                    <h2 class="mb-4">Welcome</h2>
                    <img src="/Food/website/template/Ellipse 4.png" alt="_img">

                    <p>
                    <h1 class="ext-danger">Roshni Rana</h1>
                    Csit 4th semester BITM student.
                    </p>

                </div>
            </div>

            <div class="col-md-5">

                <div class="card p-4 shadow-lg mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="m-0 text-dark fw-bold">
                            <i class="bi bi-person-circle me-2 text-success"></i>Roshni Rana
                        </h4>

                        <button class="btn btn-danger d-flex align-items-center fw-semibold" id="logoutButton">
                            <a href="login.php" style="text-decoration: none; color: white;;"> <i
                                    class="bi bi-box-arrow-right me-1"></i>
                                Logout
                            </a>
                        </button>
                    </div>
                    <hr>
                    <div class="text-muted small">
                        Status: **Logged In**. You can now post comments.
                    </div>
                </div>

                <div class="card p-4 bg-white" style="width: 100%; max-width: 450px; border: 1px solid red;">
                    <h3 class="card-title mb-3">💬 Comment Section</h3>

                    <form method="POST">
                        <div class="mb-3">
                            <textarea class="form-control"
                                name="comment"
                                rows="4"
                                placeholder="Write your comment..."></textarea>
                        </div>

                        <button type="submit"
                            name="post_comment"
                            class="btn btn-danger">
                            Post Comment
                        </button>
                    </form>
                </div>


            </div>

    </main>

</body>

</html>
