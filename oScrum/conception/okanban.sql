-- MySQL Script generated by MySQL Workbench
-- Fri 02 Nov 2018 05:06:13 PM CET
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema okanban
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `list`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `list` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) NOT NULL,
  `page_order` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `card`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `card` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `list_order` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  `list_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_card_list_idx` (`list_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `label`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `label` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(32) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `card_has_label`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `card_has_label` (
  `card_id` INT UNSIGNED NOT NULL,
  `label_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`card_id`, `label_id`),
  INDEX `fk_card_has_label_label1_idx` (`label_id` ASC),
  INDEX `fk_card_has_label_card1_idx` (`card_id` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `list`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `list` (`id`, `name`, `page_order`, `created_at`, `updated_at`) VALUES (1, 'PHP', 2, '2018-11-01 08:00:00', NULL);
INSERT INTO `list` (`id`, `name`, `page_order`, `created_at`, `updated_at`) VALUES (2, 'Javascript', 3, '2018-11-01 08:02:00', NULL);
INSERT INTO `list` (`id`, `name`, `page_order`, `created_at`, `updated_at`) VALUES (3, 'Perso', 1, '2018-11-01 08:05:00', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `card`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `card` (`id`, `title`, `list_order`, `created_at`, `updated_at`, `list_id`) VALUES (1, 'Recoder oFramework', 1, '2018-11-01 09:00:00', NULL, 1);
INSERT INTO `card` (`id`, `title`, `list_order`, `created_at`, `updated_at`, `list_id`) VALUES (2, 'Comprendre les namespaces', 2, '2018-11-01 09:00:00', NULL, 1);
INSERT INTO `card` (`id`, `title`, `list_order`, `created_at`, `updated_at`, `list_id`) VALUES (3, 'Ecrire ma première requête Ajax', 2, '2018-11-01 09:00:00', NULL, 2);
INSERT INTO `card` (`id`, `title`, `list_order`, `created_at`, `updated_at`, `list_id`) VALUES (4, 'Faire les courses', 1, '2018-11-01 09:00:00', NULL, 3);
INSERT INTO `card` (`id`, `title`, `list_order`, `created_at`, `updated_at`, `list_id`) VALUES (5, 'Comprendre le concept Ajax', 1, '2018-11-01 09:00:00', NULL, 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `label`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `label` (`id`, `name`, `created_at`, `updated_at`) VALUES (1, 'front', '2018-11-01 10:00:00', NULL);
INSERT INTO `label` (`id`, `name`, `created_at`, `updated_at`) VALUES (2, 'back', '2018-11-01 10:00:00', NULL);
INSERT INTO `label` (`id`, `name`, `created_at`, `updated_at`) VALUES (3, 'pas envie', '2018-11-01 10:00:00', NULL);
INSERT INTO `label` (`id`, `name`, `created_at`, `updated_at`) VALUES (4, 'c\'est pas faux', '2018-11-01 10:00:00', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `card_has_label`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `card_has_label` (`card_id`, `label_id`) VALUES (1, 2);
INSERT INTO `card_has_label` (`card_id`, `label_id`) VALUES (1, 3);
INSERT INTO `card_has_label` (`card_id`, `label_id`) VALUES (4, 3);
INSERT INTO `card_has_label` (`card_id`, `label_id`) VALUES (5, 4);
INSERT INTO `card_has_label` (`card_id`, `label_id`) VALUES (5, 1);
INSERT INTO `card_has_label` (`card_id`, `label_id`) VALUES (3, 1);

COMMIT;