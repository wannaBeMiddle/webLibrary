-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema zhorapbg_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema zhorapbg_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `zhorapbg_db` DEFAULT CHARACTER SET utf8 ;
USE `zhorapbg_db` ;

-- -----------------------------------------------------
-- Table `zhorapbg_db`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `zhorapbg_db`.`users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  `hashedPassword` VARCHAR(45) NOT NULL,
  `regDate` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zhorapbg_db`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `zhorapbg_db`.`products` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `cost` VARCHAR(45) NOT NULL,
  `imagePath` VARCHAR(45) NOT NULL DEFAULT '/upload/noImage.jpg',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zhorapbg_db`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `zhorapbg_db`.`orders` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `createDate` TIMESTAMP NOT NULL,
  `isPayed` TINYINT NOT NULL DEFAULT 0,
  `user` INT UNSIGNED NOT NULL,
  `isDelivered` TINYINT NOT NULL DEFAULT 0,
  `price` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_orders_users_idx` (`user` ASC) ,
  CONSTRAINT `fk_orders_users`
    FOREIGN KEY (`user`)
    REFERENCES `zhorapbg_db`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zhorapbg_db`.`baskets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `zhorapbg_db`.`baskets` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `product` INT UNSIGNED NOT NULL,
  `order` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_baskets_products1_idx` (`product` ASC) ,
  INDEX `fk_baskets_orders1_idx` (`order` ASC) ,
  CONSTRAINT `fk_baskets_products1`
    FOREIGN KEY (`product`)
    REFERENCES `zhorapbg_db`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_baskets_orders1`
    FOREIGN KEY (`order`)
    REFERENCES `zhorapbg_db`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
