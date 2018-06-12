
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `mini_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_attachment`
--

DROP TABLE IF EXISTS `file_attachment`;
CREATE TABLE IF NOT EXISTS `file_attachment` (
  `file_attachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_path` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`file_attachment_id`),
  KEY `file_attachment_id` (`file_attachment_id`),
  KEY `model_id` (`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
CREATE TABLE IF NOT EXISTS `manufacturer` (
  `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturer_name` varchar(255) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`manufacturer_id`),
  KEY `manufacturer_id` (`manufacturer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `model_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(255) DEFAULT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `model_color` varchar(255) DEFAULT NULL,
  `model_mf_year` varchar(255) DEFAULT NULL,
  `model_registration_no` varchar(255) DEFAULT NULL,
  `model_note` text,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`model_id`),
  KEY `model_id` (`model_id`),
  KEY `manufacturer_id` (`manufacturer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file_attachment`
--
ALTER TABLE `file_attachment`
  ADD CONSTRAINT `file_attachment_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `model` (`model_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`manufacturer_id`) ON DELETE CASCADE ON UPDATE CASCADE;


COMMIT;


