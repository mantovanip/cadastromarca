CREATE TABLE tipo_veiculo(
id 				 INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
tipo			 VARCHAR(30) NOT NULL
 
)ENGINE = InnoDB;
INSERT INTO tipo_veiculo (tipo) 
VALUES
('Carro'),
('Moto'),
('caminhão');

SELECT * FROM tipo_veiculo;
