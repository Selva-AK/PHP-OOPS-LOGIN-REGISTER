CREATE DATABASE IF NOT EXISTS Register ;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(64) NOT NULL,
  `userEmail` varchar(64) NOT NULL,
  `userPasswordHash` varchar(255) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userName` (`userName`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;