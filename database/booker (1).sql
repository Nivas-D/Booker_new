-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 10:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booker`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `industry_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `status` int(12) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description_german` text DEFAULT NULL,
  `description_france` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `industry_id`, `name`, `description`, `image`, `code`, `status`, `user_id`, `created_at`, `updated_at`, `description_german`, `description_france`) VALUES
(1, 0, 'First Aid', 'Get any first aid course at the best price', 'images/category.png', 'BCC01', NULL, 1, '2023-07-24 02:26:58', '2023-07-24 02:26:58', NULL, NULL),
(2, 0, 'Theory Courses', 'Get any available theory course at best prices', 'images/category.png', 'BCC02', NULL, 1, '2023-07-24 02:26:58', '2023-07-24 02:26:58', NULL, NULL),
(3, 0, 'Awareness Courses', 'Get any awareness course at best pricing', 'images/category.png', 'BCC03', NULL, 1, '2023-07-24 02:26:58', '2023-07-24 02:26:58', NULL, NULL),
(4, 0, 'Driving Lessons', 'Participate in any suitable driving lesson and pass your license exam with ease', 'images/category.png', 'BCC04', NULL, 1, '2023-07-24 02:26:58', '2023-07-24 02:26:58', NULL, NULL),
(5, 0, 'Motorcycle Courses', 'Choose and take part in any motorcycle course and pass your exam with ease', 'images/category.png', 'BCC05', NULL, 1, '2023-07-24 02:26:58', '2023-07-24 02:26:58', NULL, NULL),
(6, 0, 'License Exchange', 'Take part in any available driving license exchange program', 'images/category.png', 'BCC06', NULL, 1, '2023-07-24 02:26:58', '2023-07-24 02:26:58', NULL, NULL),
(7, 0, 'Car Driving Courses', 'Take up any available car driving course and upgrade your car driving skills', 'images/category.png', 'BCC07', NULL, 1, '2023-07-24 02:26:58', '2023-07-24 02:26:58', NULL, NULL),
(8, 0, 'Supplements', 'Get any available supplement product or course at best prices', 'images/category.png', 'BCC08', NULL, 1, '2023-07-24 02:26:58', '2023-07-24 02:26:58', NULL, NULL),
(9, 1, 'testing', '<p>testing</p>', 'data/category-images/202307260516image001.png', 'BC009', 0, 1, NULL, '2023-07-25 23:46:08', '<p>testing german</p>', '<p>testing france</p>');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `title`, `message`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Contact Message 1', 'contact1@gmail.com', 'Contact message 1', 'Contact message 1 description', '9897979791', '2023-07-24 02:26:58', '2023-07-24 02:26:58'),
(2, 'Contact Message 2', 'contact2@gmail.com', 'Contact message 2', 'Contact message 2 description', '9897979792', '2023-07-24 02:26:58', '2023-07-24 02:26:58'),
(3, 'Contact Message 3', 'contact3@gmail.com', 'Contact message 3', 'Contact message 3 description', '9897979793', '2023-07-24 02:26:58', '2023-07-24 02:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Department 1', 'Department 1 description', '2023-07-24 02:26:58', '2023-07-24 02:26:58'),
(2, 'Department 2', 'Department 2 description', '2023-07-24 02:26:58', '2023-07-24 02:26:58'),
(3, 'Department 3', 'Department 3 description', '2023-07-24 02:26:58', '2023-07-24 02:26:58'),
(4, 'Department 4', 'Department 4 description', '2023-07-24 02:26:58', '2023-07-24 02:26:58'),
(5, 'Department 5', 'Department 5 description', '2023-07-24 02:26:58', '2023-07-24 02:26:58'),
(6, 'Department 6', 'Department 6 description', '2023-07-24 02:26:58', '2023-07-24 02:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dept_id` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `owner_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `gender`, `dob`, `address`, `dept_id`, `photo`, `user_id`, `owner_id`, `created_at`, `updated_at`) VALUES
(1, 'Employee 1', 'employee1@gmail.com', '9898989801', 'Male', '01-01-2004', 'Some Place, Connaught Place, New Delhi', '1', 'images/employee.png', 1, 2, '2023-07-24 02:26:59', '2023-07-24 02:26:59'),
(2, 'Employee 2', 'employee2@gmail.com', '9898989802', 'Male', '01-01-2004', 'Some Place, Connaught Place, New Delhi', '1', 'images/employee.png', 1, 2, '2023-07-24 02:26:59', '2023-07-24 02:26:59'),
(3, 'Employee 3', 'employee3@gmail.com', '9898989803', 'Male', '01-01-2004', 'Some Place, Connaught Place, New Delhi', '1', 'images/employee.png', 1, 2, '2023-07-24 02:26:59', '2023-07-24 02:26:59'),
(4, 'Employee 4', 'employee4@gmail.com', '9898989804', 'Male', '01-01-2004', 'Some Place, Connaught Place, New Delhi', '1', 'images/employee.png', 1, NULL, '2023-07-24 02:26:59', '2023-07-24 02:26:59'),
(5, 'Employee 5', 'employee5@gmail.com', '9898989805', 'Male', '01-01-2004', 'Some Place, Connaught Place, New Delhi', '1', 'images/employee.png', 1, NULL, '2023-07-24 02:26:59', '2023-07-24 02:26:59'),
(6, 'Employee 6', 'employee6@gmail.com', '9898989806', 'Male', '01-01-2004', 'Some Place, Connaught Place, New Delhi', '1', 'images/employee.png', 1, NULL, '2023-07-24 02:26:59', '2023-07-24 02:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `freelancers`
--

CREATE TABLE `freelancers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL COMMENT 'experinece in years',
  `payment_type` varchar(255) NOT NULL COMMENT 'hourly or other-type',
  `hourly_rate` varchar(255) NOT NULL,
  `availability` varchar(255) DEFAULT NULL COMMENT 'when available for service',
  `photo` varchar(255) NOT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `portfolio_url` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `freelancers`
