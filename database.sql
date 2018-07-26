-- MySQL Script generated by MySQL Workbench
-- Wed Jul 25 10:40:11 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

-- -----------------------------------------------------
-- Table `cities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cities` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `source` VARCHAR(150) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `rooms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '	',
  `city_id` INT NOT NULL,
  `name` VARCHAR(100) NULL,
  `price` DECIMAL(10,2) NULL,
  `image_url` VARCHAR(150) NULL,
  `href` VARCHAR(150) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_rooms_city_idx` (`city_id` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Data for table `cities`
-- -----------------------------------------------------
INSERT INTO `cities` (`id`, `name`, `source`) VALUES (1, 'Isla Mujeres', 'https://www.tripadvisor.com/Hotels-g150810-Isla_Mujeres_Yucatan_Peninsula-Hotels.html');
INSERT INTO `cities` (`id`, `name`, `source`) VALUES (2, 'Cancún', 'https://www.tripadvisor.com/Hotels-g150807-Cancun_Yucatan_Peninsula-Hotels.html');
INSERT INTO `cities` (`id`, `name`, `source`) VALUES (3, 'Playa del carmen', 'https://www.tripadvisor.com/Hotels-g150812-Playa_del_Carmen_Yucatan_Peninsula-Hotels.html');
INSERT INTO `cities` (`id`, `name`, `source`) VALUES (4, 'Tulum', 'https://www.tripadvisor.com/Hotels-g150813-Tulum_Yucatan_Peninsula-Hotels.html');