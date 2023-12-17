-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 11:23 AM
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
-- Database: `makeevent`
--

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('06a5bd4c-0ed3-4e4e-9b84-15c6055d5c88', 7, 8, 'Test', NULL, 1, '2023-10-22 17:38:46', '2023-10-22 17:39:26'),
('116fd4dd-1810-4820-9286-bb4236ccf971', 2, 1, 'Test', NULL, 1, '2023-09-28 09:17:42', '2023-09-28 09:17:42'),
('1b6fd412-524f-4542-8008-78d4ade51f28', 1, 1, 'yow', NULL, 1, '2023-09-28 09:15:32', '2023-09-28 09:15:52'),
('23b76005-872e-49ec-bfd8-61455bdffc6f', 1, 2, 'Test', NULL, 1, '2023-09-28 14:58:01', '2023-09-28 14:58:02'),
('40570138-a4cc-4d0e-bf2f-a7c4997f7d99', 1, 2, 'Hello there', NULL, 1, '2023-09-28 09:17:48', '2023-09-28 09:17:49'),
('56561ccc-459d-4887-bd0c-d17abb8a66bd', 1, 2, 'Lance', NULL, 1, '2023-10-08 22:51:51', '2023-10-08 22:51:51'),
('5dea63bb-fe85-4aaf-857a-d5dd4316cfb1', 1, 2, 'hello', NULL, 1, '2023-09-28 09:15:10', '2023-09-28 09:17:13'),
('6585d485-f305-444e-b377-0b1190ab0ab9', 8, 7, '', '{\"new_name\":\"e88db93d-1eea-4e56-a76c-9a36555cfae5.png\",\"old_name\":\"wtc.png\"}', 1, '2023-10-22 17:40:05', '2023-10-22 17:40:05'),
('6c5f3cee-88fc-4aa4-9bae-1cf6a74f0d2c', 1, 2, 'Test', NULL, 1, '2023-09-29 02:50:11', '2023-09-29 02:50:11'),
('731e1aef-4a96-45c4-ac59-a10a5b1a71ff', 8, 2, '', '{\"new_name\":\"7ca62bbd-b1d3-46ac-848c-235b4ad6a9c5.docx\",\"old_name\":\"To-change-in-the-website.docx\"}', 0, '2023-11-22 09:52:15', '2023-11-22 09:52:15'),
('7497a2ef-b696-4daa-b815-0f6e3454a673', 2, 1, '🤑', NULL, 1, '2023-10-08 22:51:38', '2023-10-08 22:51:38'),
('75d92e47-2e66-4aa9-b078-8ccfa575a900', 2, 1, 'Hello', NULL, 1, '2023-09-28 14:57:31', '2023-09-28 14:57:31'),
('799af362-d0f1-43e7-800d-6e4de3bbb309', 8, 7, 'Hello', NULL, 1, '2023-10-22 17:39:35', '2023-10-22 17:39:35'),
('7aa28b7e-5036-4b1e-b7f5-e1a92a83f84e', 2, 1, 'hi', NULL, 1, '2023-09-28 09:17:20', '2023-09-28 09:17:21'),
('b92be4b2-2110-4cc6-bb13-0ba528dce2e5', 1, 2, 'Test jm', NULL, 1, '2023-09-29 02:50:26', '2023-09-29 02:50:27'),
('b9792d7d-c602-4e40-bf02-2ca52f592ad0', 2, 1, 'test', NULL, 1, '2023-09-29 02:50:35', '2023-09-29 02:50:35'),
('e49c633d-351d-45a6-acf5-5536a455541a', 2, 1, 'chat test', NULL, 1, '2023-09-29 02:50:00', '2023-09-29 02:50:01'),
('e7eb8ae6-d9fc-46f4-84d8-b2fc41c350da', 7, 2, 'Test', NULL, 1, '2023-10-22 17:37:57', '2023-10-22 17:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `coordinatorbooking`
--

CREATE TABLE `coordinatorbooking` (
  `coordinatorbooking_id` bigint(20) UNSIGNED NOT NULL,
  `coordinator_id` int(11) NOT NULL,
  `booked_by` int(10) NOT NULL,
  `reserved_date` varchar(255) NOT NULL,
  `reservation_status` varchar(255) NOT NULL DEFAULT 'Pending Payment',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coordinators`
--

CREATE TABLE `coordinators` (
  `coordinator_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `main_photo` varchar(255) DEFAULT NULL,
  `additional_photos` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coordinators`
--

INSERT INTO `coordinators` (`coordinator_id`, `user_id`, `description`, `price`, `bank`, `main_photo`, `additional_photos`, `date_created`) VALUES
(1, 3, 'Lance ACM', '250', 'GCASH - 09277984515', 'lance_main.jpg', 'lance_1.jpg,lance_2.jpg,lance_3.jpg', '2023-09-29 16:01:35'),
(2, 11, NULL, NULL, NULL, 'usericon.png', NULL, '2023-10-24 08:40:37'),
(3, 8, NULL, NULL, NULL, 'wtc1.jpg', NULL, '2023-11-22 17:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `eventbooking`
--

CREATE TABLE `eventbooking` (
  `eventbooking_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `number_of_guests` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `time_end` time NOT NULL,
  `time_start` time NOT NULL,
  `reserved_date` varchar(255) NOT NULL,
  `reservation_status` varchar(255) NOT NULL DEFAULT 'Pending Payment',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eventbooking`
--

INSERT INTO `eventbooking` (`eventbooking_id`, `user_id`, `venue_id`, `number_of_guests`, `client_name`, `event_name`, `time_end`, `time_start`, `reserved_date`, `reservation_status`, `date_created`) VALUES
(1, 3, 1, 0, '', '', '00:00:00', '00:00:00', '2023-09-27', 'Pending Payment', '2023-10-09 06:47:48'),
(2, 3, 1, 0, '', '', '00:00:00', '00:00:00', '2023-10-22', 'Pending Payment', '2023-10-22 10:55:32'),
(3, 7, 2, 0, '', '', '00:00:00', '00:00:00', '2023-10-23', 'Reserved', '2023-10-23 01:22:42'),
(4, 8, 1, 0, '', '', '00:00:00', '00:00:00', '2023-10-23', 'Pending Payment', '2023-10-23 01:30:21'),
(6, 4, 1, 30, 'Saldi Lozada', 'Wedding', '22:48:00', '14:48:00', '2023-12-13', 'Reserved', '2023-12-11 18:48:45'),
(7, 4, 1, 30, 'Saldi Lozada', 'party', '22:50:00', '16:50:00', '2023-12-13', 'Reserved', '2023-12-11 18:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_28_999999_add_active_status_to_users', 2),
(6, '2023_09_28_999999_add_avatar_to_users', 2),
(7, '2023_09_28_999999_add_dark_mode_to_users', 2),
(8, '2023_09_28_999999_add_messenger_color_to_users', 2),
(9, '2023_09_28_999999_create_chatify_favorites_table', 2),
(10, '2023_09_28_999999_create_chatify_messages_table', 2),
(11, '2023_09_29_153437_create_coordinators_table', 3),
(12, '2023_09_29_153456_create_eventbooking_table', 3),
(13, '2023_09_29_153508_create_venues_table', 3),
(14, '2023_10_22_110701_create_coordinatorbooking', 4),
(15, '2023_12_10_182954_add_details_to_eventbooking', 5),
(16, '2023_12_11_091520_add_details_to_venues', 6),
(17, '2023_12_11_174944_create_venues_events_table', 6),
(18, '2023_12_11_180854_create_venues_services_table', 6),
(19, '2023_12_11_180908_create_venues_amenities_table', 6);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `name`, `email`, `email_verified_at`, `password`, `contact_number`, `remember_token`, `user_type`, `created_at`, `updated_at`, `active_status`, `avatar`, `dark_mode`, `messenger_color`, `profile_picture`, `status`) VALUES
(1, '', '', 'Rem', 'rem@admin.com', NULL, '$2y$10$38bV.rvcEChvQrWZ6V2WBOrTb/T0BmxNSXzw99lLJROs4oJ7oq2lK', '', NULL, '', '2023-09-28 09:04:35', '2023-09-29 03:01:54', 0, 'avatar.png', 0, '#2180f3', '', 1),
(2, '', '', 'Admin', 'admin@admin.com', NULL, '$2y$10$V8kNrP0ur7YD3DAgnO2HcOuWM./lHKpHRP.L5IGjc84igdLj6EBEq', '', NULL, 'Administrator', '2023-09-28 09:14:44', '2023-10-08 22:52:03', 0, 'avatar.png', 0, NULL, '', 1),
(3, 'Lance Reyner', 'Pastor', 'Lance Reyner Pastor', 'lancereynerpastor@gmail.com', NULL, '$2y$10$S.FHMZJW5GvS3b6Lyo3OF.fFxDt7HU8YeffSRtqn9PJ5Bno683WhG', '09171234567', NULL, 'Event Coordinator', NULL, NULL, 0, 'avatar.png', 0, NULL, 'lance_main.jpg', 1),
(4, 'Juan', 'Dela Cruz', 'Juan Dela Cruz', 'jdelacruz@makeevents.com', NULL, '$2y$10$fWVt/zdgOrR8oqbmoJii5e6pJfZ26NrI3wc99k0jDsCPH714NY5uy', '09171234569', NULL, 'Vendor', NULL, NULL, 0, 'avatar.png', 0, NULL, NULL, 1),
(5, 'John', 'Doe', 'John Doe', 'johndoe@gmail.com', NULL, '$2y$10$XqqJrCTZsOetAOmEl41wxuUBisn4Bjwx.NcA88jZp/TUurGtqN/ya', '09123654789', NULL, 'Customer', NULL, '2023-10-22 15:08:52', 0, 'avatar.png', 0, NULL, NULL, 1),
(6, 'Jane', 'Doe', 'Jane Doe', 'janedoe@makeevents.com', NULL, '$2y$10$YR6Iitez33ZC80dO4YI8lOB30kCvvkFdD7uTlxPl1qBGTL6b4UcES', '09213698547', NULL, 'Vendor', NULL, NULL, 0, 'avatar.png', 0, NULL, 'design.jpeg', 1),
(7, 'James', 'Doe', 'James Doe', 'jamesdoe@gmail.com', NULL, '$2y$10$LgIbUbL9A2FEVSzAsUOAMehmLe2ZSlNCNFVD4RJD2CZCKicRpMODa', '09977233452', NULL, 'Customer', NULL, '2023-10-22 17:39:19', 1, 'avatar.png', 0, NULL, 'lance_main.jpg', 1),
(8, 'Angel', 'Doe', 'Angel Doe', 'angeldoe@makeevents.com', NULL, '$2y$10$Mz1NCv/OjAHb9qC3akTfEOiPivrZvqwo0e0gkZqwGaJty3hrr4/v.', '09133216549', NULL, 'Event Coordinator', NULL, '2023-10-22 17:51:51', 0, 'avatar.png', 0, NULL, NULL, 1),
(11, 'Test', 'Test', 'Test Test', 'test@gmail.com', NULL, '$2y$10$.RJnc.YukzqC/Sqmgvgs7e/hL3RY/G/r5yxdAhkLkoz7kbAs7VKRO', '09171234567', NULL, 'Event Coordinator', NULL, NULL, 0, 'avatar.png', 0, NULL, NULL, 1),
(12, 'Saldi', 'Lozada', 'Saldi Lozada', 'saldilozada09@gmail.com', NULL, '$2y$10$UE.PIDtgsba/wbaht6ITKuXAZvlP63XB9LdRN9PMZZaghRiKWALA2', '09175903221', NULL, 'Customer', NULL, NULL, 0, 'avatar.png', 0, NULL, NULL, 1),
(13, 'Saldi Again', 'Lozada', 'Saldi Again Lozada', 'saldi.lozada09@gmail.com', NULL, '$2y$10$mPoqhNXU354byxRAkarbxudqqmYCBkmNjiLRgbHZqPIRvAF99SvAS', '09175903221', NULL, 'Vendor', NULL, NULL, 0, 'avatar.png', 0, NULL, NULL, 1),
(14, 'Mike Jordan', 'Lozada', 'Mike Jordan Lozada', 'mikelozada@gmail.com', NULL, '$2y$10$0fDrRWaS/jgPJdyVhru21uCJGt8EtBRuU.HfS/ixar7FRkZBCbMuq', '09175903221', NULL, 'Customer', NULL, NULL, 0, 'avatar.png', 0, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `venue_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `venue_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `main_photo` varchar(255) NOT NULL,
  `additional_photos` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `sales_representative` varchar(100) NOT NULL,
  `booking_allowed` int(11) NOT NULL,
  `max_capacity` int(11) NOT NULL,
  `availability` varchar(255) NOT NULL DEFAULT 'open',
  `bank` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL DEFAULT 'no',
  `status` int(11) NOT NULL DEFAULT 1,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venue_id`, `user_id`, `venue_name`, `price`, `description`, `main_photo`, `additional_photos`, `email_address`, `location`, `contact_number`, `sales_representative`, `booking_allowed`, `max_capacity`, `availability`, `bank`, `paid`, `status`, `date_created`) VALUES
(1, 4, 'La Maja Rica', 2000, 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?', 'lamajarica_main.jpg', 'lamajarica_1.jpg,lamajarica_2.jpg,lamajarica_3.jpg', 'lamajarica@gmail.com', 'San Vicente Macabulos Tarlac City', '09171234569', 'Saldi Lozada', 5, 50, 'open', 'BDO - 12345678912', 'no', 1, '2023-09-29 16:30:06'),
(2, 6, 'Test Venue', 3000, 'Test Venue', 'wtc.png', 'wtc3.jpg,wtc2.jpg,wtc1.jpg', 'janedoe@makeevents.com', 'San Isidro Tarlac City', '09171234567', '0', 0, 0, 'open', 'BDO - 12345678912', 'no', 1, '2023-10-23 01:04:51'),
(3, 4, 'Test for the offered', 4000, 'sample description', 'lamajarica_1.jpg', 'lamajarica_3.jpg', 'sample@localhost.com', 'Pasig City', '09175903221', 'Mike Tyson', 2, 300, 'open', 'BDO - 0000000000000', 'no', 1, '2023-12-12 19:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `venues_amenities`
--

CREATE TABLE `venues_amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venue_id` int(11) NOT NULL,
  `amenity_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venues_amenities`
--

INSERT INTO `venues_amenities` (`id`, `venue_id`, `amenity_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Host', '2023-12-12 10:07:04', '2023-12-12 10:07:04'),
(4, 3, 'Air Conditioned', '2023-12-12 11:37:26', '2023-12-12 11:37:26'),
(5, 3, 'Internet Access', '2023-12-12 11:37:26', '2023-12-12 11:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `venues_events`
--

CREATE TABLE `venues_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venue_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venues_events`
--

INSERT INTO `venues_events` (`id`, `venue_id`, `event_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Weddings', '2023-12-12 10:07:04', '2023-12-12 10:07:04'),
(2, 1, 'Birthday Parties', '2023-12-12 10:07:04', '2023-12-12 10:07:04'),
(3, 1, 'Debut', '2023-12-12 10:07:04', '2023-12-12 10:07:04'),
(6, 3, 'Reunion', '2023-12-12 11:37:26', '2023-12-12 11:37:26'),
(7, 3, 'Coronation Night', '2023-12-12 11:37:26', '2023-12-12 11:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `venues_services`
--

CREATE TABLE `venues_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venue_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venues_services`
--

INSERT INTO `venues_services` (`id`, `venue_id`, `service_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Catering', '2023-12-12 10:07:04', '2023-12-12 10:07:04'),
(2, 1, 'Venue', '2023-12-12 10:07:04', '2023-12-12 10:07:04'),
(3, 1, 'Lights and Sound', '2023-12-12 10:07:04', '2023-12-12 10:07:04'),
(6, 3, 'Venue', '2023-12-12 11:37:26', '2023-12-12 11:37:26'),
(7, 3, 'Photo Booth', '2023-12-12 11:37:26', '2023-12-12 11:37:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coordinatorbooking`
--
ALTER TABLE `coordinatorbooking`
  ADD PRIMARY KEY (`coordinatorbooking_id`);

--
-- Indexes for table `coordinators`
--
ALTER TABLE `coordinators`
  ADD PRIMARY KEY (`coordinator_id`);

--
-- Indexes for table `eventbooking`
--
ALTER TABLE `eventbooking`
  ADD PRIMARY KEY (`eventbooking_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`venue_id`);

--
-- Indexes for table `venues_amenities`
--
ALTER TABLE `venues_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venues_events`
--
ALTER TABLE `venues_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venues_services`
--
ALTER TABLE `venues_services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coordinatorbooking`
--
ALTER TABLE `coordinatorbooking`
  MODIFY `coordinatorbooking_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coordinators`
--
ALTER TABLE `coordinators`
  MODIFY `coordinator_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eventbooking`
--
ALTER TABLE `eventbooking`
  MODIFY `eventbooking_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `venue_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `venues_amenities`
--
ALTER TABLE `venues_amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `venues_events`
--
ALTER TABLE `venues_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `venues_services`
--
ALTER TABLE `venues_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
