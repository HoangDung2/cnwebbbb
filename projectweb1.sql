-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 04:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectweb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `poster` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `name`, `poster`, `background`, `content`, `user_name`, `created`, `user_id`) VALUES
(27, 'Tomorrow', 'tomorrow-poster.jpeg', 'tomorow-background.jpeg', 'Chàng than niên nhiệt huyết Choi Joon Woong vì “làm ơn mắc oán” mà gặp tai nạn rơi vào hôn mê sâu. Nhưng trong cái rủi có cái xui, anh chàng có cơ hội biết đến nơi gọi là Jumadeung – vai trò giống như Thiên đường nhưng dưới hình thức một công ty với các phòng ban, trưởng phòng, giám đốc…\r\n\r\nChoi Joon Woong có 2 lựa chọn là tiếp tục hôn mê trong 3 năm, hoặc làm việc tại Jumadeung trong 6 tháng sẽ được tỉnh lại. Và Choi Joon Woong đã quyết định gia nhập vào phòng xử lý khủng hoảng của thần chết Koo Ryeon và Im Ryoog Gu. Đây là phòng phụ trách các vụ tự tử, nhiệm vụ của họ là phải ngăn cản con người tự sát, giúp họ tìm được niềm tin và hy vọng sống tiếp.', 'TeaPhim', '2022-11-05 19:47:14', 0),
(28, 'Truyện Họa Bì', 'hoabi-background.png', 'hoabi-poster.jfif', 'Năm xưa, Tần Tử Phượng vốn là thiên kim tiểu thư tôn quý vô ngần. Trong thành Tô Châu tường trắng, ngói đen, sóng nước lấp lánh, đồn đại không dứt, lời ra tiếng vào truyền tụng thanh danh của nàng. Ấy vậy mà ai ngờ, đến ngày hôm nay, nàng lại bị vùi thây nơi hoang vu hẻo lánh, đến tiết Thanh Minh cũng không có nổi một bát cơm cúng.\r\n\r\nCó trách, cũng chỉ trách phận nàng trớ trêu, bất hạnh!\r\n\r\nNgày ấy, vị thư lại trẻ tuổi Trương Luân chỉ một lần thoáng liếc Tử Phượng tiểu thư mà sinh lòng tương tư, ngày đêm nhung nhớ quay quắt, sống không bằng chết. Cuối cùng, hắn nhẫn tâm giết chết người trong mộng, lấy đi quả tim của nàng.\r\n\r\nTử Phượng xuống địa ngục bị nhốt trong thành Chết oan, chịu dằn vặt từ lồng ngực trống rỗng. Càng đau đớn, nàng càng hận kẻ giết nàng đến cùng cực. Tử Phượng quyết không đầu thai, chấp nhận kiếp cô hồn dã quỷ, chờ kiếp thứ ba của Trương Luân để trả thù. Hắn phải trả lại tim cho nàng!\r\n\r\nCầm bút, cẩn thận vẽ phác họa lên tấm da người rồi khoác lên hình hài xấu xí của mình, Tử Phượng đã thành công chiếm lấy tình yêu của Vương tướng quân- Trương Luân kiếp thứ ba. Một đêm triền miên, những yêu thương cận kề, ngọt ngào đầu môi, dường như cũng đủ để xóa nhòa sự tịch mịch của một trăm bốn mươi bảy năm gió táp mưa sa kiếp cô hồn.\r\n\r\nTử Phượng như được sống lại với chính mình năm xưa, sẵn sàng đánh đổi linh hồn mình để trở thành một thê tử thật tốt của Vương tướng công. Sự dũng cảm và mù quáng của nữ nhân, nam nhân vĩnh viễn không thể hiểu!\r\n\r\n“Tướng công,thiếp…thiếp sợ…”\r\n“Nàng sợ gì?”\r\n“Sợ chàng không cần thiếp.”\r\n“Ngốc, sao ta lại không cần nàng. Ta nói rồi, ta sẽ đối tốt với nàng cả đời. Nàng quên rồi sao?”\r\n\r\nNào ngờ, số mệnh đã định, Tử Phượng buộc phải lấy lại quả tim vốn thuộc về mình từ lồng ngực người mình yêu… Duyên tàn nghiệt tận, từ giờ không ai nợ ai!\r\n\r\nThật sự thương tiếc cho một phận hồng nhan bạc mệnh như Tử Phượng. Nàng là người dám yêu, dám hận, dám hi sinh chính mình vì tình yêu, hạnh phúc đôi lứa. Nhân quả xoay chuyển, con người chẳng qua chỉ là hạt bụi nhỏ trong lòng bàn tay của số mệnh.\r\n\r\nCái kết SE là hoàn toàn hợp lí. Bởi chỉ có như vậy, mới giải được nghiệt duyên giữa Tử Phượng và Trương Luân, giúp họ thoát khỏi bi kịch.\r\n\r\nVới cốt truyện mới lạ hấp dẫn, lời văn trau chuốt, Goodnight Tiểu Thanh đã chinh phục vô vàn trái tim bạn đọc, khiến Họa bì trở thành một tiểu thuyết khó có thể quên!', 'TeaPhim', '2022-11-05 19:50:22', 0),
(29, 'Thor', 'thor-background.jpg', 'thor-poster.jpg', 'Sau những biến cố cuộc đời, Thor đi theo nhóm Vệ binh giải ngân hà để giải cứu những hành tinh yếu thế, tuy nhiên sâu thẳm trong anh vẫn cảm thấy buồn tẻ và cô độc. Một ngày nọ, Thor biết được tin một kẻ tự xưng là Kẻ Diệt Thần đang có âm mưu tấn công thành phố Asgard nên anh vội vàng trở về. Trong cuộc đụng độ với Kẻ Diệt Thần tại quê hương của mình, Thor bắt gặp một nữ chiến binh ăn mặc giống mình và sở hữu búa thần Mjolnir đang ra sức bảo vệ người dân Asgard. Nữ chiến binh này là ai và Kẻ Diệt Thần có âm mưu gì? Xem phim để tìm ra đáp án các bạn nha.', 'TeaPhim', '2022-11-05 19:52:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `location`, `phone`, `email`, `password`, `created`) VALUES
(0, 'Lê Hoàng Dũng', 'Sóc Trăng', '0123456789', 'dungb1910201@student.ctu.edu.vn', '123123123', '2022-11-08 17:05:30'),
(12, 'Dung', 'ádasdasd', '1231231231', 'dung@gmail.com', '1231231231', '2022-11-09 01:19:44'),
(13, 'dunggg', 'Soc Tran', '1234567890', 'dung1@gmail.com', '1231231231', '2022-11-09 01:36:03'),
(14, 'dungggd', '1123123123', '1234567890', 'dung2@gmail.com', '1231231231', '2022-11-09 01:38:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
