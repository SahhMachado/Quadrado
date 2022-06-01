-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema quad
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema quad
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `quad` DEFAULT CHARACTER SET utf8 ;
USE `quad` ;

-- -----------------------------------------------------
-- Table `quad`.`tabuleiro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quad`.`tabuleiro` (
  `idTabuleiro` INT NOT NULL AUTO_INCREMENT,
  `lado` INT NULL,
  PRIMARY KEY (`idTabuleiro`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quad`.`quadrado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quad`.`quadrado` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `lado` INT NULL,
  `cor` VARCHAR(45) NULL,
  `quad_idTabuleiro` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_quadrado_tabuleiro_idx` (`quad_idTabuleiro` ASC),
  CONSTRAINT `fk_quadrado_tabuleiro`
    FOREIGN KEY (`quad_idTabuleiro`)
    REFERENCES `quad`.`tabuleiro` (`idTabuleiro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quad`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quad`.`usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(250) NULL,
  `user` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
