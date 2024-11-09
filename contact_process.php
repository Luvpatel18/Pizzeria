<?php
include('init.php');
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: signin.php");
        exit();
    }

    // Sanitize and retrieve form data
    $user_id = $_SESSION['user_id'];
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert message into contact_messages table
    $query = "INSERT INTO contact_messages (user_id, name, email, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isss", $user_id, $name, $email, $message);

    if ($stmt->execute()) {
        // Redirect to contact page with a success message
        header("Location: contact.php?success=1");
        exit();
    } else {
        // Redirect to contact page with an error message
        header("Location: contact.php?error=1");
        exit();
    }
} else {
    // Redirect to contact page if accessed directly
    header("Location: contact.php");
    exit();
}
?>
