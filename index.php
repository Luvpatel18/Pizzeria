<?php
include('init.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Luv's Pizzeria</title>
    <link rel="stylesheet" href="css/index.css"> <!-- Link to CSS file -->
</head>
<body>

<?php include 'navigation/header.php'; ?>

<div class="hero-section">
    <div class="hero-content">
        <h1>Welcome to LuvPatel's Pizzeria</h1>
        <p>Where tradition meets taste! Discover our handcrafted pizzas made with fresh, quality ingredients.</p>
        <a href="menu.php" class="cta-button">View Menu</a>
    </div>
</div>

<div class="about-section" id="about">
    <h2>About Us</h2>
    <p>At LuvPatel's Pizza, we take pride in creating delicious, authentic pizzas that bring people together. From our carefully selected ingredients to our artisan recipes, every pizza is crafted with love and dedication.</p>
    <p>Come visit us or order online to experience the best pizza in town!</p>
</div>

<div class="highlights-section">
    <h2>Why Choose Us?</h2>
    <div class="highlights-list">
        <div class="highlight-item">
            <h3>Fresh Ingredients</h3>
            <p>We source only the freshest and finest ingredients for an unforgettable taste.</p>
        </div>
        <div class="highlight-item">
            <h3>Handcrafted Pizzas</h3>
            <p>Every pizza is handmade to perfection, following traditional techniques.</p>
        </div>
        <div class="highlight-item">
            <h3>Fast Delivery</h3>
            <p>Enjoy our pizzas from the comfort of your home with quick, reliable delivery.</p>
        </div>
    </div>
</div>

<div class="contact-section" id="contact">
    <h2>Contact Us</h2>
    <p>Have questions or want to place an order? Reach out to us!</p>
    <p><strong>Phone:</strong> (519) 650-0009</p>
    <p><strong>Email:</strong> info@Luvpizzeria.com</p>
    <p><strong>Address:</strong> 4195 King St E Unit 106, Kitchener, ON N2P 0C1, Canada</p>
    <p><strong>Hours:</strong></p>
    <ul>
        <li>Sunday - Thursday: 11 AM - 12 AM</li>
        <li>Friday - Saturday: 11 AM - 1 AM</li>
    </ul>
</div>

<?php include 'navigation/footer.php'; ?>

</body>
</html>
