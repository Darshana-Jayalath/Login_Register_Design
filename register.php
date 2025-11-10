<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.location.href='register.html';</script>";
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format'); window.location.href='register.html';</script>";
        exit();
    }

    // Check if email already exists
    $check = "SELECT * FROM users WHERE email='$email'";
    $res = $conn->query($check);

    if ($res->num_rows > 0) {
        echo "<script>alert('Email already exists!'); window.location.href='register.html';</script>";
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration Successful! Please Login'); window.location.href='index.html';</script>";
        exit();
    } else {
        echo "<script>alert('Registration Failed!'); window.location.href='register.html';</script>";
        // Debugging line
        // echo "Error: " . $conn->error;
        exit();
    }
} else {
    header("Location: register.html");
    exit();
}
?>
