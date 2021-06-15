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

-- rol
INSERT INTO rol VALUES (null,'Jefe de Talento Humano');
INSERT INTO rol VALUES (null,'Jefe de Departamento');
INSERT INTO rol VALUES (null,'Estudiante');
INSERT INTO rol VALUES (null,'Encargado de Finanzas');

-- Estudiante
-- Sistemas
INSERT INTO estudiante (idCarrera,idRol,codigoEstudiante,ci,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,fechaNacimiento,genero,usuario,contrasenia,activo) 
VALUES (1,3,10,'121','Angel','Andy', 'Bravo', 'Sayales','2000-03-26','Masculino','asayales','12345',1);

INSERT INTO estudiante (idCarrera,idRol,codigoEstudiante,ci,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,fechaNacimiento,genero,usuario,contrasenia,activo) 
VALUES (1,3,11,'122','Carolina','', 'Duran', 'Galarza','1999-05-18','Femenino','cduran','12345',1);

INSERT INTO estudiante (idCarrera,idRol,codigoEstudiante,ci,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,fechaNacimiento,genero,usuario,contrasenia,activo) 
VALUES (1,3,12,'123','Ana','', 'Hidalgo', 'Lopez','2000-06-23','Femenino','ahidalgo','12345',0);

INSERT INTO estudiante (idCarrera,idRol,codigoEstudiante,ci,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,fechaNacimiento,genero,usuario,contrasenia,activo) 
VALUES (1,3,13,'124','Felipe','Hugo', 'Canaviri', '','2001-07-01','Masculino','fcanaviri','12345',0);

INSERT INTO estudiante (idCarrera,idRol,codigoEstudiante,ci,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,fechaNacimiento,genero,usuario,contrasenia,activo) 
VALUES (1,3,14,'125','Sofia','', 'Fernandez', '','1990-05-11','Femenino','sfernandez','12345',1);

-- Nutricion
INSERT INTO estudiante (idCarrera,idRol,codigoEstudiante,ci,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,fechaNacimiento,genero,usuario,contrasenia,activo) 
VALUES (3,3,30,'781', 'Patricia', 'Monica', 'Mamani','Ortiz','1999-01-06', 'Femenino','pmamani','12345',1 );

INSERT INTO estudiante (idCarrera,idRol,codigoEstudiante,ci,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,fechaNacimiento,genero,usuario,contrasenia,activo)
VALUES (3,3,31,'782', 'Pedro','','Valdes','', '1987-02-09', 'Masculino','pvaldes','12345',1);

-- Actividad Fisica y Condicionamiento
INSERT INTO estudiante (idCarrera,idRol,codigoEstudiante,ci,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,fechaNacimiento,genero,usuario,contrasenia,activo)
VALUES (5,3,50,'411','Misael', 'Jared', 'Cachi', 'Navarro','1998-03-02', 'Masculino','mcachi','12345',1);

INSERT INTO estudiante (idCarrera,idRol,codigoEstudiante,ci,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,fechaNacimiento,genero,usuario,contrasenia,activo) 
VALUES (5,3,51,'412','Jared','Yeny','Chura', '','2001-04-04', 'Femenino','jchura','12345',1);

-- Redes y Telecom
INSERT INTO estudiante (idCarrera,idRol,codigoEstudiante,ci,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,fechaNacimiento,genero,usuario,contrasenia,activo)  
VALUES (2,3,70,'211', 'Mauricio', 'German', 'Ortiz', 'Bravo','2002-05-12','Masculino','mortiz','12345',1);

INSERT INTO estudiante (idCarrera,idRol,codigoEstudiante,ci,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,fechaNacimiento,genero,usuario,contrasenia,activo)  
VALUES (2,3,71,'212','Eddy','','Baldez','','2003-06-18','Masculino','ebaldez','12345',1);

-- tipoBeca
INSERT INTO tipoBeca (nombre,esInstitucional) VALUES ('Beca Asociado',1);
INSERT INTO tipoBeca (nombre,esInstitucional) VALUES ('Beca Excelencia Academica',1);
INSERT INTO tipoBeca (nombre,esInstitucional) VALUES ('Beca Colportaje',1);
INSERT INTO tipoBeca (nombre,esInstitucional) VALUES ('Beca Traspaso',1);
INSERT INTO tipoBeca (nombre,esInstitucional) VALUES ('Beca Social',1);
INSERT INTO tipoBeca (nombre,esInstitucional) VALUES ('Beca Industrial',1);
INSERT INTO tipoBeca (nombre,esInstitucional) VALUES ('Beca Convenio Institucional',1);

