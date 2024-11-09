<?php
include('init.php');
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT cart.id AS cart_id, pizzas.name, pizzas.description, pizzas.price, pizzas.image, cart.quantity
          FROM cart
          JOIN pizzas ON cart.pizza_id = pizzas.id
          WHERE cart.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$cart_items = $stmt->get_result();
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - Luv's Pizzeria</title>
    <link rel="stylesheet" href="css/cart.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<?php include 'navigation/header.php'; ?>

<div class="menu-container">
    <h1>Your Cart</h1>
    <?php if ($cart_items->num_rows > 0): ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($item = $cart_items->fetch_assoc()): ?>
                    <tr id="cart-item-<?php echo $item['cart_id']; ?>">
                        <td><img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="cart-item-image"></td>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td><?php echo htmlspecialchars($item['description']); ?></td>
                        <td>
                            <input type="number" min="1" value="<?php echo htmlspecialchars($item['quantity']); ?>" onchange="updateQuantity(<?php echo $item['cart_id']; ?>, this.value)">
                        </td>
                        <td>$<?php echo number_format($item['price'], 2); ?></td>
                        <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                        <td>
                            <button onclick="deleteCartItem(<?php echo $item['cart_id']; ?>)">Delete</button>
                        </td>
                    </tr>
                    <?php $total += $item['price'] * $item['quantity']; ?>
                <?php endwhile; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="total-label">Total:</td>
                    <td class="total-amount">$<?php echo number_format($total, 2); ?></td>
                </tr>
            </tfoot>
        </table>
        <button class="checkout-button" onclick="placeOrder()">Proceed to Checkout</button>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</div>

<!-- Modal for Order Success -->
<div id="orderSuccessModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close-button" onclick="closeModal()">&times;</span>
        <h2>Order Placed Successfully!</h2>
        <p>Your order has been placed successfully. Thank you for shopping with us!</p>
    </div>
</div>

<?php include 'navigation/footer.php'; ?>

<script>
function updateQuantity(cartId, quantity) {
    $.ajax({
        url: 'update_cart.php',
        type: 'POST',
        data: { cart_id: cartId, quantity: quantity },
        success: function() {
            location.reload();
        }
    });
}

function deleteCartItem(cartId) {
    $.ajax({
        url: 'delete_cart.php',
        type: 'POST',
        data: { cart_id: cartId },
        success: function() {
            $('#cart-item-' + cartId).remove();
            location.reload();
        }
    });
}

function placeOrder() {
    $.ajax({
        url: 'order.php',
        type: 'POST',
        success: function(response) {
            try {
                const data = JSON.parse(response);
                console.log("Parsed Response:", data);
                if (data.status === 'success') {
                    showModal();  // Show success modal
                    $('.cart-table').remove();  // Clear cart table
                    $('.checkout-button').hide();  // Hide the checkout button
                } else {
                    alert("Error placing order: " + data.message);
                }
            } catch (e) {
                console.error("Error parsing JSON:", e);
                alert("Error placing order. Invalid response format.");
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", status, error);
            alert("Error placing order. Please try again.");
        }
    });
}

// Function to show the modal
function showModal() {
    document.getElementById("orderSuccessModal").style.display = "block";
}

// Function to close the modal
function closeModal() {
    document.getElementById("orderSuccessModal").style.display = "none";
}
</script>

</body>
</html>
