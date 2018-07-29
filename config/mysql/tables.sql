CREATE TABLE IF NOT EXISTS `users` (
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

CREATE TABLE  IF NOT EXISTS `images` (
  `image_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `path` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `image_id` int(11) DEFAULT '0',
  `text` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `likes` (
  `like_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`username`, `email`, `password`, `user_pic`, `token`, `activate`, `role`) VALUES
		('mkyianyt', 'mariankyianytsia@gmail.com', '6e3cc936afbb78d3aafc48bdc65fe9a4313b7bc1393dc04cc4f83861228df3d5e79873045ed879ab15397937915cfae6bfa8b12a8d7576c0aff02e98acedb682', '/template/img/avatars/nopic.png', NULL, 1, 1);

INSERT INTO `images` (`user_id`, `path`) VALUES ('1', '/template/img/1.jpeg');
INSERT INTO `images` (`user_id`, `path`) VALUES ('1', '/template/img/2.jpg');
INSERT INTO `images` (`user_id`, `path`) VALUES ('1', '/template/img/3.jpeg');
INSERT INTO `images` (`user_id`, `path`) VALUES ('1', '/template/img/4.jpg');
INSERT INTO `images` (`user_id`, `path`) VALUES ('1', '/template/img/5.jpeg');
INSERT INTO `images` (`user_id`, `path`) VALUES ('1', '/template/img/6.jpg');
INSERT INTO `images` (`user_id`, `path`) VALUES ('1', '/template/img/7.jpg');
INSERT INTO `images` (`user_id`, `path`) VALUES ('1', '/template/img/8.jpeg');
INSERT INTO `images` (`user_id`, `path`) VALUES ('1', '/template/img/9.jpeg');
INSERT INTO `images` (`user_id`, `path`) VALUES ('1', '/template/img/10.jpg');
INSERT INTO `images` (`user_id`, `path`) VALUES ('1', '/template/img/11.jpeg');
INSERT INTO `images` (`user_id`, `path`) VALUES ('1', '/template/img/12.jpg');
INSERT INTO `images` (`user_id`, `path`) VALUES ('1', '/template/img/13.jpg');
INSERT INTO `images` (`user_id`, `path`) VALUES ('1', '/template/img/14.jpg');
INSERT INTO `images` (`user_id`, `path`) VALUES ('1', '/template/img/15.jpg');
