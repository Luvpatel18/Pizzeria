<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Luv's pizzeria</title>
    <link rel="stylesheet" href="css/signin.css">
</head>
<body>

<?php include 'navigation/header.php'; ?>

<div class="menu-container">
    <h1>Sign In</h1>
    
    <?php if (isset($_GET['error'])): ?>
        <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>

    <form action="signin_process.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Sign In</button>
    </form>
</div>

<?php include 'navigation/footer.php'; ?>

</body>
</html>
