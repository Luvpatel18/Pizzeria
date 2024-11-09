<?php
include('init.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php"); // Redirect to sign-in if not logged in
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Luv's Pizzeria</title>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>

<?php include 'navigation/header.php'; ?>

<div class="menu-container">
    <h1>Contact Us</h1>

    <form action="contact_process.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" required></textarea><br><br>
        
        <button type="submit" class="button-submit">Send Message</button>
    </form>
</div>

<!-- Success Modal -->
<div id="successModal" class="modal" style="display: <?php echo isset($_GET['success']) ? 'block' : 'none'; ?>;">
    <div class="modal-content">
        <span class="close-button" onclick="closeModal()">&times;</span>
        <h2>Message Sent Successfully!</h2>
        <p>Thank you for contacting us. We will get back to you soon!</p>
    </div>
</div>

<?php include 'navigation/footer.php'; ?>

<script>
// Function to close the modal
function closeModal() {
    document.getElementById("successModal").style.display = "none";
}

// Close the modal when clicking outside of it
window.onclick = function(event) {
    var modal = document.getElementById("successModal");
    if (event.target === modal) {
        modal.style.display = "none";
    }
}
</script>




</body>
</html>
