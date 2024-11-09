<?php
include('init.php');
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check credentials
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if ($password == $user['password']) {
            // Successful login, set session variable
            $_SESSION['user_id'] = $user['id'];
            
            // Redirect to home page or wherever desired
            header("Location: index.php");
            exit();
        }
    }

    // Redirect to login page if authentication fails
    header("Location: signin.php?error=invalid_credentials");
    exit();
}
