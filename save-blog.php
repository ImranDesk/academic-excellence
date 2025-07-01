<?php
include 'db.php';

$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];

// Handle image upload
$imagePath = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $imageName = time() . '_' . basename($_FILES['image']['name']);
    $targetPath = $uploadDir . $imageName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        $imagePath = $targetPath;
    } else {
        die("Image upload failed.");
    }
} else {
    die("Image is required.");
}

// Insert into database
$sql = "INSERT INTO blogs (title, image_path, content, author) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$title, $imagePath, $content, $author]);

echo "Blog published successfully. <a href='add-blog.php'>Add another</a>";
?>
