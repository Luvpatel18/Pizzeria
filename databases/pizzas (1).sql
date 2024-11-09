-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 12:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
