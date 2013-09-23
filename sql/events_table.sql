CREATE TABLE `monitaur`.`events` (
  `id` INT NOT NULL AUTO_INCREMENT,
  'type' ENUM('alert', 'error','notification') NOT NULL,
  `server` VARCHAR(45) NULL,
  `description` MEDIUMTEXT NULL,
  `details` MEDIUMTEXT NULL,
  `created` VARCHAR(45) NULL,
  `status` ENUM('pending', 'acknowledged','resolved') NOT NULL DEFAULT 'pending',
  `updated` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));