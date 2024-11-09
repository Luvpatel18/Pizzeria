<?php
include('init.php');
?>

<header class="navbar">
    <div class="navbar-logo">
        <h1>Luv's pizzeria</h1>
    </div>
    <nav class="navbar-links">
        <a href="index.php">Home</a>
        <a href="index.php#about">About Us</a>
        <a href="menu.php">Menu</a>
        <a href="contact.php">Contact</a>
        <a href="cart.php">Cart</a>

        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="profile-dropdown">
                <img src="images/profile.jpg" alt="Profile" class="profile-icon"> 
                <div class="dropdown-content">
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        <?php else: ?>
            <a href="signin.php">Sign In</a>
        <?php endif; ?>
    </nav>
</header>