--

INSERT INTO `freelancers` (`id`, `name`, `email`, `phone`, `gender`, `skills`, `experience`, `payment_type`, `hourly_rate`, `availability`, `photo`, `linkedin_url`, `portfolio_url`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Freelancer 1', 'freelancer1@gmail.com', '9898989901', 'Male', 'skill1,skill2,skill3,skill4,skill5', '5', 'hourly', '500', '2023-06-16', 'images/freelancer.png', 'https://google.com', 'https://google.com', 1, '2023-07-24 02:26:59', '2023-07-24 02:26:59'),
(2, 'Freelancer 2', 'freelancer2@gmail.com', '9898989902', 'Male', 'skill1,skill2,skill3,skill4,skill5', '5', 'hourly', '500', '2023-06-16', 'images/freelancer.png', 'https://google.com', 'https://google.com', 1, '2023-07-24 02:26:59', '2023-07-24 02:26:59'),
(3, 'Freelancer 3', 'freelancer3@gmail.com', '9898989903', 'Male', 'skill1,skill2,skill3,skill4,skill5', '5', 'hourly', '500', '2023-06-16', 'images/freelancer.png', 'https://google.com', 'https://google.com', 1, '2023-07-24 02:26:59', '2023-07-24 02:26:59'),
(4, 'Freelancer 4', 'freelancer4@gmail.com', '9898989904', 'Male', 'skill1,skill2,skill3,skill4,skill5', '5', 'hourly', '500', '2023-06-16', 'images/freelancer.png', 'https://google.com', 'https://google.com', 1, '2023-07-24 02:26:59', '2023-07-24 02:26:59'),
(5, 'Freelancer 5', 'freelancer5@gmail.com', '9898989905', 'Male', 'skill1,skill2,skill3,skill4,skill5', '5', 'hourly', '500', '2023-06-16', 'images/freelancer.png', 'https://google.com', 'https://google.com', 1, '2023-07-24 02:26:59', '2023-07-24 02:26:59'),
(6, 'Freelancer 6', 'freelancer6@gmail.com', '9898989906', 'Male', 'skill1,skill2,skill3,skill4,skill5', '5', 'hourly', '500', '2023-06-16', 'images/freelancer.png', 'https://google.com', 'https://google.com', 1, '2023-07-24 02:26:59', '2023-07-24 02:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_testimonials`
--

CREATE TABLE `freelancer_testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `user_id` varchar(255) NOT NULL COMMENT 'testimonial given by',
  `freelancer_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `freelancer_testimonials`
--

INSERT INTO `freelancer_testimonials` (`id`, `description`, `user_id`, `freelancer_id`, `created_at`, `updated_at`) VALUES
(1, 'Testimonial 1 for freelancer 1 description', '1', '1', '2023-07-24 02:26:59', '2023-07-24 02:26:59'),
(2, 'Testimonial 2 for freelancer 1 description', '1', '1', '2023-07-24 02:26:59', '2023-07-24 02:26:59'),
(3, 'Testimonial 3 for freelancer 1 description', '1', '1', '2023-07-24 02:26:59', '2023-07-24 02:26:59'),
(4, 'Testimonial 1 for freelancer 2 description', '1', '2', '2023-07-24 02:26:59', '2023-07-24 02:26:59'),
(5, 'Testimonial 2 for freelancer 2 description', '1', '2', '2023-07-24 02:26:59', '2023-07-24 02:26:59'),
(6, 'Testimonial 3 for freelancer 2 description', '1', '2', '2023-07-24 02:26:59', '2023-07-24 02:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `name`, `description`, `image`, `code`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Industry 1', '<p>Industry 1 description</p>', 'data/industry-images/202307270756handsome-man-driving-his-car.jpg', 'BIC01', 1, '2023-07-24 02:26:58', '2023-07-27 02:26:22'),
(2, 'Industry 2', '<p>Industry 2 description</p>', 'data/industry-images/202307270756person-taking-driver-s-license-exam.jpg', 'BIC01', 1, '2023-07-24 02:26:58', '2023-07-27 02:26:31'),
(3, 'Industry 3', '<p>Industry 3 description</p>', 'data/industry-images/202307270759happy-woman-car-dealership.jpg', 'BIC01', 1, '2023-07-24 02:26:58', '2023-07-27 02:29:24'),
(4, 'Industry 4', '<p>Industry 4 description</p>', 'data/industry-images/202307270804car-purchase.jpg', 'BIC01', 1, '2023-07-24 02:26:58', '2023-07-27 02:34:00'),
(20, 'India', NULL, 'data/industry-images/202307270818image001.png', 'IND20', 1, NULL, '2023-07-27 02:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_01_15_110000_create_users_table', 1),
(3, '2023_05_28_131033_create_categories_booker', 1),
(4, '2023_06_05_030024_create_industries_booker', 1),
(5, '2023_06_05_062758_create_products_table', 1),
(6, '2023_06_09_101953_create_services_table', 1),
(7, '2023_06_09_151528_create_contact_messages_table', 1),
(8, '2023_06_09_155540_create_departments_table', 1),
(9, '2023_06_09_155723_create_employees_table', 1),
(10, '2023_06_10_035457_create_freelancers_table', 1),
(11, '2023_06_10_064108_create_plans_table', 1),
(12, '2023_06_14_022437_create_product_orders_table', 1),
(13, '2023_06_18_131822_create_service_booking_table', 1),
(14, '2023_07_09_142414_add_picture_to_users_table', 1),
(15, '2023_07_22_071153_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `section` varchar(50) DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `section`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'role', 'web', '2023-07-24 02:33:27', '2023-07-24 02:33:27'),
(2, 'role-create', 'role', 'web', '2023-07-24 02:33:27', '2023-07-24 02:33:27'),
(3, 'role-edit', 'role', 'web', '2023-07-24 02:33:27', '2023-07-24 02:33:27'),
(4, 'role-delete', 'role', 'web', '2023-07-24 02:33:27', '2023-07-24 02:33:27'),
(5, 'product-list', 'product', 'web', '2023-07-24 02:33:27', '2023-07-24 02:33:27'),
(6, 'product-create', 'product', 'web', '2023-07-24 02:33:27', '2023-07-24 02:33:27'),
(7, 'product-edit', 'product', 'web', '2023-07-24 02:33:27', '2023-07-24 02:33:27'),
(8, 'product-delete', 'product', 'web', '2023-07-24 02:33:27', '2023-07-24 02:33:27'),
(9, 'admin_dashboard', '', 'web', '2023-07-24 02:37:51', '2023-07-24 02:57:11'),
(10, 'admin_dashboard-create', 'admin_dashboard', 'web', NULL, NULL),
(11, 'category-create', NULL, 'web', '2023-07-25 02:52:26', '2023-07-25 02:52:26'),
(12, 'category-edit', NULL, 'web', '2023-07-25 02:52:40', '2023-07-25 02:52:40'),
(13, 'category-delete', NULL, 'web', '2023-07-25 02:52:51', '2023-07-25 02:52:51'),
(14, 'category-list', NULL, 'web', '2023-07-25 02:53:18', '2023-07-25 02:53:18'),
(15, 'category-show', NULL, 'web', '2023-07-25 02:53:26', '2023-07-25 02:53:26'),
(16, 'industries-create', NULL, 'web', '2023-07-25 02:54:10', '2023-07-25 02:54:10'),
(17, 'industries-edit', NULL, 'web', '2023-07-25 02:54:19', '2023-07-25 02:54:19'),
(18, 'industries-delete', NULL, 'web', '2023-07-25 02:54:27', '2023-07-25 02:54:27'),
(19, 'industries-list', NULL, 'web', '2023-07-25 02:54:36', '2023-07-25 02:54:36'),
(20, 'industries-show', NULL, 'web', '2023-07-25 02:54:46', '2023-07-25 02:54:46'),
(21, 'productinventory-create', NULL, 'web', '2023-07-25 03:05:57', '2023-07-25 03:05:57'),
(22, 'productinventory-edit', NULL, 'web', '2023-07-25 03:06:08', '2023-07-25 03:06:08'),
(23, 'productinventory-delete', NULL, 'web', '2023-07-25 03:06:17', '2023-07-25 03:06:17'),
(24, 'productinventory-list', NULL, 'web', '2023-07-25 03:06:26', '2023-07-25 03:06:26'),
(25, 'productinventory-show', NULL, 'web', '2023-07-25 03:06:37', '2023-07-25 03:06:37'),
(26, 'service-create', NULL, 'web', '2023-07-25 03:07:00', '2023-07-25 03:07:00'),
(27, 'service-edit', NULL, 'web', '2023-07-25 03:07:10', '2023-07-25 03:07:10'),
(28, 'service-delete', NULL, 'web', '2023-07-25 03:07:19', '2023-07-25 03:07:19'),
(29, 'service-list', NULL, 'web', '2023-07-25 03:07:27', '2023-07-25 03:07:27'),
(30, 'service-show', NULL, 'web', '2023-07-25 03:07:40', '2023-07-25 03:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `features` varchar(255) NOT NULL COMMENT 'list of subscription plan features',
  `frequency` varchar(255) DEFAULT NULL COMMENT 'monthly/yearly',
  `trial_period` int(11) DEFAULT NULL COMMENT 'in days',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `description`, `price`, `features`, `frequency`, `trial_period`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Free', 'Free tier subscription plan for business owners', 0, 'Réservations par mois,Plugins supplémentaires,Liens supprimés de l’iframe,HIPAA plugin allowed,Solde des tickets,SAML/SSO,Application marque client activée,Notifications de l’application,Application client activée', 'monthly', 30, 1, '2023-07-24 02:26:59', '2023-07-24 02:26:59'),
(2, 'Basic', 'Basic tier subscription plan for business owners', 50, 'Réservations par mois,Plugins supplémentaires,Liens supprimés de l’iframe,HIPAA plugin allowed,Solde des tickets,SAML/SSO,Application marque client activée,Notifications de l’application,Application client activée', 'monthly', 0, 1, '2023-07-24 02:26:59', '2023-07-24 02:26:59'),
(3, 'Premium', 'Premium tier subscription plan for business owners', 100, 'Réservations par mois,Plugins supplémentaires,Liens supprimés de l’iframe,HIPAA plugin allowed,Solde des tickets,SAML/SSO,Application marque client activée,Notifications de l’application,Application client activée', 'monthly', 0, 1, '2023-07-24 02:26:59', '2023-07-24 02:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `active` varchar(255) NOT NULL COMMENT 'yes/no',
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `price_original` decimal(10,2) NOT NULL,
  `price_discounted` decimal(10,2) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `owner_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `active`, `name`, `description`, `image`, `code`, `price_original`, `price_discounted`, `user_id`, `category_id`, `owner_id`, `created_at`, `updated_at`) VALUES
(1, 'yes', 'Product 1', 'Product 1 description', 'images/product.png', 'BPC01', 90.00, 80.00, 1, 1, 2, '2023-06-14 19:20:00', '2023-06-17 19:25:00'),
(2, 'yes', 'Product 2', 'Product 2 description', 'images/product.png', 'BPC02', 90.00, 80.00, 1, 1, 2, '2023-06-14 19:21:00', '2023-06-17 19:26:00'),
(3, 'yes', 'Product 3', 'Product 3 description', 'images/product.png', 'BPC03', 90.00, 80.00, 1, 1, 2, '2023-06-14 19:22:00', '2023-06-17 19:27:00'),
(4, 'yes', 'Product 4', 'Product 4 description', 'images/product.png', 'BPC04', 90.00, 80.00, 1, 1, 2, '2023-06-14 19:23:00', '2023-06-17 19:28:00'),
(5, 'yes', 'Product 5', 'Product 5 description', 'images/product.png', 'BPC05', 90.00, 80.00, 1, 1, 2, '2023-06-14 19:24:00', '2023-06-17 19:29:00'),
(6, 'yes', 'Product 6', 'Product 6 description', 'images/product.png', 'BPC06', 90.00, 80.00, 1, 1, 2, '2023-06-14 19:25:00', '2023-06-17 19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_inventory`
--

CREATE TABLE `product_inventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'Current stock of the product',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_inventory`
--

INSERT INTO `product_inventory` (`id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 10, '2023-07-24 02:26:58', '2023-07-24 02:26:58'),
(2, 2, 10, '2023-07-24 02:26:58', '2023-07-24 02:26:58'),
(3, 3, 10, '2023-07-24 02:26:58', '2023-07-24 02:26:58'),
(4, 4, 10, '2023-07-24 02:26:58', '2023-07-24 02:26:58'),
(5, 5, 10, '2023-07-24 02:26:58', '2023-07-24 02:26:58'),
(6, 6, 10, '2023-07-24 02:26:58', '2023-07-24 02:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `delivery_address` text NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-07-24 02:30:15', '2023-07-24 02:30:15'),
(2, 'superadmin', 'web', '2023-07-24 02:36:56', '2023-07-24 02:36:56'),
(3, 'owner', 'web', '2023-07-25 02:18:22', '2023-07-25 02:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `active` varchar(255) NOT NULL COMMENT 'yes/no',
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `description_german` text DEFAULT NULL,
  `description_france` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `price_original` decimal(10,2) NOT NULL,
  `price_discounted` decimal(10,2) NOT NULL,
  `duration` varchar(255) NOT NULL COMMENT 'in hours',
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `industry_id` int(10) UNSIGNED DEFAULT NULL,
  `owner_id` int(10) UNSIGNED DEFAULT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `active`, `name`, `description`, `description_german`, `description_france`, `image`, `code`, `price_original`, `price_discounted`, `duration`, `user_id`, `industry_id`, `owner_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'yes', 'Service 1', 'Service 1 description', NULL, NULL, 'images/service.png', 'BSC01', 90.00, 80.00, '8', 1, 1, 2, b'1', '2023-06-14 19:20:00', '2023-06-17 19:25:00'),
(2, 'yes', 'Service 2', 'Service 2 description', NULL, NULL, 'images/service.png', 'BSC02', 90.00, 80.00, '8', 1, 1, 2, b'1', '2023-06-14 19:21:00', '2023-06-17 19:26:00'),
(3, 'yes', 'Service 3', 'Service 3 description', NULL, NULL, 'images/service.png', 'BSC03', 90.00, 80.00, '8', 1, 1, 2, b'1', '2023-06-14 19:22:00', '2023-06-17 19:27:00'),
(4, 'yes', 'Service 4', 'Service 4 description', NULL, NULL, 'images/service.png', 'BSC04', 90.00, 80.00, '8', 1, 1, 2, b'1', '2023-06-14 19:23:00', '2023-06-17 19:28:00'),
(5, 'yes', 'Service 5', 'Service 5 description', NULL, NULL, 'images/service.png', 'BSC05', 90.00, 80.00, '8', 1, 1, 2, b'1', '2023-06-14 19:24:00', '2023-06-17 19:29:00'),
(6, 'yes', 'Service 6', '<p>Service 6 description</p>', NULL, NULL, 'images/service.png', 'BSC06', 90.00, 80.00, '8', 1, 9, NULL, b'1', '2023-06-14 19:25:00', '2023-07-26 01:03:31'),
(7, 'yes', 'Test', '<p>description</p>', '<p>description german</p>', '<p>description France</p>', 'images/service.png', NULL, 500.00, 100.00, '10', 1, 13, NULL, b'1', NULL, '2023-07-26 01:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `service_bookings`
--

CREATE TABLE `service_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL COMMENT 'single/pack',
  `amount` decimal(10,2) NOT NULL,
  `booking_status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_to_employee`
--

CREATE TABLE `service_to_employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `assigned_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_to_freelancer`
--

CREATE TABLE `service_to_freelancer` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `freelancer_id` int(10) UNSIGNED NOT NULL,
  `assigned_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`, `picture`) VALUES
(1, 'admin', 'Admin', 'admin@gmail.com', NULL, '$2y$10$9nF0iVjAAzGic8OFtk4OyuLQTSa6qFdS5E0rsPebCuwrp0ADST2IW', NULL, NULL, '2023-07-24 02:30:15', '2023-07-24 02:30:15', NULL),
(2, 'superadmin', 'superadmin', 'business@gmail.com', NULL, '$2y$10$9nF0iVjAAzGic8OFtk4OyuLQTSa6qFdS5E0rsPebCuwrp0ADST2IW', NULL, NULL, '2023-07-24 02:30:15', '2023-07-24 02:30:15', NULL),
(3, 'owner', 'Owner', 'owner@gmail.com', NULL, '$2y$10$stSCXl7KOJsdB9wutrelLePkCSbTH/vUqIx7t40AJGo0cRMs5iGMK', NULL, NULL, '2023-07-25 02:18:22', '2023-07-25 02:18:22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancers`
--
ALTER TABLE `freelancers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_testimonials`
--
ALTER TABLE `freelancer_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `industries_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`);

--
-- Indexes for table `product_inventory`
--
ALTER TABLE `product_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_name_unique` (`name`);

--
-- Indexes for table `service_bookings`
--
ALTER TABLE `service_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_to_employee`
--
ALTER TABLE `service_to_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_to_freelancer`
--
ALTER TABLE `service_to_freelancer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `freelancers`
--
ALTER TABLE `freelancers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `freelancer_testimonials`
--
ALTER TABLE `freelancer_testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_inventory`
--
ALTER TABLE `product_inventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_bookings`
--
ALTER TABLE `service_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_to_employee`
--
ALTER TABLE `service_to_employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_to_freelancer`
--
ALTER TABLE `service_to_freelancer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
