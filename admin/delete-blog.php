<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid request.");
}

$blogId = intval($_GET['id']);

// Connect to DB
$conn = new mysqli("localhost", "root", "", "academic_excellence");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optionally, delete the blog image file first (if you're storing image paths)
$imageQuery = $conn->prepare("SELECT image FROM blogs WHERE id = ?");
$imageQuery->bind_param("i", $blogId);
$imageQuery->execute();
$imageQuery->bind_result($imagePath);
if ($imageQuery->fetch() && $imagePath) {
    $fullPath = '../uploads/blog_img/' . basename($imagePath);
    if (file_exists($fullPath)) {
        unlink($fullPath); // Delete the image file
    }
}
$imageQuery->close();

// Delete the blog from DB
$stmt = $conn->prepare("DELETE FROM blogs WHERE id = ?");
$stmt->bind_param("i", $blogId);

if ($stmt->execute()) {
    header("Location: admin.php?message=Blog+deleted+successfully");
} else {
    echo "Error deleting blog.";
}

$stmt->close();
$conn->close();
?>
