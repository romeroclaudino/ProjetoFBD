-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema PROJETO_FBD
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema PROJETO_FBD
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `PROJETO_FBD` DEFAULT CHARACTER SET utf8 ;
USE `PROJETO_FBD` ;

-- -----------------------------------------------------
-- Table `PROJETO_FBD`.`ESTADO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PROJETO_FBD`.`ESTADO` (
  `codEstado` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`codEstado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PROJETO_FBD`.`UNIDADE_ESTOQUE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PROJETO_FBD`.`UNIDADE_ESTOQUE` (
  `codUnidade` INT NOT NULL,
  `descricao` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`codUnidade`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PROJETO_FBD`.`CLIENTE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PROJETO_FBD`.`CLIENTE` (
  `codCliente` INT NOT NULL,
  `nome` VARCHAR(80) NOT NULL,
  `endereco` VARCHAR(100) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `codEstado` INT NOT NULL,
  `CEP` VARCHAR(20) NOT NULL,
  `telefone` VARCHAR(20) NOT NULL,
  `percentualDesconto` FLOAT NOT NULL,
  PRIMARY KEY (`codCliente`),
  INDEX `fk_CLIENTE_ESTADO_idx` (`codEstado` ASC),
  CONSTRAINT `fk_CLIENTE_ESTADO`
    FOREIGN KEY (`codEstado`)
    REFERENCES `PROJETO_FBD`.`ESTADO` (`codEstado`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PROJETO_FBD`.`PRODUTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PROJETO_FBD`.`PRODUTO` (
  `codProduto` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `preco` FLOAT NOT NULL,
  `codUnidade` INT NOT NULL,
  PRIMARY KEY (`codProduto`),
  INDEX `fk_PRODUTO_UNIDADE_idx` (`codUnidade` ASC),
  CONSTRAINT `fk_PRODUTO_UNIDADE`
    FOREIGN KEY (`codUnidade`)
    REFERENCES `PROJETO_FBD`.`UNIDADE_ESTOQUE` (`codUnidade`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PROJETO_FBD`.`PEDIDO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PROJETO_FBD`.`PEDIDO` (
  `codPedido` INT NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `codCliente` INT NOT NULL,
  `dtEntrada` DATE NOT NULL,
  `valorTotal` FLOAT NOT NULL,
  `desconto` FLOAT NOT NULL,
  `dtEmbarque` DATE NOT NULL,
  PRIMARY KEY (`codPedido`),
  INDEX `fk_PEDIDO_CLIENTE_idx` (`codCliente` ASC),
  CONSTRAINT `fk_PEDIDO_CLIENTE`
    FOREIGN KEY (`codCliente`)
    REFERENCES `PROJETO_FBD`.`CLIENTE` (`codCliente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PROJETO_FBD`.`ITEM`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PROJETO_FBD`.`ITEM` (
  `codPedido` INT NOT NULL,
  `codProduto` INT NOT NULL,
  `quantidade` INT NOT NULL,
  `valorUnit` FLOAT NOT NULL,
  `ValorTotal` FLOAT NOT NULL,
  PRIMARY KEY (`codPedido`, `codProduto`),
  INDEX `fk_ITEM_PRODUTO_idx` (`codProduto` ASC),
  CONSTRAINT `fk_ITEM_PEDIDO`
    FOREIGN KEY (`codPedido`)
    REFERENCES `PROJETO_FBD`.`PEDIDO` (`codPedido`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ITEM_PRODUTO`
    FOREIGN KEY (`codProduto`)
    REFERENCES `PROJETO_FBD`.`PRODUTO` (`codProduto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
