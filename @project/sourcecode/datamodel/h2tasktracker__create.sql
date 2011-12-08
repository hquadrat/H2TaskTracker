SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `h2tasktracker` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `h2tasktracker` ;

-- -----------------------------------------------------
-- Table `h2tasktracker`.`t_address`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `h2tasktracker`.`t_address` ;

CREATE  TABLE IF NOT EXISTS `h2tasktracker`.`t_address` (
  `idt_address` INT NOT NULL ,
  `street` VARCHAR(255) NULL ,
  `co` VARCHAR(255) NULL ,
  `postalcode` VARCHAR(255) NULL ,
  `city` VARCHAR(255) NULL ,
  `phoneprivate` VARCHAR(255) NULL ,
  `phonebusiness` VARCHAR(255) NULL ,
  `mobileprivate` VARCHAR(255) NULL ,
  `mobilebusiness` VARCHAR(255) NULL ,
  `emailprivate` VARCHAR(255) NULL ,
  `emailbusiness` VARCHAR(255) NULL ,
  PRIMARY KEY (`idt_address`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `h2tasktracker`.`t_persontype`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `h2tasktracker`.`t_persontype` ;

CREATE  TABLE IF NOT EXISTS `h2tasktracker`.`t_persontype` (
  `idt_persontype` INT NOT NULL ,
  `persontypeRef` VARCHAR(255) NULL ,
  PRIMARY KEY (`idt_persontype`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `h2tasktracker`.`t_person`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `h2tasktracker`.`t_person` ;

CREATE  TABLE IF NOT EXISTS `h2tasktracker`.`t_person` (
  `idt_person` INT NOT NULL ,
  `firstname` VARCHAR(255) NULL ,
  `lastname` VARCHAR(255) NULL ,
  `t_address_idt_address` INT NOT NULL ,
  `t_persontype_idt_persontype` INT NOT NULL ,
  PRIMARY KEY (`idt_person`, `t_address_idt_address`, `t_persontype_idt_persontype`) ,
  INDEX `fk_t_person_t_address1` (`t_address_idt_address` ASC) ,
  INDEX `fk_t_person_t_persontype1` (`t_persontype_idt_persontype` ASC) ,
  CONSTRAINT `fk_t_person_t_address1`
    FOREIGN KEY (`t_address_idt_address` )
    REFERENCES `h2tasktracker`.`t_address` (`idt_address` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_person_t_persontype1`
    FOREIGN KEY (`t_persontype_idt_persontype` )
    REFERENCES `h2tasktracker`.`t_persontype` (`idt_persontype` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `h2tasktracker`.`t_client`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `h2tasktracker`.`t_client` ;

CREATE  TABLE IF NOT EXISTS `h2tasktracker`.`t_client` (
  `idt_client` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  `t_person_idt_person` INT NOT NULL ,
  PRIMARY KEY (`idt_client`, `t_person_idt_person`) ,
  INDEX `fk_t_client_t_person1` (`t_person_idt_person` ASC) ,
  CONSTRAINT `fk_t_client_t_person1`
    FOREIGN KEY (`t_person_idt_person` )
    REFERENCES `h2tasktracker`.`t_person` (`idt_person` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `h2tasktracker`.`t_state`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `h2tasktracker`.`t_state` ;

CREATE  TABLE IF NOT EXISTS `h2tasktracker`.`t_state` (
  `idt_state` INT NOT NULL ,
  `stateRef` VARCHAR(255) NULL ,
  PRIMARY KEY (`idt_state`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `h2tasktracker`.`t_project`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `h2tasktracker`.`t_project` ;

CREATE  TABLE IF NOT EXISTS `h2tasktracker`.`t_project` (
  `idt_project` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  `description` TEXT NULL ,
  `effortplanned` INT NULL ,
  `notifyowners` INT NULL ,
  `t_state_idt_state` INT NOT NULL ,
  `t_client_idt_client` INT NOT NULL ,
  PRIMARY KEY (`idt_project`, `t_state_idt_state`, `t_client_idt_client`) ,
  INDEX `fk_t_project_t_state1` (`t_state_idt_state` ASC) ,
  INDEX `fk_t_project_t_client1` (`t_client_idt_client` ASC) ,
  CONSTRAINT `fk_t_project_t_state1`
    FOREIGN KEY (`t_state_idt_state` )
    REFERENCES `h2tasktracker`.`t_state` (`idt_state` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_project_t_client1`
    FOREIGN KEY (`t_client_idt_client` )
    REFERENCES `h2tasktracker`.`t_client` (`idt_client` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `h2tasktracker`.`t_project_has_t_person`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `h2tasktracker`.`t_project_has_t_person` ;

CREATE  TABLE IF NOT EXISTS `h2tasktracker`.`t_project_has_t_person` (
  `t_project_idt_project` INT NOT NULL ,
  `t_person_idt_person` INT NOT NULL ,
  PRIMARY KEY (`t_project_idt_project`, `t_person_idt_person`) ,
  INDEX `fk_t_project_has_t_person_t_person1` (`t_person_idt_person` ASC) ,
  INDEX `fk_t_project_has_t_person_t_project1` (`t_project_idt_project` ASC) ,
  CONSTRAINT `fk_t_project_has_t_person_t_project1`
    FOREIGN KEY (`t_project_idt_project` )
    REFERENCES `h2tasktracker`.`t_project` (`idt_project` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_project_has_t_person_t_person1`
    FOREIGN KEY (`t_person_idt_person` )
    REFERENCES `h2tasktracker`.`t_person` (`idt_person` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `h2tasktracker`.`t_task`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `h2tasktracker`.`t_task` ;

CREATE  TABLE IF NOT EXISTS `h2tasktracker`.`t_task` (
  `idt_task` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  `description` TEXT NULL ,
  `effortplanned` INT NULL ,
  `percentfinished` INT NULL ,
  `t_person_idt_person` INT NOT NULL ,
  PRIMARY KEY (`idt_task`, `t_person_idt_person`) ,
  INDEX `fk_t_task_t_person1` (`t_person_idt_person` ASC) ,
  CONSTRAINT `fk_t_task_t_person1`
    FOREIGN KEY (`t_person_idt_person` )
    REFERENCES `h2tasktracker`.`t_person` (`idt_person` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `h2tasktracker`.`t_project_has_t_task`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `h2tasktracker`.`t_project_has_t_task` ;

CREATE  TABLE IF NOT EXISTS `h2tasktracker`.`t_project_has_t_task` (
  `t_project_idt_project` INT NOT NULL ,
  `t_task_idt_task` INT NOT NULL ,
  PRIMARY KEY (`t_project_idt_project`, `t_task_idt_task`) ,
  INDEX `fk_t_project_has_t_task_t_task1` (`t_task_idt_task` ASC) ,
  INDEX `fk_t_project_has_t_task_t_project1` (`t_project_idt_project` ASC) ,
  CONSTRAINT `fk_t_project_has_t_task_t_project1`
    FOREIGN KEY (`t_project_idt_project` )
    REFERENCES `h2tasktracker`.`t_project` (`idt_project` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_project_has_t_task_t_task1`
    FOREIGN KEY (`t_task_idt_task` )
    REFERENCES `h2tasktracker`.`t_task` (`idt_task` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `h2tasktracker`.`t_task_has_t_state`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `h2tasktracker`.`t_task_has_t_state` ;

CREATE  TABLE IF NOT EXISTS `h2tasktracker`.`t_task_has_t_state` (
  `t_task_idt_task` INT NOT NULL ,
  `t_state_idt_state` INT NOT NULL ,
  `timestamp` TIMESTAMP NULL ,
  `note` TEXT NULL ,
  `effortbooked` INT NULL ,
  PRIMARY KEY (`t_task_idt_task`, `t_state_idt_state`) ,
  INDEX `fk_t_task_has_t_state_t_state1` (`t_state_idt_state` ASC) ,
  INDEX `fk_t_task_has_t_state_t_task1` (`t_task_idt_task` ASC) ,
  CONSTRAINT `fk_t_task_has_t_state_t_task1`
    FOREIGN KEY (`t_task_idt_task` )
    REFERENCES `h2tasktracker`.`t_task` (`idt_task` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_task_has_t_state_t_state1`
    FOREIGN KEY (`t_state_idt_state` )
    REFERENCES `h2tasktracker`.`t_state` (`idt_state` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'This table holds the history of task changes.' ;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
