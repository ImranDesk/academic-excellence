<?php
session_start();

// DB config
$host = 'localhost';
$db = 'academic_excellence';
$user = 'root';
$pass = ''; // XAMPP password (empty if default)

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($login) || empty($password)) {
        die("Please fill in both fields.");
    }

    // Get user by email or username
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ? OR username = ?");
    $stmt->bind_param("ss", $login, $login); // Bind both email and username
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $username, $hashedPassword);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashedPassword)) {
            // Set session
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;

            // Redirect
            header("Location: admin.php");
            exit();
        } else {
            die("Incorrect password.");
        }
    } else {
        die("No user found with that username or email.");
    }

    $stmt->close();
}
$conn->close();
?>