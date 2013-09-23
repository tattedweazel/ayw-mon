CREATE TABLE `monitaur`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `display` VARCHAR(45) NOT NULL,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(75) NOT NULL,
  `access` ENUM('admin','user','viewer') NOT NULL DEFAULT 'viewer',
  PRIMARY KEY (`id`));
