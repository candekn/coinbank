drop  database if exists coinbank;
create database coinbank;
use  coinbank;

CREATE TABLE Cliente(
id int auto_increment,
nombre varchar(60) not null,
apellido varchar(60) not null,
email varchar(60) not null,
telefono int not null,
direccion varchar(60) not null,
pass varchar(60) not null,
dni int not null,
imagendnifrente varchar(100),
imagendnidorso varchar(100),
imagenperfil varchar(60),
primary key (id)
);

CREATE TABLE TarjetaDeCredito(
id int auto_increment,
nombre varchar(60),
numeroTarjeta int8 not null unique,
documento int,
fechavencimiento int not null,
codigoSeguridad int,
idCliente int,
primary key (id),
foreign key (idCliente) references Cliente(id)
);

CREATE TABLE CuentasRetiro(
id int auto_increment,
alias varchar(60),
email varchar(60),
CBU varchar(100),
idCliente int,
primary key (id),
foreign key (idCliente) references Cliente(id)
);


CREATE TABLE Wallets(
id int auto_increment,
cantidad double not null,
tipo varchar(100) not null,
codigo varchar(120) not null,
idCliente int,
primary key (id),
foreign key (idCliente) references Cliente(id)
);

CREATE TABLE Criptomoneda(
id int auto_increment,
nombre varchar(100) not null,
urlDeApi varchar(200) not null,
precio double not null,
logo varchar(100),
primary key (id)
);

CREATE TABLE WalletsCriptomonedas(
idWallets int,
idCriptomoneda int,
primary key(idWallets, idCriptomoneda),
foreign key (idWallets) references Wallets(id),
foreign key (idCriptomoneda) references Criptomoneda(id)
);

INSERT INTO Cliente(id, nombre, apellido, email, telefono, direccion, pass, dni, imagenPerfil)
VALUES (11, "Nicolas", "Garcia", "nicogarcia@hotmail.com", 1123456789, "Avenida Corrientes 752", "123456",24123123,"perfil.jpg");

INSERT INTO TarjetaDeCredito(nombre,numeroTarjeta,documento,fechavencimiento,codigoseguridad,idCliente)
VALUES("Nicolas M Garcia", 0123045612349874,24123123,202007,123,11),
	  ("Nicolas Martin Garcia", 1234123478947894,24123123,201912,456,11);

INSERT INTO CuentasRetiro(alias,email,idCliente)
VALUES ("Cuenta PayPal1","nicomg@gmail.com", 11);

INSERT INTO Wallets(id, cantidad, tipo, codigo, idCliente)
VALUES (1,10.0,"PataConde","23AX85F0156PC02",11);

INSERT INTO Criptomoneda(id, nombre,precio,urlDeApi, logo)
VALUES (111,"PataConde", 1250.00, "https://www.chainCoin.com/PataConde", "pataconde.png"),
	   (222,"Bitcoin", 7983.38,"https://www.chainCoin.com/Bitcoin","");
INSERT INTO WalletsCriptomonedas(idWallets,idCriptomoneda)
VALUES (1,111);
