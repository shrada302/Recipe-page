<?php
$uploadDir = "uploads/";
$images = glob($uploadDir . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>View Uploads</title>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">📁 Uploaded Images</h2>
    
    <div class="row">
        <?php if (count($images) > 0) { ?>
            <?php foreach ($images as $image) { ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="<?= $image ?>" class="card-img-top" alt="Upload">
                        <div class="card-body">
                            <small><?= basename($image) ?></small>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p class="text-muted">No images uploaded yet.</p>
        <?php } ?>
    </div>
</div>

</body>
</html>
```

**Then visit:**
```
http://localhost:3307/view_uploads.php
```

---

## ✅ **METHOD 4: Check via phpMyAdmin**

1. Open **phpMyAdmin**
2. Select your database: `users`
3. Click on table: `visitors`
4. Look at the **`image`** column

**You'll see:**
```
1705489012_profile.jpg
1705489123_comment.png