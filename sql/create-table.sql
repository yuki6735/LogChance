CREATE TABLE IF NOT EXISTS `LogChance`.`Stock` (
  `name` VARCHAR(20) NOT NULL,
  `stock` INT NOT NULL,
  `wine` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`stock`))
ENGINE = InnoDB;
