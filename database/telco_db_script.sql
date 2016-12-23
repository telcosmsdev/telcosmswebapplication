SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `telco_sms_db` ;
CREATE SCHEMA IF NOT EXISTS `telco_sms_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `telco_sms_db` ;

-- -----------------------------------------------------
-- Table `telco_sms_db`.`Cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `telco_sms_db`.`Cliente` ;

CREATE  TABLE IF NOT EXISTS `telco_sms_db`.`Cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT ,
  `nome_cliente` VARCHAR(255) NOT NULL ,
  `username` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `telemovel` VARCHAR(45) NOT NULL ,
  `cliente_type` ENUM('Standard', 'Corporate') NOT NULL ,
  `cliente_referencia` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_cliente`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `telco_sms_db`.`ContactosCliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `telco_sms_db`.`ContactosCliente` ;

CREATE  TABLE IF NOT EXISTS `telco_sms_db`.`ContactosCliente` (
  `id_contactos_cliente` INT NOT NULL AUTO_INCREMENT ,
  `id_cliente` INT NOT NULL ,
  `n_telemovel` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_contactos_cliente`) ,
  INDEX `fk_ContactosCliente_Cliente1_idx` (`id_cliente` ASC) ,
  CONSTRAINT `fk_ContactosCliente_Cliente1`
    FOREIGN KEY (`id_cliente` )
    REFERENCES `telco_sms_db`.`Cliente` (`id_cliente` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `telco_sms_db`.`SmsEnviadas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `telco_sms_db`.`SmsEnviadas` ;

CREATE  TABLE IF NOT EXISTS `telco_sms_db`.`SmsEnviadas` (
  `id_sms_enviadas` INT NOT NULL AUTO_INCREMENT ,
  `id_cliente` INT NOT NULL ,
  `n_sms_enviadas` INT NOT NULL ,
  PRIMARY KEY (`id_sms_enviadas`) ,
  INDEX `fk_SmsEnviadas_Cliente1_idx` (`id_cliente` ASC) ,
  CONSTRAINT `fk_SmsEnviadas_Cliente1`
    FOREIGN KEY (`id_cliente` )
    REFERENCES `telco_sms_db`.`Cliente` (`id_cliente` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `telco_sms_db`.`SmsDisponiveis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `telco_sms_db`.`SmsDisponiveis` ;

CREATE  TABLE IF NOT EXISTS `telco_sms_db`.`SmsDisponiveis` (
  `id_sms_disponiveis` INT NOT NULL AUTO_INCREMENT ,
  `id_cliente` INT NOT NULL ,
  `n_sms_disponiveis` INT NOT NULL ,
  PRIMARY KEY (`id_sms_disponiveis`) ,
  INDEX `fk_SmsDisponiveis_Cliente1_idx` (`id_cliente` ASC) ,
  CONSTRAINT `fk_SmsDisponiveis_Cliente1`
    FOREIGN KEY (`id_cliente` )
    REFERENCES `telco_sms_db`.`Cliente` (`id_cliente` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `telco_sms_db`.`TipoDB`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `telco_sms_db`.`TipoDB` ;

CREATE  TABLE IF NOT EXISTS `telco_sms_db`.`TipoDB` (
  `id_tipo_db` INT NOT NULL AUTO_INCREMENT ,
  `nome_db` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_tipo_db`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `telco_sms_db`.`Pacotes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `telco_sms_db`.`Pacotes` ;

CREATE  TABLE IF NOT EXISTS `telco_sms_db`.`Pacotes` (
  `id_pacote` INT NOT NULL AUTO_INCREMENT ,
  `id_tipo_db` INT NOT NULL ,
  `nome_pacote` VARCHAR(45) NOT NULL ,
  `preco_pacote` DECIMAL(9,4) NOT NULL ,
  `n_sms` INT NOT NULL ,
  PRIMARY KEY (`id_pacote`) ,
  INDEX `fk_Pacotes_TipoDB1_idx` (`id_tipo_db` ASC) ,
  CONSTRAINT `fk_Pacotes_TipoDB1`
    FOREIGN KEY (`id_tipo_db` )
    REFERENCES `telco_sms_db`.`TipoDB` (`id_tipo_db` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `telco_sms_db`.`ContactosDB`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `telco_sms_db`.`ContactosDB` ;

CREATE  TABLE IF NOT EXISTS `telco_sms_db`.`ContactosDB` (
  `id_contactos_db` INT NOT NULL AUTO_INCREMENT ,
  `id_tipo_db` INT NOT NULL ,
  `n_telemovel` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_contactos_db`) ,
  INDEX `fk_ContactosDB_TipoDB1_idx` (`id_tipo_db` ASC) ,
  CONSTRAINT `fk_ContactosDB_TipoDB1`
    FOREIGN KEY (`id_tipo_db` )
    REFERENCES `telco_sms_db`.`TipoDB` (`id_tipo_db` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `telco_sms_db`.`Compra`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `telco_sms_db`.`Compra` ;

CREATE  TABLE IF NOT EXISTS `telco_sms_db`.`Compra` (
  `id_compra` INT NOT NULL AUTO_INCREMENT ,
  `id_cliente` INT NOT NULL ,
  `id_pacote` INT NOT NULL ,
  `referencia_pagamento` VARCHAR(255) NOT NULL ,
  `estado_compra` ENUM('Pago' , 'Nao Pago') NOT NULL ,
  `data_compra` DATETIME NOT NULL ,
  PRIMARY KEY (`id_compra`) ,
  INDEX `fk_Referencias_Cliente1_idx` (`id_cliente` ASC) ,
  INDEX `fk_Referencias_Pacotes1_idx` (`id_pacote` ASC) ,
  CONSTRAINT `fk_Referencias_Cliente1`
    FOREIGN KEY (`id_cliente` )
    REFERENCES `telco_sms_db`.`Cliente` (`id_cliente` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Referencias_Pacotes1`
    FOREIGN KEY (`id_pacote` )
    REFERENCES `telco_sms_db`.`Pacotes` (`id_pacote` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `telco_sms_db`.`Admin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `telco_sms_db`.`Admin` ;

CREATE  TABLE IF NOT EXISTS `telco_sms_db`.`Admin` (
  `id_admin` INT NOT NULL AUTO_INCREMENT ,
  `nome_completo` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(255) NULL ,
  `user_admin` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `telefone` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_admin`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


delimiter #
create trigger init_sms_disponiveis_enviadas after insert on `Cliente`
for each row
begin
  insert into  `SmsDisponiveis` (n_sms_disponiveis, id_cliente) values (n_sms_disponiveis, NEW.id_cliente);
  insert into  `SmsEnviadas`  (id_cliente , n_sms_enviadas ) values (NEW.id_cliente , n_sms_enviadas);
end#
delimiter ;
USE `telco_sms_db` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
