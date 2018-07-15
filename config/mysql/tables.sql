CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_pic` varchar(255) DEFAULT '/template/img/avatars/nopic.png',
  `token` varchar(255) DEFAULT NULL,
  `activate` tinyint(4) DEFAULT '0',
  `role` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `text` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `likes` (
  `like_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`username`, `email`, `password`, `user_pic`, `token`, `activate`,`role`) VALUES
		('mkyianyt', 'mariankyianytsia@gmail.com', '6e3cc936afbb78d3aafc48bdc65fe9a4313b7bc1393dc04cc4f83861228df3d5e79873045ed879ab15397937915cfae6bfa8b12a8d7576c0aff02e98acedb682', '/template/img/avatars/nopic.png', NULL, 1, 1);