SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

USE `id19509910_dbcheckfrota`;

-- -----------------------------------------------------
-- Table `id19509910_dbcheckfrota`.`tipocaminhao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id19509910_dbcheckfrota`.`tipocaminhao` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(150) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -----------------------------------------------------
-- Table `id19509910_dbcheckfrota`.`frota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id19509910_dbcheckfrota`.`frota` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `placa` VARCHAR(10) NOT NULL UNIQUE,
    `id_tipocaminhao` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_tipocaminhao`) REFERENCES `id19509910_dbcheckfrota`.`tipocaminhao` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -----------------------------------------------------
-- Table `id19509910_dbcheckfrota`.`motorista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id19509910_dbcheckfrota`.`motorista` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(50) NOT NULL,
    `cpf` VARCHAR(15) NOT NULL UNIQUE,
    `habilitacao` VARCHAR(20) NOT NULL UNIQUE,
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -----------------------------------------------------
-- Table `id19509910_dbcheckfrota`.`tiporeboque`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id19509910_dbcheckfrota`.`tiporeboque` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -----------------------------------------------------
-- Table `id19509910_dbcheckfrota`.`reboque`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id19509910_dbcheckfrota`.`reboque` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `placar` VARCHAR(15) NOT NULL UNIQUE,
    `tiporeboque_id` INT NOT NULL,
    PRIMARY KEY (`id`),
    
    FOREIGN KEY (`tiporeboque_id`) REFERENCES `id19509910_dbcheckfrota`.`tiporeboque` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -----------------------------------------------------
-- Table `id19509910_dbcheckfrota`.`checklist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id19509910_dbcheckfrota`.`checklist` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `id_frota` INT NOT NULL,
    `id_motorista` INT NOT NULL,
    `id_reboque` INT NOT NULL,
    `datahora` DATETIME NOT NULL,
    `quilometragem` decimal(15, 2) NOT NULL,
    `extintor` VARCHAR(5) NOT NULL,
    `luz_de_freio` VARCHAR(5) NOT NULL,
    `piscas_direita` VARCHAR(5) NOT NULL,
    `piscas_esquerda` VARCHAR(5) NOT NULL,
    `giroflex` VARCHAR(5) NOT NULL,
    `piscas_alerta` VARCHAR(5) NOT NULL,
    `limpador_de_parabrisas` VARCHAR(5) NOT NULL,
    `higiene_interna` VARCHAR(5) NOT NULL,
    `calibragem_dos_pneus` VARCHAR(5) NOT NULL,
    `cartao_de_pedagio` VARCHAR(5) NOT NULL,
    `lanternas_dianteiras_da_esquerda` VARCHAR(5) NOT NULL,
    `lanternas_dianteiras_da_direita` VARCHAR(5) NOT NULL,
    `lanternas_traseira_da_direita` VARCHAR(5) NOT NULL,
    `lanternas_traseira_da_esquerda` VARCHAR(5) NOT NULL,
    `habilitacao` VARCHAR(5) NOT NULL,
    `estado_dos_pneus` VARCHAR(5) NOT NULL,
    `batida_lateral_direita` VARCHAR(5) NOT NULL,
    `batida_lateral_esquerda` VARCHAR(5) NOT NULL,
    `batido_dianteiro` VARCHAR(5) NOT NULL,
    `batido_traseiro` VARCHAR(5) NOT NULL,
    `boleto` VARCHAR(5) NOT NULL,
    `cracha` VARCHAR(5) NOT NULL,
    `bota` VARCHAR(5) NOT NULL,
    `capacete` VARCHAR(5) NOT NULL,
    `colete` VARCHAR(5) NOT NULL,
    `bicos` VARCHAR(5) NOT NULL,
    `obs` VARCHAR(300) NOT NULL,
    PRIMARY KEY (`id`),
	
    FOREIGN KEY (`id_frota`) REFERENCES `id19509910_dbcheckfrota`.`frota` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (`id_motorista`) REFERENCES `id19509910_dbcheckfrota`.`motorista` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (`id_reboque`) REFERENCES `id19509910_dbcheckfrota`.`reboque` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -----------------------------------------------------
-- Table `id19509910_dbcheckfrota`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id19509910_dbcheckfrota`.`usuario` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(50) NOT NULL,
    `tipouser` VARCHAR(15) NOT NULL,
    `login` VARCHAR(45) NOT NULL,
    `senha` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO usuario(nome,tipouser,login,senha) VALUES ('testeagp','1','agp','1313');
INSERT INTO usuario(nome,tipouser,login,senha) VALUES ('testeadm','2','adm','2222');
INSERT INTO tiporeboque(nome) VALUES('Não possui');
INSERT INTO tiporeboque(nome) VALUES('Semi reboque de 20');
INSERT INTO tiporeboque(nome) VALUES('Semi reboque de 40');
INSERT INTO reboque(placar,tiporeboque_id) VALUES('NÃO POSSUI',1);
INSERT INTO `tipocaminhao` (`nome`) VALUES
('Semi reboque'),
('Cavalo toco'),
('Carro van (Fiorino)'),
('Carreta baú'),
('Caminhão baú');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
