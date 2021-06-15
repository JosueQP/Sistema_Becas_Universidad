DROP DATABASE IF EXISTS finanzas;
CREATE DATABASE finanzas;
USE finanzas;

 create table universidad
(
idUniversidad int  AUTO_INCREMENT PRIMARY KEY,
nombre varchar (50) not null
) ENGINE = InnoDB;

create table facultad
(
idFacultad int  AUTO_INCREMENT PRIMARY KEY,
idUniversidad int not null,
nombre varchar (100) not null,
foreign key (idUniversidad) references universidad(idUniversidad) 
) ENGINE = InnoDB;

create table carrera
(
idCarrera int  AUTO_INCREMENT PRIMARY KEY,
idFacultad int not null,
nombre varchar (80) not null,
activo bool,
foreign key (idFacultad) references facultad(idFacultad)
) ENGINE = InnoDB;

create table estudiante
(
idEstudiante int  AUTO_INCREMENT PRIMARY KEY,
codigoEstudiante int (10),
ci varchar(20),
primerNombre varchar (50) not null,
segundoNombre varchar (50),
apellidoPaterno varchar (50) not null,
apellidoMaterno varchar (50) ,
genero Enum('Masculino','Femenino'),
activo bool not null
) ENGINE = InnoDB;

CREATE TABLE contrato 
(
idContrato INT AUTO_INCREMENT PRIMARY KEY,
idEstudiante INT not null,
idCarrera INT NOT NULL ,
montoTotal FLOAT,
saldo FLOAT,
FOREIGN KEY (idEstudiante) REFERENCES estudiante(idEstudiante),
FOREIGN KEY (idCarrera) REFERENCES carrera(idCarrera)
)ENGINE = InnoDB;

CREATE TABLE saldo  
(
idSaldo INT AUTO_INCREMENT PRIMARY KEY,
idContrato INT NOT NULL,
fecha DATE,
montoParcial FLOAT,
tipoPago ENUM('Propio','becaInstitucional'),
FOREIGN KEY (idContrato) REFERENCES contrato(idContrato)
)ENGINE = InnoDB;
