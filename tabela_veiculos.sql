DROP TABLE IF EXISTS veiculo;
CREATE TABLE veiculo(
id					INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
modelo				INT NOT NULL,
motorizacao			CHAR(3) NOT NULL,
ano_fabricacao		YEAR NOT NULL,
tipo_veiculo		INT NOT NULL,				
tipo_combustivel    INT NOT NULL,
chassi				VARCHAR(30) NOT NULL ,

	CONSTRAINT fk_veiculo_modelo
	FOREIGN KEY (modelo)
	REFERENCES modelo(id),
    
	CONSTRAINT fk_tipo_veiculo
	FOREIGN KEY (tipo_veiculo)
	REFERENCES tipo_veiculo(id),
    
	CONSTRAINT fk_tipo_combustivel
	FOREIGN KEY (tipo_combustivel)
	REFERENCES tipo_combustivel(id)

) ENGINE = InnoDB;