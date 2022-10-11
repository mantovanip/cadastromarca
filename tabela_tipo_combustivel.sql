CREATE TABLE tipo_combustivel(
id  				INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
tipo				VARCHAR(30) NOT NULL

)ENGINE = InnoDB;

INSERT INTO tipo_combustivel (tipo) 
VALUES
('Gasolina'),
('Alcool'),
('Gás'),
('Flex ( Gasolina | Álcool)'),
('Flex ( Gasolina | Gás )');

SELECT * FROM tipo_combustivel;