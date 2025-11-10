<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.location.href='register.html';</script>";
        exit();
    }

    // Check if email already exists
    $check = "SELECT * FROM users WHERE email='$email'";
    $res = $conn->query($check);

    if ($res->num_rows > 0) {
        echo "<script>alert('Email already exists!'); window.location.href='register.html';</script>";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        if ($conn->query($sql)) {
            echo "<script>alert('Registration Successful! Please Login'); window.location.href='login.html';</script>";
        } else {
            echo "<script>alert('Registration Failed!'); window.location.href='register.html';</script>";
        }
    }
}
?>
