CREATE DATABASE IF NOT EXISTS `comanda` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `comanda`;

CREATE TABLE IF NOT EXISTS `atendentes` (
  `pkatendente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `datacadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `senha` varchar(50) NOT NULL,
  `fkendereco` int(11) NOT NULL,
  `fktelefone` int(11) NOT NULL,
  PRIMARY KEY (`pkatendente`),
  KEY `fk_aten_endereco` (`fkendereco`),
  KEY `fk_aten_telefone` (`fktelefone`),
  CONSTRAINT `fk_aten_endereco` FOREIGN KEY (`fkendereco`) REFERENCES `enderecos` (`pkendereco`),
  CONSTRAINT `fk_aten_telefone` FOREIGN KEY (`fktelefone`) REFERENCES `telefones` (`pktelefone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `comandas` (
  `pkcomanda` int(11) NOT NULL AUTO_INCREMENT,
  `numerocomanda` int(11) DEFAULT NULL,
  `quantidadeproduto` int(11) NOT NULL,
  `datacadastrado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fkproduto` int(11) NOT NULL,
  `fkusuario` int(11) NOT NULL,
  PRIMARY KEY (`pkcomanda`),
  KEY `fk_produto` (`fkproduto`),
  KEY `fk_usuario` (`fkusuario`),
  CONSTRAINT `fk_produto` FOREIGN KEY (`fkproduto`) REFERENCES `produtos` (`pkproduto`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`fkusuario`) REFERENCES `usuarios` (`pkusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;




CREATE TABLE IF NOT EXISTS `comandas_old` (
  `pkcomanda` int(11) NOT NULL AUTO_INCREMENT,
  `numerocomanda` int(11) NOT NULL,
  `quantidadeproduto` int(11) NOT NULL,
  `datacadastro` int(11) NOT NULL,
  `fkproduto` int(11) NOT NULL,
  `fkusuario` int(11) NOT NULL,
  PRIMARY KEY (`pkcomanda`),
  KEY `fk_produto_comandas_old` (`fkproduto`),
  KEY `fk_usuario_comandas_old` (`fkusuario`),
  CONSTRAINT `fk_produto_comandas_old` FOREIGN KEY (`fkproduto`) REFERENCES `produtos` (`pkproduto`),
  CONSTRAINT `fk_usuario_comandas_old` FOREIGN KEY (`fkusuario`) REFERENCES `usuarios` (`pkusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `empresas` (
  `pkempresa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `datacadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `senha` varchar(50) NOT NULL,
  `fkendereco` int(11) NOT NULL,
  `fktelefone` int(11) NOT NULL,
  PRIMARY KEY (`pkempresa`),
  KEY `fk_emp_endereco` (`fkendereco`),
  KEY `fk_emp_telefone` (`fktelefone`),
  CONSTRAINT `fk_emp_endereco` FOREIGN KEY (`fkendereco`) REFERENCES `enderecos` (`pkendereco`),
  CONSTRAINT `fk_emp_telefone` FOREIGN KEY (`fktelefone`) REFERENCES `telefones` (`pktelefone`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `enderecos` (
  `pkendereco` int(11) NOT NULL AUTO_INCREMENT,
  `cep` char(50) NOT NULL,
  `rua` char(50) NOT NULL,
  `numero` char(50) NOT NULL,
  `bairro` char(50) NOT NULL,
  `cidade` char(50) NOT NULL,
  `estado` char(50) NOT NULL,
  PRIMARY KEY (`pkendereco`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `mesas` (
  `pkmesa` int(11) NOT NULL AUTO_INCREMENT,
  `numeromesa` int(11) NOT NULL,
  `fkcomanda` int(11) NOT NULL,
  PRIMARY KEY (`pkmesa`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `produtos` (
  `pkproduto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(60) DEFAULT NULL,
  `estoque` int(11) NOT NULL,
  `preco` double NOT NULL,
  PRIMARY KEY (`pkproduto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `telefones` (
  `pktelefone` int(11) NOT NULL AUTO_INCREMENT,
  `telefone` varchar(50) NOT NULL,
  PRIMARY KEY (`pktelefone`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `usuarios` (
  `pkusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `rg` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `datanascimento` date NOT NULL,
  `datacadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `senha` varchar(50) NOT NULL,
  `fktelefone` int(11) NOT NULL,
  `fkendereco` int(11) NOT NULL,
  PRIMARY KEY (`pkusuario`),
  KEY `fk_user_endereco` (`fkendereco`),
  KEY `fk_user_telefone` (`fktelefone`),
  CONSTRAINT `fk_user_endereco` FOREIGN KEY (`fkendereco`) REFERENCES `enderecos` (`pkendereco`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_user_telefone` FOREIGN KEY (`fktelefone`) REFERENCES `telefones` (`pktelefone`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO `telefones` (`pktelefone`, `telefone`) VALUES
	(1, '14998975822'),
	(2, '14998786423'),
	(3, '123123123'),
	(4, '1231231234'),
	(5, '213123'),
	(6, '12123123'),
	(7, '12123123'),
	(8, '12123123'),
	(9, '12123123');

INSERT INTO `enderecos` (`pkendereco`, `cep`, `rua`, `numero`, `bairro`, `cidade`, `estado`) VALUES
	(1, '19901022', 'nao sei22', '1522', 'matilde22', 'ourinhos22', 'SP'),
	(2, '19901080', 'nao sei', '1563', 'matilde', 'ourinhos', 'sp'),
	(3, '123123', '123123', '123123', '1231231', '123123', 'PE'),
	(4, '123123123', '123123123', '123123', '234123', '23423423', 'PE'),
	(5, '312312', '123123', '12312', '123123', '123123', 'PA'),
	(6, '123123', 'Rua Paraná', '131231', '123123', '123312', 'PA'),
	(7, '123123', 'Rua Paraná', '131231', '123123', '123312', 'PA'),
	(8, '123123', 'Rua Paraná', '131231', '123123', '123312', 'PA'),
	(9, '123123', 'Rua Paraná', '131231', '123123', '123312', 'PA');

INSERT INTO `produtos` (`pkproduto`, `nome`, `descricao`, `estoque`, `preco`) VALUES
	(1, 'Água', 'Água sem gás benzida', 0, 50.7),
	(2, 'Coca-Cola', '300 ml', 84, 3.5),
	(3, 'Conquista', '2 Lts', 0, 6),
	(4, 'Cocada', '', 4, 3),
	(5, 'X - tudoooo', 'queijo, pão, ...', 20, 30),
	(7, 'Produto Teste', 'Teste', 3, 20),
	(8, 'X-Salada', 'Alface, ...', 17, 16),
	(9, 'X-Bacon', 'Bacon, ...', 14, 16);

INSERT INTO `usuarios` (`pkusuario`, `nome`, `cpf`, `rg`, `email`, `datanascimento`, `datacadastro`, `senha`, `fktelefone`, `fkendereco`) VALUES
	(12, 'Felipe Correa', '46188259878', '507995822', 'felipefelpgomes@gmail.com', '2019-07-04', '2019-07-09 18:54:18', '123', 1, 1),
	(16, 'Felipe Correa', '46188257878', '50799582222', 'felipefelpgomeeees@gmail.com', '2019-07-04', '2019-07-30 11:49:10', '123', 8, 4);
	
INSERT INTO `empresas` (`pkempresa`, `nome`, `cnpj`, `email`, `datacadastro`, `senha`, `fkendereco`, `fktelefone`) VALUES
	(1, 'Marmitão do zé', '76.317.234/0001-29', 'felipefelpgomes42@gmail.com', '2019-07-29 21:14:34', '123', 2, 1);
	
INSERT INTO `comandas` (`pkcomanda`, `numerocomanda`, `quantidadeproduto`, `datacadastrado`, `fkproduto`, `fkusuario`) VALUES
	(36, 1, 1, '2019-07-27 08:14:42', 9, 12),
	(37, 1, 1, '2019-07-27 08:16:30', 9, 12),
	(38, 1, 1, '2019-07-27 10:21:46', 2, 12),
	(39, 1, 1, '2019-07-27 10:24:23', 2, 12),
	(40, 1, 1, '2019-07-27 10:24:24', 8, 12),
	(41, 1, 1, '2019-07-27 10:25:35', 4, 12),
	(42, 1, 1, '2019-07-27 10:25:36', 9, 12),
	(45, 2, 2, '2019-07-28 17:39:31', 2, 12),
	(46, 3, 1, '2019-07-30 11:57:25', 7, 16),
	(47, 2, 2, '2019-07-28 17:39:31', 2, 12),
	(48, 4, 1, '2019-07-31 21:27:19', 1, 12),
	(49, 4, 1, '2019-07-31 21:27:20', 2, 12);

INSERT INTO `mesas` (`pkmesa`, `numeromesa`, `fkcomanda`) VALUES
	(1, 1, 1),
	(2, 2, 2),
	(3, 3, 2),
	(4, 2, 3),
	(5, 1, 4);