-- departamento
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'Limpieza');
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'Cocina');
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'Tecnologia e Internet');
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'Jardineria');
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'Biblioteca');
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'Seguridad');
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'Piscina');
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'Ingenieria');
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'Salud');
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'Auditoria');
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'Talento Humano');
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'Finanzas');

-- dia
INSERT INTO dia VALUES (null,'Lunes');
INSERT INTO dia VALUES (null,'Martes');
INSERT INTO dia VALUES (null,'Miercoles');
INSERT INTO dia VALUES (null,'Jueves');
INSERT INTO dia VALUES (null,'Viernes');
INSERT INTO dia VALUES (null,'Sabado');
INSERT INTO dia VALUES (null,'Domingo');

-- hora
INSERT INTO hora VALUES (null,'06:00');
INSERT INTO hora VALUES (null,'07:00');
INSERT INTO hora VALUES (null,'08:00');
INSERT INTO hora VALUES (null,'09:00');
INSERT INTO hora VALUES (null,'10:00');
INSERT INTO hora VALUES (null,'11:00');
INSERT INTO hora VALUES (null,'12:00');
INSERT INTO hora VALUES (null,'13:00');
INSERT INTO hora VALUES (null,'14:00');
INSERT INTO hora VALUES (null,'15:00');
INSERT INTO hora VALUES (null,'16:00');
INSERT INTO hora VALUES (null,'17:00');
INSERT INTO hora VALUES (null,'18:00');
INSERT INTO hora VALUES (null,'19:00');
INSERT INTO hora VALUES (null,'20:00');
INSERT INTO hora VALUES (null,'21:00');


-- precio
INSERT INTO precio VALUES (null,8);
INSERT INTO precio VALUES (null,6);
INSERT INTO precio VALUES (null,4);
INSERT INTO precio VALUES (null,9);
INSERT INTO precio VALUES (null,5);
INSERT INTO precio VALUES (null,12);

-- gestiom
INSERT INTO gestion (nombre, activo) VALUES ('2019-A', 0);
INSERT INTO gestion (nombre, activo) VALUES ('2019-B', 0);
INSERT INTO gestion (nombre, activo) VALUES ('2020-A', 0);
INSERT INTO gestion (nombre, activo) VALUES ('2020-B', 0);
INSERT INTO gestion (nombre, activo) VALUES ('2021-A', 1);

-- descuento
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'10');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'20');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'30');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'40');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'50');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'60');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'70');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'80');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'90');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'100');

-- area
INSERT INTO area VALUES (null,10,'Contabilidad',1);
INSERT INTO area VALUES (null,10,'Caja',1);
INSERT INTO area VALUES (null,10,'Finanzas',1);
INSERT INTO area VALUES (null,2,'Ayudante de Cocina',1);
INSERT INTO area VALUES (null,2,'Recepcion',1);
INSERT INTO area VALUES (null,3,'Mantenimiento de Hadware',1);
INSERT INTO area VALUES (null,3,'Servidores',1);
INSERT INTO area VALUES (null,4,'Jardinero',1);
INSERT INTO area VALUES (null,4,'Vivero',1);
INSERT INTO area VALUES (null,5,'Atencion de Biblioteca',1);
INSERT INTO area VALUES (null,5,'Auxiliar de Biblioteca',1);
INSERT INTO area VALUES (null,6,'Garita',1);
INSERT INTO area VALUES (null,8,'Desarrollador de Software',1);
INSERT INTO area VALUES (null,9,'Auxiliar de Secretaria Salud',1);
INSERT INTO area VALUES (null,7,'Mantenimiento de Piscina',1);

-- becaNoInstitucional- Son aquellos que obtienen una beca con algun descuento
-- Est: Ing Sistemas - Beca Institucional - Beca Industrial
INSERT INTO becaNoInstitucional(idGestion,idEstudiante,idTipoBeca,idDescuento,descripcion) 
VALUES(5,5,5,4,'Ninguno');


-- ====================================================================
-- solicitudBecaInstitucional
-- Son aquellas becas, donde los estudiantes postulan a solicitar una Beca TRABAJO
-- aqui pueden trabajar en un departamento y area.

-- Getion Activa:Dpto: servidores - 12Bs  - 2 Solicitudes
INSERT INTO solicitudBecaInstitucional(idGestion,idArea,idPrecio) 
VALUES(5,7,6);
INSERT INTO solicitudBecaInstitucional(idGestion,idArea,idPrecio) 
VALUES(5,7,6);

