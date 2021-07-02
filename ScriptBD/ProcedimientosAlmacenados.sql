-- Lista Estudiante--
DROP PROCEDURE IF EXISTS SPListaEstudiante;
DELIMITER //  
CREATE PROCEDURE SPListaEstudiante()
BEGIN
SELECT  *,CONCAT_WS(' ',apellidoPaterno,apellidoMaterno,primerNombre,segundoNombre) Estudiante FROM estudiante;
END//
DELIMITER ;
call SPListaEstudiante();

-- listaEstudiantesAsignacion
DROP PROCEDURE IF EXISTS SPlistaEstudiantesAsignacion;
DELIMITER //  
CREATE PROCEDURE SPlistaEstudiantesAsignacion()
BEGIN
        SELECT abi.idAsignacionBecaInstitucional,a.nombre,CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante,e.idEstudiante,e.codigoEstudiante
        FROM estudiante e INNER JOIN asignacionBecaInstitucional abi 
        ON e.idEstudiante = abi.idEstudiante
        INNER JOIN  solicitudBecaInstitucional sbi 
        ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional
        INNER JOIN  area a 
        ON a.idArea = sbi.idArea;
END//
DELIMITER ;
call SPlistaEstudiantesAsignacion();
-- BusquedaRegistroEntradaSalida- ultimoRegistro--
DROP PROCEDURE IF EXISTS SPultimoRegistro;
DELIMITER //  
CREATE PROCEDURE SPultimoRegistro()
BEGIN
        select idRegistroEntradaSalida, TIMEDIFF(horaFin,horaInicio) as hora
        from registroentradasalida
        where idRegistroentradasalida=(select max(idRegistroentradasalida)from registroentradasalida);
END//
DELIMITER ;
call SPultimoRegistro();
-- Busqueda Precio
DROP PROCEDURE IF EXISTS SPBusquedaPrecio;
DELIMITER //  
CREATE PROCEDURE SPBusquedaPrecio()
BEGIN
       SELECT  idPrecio,precio from precio order by precio;
END//
DELIMITER ;
call SPBusquedaPrecio();
-- 
-- busqueda Personal Procedimientos almacenados 
DROP PROCEDURE IF EXISTS SPlistaRol;
DELIMITER //  
CREATE PROCEDURE SPlistaRol()
BEGIN
        SELECT  * from rol where idRol !=3 ;
END//
DELIMITER ;
call SPlistaRol();

DROP PROCEDURE IF EXISTS SPlistaPersonalU;
DELIMITER //  
CREATE PROCEDURE SPlistaPersonalU()
BEGIN
         SELECT CONCAT_WS(' ',apellidoPaterno,apellidoMaterno,primerNombre,segundoNombre) AS nombreCompleto,idPersonal
         FROM personal
         WHERE idPersonal = (SELECT MAX(idPersonal) as maxid FROM personal);
END//
DELIMITER ;
call SPlistaPersonalU();


-- busqueda horario trabajo procedimientos almacenados
DROP PROCEDURE IF EXISTS SPlistaHorarioTrabajo;
DELIMITER //  
CREATE PROCEDURE SPlistaHorarioTrabajo()
BEGIN
        SELECT  bi.idSolicitudBecaInstitucional,a.nombre as nombreArea ,g.nombre as nombreGestion,p.precio as precio
        FROM solicitudBecainstitucional bi INNER JOIN area a 
        ON bi.idArea = a.idArea 
        INNER join gestion g 
        on bi.idGestion=g.idGestion
        INNER JOIN precio p
        on bi.idPrecio=p.idPrecio
        WHERE idSolicitudBecaInstitucional = (SELECT MAX(idSolicitudBecaInstitucional) as maxid FROM solicitudBecainstitucional);
END//
DELIMITER ;
call SPlistaHorarioTrabajo();

-- busqueda gestion procedimientos almacenados
DROP PROCEDURE IF EXISTS SPgestionActiva;
DELIMITER //  
CREATE PROCEDURE SPgestionActiva()
BEGIN
        select * from gestion where activo=1;
END//
DELIMITER ;
call SPgestionActiva();

DROP PROCEDURE IF EXISTS SPgestionActiva1;
DELIMITER //  
CREATE PROCEDURE SPgestionActiva1()
BEGIN
        select * from gestion where activo=1;
END//
DELIMITER ;
call SPgestionActiva1();

DROP PROCEDURE IF EXISTS SPGestiones;
DELIMITER //  
CREATE PROCEDURE SPGestiones()
BEGIN
       select * from gestion ORDER BY idGestion Desc;
END//
DELIMITER ;
call SPGestiones();

-- busqueda dia procedimientos almacenados-
DROP PROCEDURE IF EXISTS SPlistaDia;
DELIMITER //  
CREATE PROCEDURE SPlistaDia()
BEGIN
       SELECT  idDia,dia from dia ;
END//
DELIMITER ;
call SPlistaDia();

-- busqueda departamento procedimientos almacenados
DROP PROCEDURE IF EXISTS SPlistaDepartamento;
DELIMITER //  
CREATE PROCEDURE SPlistaDepartamento()
BEGIN
       SELECT  idDepartamento,nombre from departamento ;
END//
DELIMITER ;
call SPlistaDepartamento();

-- busqueda carrera procedimientos almacenados 
DROP PROCEDURE IF EXISTS SPlistaCarrera;
DELIMITER //  
CREATE PROCEDURE SPlistaCarrera()
BEGIN
       SELECT  * from carrera ;
END//
DELIMITER ;
call SPlistaCarrera();

-- busqueda beca  institucional procedimientos almacenados
DROP PROCEDURE IF EXISTS SPlistaBecaInstitucionalMax;
DELIMITER //  
CREATE PROCEDURE SPlistaBecaInstitucionalMax()
BEGIN
   SELECT  bi.idSolicitudBecaInstitucional as idBecaInstitucional,a.nombre as area, p.precio
   from area a INNER JOIN solicitudBecaInstitucional bi
   ON a.idArea = bi.idArea
   INNER JOIN precio p
   ON p.idPrecio=bi.idPrecio
   WHERE bi.idSolicitudBecaInstitucional = (SELECT MAX(idSolicitudBecaInstitucional) as maxid FROM solicitudBecaInstitucional);
END//
DELIMITER ;
call SPlistaBecaInstitucionalMax();
