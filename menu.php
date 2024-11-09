<?php
include('init.php');
require 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php"); // Redirect to sign-in if not logged in
    exit();
}

$user_id = $_SESSION['user_id'];

// Handle adding item to cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pizza_id'])) {
    $pizza_id = $_POST['pizza_id'];

    // Check if the item is already in the cart
    $stmt = $conn->prepare("SELECT id, quantity FROM cart WHERE user_id = ? AND pizza_id = ?");
    $stmt->bind_param("ii", $user_id, $pizza_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cart_item = $result->fetch_assoc();

    if ($cart_item) {
        // Item already exists in cart, update the quantity
        $new_quantity = $cart_item['quantity'] + 1;
        $update_stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
        $update_stmt->bind_param("ii", $new_quantity, $cart_item['id']);
        $update_stmt->execute();
    } else {
        // Item is not in the cart, insert as new entry
        $insert_stmt = $conn->prepare("INSERT INTO cart (user_id, pizza_id, quantity) VALUES (?, ?, 1)");
        $insert_stmt->bind_param("ii", $user_id, $pizza_id);
        $insert_stmt->execute();
    }
    
    // Redirect to cart page after adding item
    header("Location: cart.php");
    exit();
}

// Fetch unique categories and pizzas
$categories = $conn->query("SELECT DISTINCT category FROM pizzas");
$all_pizzas = [];
foreach ($categories as $cat) {
    $category = $cat['category'];
    $all_pizzas[$category] = $conn->query("SELECT * FROM pizzas WHERE category = '$category'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Luv's pizzeria</title>
    <link rel="stylesheet" href="css/menu.css"> 
</head>
<body>

<?php include 'navigation/header.php'; ?>
<main class="menu-container">
    <?php foreach ($all_pizzas as $category => $pizzas): ?>
        <section class="category-section">
            <h2><?php echo htmlspecialchars($category); ?> Pizzas</h2>
            <div class="pizza-list">
                <?php while ($pizza = $pizzas->fetch_assoc()): ?>
                    <div class="pizza-item">
                        <img src="<?php echo htmlspecialchars($pizza['image']); ?>" alt="<?php echo htmlspecialchars($pizza['name']); ?>">
                        <h3><?php echo htmlspecialchars($pizza['name']); ?></h3>
                        <p><?php echo htmlspecialchars($pizza['description']); ?></p>
                        <p class="price">$<?php echo htmlspecialchars($pizza['price']); ?></p>
                        <form action="menu.php" method="POST">
                            <input type="hidden" name="pizza_id" value="<?php echo htmlspecialchars($pizza['id']); ?>">
                            <button type="submit">Add to Cart</button>
                        </form>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    <?php endforeach; ?>
</main>

<?php include 'navigation/footer.php'; ?>
</body>
</html>