-- Getion Activa: Dpto: Cocina Area: Ayudante de Cocina- 9Bs - 3 Solicitudes
INSERT INTO solicitudBecaInstitucional(idGestion,idArea,idPrecio) 
VALUES(5,4,4);
INSERT INTO solicitudBecaInstitucional(idGestion,idArea,idPrecio) 
VALUES(5,4,4);
INSERT INTO solicitudBecaInstitucional(idGestion,idArea,idPrecio) 
VALUES(5,4,4);
-- ====================================================================
-- Donde se asigna al estudiante, una solicitud de Beca Institucional
INSERT INTO asignacionBecaInstitucional(idSolicitudBecaInstitucional,idEstudiante) 
VALUES(1,1);

INSERT INTO asignacionBecaInstitucional(idSolicitudBecaInstitucional,idEstudiante) 
VALUES(3,6);

INSERT INTO asignacionBecaInstitucional(idSolicitudBecaInstitucional,idEstudiante) 
VALUES(4,8);

-- ====================================================================
-- Registrar horariotrabajo de estudiante idEstudiante=1
 /*INSERT INTO horarioTrabajo(idSolicitudBecaInstitucional,idDia,idHoraInicio,idHoraFin)
 VALUES (1,1,'14:00','16:00'); 
  INSERT INTO horarioTrabajo(idSolicitudBecaInstitucional,idDia,idHoraInicio,idHoraFin)
 VALUES (1,3,'12:00','14:00'); 
  INSERT INTO horarioTrabajo(idSolicitudBecaInstitucional,idDia,idHoraInicio,idHoraFin)
 VALUES (1,5,'19:00','22:00'); 
-- Registrar horariotrabajo de estudiante idEstudiante=6
  INSERT INTO horarioTrabajo(idSolicitudBecaInstitucional,idDia,idHoraInicio,idHoraFin)
 VALUES (2,3,'12:00','14:00'); 
  INSERT INTO horarioTrabajo(idSolicitudBecaInstitucional,idDia,idHoraInicio,idHoraFin)
 VALUES (4,5,'19:00','22:00'); */
-- =====================================================================
-- idEstudiante: 1
-- Lunes 
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (1,'2021-02-01','14:00','16:00',2.0);
-- Miercoles 
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (1,'2021-02-03','14:00','17:00',3.0);
-- Viernes
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (1,'2021-02-05','13:55','16:00',2.5);
-- Lunes 
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (1,'2021-02-08','14:00','16:00',2.0);
-- Miercoles 
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (1,'2021-02-10','14:00','17:00',3.0);
-- Viernes
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (1,'2021-02-12','13:55','16:00',2.5);
-- Lunes 
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (1,'2021-02-15','14:00','16:00',2.0);
-- Miercoles 
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (1,'2021-02-17','14:00','17:00',3.0);
-- Viernes
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (1,'2021-02-19','13:55','16:00',2.5);
-- Lunes 
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (1,'2021-02-22','14:00','16:00',2.0);
-- Miercoles 
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (1,'2021-02-24','14:00','17:00',3.0);
-- Viernes
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (1,'2021-02-26','13:55','16:00',2.5);
-- ======================================================================
-- idEstudiante: 6
-- JUEVES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-04-01','07:00','10:30',3.3);
-- VIERNES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-04-02','14:00','17:00',3.0);
-- LUNES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-04-05','08:00','11:30',3.3);
-- MARTES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-04-06','17:00','19:30',2.3);
-- MIERCOLES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-04-07','14:00','16:30',2.0);
-- JUEVES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-02-08','07:00','10:30',2.30);
-- VIERNES 
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-02-09','14:00','17:00',2.30);
-- LUNES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-04-12','08:00','11:30',3.3);
-- MARTES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-04-13','17:00','19:30',2.3);
-- MIERCOLES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-04-14','14:00','16:30',2.0);
-- JUEVES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-02-15','07:00','10:30',2.30);
-- VIERNES 
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-02-16','14:00','17:00',2.30);
-- LUNES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-04-19','08:00','11:30',3.3);
-- MARTES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-04-20','17:00','19:30',2.3);
-- MIERCOLES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-04-21','14:00','16:30',2.0);
-- JUEVES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-02-22','07:00','10:30',2.30);
-- VIERNES 
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-02-23','14:00','17:00',2.30);
-- LUNES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-04-26','08:00','11:30',3.3);
-- MARTES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-04-27','17:00','19:30',2.3);
-- MIERCOLES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-04-28','14:00','16:30',2.0);
-- JUEVES
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-02-29','07:00','10:30',2.30);
-- VIERNES 
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (2,'2021-02-30','14:00','17:00',2.30);

