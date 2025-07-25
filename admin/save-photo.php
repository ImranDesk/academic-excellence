<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $conn = new mysqli("localhost", "root", "", "academic_excellence");

    if ($conn->connect_error) {
        echo "<script>alert('Database connection failed.'); window.history.back();</script>";
        exit();
    }

    $title = mysqli_real_escape_string($conn, $_POST['title'] ?? '');

    $targetDir = "../gallery/gallery/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    $imageName = time() . "_" . basename($_FILES['image']['name']);
    $targetFile = $targetDir . $imageName;
    $relativePath = $targetDir . $imageName; // same as $targetFile since it's already relative

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $sql = "INSERT INTO gallery (title, path) VALUES ('$title', '$relativePath')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Image uploaded successfully!'); window.location.href = '../admin/upload-gallery.php';</script>";
        } else {
            echo "<script>alert('Failed to save image metadata to database.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Failed to upload image file.'); window.history.back();</script>";
    }

    $conn->close();
}
?>
