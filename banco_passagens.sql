
create database passagens;

use passagens;

create table aviao (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    registro INT,
    modelo VARCHAR(255),
    assentos INT,
    assentosEsp INT
);

create table voo (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    numero INT,
    numeroAviao INT,
    datav VARCHAR(20),
    horario VARCHAR(20), 	
    origem VARCHAR(255),
    destino VARCHAR(255),
    valor int,
    valorEsp int
);

create table ocupacao (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    numeroVoo INT,
    datav VARCHAR(20),
    assento VARCHAR(20)
);

create table passagem (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idVoo INT,
    nomePass VARCHAR(255),
    numeroDoc VARCHAR(50),
    dataNasc VARCHAR(20),
    dataVenda VARCHAR(20),
    formaPag INT,
    total DOUBLE(5,2)
);

create table checkin (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idPass INT,
    assento VARCHAR(20),
    bag INT
);