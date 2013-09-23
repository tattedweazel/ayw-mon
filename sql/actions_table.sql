CREATE TABLE `monitaur`.`actions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `event_id` INT NOT NULL,
  `actor` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `created` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));