-- ==================================================================================================
-- idEstudiante: 8
-- Martes
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (3,'2021-05-03','12:00','16:00',4.0);
-- Jueves
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (3,'2021-05-05','19:00','22:00',3.0);
-- Martes
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (3,'2021-05-10','12:00','16:00',4.0);
-- Jueves
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (3,'2021-05-12','19:00','22:00',3.0);
-- Martes
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (3,'2021-05-17','12:00','16:00',4.0);
-- Jueves
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (3,'2021-05-19','19:00','22:00',3.0);
-- Martes
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (3,'2021-05-24','12:00','16:00',4.0);
-- Jueves
INSERT INTO registroEntradaSalida(idAsignacionBecaInstitucional,fecha,horaInicio, horaFin, totalHora) 
VALUES (3,'2021-05-26','19:00','22:00',3.0);
 

 
 
-- ====================================================================

-- personal Activos
-- Jefe Talento Humano  id:1
INSERT INTO personal 
VALUES(null,1,'10001','Juan','Ronal','Mamani','Flores','jmamani','12345',1);
-- Jefe de Departamento  id:2 cocina
INSERT INTO personal 
VALUES(null,2,'10002','David','','Rivero','','drivero','12345',1);
-- id:3
INSERT INTO personal
VALUES(null,2,'10003','Samuel','Deymar','Zambrana','Mamani','szambrana','12345',1);
-- id:4
INSERT INTO personal 
VALUES(null,4,'10004','Josue','Ariel','Panuni','Morales','jpanuni','12345',1);

-- personal Inactivos que estuvieron en otra gestion
-- Jefe Talento Humano  id:5
INSERT INTO personal 
VALUES(null,1,'30001','Carlos','Juan','Quispe','Carrasco','cquispe','12345',0);
-- Jefe de Departamento  id: 6
INSERT INTO personal 
VALUES(null,2,'30002','Diego','','Ricaldez','Santander','dricaldez','12345',0);

-- personal Inactivos que estaba trabajando en la gestion actual
-- Jefe Talento Humano  id:7
INSERT INTO personal 
VALUES(null,2,'30030','Orlando','','Arteaga','castillo','oarteaga','12345',0);

-- personal prueba
INSERT INTO personal
VALUES (null,4,'3325181','Ariel','Luis','Pardo','martinez','aperez','Aperez@3325181',1);

INSERT INTO personal
VALUES (null,2,'78412','luis','Miguel','Lima','Vidal','lvidal','Lvidal@78412',1);


-- personalDepartamento
-- gestion activa
-- Talento Humano
INSERT INTO personalDepartamento VALUES (5,11,1);
-- Cocina
INSERT INTO personalDepartamento VALUES (5,2,2);
-- Tecnologia e Internet
INSERT INTO personalDepartamento VALUES (5,3,3);
-- Finanzas 
INSERT INTO personalDepartamento VALUES (5,12,4);

-- personal JefeDepartamento
-- INSERT INTO personalDepartamento VALUES (5,12,13);

-- gestion inactiva
-- INSERT INTO personalDepartamento VALUES (4,2,5);
-- INSERT INTO personalDepartamento VALUES (4,3,6);

-- Registrar Horario ----
-- idAsignacion =  1
INSERT INTO horarioTrabajo (idSolicitudBecaInstitucional,idDia,idHoraInicio,idHoraFin)
VALUES (1,1,'14:00','16:00');
INSERT INTO horarioTrabajo (idSolicitudBecaInstitucional,idDia,idHoraInicio,idHoraFin)
VALUES (1,3,'14:00','17:00');
INSERT INTO horarioTrabajo (idSolicitudBecaInstitucional,idDia,idHoraInicio,idHoraFin)
VALUES (1,5,'13:55','16:00');

-- idAsignacion =  3
INSERT INTO horarioTrabajo (idSolicitudBecaInstitucional,idDia,idHoraInicio,idHoraFin)
VALUES (3,1,'08:00','11:30');
INSERT INTO horarioTrabajo (idSolicitudBecaInstitucional,idDia,idHoraInicio,idHoraFin)
VALUES (3,2,'17:00','19:30');
INSERT INTO horarioTrabajo (idSolicitudBecaInstitucional,idDia,idHoraInicio,idHoraFin)
VALUES (3,3,'14:00','16:30');
INSERT INTO horarioTrabajo (idSolicitudBecaInstitucional,idDia,idHoraInicio,idHoraFin)
VALUES (3,4,'07:00','10:30');
INSERT INTO horarioTrabajo (idSolicitudBecaInstitucional,idDia,idHoraInicio,idHoraFin)
VALUES (3,5,'14:00','17:00');

-- idSolicitud = 4
INSERT INTO horarioTrabajo (idSolicitudBecaInstitucional,idDia,idHoraInicio,idHoraFin)
VALUES (4,2,'12:00','16:00');
INSERT INTO horarioTrabajo (idSolicitudBecaInstitucional,idDia,idHoraInicio,idHoraFin)
VALUES (4,4,'19:00','22:00');




