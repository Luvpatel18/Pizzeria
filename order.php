<?php
include('init.php');
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch cart items for the user from the database
$query = "SELECT cart.pizza_id, cart.quantity, pizzas.price
          FROM cart
          JOIN pizzas ON cart.pizza_id = pizzas.id
          WHERE cart.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$cart_items = $stmt->get_result();

// Calculate total price and prepare items for insertion into `order_items`
$total = 0;
$order_items = [];
while ($item = $cart_items->fetch_assoc()) {
    $total += $item['price'] * $item['quantity'];
    $order_items[] = [
        'pizza_id' => $item['pizza_id'],
        'quantity' => $item['quantity']
    ];
}

// Insert into orders table
$order_query = "INSERT INTO orders (user_id, total) VALUES (?, ?)";
$order_stmt = $conn->prepare($order_query);
$order_stmt->bind_param("id", $user_id, $total);
if (!$order_stmt->execute()) {
    echo json_encode(['status' => 'error', 'message' => 'Error creating order: ' . $conn->error]);
    exit();
}
$order_id = $conn->insert_id;

// Insert each item into order_items table using the fetched cart items
foreach ($order_items as $order_item) {
    $item_query = "INSERT INTO order_items (order_id, pizza_id, quantity) VALUES (?, ?, ?)";
    $item_stmt = $conn->prepare($item_query);
    $item_stmt->bind_param("iii", $order_id, $order_item['pizza_id'], $order_item['quantity']);
    if (!$item_stmt->execute()) {
        echo json_encode(['status' => 'error', 'message' => 'Error adding item to order: ' . $conn->error]);
        exit();
    }
}

// Clear the cart for the user
$delete_cart_query = "DELETE FROM cart WHERE user_id = ?";
$delete_cart_stmt = $conn->prepare($delete_cart_query);
$delete_cart_stmt->bind_param("i", $user_id);
if (!$delete_cart_stmt->execute()) {
    echo json_encode(['status' => 'error', 'message' => 'Error clearing cart: ' . $conn->error]);
    exit();
}

// Return a JSON response indicating success
echo json_encode(['status' => 'success', 'message' => 'Order placed successfully.']);
exit();
?>
