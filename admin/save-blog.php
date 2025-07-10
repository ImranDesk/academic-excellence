<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];

    // Handle Image Upload
    $image = $_FILES['image'];
    $imageName = time() . '_' . basename($image['name']);
    $imagePath = 'uploads/' . $imageName;

    if (move_uploaded_file($image['tmp_name'], $imagePath)) {
        $stmt = $pdo->prepare("INSERT INTO blogs (title, author, content, image) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $author, $content, $imagePath]);
        echo "Blog posted successfully!";
    } else {
        echo "Image upload failed.";
    }
}
?>
