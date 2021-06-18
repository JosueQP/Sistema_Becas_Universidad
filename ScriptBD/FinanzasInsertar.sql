-- Universidad
INSERT INTO universidad VALUES (null,'Universidad Adventista de Bolivia');
-- Facultad
INSERT INTO facultad VALUES (null,1,'Facultad de Ingenieria');
INSERT INTO facultad VALUES (null,1,'Facultad de Salud');
INSERT INTO facultad VALUES (null,1,'Facultad de Humanidades');
INSERT INTO facultad VALUES (null,1,'Facultad de Ciencias Economicas y Administrativas');
INSERT INTO facultad VALUES (null,1,'Facultad de Teologia');

-- carrera
INSERT INTO carrera VALUES (null,1,'Ingenieria en Sistemas',1);
INSERT INTO carrera VALUES (null,1,'Ingenieria de Redes y Telecomunicaciones',1);
INSERT INTO carrera VALUES (null,2,'Nutricion',1);
INSERT INTO carrera VALUES (null,2,'Fisioterapia',1);
INSERT INTO carrera VALUES (null,3,'Actividad FIsica y Condicionamiento',1);
INSERT INTO carrera VALUES (null,3,'Psicologia',1);
INSERT INTO carrera VALUES (null,4,'Contaduria',1);
INSERT INTO carrera VALUES (null,4,'Administracion',1);
INSERT INTO carrera VALUES (null,5,'Teologia',1);



INSERT INTO estudiante 
VALUES (NULL,10,'121','Angel','Andy', 'Bravo', 'Sayales','Masculino',1);

INSERT INTO estudiante 
VALUES (NULL,11,'122','Carolina','', 'Duran', 'Galarza','Femenino',1);

INSERT INTO estudiante 
VALUES (NULL,12,'123','Ana','', 'Hidalgo', 'Lopez','Femenino',0);

INSERT INTO estudiante 
VALUES (NULL,13,'124','Felipe','Hugo', 'Canaviri', '','Femenino',0);

INSERT INTO estudiante 
VALUES (NULL,14,'125','Sofia','', 'Fernandez', '','Femenino',1);

-- Nutricion
INSERT INTO estudiante VALUES (NULL,30,'781', 'Patricia', 'Monica', 'Mamani','Ortiz', 'Femenino',1 );

INSERT INTO estudiante VALUES (NULL,31,'782', 'Pedro','','Valdes','', 'Masculino',1);

-- Actividad Fisica y Condicionamiento
INSERT INTO estudiante VALUES (NULL,50,'411','Misael', 'Jared', 'Cachi', 'Navarro', 'Masculino',1);

INSERT INTO estudiante VALUES (NULL,51,'412','Jared','Yeny','Chura', '', 'Femenino',1);

-- Redes y Telecom
INSERT INTO estudiante VALUES (NULL,70,'211', 'Mauricio', 'German', 'Ortiz', 'Bravo','Masculino',1);

INSERT INTO estudiante VALUES (NULL,71,'212','Eddy','','Baldez','','Masculino',1);


-- contrato 
INSERT INTO contrato VALUES (NULL,1,1,4500,2500);
INSERT INTO contrato VALUES (NULL,6,3,5000,5000);
INSERT INTO contrato VALUES (NULL,8,8,6000,4500);

-- saldo
INSERT INTO saldo VALUES (NULL,1,'2021-02-06',2500,'becaInstitucional');
INSERT INTO saldo VALUES (NULL,2,'2021-04-02',5000,'becaInstitucional');
INSERT INTO saldo VALUES (NULL,3,'2021-03-05',4500,'becaInstitucional');

