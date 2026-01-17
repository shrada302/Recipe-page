<?php
// DB CONNECTION
$conn = mysqli_connect("127.0.0.1", "root", "biralo", "users", 3307);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

session_start();

// LOGIN CHECK
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// FETCH LOGGED-IN USER DATA
$userData = null;
$userQuery = "SELECT username, image FROM visitors WHERE username='$username' LIMIT 1";
$userResult = mysqli_query($conn, $userQuery);

if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userData = mysqli_fetch_assoc($userResult);
}

// HANDLE PROFILE UPDATE (IMAGE + NAME)
if (isset($_POST['update_profile'])) {

    $newUsername = mysqli_real_escape_string($conn, $_POST['new_username']);

    // IMAGE UPLOAD
    $imageName = $_FILES['profile_image']['name'];
    $tmpName = $_FILES['profile_image']['tmp_name'];

    if (!empty($imageName)) {
        // Validate image type
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed)) {
            $newImageName = time() . "_" . $imageName;

            // Create uploads folder if it doesn't exist
            if (!is_dir("../uploads")) {
                mkdir("../uploads", 0777, true);
            }

            move_uploaded_file($tmpName, "../uploads/" . $newImageName);

            // Update with new image
            $updateQuery = "UPDATE visitors SET username='$newUsername', image='$newImageName' WHERE username='$username'";
        } else {
            echo "<script>alert('Only image files (jpg, png, gif, webp) are allowed!');</script>";
            $updateQuery = "UPDATE visitors SET username='$newUsername' WHERE username='$username'";
        }
    } else {
        // Update without changing image
        $updateQuery = "UPDATE visitors SET username='$newUsername' WHERE username='$username'";
    }

    mysqli_query($conn, $updateQuery);

    // Update session
    $_SESSION['username'] = $newUsername;

    header("Location: contact.php");
    exit();
}

// HANDLE COMMENT + IMAGE UPLOAD
if (isset($_POST['post_comment'])) {
    if (!empty($_POST['comment'])) {
        $comment = mysqli_real_escape_string($conn, $_POST['comment']);

        $imageName = $_FILES['comment_image']['name'];
        $tmpName = $_FILES['comment_image']['tmp_name'];

        if (!empty($imageName)) {
            // Validate image type
            $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            if (in_array($ext, $allowed)) {
                $newImageName = time() . "_" . $imageName;

                // Create uploads folder if it doesn't exist
                if (!is_dir("../uploads")) {
                    mkdir("../uploads", 0777, true);
                }

                move_uploaded_file($tmpName, "../uploads/" . $newImageName);
            } else {
                $newImageName = NULL;
            }
        } else {
            $newImageName = NULL;
        }

        $sql = "INSERT INTO comments (username, comment, image) VALUES ('$username', '$comment', '$newImageName')";
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

    <nav class="navbar navbar-expand-lg px-3 sticky-top" style="font-size:0.8em;background:#8B0000;">
        <a class="navbar-brand" href="index.php" style="text-decoration:none;">
            <h1 class="m-0" style="color: green;">Hamro <span style="color: yellow;">व्यंजन</span></h1>
        </a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav gap-5">
                <li class="nav-item"><a class="nav-link" href="index.php">
                        <h2 class="m-0 text-white">Home</h2>
                    </a></li>
                <li class="nav-item"><a class="nav-link" href="index3.php">
                        <h2 class="m-0 text-white">Recipe</h2>
                    </a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">
                        <h2 class="m-0" style="color:yellow;">Contact</h2>
                    </a></li>
            </ul>
        </div>
    </nav>

    <main class="main bg-light p-5">
        <div class="row">

            <!-- LEFT: PROFILE SECTION (FROM DB) -->
            <div class="col-md-6 d-flex flex-column justify-content-center">
                <div class="text-center mb-4">
                    <h2 class="mb-4">Welcome</h2>

                    <?php if (!empty($userData['image'])) { ?>
                        <img src="../uploads/<?= htmlspecialchars($userData['image']) ?>"
                            class="mb-3"
                            style="width: 200px; 
                height: 200px; 
                border-radius: 50%; 
                object-fit: cover; 
                object-position: center;
                border: 4px solid #dc3545;
                box-shadow: 0 4px 8px rgba(0,0,0,0.2);"
                            alt="Profile">
                    <?php } else { ?>
                        <img src="/FOOD/website/pages/template/Ellipse 4.png"
                            class="mb-3"
                            style="width: 200px; 
                height: 200px; 
                border-radius: 50%; 
                object-fit: cover; 
                object-position: center;
                border: 4px solid #dc3545;
                box-shadow: 0 4px 8px rgba(0,0,0,0.2);"
                            alt="Default">
                    <?php } ?>

                    <h1 class="text-danger">
                        <?= htmlspecialchars($userData['username']) ?>
                    </h1>
                    <p>CSIT 4th semester BITM student.</p>

                    <!-- EDIT PROFILE BUTTON -->
                    <button class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        ✏️ Edit Profile
                    </button>
                </div>
            </div>

            <!-- RIGHT: COMMENT SECTION -->
            <div class="col-md-6">
                <div class="card p-4 shadow-lg mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="m-0 text-dark fw-bold">
                            <?= htmlspecialchars($userData['username']) ?>
                        </h4>
                        <a href="logout.php" class="btn btn-danger fw-semibold">Logout</a>
                    </div>
                    <hr>
                    <div class="text-muted small">
                        Status: <b>Logged In</b>. You can now post comments.
                    </div>
                </div>

                <div class="card p-4" style="border:2px solid red;">
                    <h3 class="mb-3">💬 Comment Section</h3>
                    <form method="POST" enctype="multipart/form-data">
                        <textarea class="form-control mb-3" name="comment" rows="4" placeholder="Write your comment..."></textarea>
                        <input type="file" name="comment_image" class="form-control mb-3">
                        <button type="submit" name="post_comment" class="btn btn-danger">Post Comment</button>
                    </form>
                </div>
            </div>

        </div>
    </main>

    <!-- EDIT PROFILE MODAL -->
    <div class="modal fade" id="editProfileModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text"
                                name="new_username"
                                class="form-control"
                                value="<?= htmlspecialchars($userData['username']) ?>"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Profile Image</label>
                            <input type="file" name="profile_image" class="form-control">
                            <small class="text-muted">Leave empty to keep current image</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="update_profile" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>