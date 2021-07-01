/*

--banco de dados: teste

------------SQL'S de criação das tabelas-------------

CREATE TABLE `teste`.`users` ( 
`email` VARCHAR(100) NOT NULL , 
`nome` VARCHAR(100) NULL , 
`cpf` VARCHAR(11) NULL , 
`end` VARCHAR(100) NULL , 
`cidade` VARCHAR(100) NULL , 
`uf` VARCHAR(2) NULL , 
`senha` VARCHAR(100) NOT NULL , 
`admin` BIT(1) NULL,
PRIMARY KEY (`email`)) ENGINE = InnoDB;


CREATE TABLE `teste`.`news` ( 
`titulo` VARCHAR(200) NOT NULL , 
`data` DATE NULL , 
`resumo` VARCHAR(300) NULL ,
 `imagem` VARCHAR NULL ,
 `conteudo` VARCHAR(400) NULL ,
 `destaque` BIT(1) NULL , 
 PRIMARY KEY (`titulo`)) ENGINE = InnoDB;
 
 */