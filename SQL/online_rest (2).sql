-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 09:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_rest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `date`) VALUES
(1, 'Admin', 'admin123', 'admin@gmail.com', '2023-04-03 08:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `adv_orders`
--

CREATE TABLE `adv_orders` (
  `a_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) CHARACTER SET latin1 NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) CHARACTER SET latin1 DEFAULT NULL,
  `adate` date NOT NULL,
  `atime` time NOT NULL,
  `rs_id` int(222) NOT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adv_orders`
--

INSERT INTO `adv_orders` (`a_id`, `u_id`, `title`, `quantity`, `price`, `status`, `adate`, `atime`, `rs_id`, `address`) VALUES
(28, 1, 'Mexican Classic Tacos', 1, '289.00', NULL, '2023-05-24', '00:31:00', 6, NULL),
(29, 2, 'Golden Crispy Dosa', 1, '150.00', NULL, '0000-00-00', '00:00:00', 2, NULL),
(30, 2, 'Masala Khichdi Kadhi', 1, '162.00', NULL, '2023-05-20', '12:51:00', 3, NULL),
(31, 2, 'Masala Khichdi Kadhi', 1, '162.00', NULL, '2023-05-14', '00:54:00', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `cu_id` int(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`cu_id`, `cname`, `email`, `message`) VALUES
(1, 'Vishnu', 'vrthaker1398@gmail.com', 'not deliverd'),
(2, 'Rishi Soni', 'rishi@gmail.com', 'food quality very bad'),
(3, 'Rishi Soni', 'rishi31@gmail.com', 'Food yet not delivered');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(1, 5, 'Kadhai Panner', 'This is a delicious best Indian Pizza recipe with a spicy  pizza base and an Indian Kadai paneer topping .The soft baked pizza bread contains herbs and spices with a topping of curry style kadai paneer .', '319.00', '6431271c19f0f.jpg'),
(2, 2, 'Golden Crispy Dosa', 'I also cover making your own dosa batter in a blender or mixer-grinder, tips on fermentation and cooking dosa to help you make the best dosa – crispy, soft and so good to dunk in a bowl of Coconut Chutney or piping hot Sam', '150.00', '64312d8a5ce25.jpg'),
(3, 3, 'Masala Khichdi Kadhi', 'Kadhi Khichdi is a dish many of us have grown up on. It is a dish made up of a yellow Rice that is served with a warm fragrant yoghurt based soup which is thickened with gram/besan flour.', '162.00', '64313150e7781.jpg'),
(4, 4, 'Sizzle Dizzle Cottage Chesse Sizzler', 'A sizzler is quite versatile, lending itself to all manners of cuisines.You can prepare a quintessential Indian tandoori sizzler loaded with marinated paneer tikka, grilled until tender and drenched in a hot makhani gravy', '349.00', '643132194e7e4.jpg'),
(5, 1, 'Kathiyawadi Thali', 'Gujarat and its vivid vegetarian platter is a popular treat. While I have always been a fan of Gujarati snacks like Dhoklas, Khandwi and Aam Ras.', '199.00', '643132a20ad7b.jpg'),
(6, 6, 'Mexican Classic Tacos', 'a crispy or soft corn or wheat tortilla that is folded or rolled and stuffed with a mixture (as of seasoned meat, cheese, and lettuce).a crispy or soft corn or wheat tortilla that is folded or rolled and stuffed ', '289.00', '6431335e11d6c.jpg'),
(7, 1, 'Gujarati Thali', 'A Gujarati thali typically comprises of  one or two steamed or fried snacks called farsans, a green vegetable, a tuber or a gourd shaak.', '170.00', '643135a94a913.jpg'),
(8, 1, 'Punjabi Thali', 'A Bouquet of Punjabi dishes is assembled and served in a traditional thali. Punjabi dishes are loved universally for their richness and taste. ', '229.00', '64338bd787e78.jpg'),
(9, 2, 'Mysore Chatpata Dosa', 'Mysore Masala Dosa is crisp and soft dosa spiced with red chutney and served with a potato dish, along with coconut chutney', '230.00', '64313853540d5.jpg'),
(10, 2, 'Onion Dosa', 'Onion Dosa is a super popular South Indian breakfast dish. Not just all-over South India, but even in other regions, this dosa is an all-time favorite with many.', '220.00', '6431395423032.jpg'),
(11, 2, 'Vegetable Upma', 'Upma is possibly the most common breakfast option in most Indian households, right up there with poha. Also known as suji ka upma ', '150.00', '64313a591cbfc.jpg'),
(12, 2, 'Idli Vada', 'Idlis are round cakes made from a batter of steamed rice and fermented black lentil. Sometimes, fenugreek is added to the batter to give it flavour.', '140.00', '643138fd20e03.jpg'),
(13, 2, 'Super Paper Dosa', 'A dosa is a thin (usually crispy) South Indian flat bread made from a fermented batter primarily composed of lentils and rice. ', '249.00', '64313b1c94cff.jpg'),
(14, 2, 'Special Panchavarna Utapam', 'Uttapam is savory pancakes with crispy golden edges and a pillowy soft center topped with veggies. Traditionally served as breakfast in India, wholesome Uttapam also makes for a quick and satiating meal.', '345.00', '64313b9791450.jpg'),
(15, 2, 'Medu Vada', 'Medu vada is a traditional and delicious South Indian tiffin item normally eaten for breakfast or any time. ', '165.00', '64313bd99f153.jpg'),
(16, 3, 'Mix Green Vegetable', 'The vegetables may be chopped, sliced, cubed or in juliennes. The typical vegetables included in mixed vegetable are cauliflower, carrots, cabbage, French beans and peas.', '176.00', '64313ce661ad3.jpg'),
(17, 3, 'Rajwadi Dhokli', 'Rajwadi Dhokli is a delicious light yogurt based curry with spiced chickpea flour dumplings. This curry is from Gujarati Cuisine.', '225.00', '64313d35c7208.jpg'),
(18, 3, 'Surti Green Undhiyu', ' it is made with a combination of green vegetables and fenugreek dumplings cooked with special masala.', '203.00', '64313d7ecc382.jpg'),
(19, 3, 'Lasaniya Bataka', 'The Lasaniya Batata is one of those recipes made with potato, which does not have any frills or thrills about it. Yet, sits on the top when it comes to flavors in it.', '164.00', '64313dd74b5dd.jpg'),
(20, 3, 'Bajri-no-Rotlo', 'Bajra Na Rotla also known as Bajra Roti is a plain and simple flat bread made from pearl millet flour.', '38.00', '64313e59c0b45.jpg'),
(21, 3, 'Makai-no-Rotlo', 'Makki ki roti is an unleavened bread that can be made traditionally (in a tandoor), or using a tawa (flat skillet). Makki di roti are popular flatbreads from the land of Punjab.', '44.00', '64313f66a44be.jpg'),
(22, 3, 'Cheese Parotha', 'Cheese paratha is a delicious whole wheat unleavened flatbread stuffed with a cheesy savory stuffing made with cheddar cheese, onions, green chilies and black pepper. ', '143.00', '64314020672a9.jpg'),
(23, 4, 'Burnt Garlic Soup', 'Burnt Garlic Vegetable Soup is a vegetable soup cooked with the delightful flavour and aroma of burnt garlic, vegetables and spices, making a perfect appetizer to start any meal.', '250.00', '643140c0a88a7.jpg'),
(24, 4, 'Spring Roll', 'Spring rolls are a popular Chinese snack of crispy rolls filled with a savory mixed vegetables stuffing. ', '375.00', '6431412540af1.jpg'),
(25, 4, 'Panner Momos', 'Momos are a popular street food in northern parts of India. These are also known as Dim Sum and are basically dumplings made from flour with a savory stuffing.', '260.00', '64314178a1209.jpg'),
(26, 4, 'Fired Rice', 'Fried Rice is your best bet as well as answer. Make a vegan and gluten free dish with rice, sweet corn, capsicum, spring onions, herbs, spices, and enjoy it to with your.', '385.00', '643141d6d24c2.jpg'),
(27, 4, 'Hakka Noddles', ' hakka noodles taste delicious and will have you craving for more. I am sharing a vegan recipe loaded with veggies .It is a popular Indo-Chinese dish of stir fried noodles.', '435.00', '6431426fe0121.jpg'),
(28, 4, 'Thai Green Curry', 'Thai Green Curry recipe is terrific for customizing with your favorite veggies and suitable for both vegetarians and vegans alike! Spicy hot and wonderfully saucy green curry', '505.00', '643142c9d6c57.jpg'),
(29, 4, 'Panner Chilli Gravy', 'Chilli Paneer is one of the most popular recipes in Indo-Chinese cuisine. It is simply flour or batter coated fried paneer cubes tossed in a spicy, salty, tangy and sweet sauce ', '485.00', '64314343cb159.jpg'),
(30, 5, 'Margherita Pizza', 'Margherita Pizza only includes a few simple and tasty ingredients, like perfectly melty mozzarella cheese and fresh basil. ', '109.00', '6431441ac36fc.jpg'),
(31, 5, 'The 4 Chesse Pizza', ' Mozzarella, orange cheddar, ghost pepper flavored cheese and creamy cheese are used in the pizza with tangy tomato sauce. ', '349.00', '643144abecb54.jpg'),
(32, 5, 'Farm House Pizza', 'A farmhouse pizza has the best vegetables you can expect to have in a mouth-watering pizza. Fresh tomatoes, crisp capsicum, and succulent mushrooms are the top toppings in a farmhouse pizza.', '269.00', '643144fc393b6.jpg'),
(33, 5, 'Corn n Cheese Pizza', 'It is the perfect choice for people who don\'t like veggies on their pizza and don\'t eat meat. The hot gooey cheese combined with the juicy fresh sweet corn .', '219.00', '1000.jpg'),
(34, 5, 'Garlic Bread Stick', 'Garlic Bread Twists are drizzled with garlic and Parmesan cheese seasoning. Both varieties are served with a side of marinara for dipping. The marinara is a sweet tomato sauce blended with garlic, basil, and oregano.', '109.00', '64314833bd2a1.jpg'),
(35, 5, 'Panner Tikka Stuffed', 'Paneer Tikka Stuffed Garlic Bread is a whimsical combination of succulent paneer tikka cubes, onions, and oodles of cheese that\'s stuffed inside buttery garlic ', '169.00', '2.jpg'),
(36, 5, 'Crinkle Fries', 'Crinkle-cut or Criss-cross fries are fries obtained by quarter-turning the potato before each pass over the corrugated blade of a mandoline and deep-frying.', '75.00', '64314b7fd7816.jpg'),
(37, 5, 'Potato Cheese Shots', 'Our signature Potato Cheese Shots is also made from the same finest quality 100% mozzarella cheese and it has a liquid filling that contains real cheddar cheese and other dairy products.', '79.00', '64338b1f33959.jpg'),
(38, 6, 'Hot n Sour ', 'Hot and sour soup is a simple yet incredibly flavorful dish made with lots of fresh veggies and vibrant spices. It’s a spicy, sour and hot soup that’s popular in Indo-Chinese cuisine', '189.00', '643150423ca88.jpg'),
(39, 6, 'Panner Tikka ', 'Paneer Tikka is a popular and delicious tandoori snack where Paneer (Indian cottage cheese cubes) are marinated in a spiced yogurt-based marinade, arranged on skewers and grilled in the oven. ', '339.00', '64314cbda4747.jpg'),
(40, 6, 'Manchurian Dry', 'This popular Indian-Chinese recipe is filled with so much flavor and deliciousness. Make this popular dish in two ways by tossing fried cauliflower florets in a spicy, sweet-sour, umami sauce.', '299.00', '64314ce7de65d.jpg'),
(41, 6, 'Maharaja Harabhara Kabab', 'Hara Bhara Kabab is a very popular snack of North Indian fried patties made with spinach, peas and potatoes. This word means a kabab full of greens. Here the green colored veggies are spinach and green peas.', '319.00', '643150aa26b28.jpg'),
(42, 6, 'Panner Angara', 'Paneer Angara is a restauarant style smoky curry made using cottage cheese. Paneer is cooked in a flavorful onion tomato cashew curry base, spiced with whole spices and spice powders.', '359.00', '643150d70d370.jpg'),
(43, 6, 'Cheese Naan', 'This naan can be stuffed with soft-melted cheese which is crispy from outside and soft from inside. You can make this either in tandoor, oven or on tawa.', '149.00', '64315106d90c2.jpg'),
(44, 6, 'Hydrabadi Biriyani', 'Hyderabadi Veg Biryani is an authentic Indian vegetarian recipe packed full of your favorite rice, veggies, and spices. Made with patience and lots of love', '349.00', '643151d36907b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fooddnt`
--

CREATE TABLE `fooddnt` (
  `fd_id` int(222) NOT NULL,
  `name` varchar(222) NOT NULL,
  `address` varchar(224) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` bigint(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `pdate` date NOT NULL,
  `ptime` time NOT NULL,
  `img` text NOT NULL,
  `imgname` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fooddnt`
--

INSERT INTO `fooddnt` (`fd_id`, `name`, `address`, `email`, `phone`, `quantity`, `pdate`, `ptime`, `img`, `imgname`) VALUES
(1, 'Ayush P Patel', 'qwertyuioohg', 'rishi31@gmail.com', 9327504409, 20, '2023-04-08', '14:17:00', '', NULL),
(2, 'Ayush P Patel', 'xc bjnkmlkjhygtf', 'rishi31@gmail.com', 63538, 78, '2023-04-08', '14:22:00', '', NULL),
(3, 'JIGAR RAJESH THAKER', '13 Gopal Vatika Tv Station Road\r\nGunjaan', 'vrthaker1398@gmail.com', 9904835505, 55, '2023-04-17', '02:23:00', '', ''),
(4, 'Krisi H Soni', 'Mansi Green  Society Boriavi', 'rishi31@gmail.com', 9327504409, 15, '2023-05-07', '18:00:00', '', 'dishes.png');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(1, 17, 'rejected', 'Raw material not available', '2023-04-01 06:06:18'),
(2, 19, 'rejected', 'sorry', '2023-04-01 06:09:53'),
(3, 20, 'closed', 'ok', '2023-04-01 06:15:36'),
(4, 13, 'closed', 'fxdghj', '2023-04-08 13:23:06'),
(5, 53, 'in process', 'Comming Soon!\r\n', '2023-04-11 06:33:33'),
(6, 53, 'rejected', '  ', '2023-04-11 07:36:45'),
(7, 0, 'in process', 'fcgvhbjk', '2023-04-11 08:54:46'),
(8, 0, 'closed', 'sdf', '2023-04-11 08:59:51'),
(9, 0, 'closed', 'hbhdih', '2023-04-12 14:16:07'),
(10, 16, 'in process', 'Coming Soon !!!', '2023-04-12 18:43:57'),
(11, 60, 'in process', 'ok', '2023-04-17 08:59:01'),
(12, 19, 'in process', 'adv', '2023-04-17 09:11:40'),
(13, 61, 'in process', 'ok', '2023-04-28 19:17:25'),
(14, 61, 'closed', 'ok', '2023-04-28 19:20:52'),
(15, 61, 'in process', 'ok', '2023-04-28 19:31:46'),
(16, 63, 'closed', 'Thanks For Ordering', '2023-04-30 12:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`, `pass`) VALUES
(1, 1, 'Divine Dining Hall', 'divine@gmail.com', '63538 07630', 'www.divinehall.com', '11am', '11pm', 'mon-sun', ' Prathana Vihar, Anand - Vallabh Vidhyanagar Road, Vivekanand Nagar, Anand', '6431698cab1bc.jpg', '2023-04-10 04:08:06', 'Divine123'),
(2, 2, 'Sankalp', 'sankalp@gmail.com', '02692 245 031', 'www.sankalp.com', '11am', '11pm', 'mon-sun', 'A.V. Ground Floor, Opp. Nand Bhoomi Party Plot, Bhaikaka Marg, Anand', '02.jpg', '2023-04-01 13:03:34', 'Sankalp123'),
(3, 3, 'Shree Khodiyar Kathiyawadi', 'khodiyar@gmail.com', '97272 89744', 'www.khodiyaarkhathiyawadi.com', '11am', '11pm', 'mon-sun', 'F 102 to 105 Veer Saffire, Anand - Vidhyanagar Rd, above Tanishq, Anand', '03.jpg', '2023-04-01 13:07:56', 'Khodiyar123'),
(4, 4, 'Wok on Fire', 'wokonfire@gmail.com', '72030 66666', 'www.wokonfire.com', '11am', '11pm', 'mon-sun', '124, Maruti Solaris, Anand - Sojitra Rd, Near Madhubhan Resort, Anand,', '04.jpg', '2023-04-01 13:03:54', 'Wokonfire123'),
(5, 5, 'Dominos', 'dominos@gmail.com', '1800 208 1234', 'dominos.co.in', '11am', '11pm', 'mon-sun', 'Vimawala Arcade, opposite HP Petrol Pump, Vivekanand Wadi, Anand', '05.jpg', '2023-04-01 13:04:05', 'Dominos123'),
(6, 6, 'Retro Bistro', 'retrobistro@gmail.com', '7920298790', 'www.RetroBistro.com', '11am', '11pm', 'mon-sun', 'Lambhvel Rd, Opp. Hero Showroom, near Hanuman Temple, Anand', '06.jpeg', '2023-05-07 14:17:19', 'Retrobistro123');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(1, 'Gujarati ', '2023-05-05 06:00:16'),
(2, 'South-Indian', '2023-03-07 06:55:10'),
(3, 'Kathiyavadi', '2023-03-07 06:55:25'),
(4, 'Chinese', '2023-03-07 06:11:24'),
(5, 'Italian', '2023-03-07 06:11:55'),
(6, 'Multi-Cuisine', '2023-04-11 14:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address1` text NOT NULL,
  `address2` text DEFAULT NULL,
  `address3` text DEFAULT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address1`, `address2`, `address3`, `status`, `date`) VALUES
(1, 'Rishi', 'JIGAR', 'THAKER', 'vrthaker1398@gmail.com', '09904835505', 'Rishi31', '13 Gopal Vatika Tv Station Road', 'White house America', 'Bhivandi Mumbai', 1, '2023-05-13 18:30:18'),
(2, 'Vishnu', 'JIGAR', 'THAKER', 'vrthaker1398@gmail.com', '09904835505', 'vishnu123', '13 Gopal Vatika Tv Station Road', 'Gunjaan', 'qwertyuiop', 1, '2023-05-13 13:55:30'),
(3, 'Ayush', 'Ayush\r\n', 'Patel', 'ayush@gmail.com', '9998763617', 'ayush123', 'Shree Ram Shrusti near Prapti Circle Anand', NULL, NULL, 1, '2023-03-07 02:05:23'),
(4, 'Manav', 'Manav', 'Soni', 'manav@gmail.com', '9328404409', 'manav123', 'Ram Krishna Society Anand ', NULL, NULL, 1, '2023-03-07 02:06:34'),
(5, 'Sidd', 'Siddharth', 'Solanki', 'sidd12@gmail.com', '9327504409', 'sidhu123', 'avani park society', NULL, NULL, 1, '2023-04-30 07:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rs_id` int(11) DEFAULT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`, `rs_id`, `address`) VALUES
(68, 1, 'Hot n Sour ', 1, '189.00', NULL, '2023-05-07 14:55:56', 6, ''),
(69, 1, 'Panner Tikka ', 1, '339.00', NULL, '2023-05-07 14:55:56', 6, ''),
(70, 1, 'Manchurian Dry', 1, '299.00', NULL, '2023-05-07 14:55:56', 6, ''),
(71, 1, 'Gujarati Thali', 1, '170.00', NULL, '2023-05-08 07:55:42', 1, ''),
(72, 1, 'Hot n Sour ', 3, '189.00', NULL, '2023-05-08 10:37:58', 6, ''),
(84, 2, 'The 4 Chesse Pizza', 1, '349.00', NULL, '2023-05-13 18:25:16', 5, '13 Gopal Vatika Tv Station Road'),
(85, 1, 'Hot n Sour ', 1, '189.00', NULL, '2023-05-13 18:30:48', 6, 'Bhivandi Mumbai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `adv_orders`
--
ALTER TABLE `adv_orders`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`cu_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `fooddnt`
--
ALTER TABLE `fooddnt`
  ADD PRIMARY KEY (`fd_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adv_orders`
--
ALTER TABLE `adv_orders`
  MODIFY `a_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `cu_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `fooddnt`
--
ALTER TABLE `fooddnt`
  MODIFY `fd_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
