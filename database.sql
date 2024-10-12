-- MySQL dump 10.13  Distrib 8.0.39, for Linux (x86_64)
-- Host: localhost    Database: testdatabase
-- Server version	8.0.39-0ubuntu0.22.04.1

-- ------------------------------------------------------

--
-- Table structure for table `deal_log`
--

DROP TABLE IF EXISTS `deal_log`;
/*用户操作记录表，实际没有用到*/;
CREATE TABLE `deal_log` (
  `d_number` int NOT NULL AUTO_INCREMENT,
  `d_uid` varchar(30) NOT NULL,
  `d_opertype` varchar(40) NOT NULL,
  `d_tid` varchar(40) NOT NULL,
  `d_time` varchar(10) NOT NULL,
  PRIMARY KEY (`d_number`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Table structure for table `flight_infor`
--

DROP TABLE IF EXISTS `flight_infor`;
/*航班信息表*/;
CREATE TABLE `flight_infor` (
  `f_id` int NOT NULL, /*航班id，唯一识别航班信息用*/
  `f_number` varchar(30) NOT NULL, /*航班号*/
  `f_start_time` varchar(40) NOT NULL,
  `f_end_time` varchar(40) NOT NULL,
  `f_departure` varchar(40) NOT NULL,/*始发地*/
  `f_destination` varchar(40) NOT NULL,/*目的地*/
  `f_company` varchar(30) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*登陆表，实际没有用到*/;
CREATE TABLE `login` (
  `l_uid` varchar(20) NOT NULL,
  `l_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*订单表，实际没有用到*/;
CREATE TABLE `orders` (
  `o_id` varchar(100) NOT NULL,
  `o_uid` varchar(20) NOT NULL,
  `o_tid` varchar(40) NOT NULL,
  `o_time` varchar(40) NOT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Table structure for table `seat`
--

DROP TABLE IF EXISTS `seat`;
/*座位表，实际没有用到*/;
CREATE TABLE `seat` (
  `s_id` int NOT NULL,
  `f_id` int NOT NULL,
  `s_type` varchar(30) NOT NULL,
  `s_number` int NOT NULL,
  `s_price` int NOT NULL,
  PRIMARY KEY (`s_id`),
  KEY `f_id` (`f_id`),
  CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `flight_infor` (`f_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*状态表，实际没有用到*/;
CREATE TABLE `state` (
  `fs_number` varchar(30) NOT NULL,
  `fs_date` varchar(10) NOT NULL,
  `fs_state` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Table structure for table `ticket_infor`
--

DROP TABLE IF EXISTS `ticket_infor`;
/*机票表*/;
CREATE TABLE `ticket_infor` (
  `t_id` varchar(100) NOT NULL,
  `t_f_uid` int NOT NULL,/*航班ID*/
  `t_uid` varchar(20) NOT NULL,/*用户ID*/
  `t_seatId` varchar(100) DEFAULT NULL,
  `t_date` varchar(20) NOT NULL,
  `t_type` varchar(30) DEFAULT NULL,
  `t_price` int DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*用户表*/;
CREATE TABLE `users` (
  `u_id` varchar(20) NOT NULL,
  `u_password` varchar(20) NOT NULL,/*储存明文密码，故不需要太大空间*/
  `u_name` varchar(20) DEFAULT NULL,
  `u_telephone` varchar(20) DEFAULT NULL,
  `u_address` varchar(100) DEFAULT NULL,
  `u_email` varchar(20) DEFAULT NULL,
  `u_idcard` varchar(20) DEFAULT NULL,
  `u_power` int DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dump completed on 2024-10-09  8:47:02
