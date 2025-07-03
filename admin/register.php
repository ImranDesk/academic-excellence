<?php
// database config
$host = 'localhost';
$db = 'academic_excellence';
$user = 'root';
$pass = ''; // set your XAMPP password if any

// connect to DB
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get and sanitize inputs
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // validate inputs
    if (empty($username) || empty($email) || empty($password)) {
        die("All fields are required.");
    }

    // check if user already exists
    $checkQuery = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        die("Email already registered.");
    }
    $stmt->close();

    // hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // insert into DB
    $insertQuery = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sss", $username, $email, $hashedPassword);
    if ($stmt->execute()) {
        header("Location: login.html?success=1");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
