-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-05 09:26:32
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `active`
--

CREATE TABLE `active` (
  `member_id` int(11) NOT NULL,
  `member_account` text NOT NULL,
  `member_text` text NOT NULL,
  `member_text1` text NOT NULL,
  `member_text2` text NOT NULL,
  `member_time` text NOT NULL,
  `member_up` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `active`
--

INSERT INTO `active` (`member_id`, `member_account`, `member_text`, `member_text1`, `member_text2`, `member_time`, `member_up`) VALUES
(78, '123123', '蠟筆小新', 'JK哥爾羅傑', '滑稽家庭亂搞事', '2022-03-30T19:29', '0');

-- --------------------------------------------------------

--
-- 資料表結構 `exchange`
--

CREATE TABLE `exchange` (
  `ID` int(11) NOT NULL,
  `member_account` text NOT NULL,
  `item` text NOT NULL,
  `exchange` text NOT NULL,
  `minus` text NOT NULL,
  `time` text NOT NULL,
  `change2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `exchange`
--

INSERT INTO `exchange` (`ID`, `member_account`, `item`, `exchange`, `minus`, `time`, `change2`) VALUES
(1069, 'David', '健康午日', ' L5YYBudSum', '5', '2020-05-20 12:20:22', '0'),
(1070, 'David', '日日花花', ' cp0dlm257J', '5', '2020-05-20 12:53:20', '0'),
(1071, 'David', '日日花花', ' mSF3zajQSd', '5', '2020-05-20 14:08:44', '0'),
(1072, 'David', '健康午日', ' y7Jv73fiBZ', '5', '2020-05-20 14:32:45', '0'),
(1073, 'David', '健康午日', ' 6cENSW7TIj', '5', '2020-05-21 12:44:14', '0'),
(1074, 'David', '健康午日', ' 80lrOH0tAN', '5', '2020-05-22 12:26:05', '0'),
(1075, 'David', '健康午日', ' 543tld8MA2', '5', '2020-05-22 13:19:18', '0'),
(1076, 'David', '健康午日', ' 543tld8MA2', '5', '2020-05-22 13:19:44', '0'),
(1077, 'David', '健康午日', ' 1vYYy2gchc', '5', '2020-05-26 13:04:06', '0'),
(1078, 'test3', '健康午日', ' 8JCk0beouM', '5', '2020-05-26 13:26:17', '0'),
(1079, 'test5', '健康午日', ' vw4R1jePVM', '5', '2020-05-26 13:36:25', '0'),
(1080, 'fuck', '健康午日', ' 1U28LS3sbh', '5', '2020-05-26 21:12:03', '0'),
(1081, 'David', '健康午日', ' gnyK6jO8dc', '5', '2020-05-27 10:11:09', '0'),
(1082, 'David', '健康午日', ' mnqLszIV1N', '5', '2020-05-27 10:13:19', '0');

-- --------------------------------------------------------

--
-- 資料表結構 `joinin`
--

CREATE TABLE `joinin` (
  `member_id` int(11) NOT NULL,
  `member_account` text NOT NULL,
  `member_who` text NOT NULL,
  `member_text` text NOT NULL,
  `member_place` text NOT NULL,
  `member_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `joinin`
--

INSERT INTO `joinin` (`member_id`, `member_account`, `member_who`, `member_text`, `member_place`, `member_time`) VALUES
(59, 'root', 'David', '打籃球', 'three', '2020-06-13T17:20'),
(60, 'root', 'David', '跑步', '南苗三角公園', '2020-05-20T16:20'),
(61, 'root', 'root', '泡茶', '苗栗縣政府', '2020-05-22T00:59'),
(62, 'abcde', 'abcde', '跳舞', '苗栗縣政府', '2020-05-14T10:00'),
(63, 'root', 'David', '散步', '苗栗地方法院', '2020-06-07T09:20'),
(64, 'David', 'David', '跑步', '南苗三角公園', '2020-05-20T16:20'),
(86, 'nnn1859@gmail.com', 'abcde', '跳舞', '苗栗縣政府', '2020-05-14T10:00'),
(87, 'nnn1859@gmail.com', 'David', '打牌', '苗栗縣政府', '2020-10-10T20:20'),
(88, 'nnn1859@gmail.com', 'David', '騎車', '河濱公園', '2020-06-24T09:20'),
(89, 'nnn1859@gmail.com', 'David', '打籃球', '聯合八甲校區', '2020-06-13T17:20'),
(91, 'David', 'David', '游泳', '聯合二坪校區', '2020-05-28T19:30'),
(92, 'David', 'David', '打籃球', '貓貍山公園', '2020-05-30T15:20'),
(93, 'David', 'David', '逛街', '苗栗家樂福', '2020-05-22T00:58'),
(94, 'bbbb', 'David', '打籃球', '聯合八甲校區', '2020-06-13T17:20'),
(96, 'David', 'David', '唱歌', '苗栗火車站', '2020-06-10T18:20'),
(97, 'David', 'bbbb', '滑板', '南苗三角公園', '2020-05-21T14:00'),
(98, 'test3', 'David', '打牌', '苗栗縣政府', '2020-10-10T20:20'),
(99, 'test5', 'David', '打牌', '苗栗縣政府', '2020-10-10T20:20'),
(101, 'fishuu005', 'David', '跑步', '南苗三角公園', '2020-05-28T16:20');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_username` text NOT NULL,
  `member_password` text NOT NULL,
  `member_join` text NOT NULL,
  `member_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`member_id`, `member_username`, `member_password`, `member_join`, `member_email`) VALUES
(4, 'David', '123456', '470', 'davidjk1121@gmail.com'),
(5, '123123', '123123123', '', '12312312312'),
(6, 'root', 'leo870812', '', 'nnn1859@gmail.com'),
(7, 'abcde', '789456123', '', '1111'),
(9, 'asd', 'asdasd', '', 'asd'),
(10, 'Jacky', '123456', '123466', '123'),
(11, 'USER3232', '123456789', '0', '1234567'),
(12, 'test123 1', '123456', '0', '123'),
(14, 'nnn1859@gmail.com', 'qweqweqweqwe', '55', 'qweqweqwe'),
(15, 'USER99', '753951852', '0', '0911111111'),
(16, 'test2', 'test22', '0', 'test'),
(17, 'qweeqq', 'qweqweqwe', '0', 'qweqweqwe'),
(18, 'qweqweqweq', 'qweqweqwe', '0', 'qweqweqweq'),
(19, 'root2', '123456qaz', '0', 'root'),
(20, 'bbbb', '456123', '0', 'demonfish02@gmail.com'),
(29, 'test3', '123456741', '10', 'davidjk1121@gmail.com'),
(30, 'test4', '123456', '0', 'davidjk1121@gmail.com'),
(31, 'test5', '1234567', '10', 'davidjk1121@gmail.com'),
(32, 'fuck', 'fuck123', '10', 'arthurtien88@gmail.com'),
(33, 'fishuu005', '123456789', '15', 'demonfish02@gmail.com'),
(35, 'cfc104', '345678', '60', 'sjlksjv@gmail.com'),
(36, 'cfc104mi', '1234567', '0', 'sklfjlkf@gmai.com'),
(37, 'cfc104', '123456', '60', 'sjlksjv@gmail.com');

-- --------------------------------------------------------

--
-- 資料表結構 `message1`
--

CREATE TABLE `message1` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `time` text NOT NULL,
  `context` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `message1`
--

INSERT INTO `message1` (`id`, `username`, `time`, `context`) VALUES
(1, 'David', '0', '123'),
(2, 'David', '0', 'test');

-- --------------------------------------------------------

--
-- 資料表結構 `message2`
--

CREATE TABLE `message2` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `time` text NOT NULL,
  `context` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `message2`
--

INSERT INTO `message2` (`id`, `username`, `time`, `context`) VALUES
(1, 'David', '0', 'test');

-- --------------------------------------------------------

--
-- 資料表結構 `message3`
--

CREATE TABLE `message3` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `time` text NOT NULL,
  `context` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `message3`
--

INSERT INTO `message3` (`id`, `username`, `time`, `context`) VALUES
(1, 'David', '0', 'test');

-- --------------------------------------------------------

--
-- 資料表結構 `message4`
--

CREATE TABLE `message4` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `time` text NOT NULL,
  `context` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `message4`
--

INSERT INTO `message4` (`id`, `username`, `time`, `context`) VALUES
(1, 'David', '0', 'TEST'),
(2, 'David', '0', '好棒!');

-- --------------------------------------------------------

--
-- 資料表結構 `message5`
--

CREATE TABLE `message5` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `time` text NOT NULL,
  `context` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `message6`
--

CREATE TABLE `message6` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `time` text NOT NULL,
  `context` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `message6`
--

INSERT INTO `message6` (`id`, `username`, `time`, `context`) VALUES
(1, 'David', '0', 'test');

-- --------------------------------------------------------

--
-- 資料表結構 `message7`
--

CREATE TABLE `message7` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `time` text NOT NULL,
  `context` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `message7`
--

INSERT INTO `message7` (`id`, `username`, `time`, `context`) VALUES
(1, 'David', '0', 'test');

-- --------------------------------------------------------

--
-- 資料表結構 `message8`
--

CREATE TABLE `message8` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `time` text NOT NULL,
  `context` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `message8`
--

INSERT INTO `message8` (`id`, `username`, `time`, `context`) VALUES
(1, 'David', '0', 'test');

-- --------------------------------------------------------

--
-- 資料表結構 `message9`
--

CREATE TABLE `message9` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `time` text NOT NULL,
  `context` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `message9`
--

INSERT INTO `message9` (`id`, `username`, `time`, `context`) VALUES
(1, 'David', '0', 'test');

-- --------------------------------------------------------

--
-- 資料表結構 `message10`
--

CREATE TABLE `message10` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `time` text NOT NULL,
  `context` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `message10`
--

INSERT INTO `message10` (`id`, `username`, `time`, `context`) VALUES
(1, 'David', '0', 'test');

-- --------------------------------------------------------

--
-- 資料表結構 `messages`
--

CREATE TABLE `messages` (
  `ID` int(16) NOT NULL,
  `username` text NOT NULL,
  `time` text NOT NULL,
  `context` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `messages`
--

INSERT INTO `messages` (`ID`, `username`, `time`, `context`) VALUES
(38, 'David', '0', '讚'),
(40, 'root', '0', '主辦方辦的很用心，謝謝各位工作人員<'),
(41, 'USER32', '0', '希望能提供茶水，謝謝'),
(44, 'nnn1859@gmail.com', '0', '晚安'),
(46, '123123', '0', '蠟筆小新好看，期待各位新增其他好看的電子書！'),
(47, '123123', '0', '我有時候會跟自己講話'),
(48, '123123', '0', '對欸，我也會');

-- --------------------------------------------------------

--
-- 資料表結構 `point`
--

CREATE TABLE `point` (
  `ID` int(11) NOT NULL,
  `member_account` text NOT NULL,
  `point` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `point`
--

INSERT INTO `point` (`ID`, `member_account`, `point`, `time`) VALUES
(9, 'David', 105, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `project2`
--

CREATE TABLE `project2` (
  `id` text DEFAULT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `project2`
--

INSERT INTO `project2` (`id`, `name`, `username`, `password`) VALUES
('1', '1', '1', '1');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `active`
--
ALTER TABLE `active`
  ADD PRIMARY KEY (`member_id`);

--
-- 資料表索引 `exchange`
--
ALTER TABLE `exchange`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `joinin`
--
ALTER TABLE `joinin`
  ADD PRIMARY KEY (`member_id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- 資料表索引 `message1`
--
ALTER TABLE `message1`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `message2`
--
ALTER TABLE `message2`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `message3`
--
ALTER TABLE `message3`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `message4`
--
ALTER TABLE `message4`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `message5`
--
ALTER TABLE `message5`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `message6`
--
ALTER TABLE `message6`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `message7`
--
ALTER TABLE `message7`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `message8`
--
ALTER TABLE `message8`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `message9`
--
ALTER TABLE `message9`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `message10`
--
ALTER TABLE `message10`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`ID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `active`
--
ALTER TABLE `active`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `exchange`
--
ALTER TABLE `exchange`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1083;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `joinin`
--
ALTER TABLE `joinin`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message1`
--
ALTER TABLE `message1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message2`
--
ALTER TABLE `message2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message3`
--
ALTER TABLE `message3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message4`
--
ALTER TABLE `message4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message5`
--
ALTER TABLE `message5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message6`
--
ALTER TABLE `message6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message7`
--
ALTER TABLE `message7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message8`
--
ALTER TABLE `message8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message9`
--
ALTER TABLE `message9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message10`
--
ALTER TABLE `message10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `point`
--
ALTER TABLE `point`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
