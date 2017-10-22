CREATE TABLE IF NOT EXISTS `#__team_members` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`facebook_username` VARCHAR(255) NOT NULL,
	`twitter_handle` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`photo` VARCHAR(255) NOT NULL,
	`position` VARCHAR(255) NOT NULL,
	`name` VARCHAR(255) NOT NULL,
	`created_by` INT(11) NOT NULL,
	`state` INT(11) NOT NULL,
	`ordering` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB COMMENT="Team Members" DEFAULT COLLATE=utf8_general_ci;
