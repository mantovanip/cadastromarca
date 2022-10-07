DROP TABLE IF EXISTS modelo;
CREATE TABLE modelo(
	id  		INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_modelo VARCHAR(100) NOT NULL,
    marca       INT	NOT NULL,
    ano			YEAR NOT NULL,
	CONSTRAINT fk_modelo_marca
	FOREIGN KEY (marca)
	REFERENCES marca(id),
    
    CONSTRAINT uk_modelo
    UNIQUE (nome_modelo,marca,ano)
    
) ENGINE = InnoDB;

INSERT INTO modelo (nome_modelo,marca,ano)
VALUES('Onix',1,2022);

SELECT * FROM modelo;
