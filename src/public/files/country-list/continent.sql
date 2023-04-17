-- Continents

CREATE TABLE IF NOT EXISTS `continents` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `continent_code` varchar(2) DEFAULT NULL,
    `continent_name` varchar(30) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `continents` (`id`, `continent_code`, `continent_name`) VALUES
(1, 'AF', 'Africa'),
(2, 'AN', 'Antarctica'),
(3, 'AS', 'Asia'),
(4, 'EU', 'Europe'),
(5, 'OC', 'Australia'),
(6, 'NA', 'North America'),
(7, 'SA', 'South America');
