<?php
session_start();

// DB config
$host = 'localhost';
$db = 'academic_excellence';
$user = 'root';
$pass = ''; // your XAMPP password, if set

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        die("Please fill in both fields.");
    }

    // get user by email
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // check if user exists
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $username, $hashedPassword);
        $stmt->fetch();

        // verify password
        if (password_verify($password, $hashedPassword)) {
            // set session
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;

            // redirect to dashboard
            header("Location: admin.php");
            exit();
        } else {
            die("Incorrect password.");
        }
    } else {
        die("No user found with that email.");
    }
    $stmt->close();
}
$conn->close();
?>
