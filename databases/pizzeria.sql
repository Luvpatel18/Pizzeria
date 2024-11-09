-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 08:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzeria`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pizza_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pizza_id`, `quantity`, `added_at`) VALUES
(6, 1, 3, 3, '2024-11-07 19:01:36'),
(7, 1, 1, 3, '2024-11-07 19:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `user_id`, `name`, `email`, `message`, `sent_at`) VALUES
(1, 1, 'vivek', 'vivek@gmail.com', 'bad experience while using this website', '2024-11-07 19:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `order_date`, `status`) VALUES
(1, 1, 60.44, '2024-11-07 18:58:40', 'pending'),
(2, 1, 56.94, '2024-11-07 19:01:04', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pizza_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `pizza_id`, `quantity`, `price`) VALUES
(1, 1, 3, 5, 0.00),
(2, 1, 2, 1, 0.00),
(3, 2, 3, 3, 0.00),
(4, 2, 1, 3, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `pizzas`
--

CREATE TABLE `pizzas` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pizzas`
--

INSERT INTO `pizzas` (`id`, `name`, `description`, `price`, `category`, `image`) VALUES
(1, 'Margherita', 'Classic cheese and tomato pizza with fresh basil.', 8.99, 'Veg', 'images/margherita.jpg'),
(2, 'Veggie Delight', 'Loaded with bell peppers, onions, mushrooms, and olives.', 10.49, 'Veg', 'images/veggie_delight.jpg'),
(3, 'Mushroom Melt', 'A blend of mushrooms with gooey melted cheese.', 9.99, 'Veg', 'images/mushroom_melt.jpg'),
(4, 'Spinach and Feta', 'Fresh spinach, feta cheese, and mozzarella.', 11.99, 'Veg', 'images/spinach_feta.jpg'),
(5, 'Garden Fresh', 'Topped with green peppers, tomatoes, onions, and black olives.', 9.49, 'Veg', 'images/garden_fresh.jpg'),
(6, 'Pepperoni', 'Loaded with classic pepperoni slices and cheese.', 11.99, 'Non-Veg', 'images/pepperoni.jpg'),
(7, 'BBQ Chicken', 'Grilled chicken, BBQ sauce, and red onions.', 12.49, 'Non-Veg', 'images/bbq_chicken.jpg'),
(8, 'Meat Lovers', 'Pepperoni, sausage, ham, and ground beef.', 13.99, 'Non-Veg', 'images/meat_lovers.jpg'),
(9, 'Chicken Supreme', 'Grilled chicken, mushrooms, and green peppers.', 12.99, 'Non-Veg', 'images/chicken_supreme.jpg'),
(10, 'Buffalo Chicken', 'Spicy buffalo sauce, grilled chicken, and red onions.', 12.99, 'Non-Veg', 'images/buffalo_chicken.jpg'),
(11, 'Hawaiian', 'Ham, pineapple, and mozzarella on a sweet base.', 11.49, 'Specialty', 'images/hawaiian.jpg'),
(12, 'Mediterranean', 'Feta cheese, olives, tomatoes, and spinach.', 12.99, 'Specialty', 'images/mediterranean.jpg'),
(13, 'Four Cheese', 'A blend of mozzarella, cheddar, parmesan, and blue cheese.', 13.49, 'Specialty', 'images/four_cheese.jpg'),
(14, 'Truffle Mushroom', 'Truffle oil, mushrooms, and fresh parsley.', 14.99, 'Specialty', 'images/truffle_mushroom.jpg'),
(15, 'Pesto Delight', 'Fresh basil pesto with mozzarella and cherry tomatoes.', 12.49, 'Specialty', 'images/pesto_delight.jpg'),
(16, 'Paneer Tikka', 'Indian-inspired with paneer, peppers, and tikka sauce.', 11.99, 'Veg', 'images/paneer_tikka.jpg'),
(17, 'Cheese Burst', 'Cheese-loaded crust with an extra cheesy topping.', 10.99, 'Veg', 'images/cheese_burst.jpg'),
(18, 'Sausage Feast', 'Spicy sausage, bell peppers, and mozzarella.', 12.49, 'Non-Veg', 'images/sausage_feast.jpg'),
(19, 'Beef and Bacon', 'Ground beef, bacon, and BBQ sauce.', 13.99, 'Non-Veg', 'images/beef_bacon.jpg'),
(20, 'Smoked Salmon', 'Smoked salmon, cream cheese, and capers.', 15.49, 'Specialty', 'images/smoked_salmon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `registered_at`) VALUES
(1, 'luv', 'luv1234', 'luv@gmail.com', '2024-11-07 18:47:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pizza_id` (`pizza_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `pizza_id` (`pizza_id`);

--
-- Indexes for table `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pizza_id`) REFERENCES `pizzas` (`id`);

--
-- Constraints for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD CONSTRAINT `contact_messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`pizza_id`) REFERENCES `pizzas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
