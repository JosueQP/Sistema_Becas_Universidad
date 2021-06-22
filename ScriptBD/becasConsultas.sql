

-- Consulta dado un departamento lista las areas
SELECT d.idDepartamento,d.nombre,a.idArea,a.nombre
FROM departamento d INNER JOIN area a
ON d.idDepartamento = a.idDepartamento
AND d.idDepartamento = 2; --2, 3, 4, 5, 6,7,8,10


-- Consulta, dada dos fecha mostrar quienes registraron sus entradas y salidas
SELECT * 
FROM registroEntradaSalida
WHERE fecha BETWEEN '2021-02-22' AND '2021-02-24';

-- Consulta para obtener la gestion actual
SELECT *
FROM gestion 
WHERE activo = 1;

-- Consulta para verificar que estudiantes estan en la gestion actual
SELECT g.nombre,d.nombre Departamento, a.nombre Area,
CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante, 
e.idEstudiante,e.ci
FROM gestion g
INNER JOIN solicitudBecaInstitucional sbi
ON g.idGestion = sbi.idGestion
AND g.idGestion = 5
INNER JOIN asignacionBecaInstitucional abi 
ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional
INNER JOIN estudiante e
ON abi.idEstudiante = e.idEstudiante
INNER JOIN area a 
ON sbi.idArea = a.idArea 
INNER JOIN departamento d 
ON a.idDepartamento = d.idDepartamento;
-- consulta de estudiantes que no trabajan en la gestion actual
SELECT g.nombre,d.nombre Departamento, a.nombre Area,
CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante, 
e.idEstudiante,e.ci
FROM gestion g
INNER JOIN solicitudBecaInstitucional sbi
ON g.idGestion = sbi.idGestion
AND g.idGestion != 5
INNER JOIN asignacionBecaInstitucional abi 
ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional
INNER JOIN estudiante e
ON abi.idEstudiante = e.idEstudiante
INNER JOIN area a 
ON sbi.idArea = a.idArea 
INNER JOIN departamento d 
ON a.idDepartamento = d.idDepartamento;
-- Consulta para verificar si un estudiante esta trabajando en la gestion actual
SELECT g.nombre,d.nombre Departamento, a.nombre Area,
CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante, 
e.idEstudiante,e.ci
FROM gestion g
INNER JOIN solicitudBecaInstitucional sbi
ON g.idGestion = sbi.idGestion
AND g.idGestion = 5
INNER JOIN asignacionBecaInstitucional abi 
ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional
INNER JOIN estudiante e
ON abi.idEstudiante = e.idEstudiante
AND e.idEstudiante = 1
INNER JOIN area a 
ON sbi.idArea = a.idArea 
INNER JOIN departamento d 
ON a.idDepartamento = d.idDepartamento;

 
-- Consulta para verificar que personal de diferentes departamentos estan en la gestion actual
-- pueden estar personal activos e inactivos
SELECT d.nombre Departamento, p.idPersonal,p.activo,
       CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) Personal,
	   r.nombre Rol
FROM gestion g 
INNER JOIN personalDepartamento pd 
ON g.idGestion = 5
AND g.idGestion = pd.idGestion 
INNER JOIN personal p 
ON pd.idPersonal = p.idPersonal 
INNER JOIN  rol r
ON p.idRol = r.idRol
INNER JOIN  departamento d 
ON pd.idDepartamento = d.idDepartamento;

-- Consulta para verificar si un personal trabaja en la gestion actual 
-- Personal Activo en la gestion actual
SELECT d.nombre Departamento, p.idPersonal,p.activo,
       CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) Personal,
	   r.nombre Rol
FROM gestion g 
INNER JOIN personalDepartamento pd 
ON g.idGestion = 5 -- Gestion Actual
AND g.idGestion = pd.idGestion 
INNER JOIN personal p 
ON pd.idPersonal = p.idPersonal 
AND p.idPersonal = 3 -- Personal Activo en la gestion actual
INNER JOIN  rol r
ON p.idRol = r.idRol
INNER JOIN  departamento d 
ON pd.idDepartamento = d.idDepartamento;

-- Personal Inactivo que esta en la gestion Actual
SELECT d.nombre Departamento, p.idPersonal,p.activo,
       CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) Personal,
	   r.nombre Rol
FROM gestion g 
INNER JOIN personalDepartamento pd 
ON g.idGestion = 5 -- Gestion Actual
AND g.idGestion = pd.idGestion 
INNER JOIN personal p 
ON pd.idPersonal = p.idPersonal 
AND p.idPersonal = 7 -- Personal Inactivo que no esta en la gestion Actual
INNER JOIN  rol r
ON p.idRol = r.idRol
INNER JOIN  departamento d 
ON pd.idDepartamento = d.idDepartamento;


-- Personal Inactivo que no esta en la gestion Actual
SELECT d.nombre Departamento, p.idPersonal,
       CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) Personal,
	   r.nombre Rol
FROM gestion g 
INNER JOIN personalDepartamento pd 
ON g.idGestion = 5 -- Gestion Actual
AND g.idGestion = pd.idGestion 
INNER JOIN personal p 
ON pd.idPersonal = p.idPersonal 
AND p.idPersonal = 6 -- Personal Inactivo que no esta en la gestion Actual
INNER JOIN  rol r
ON p.idRol = r.idRol
INNER JOIN  departamento d 
ON pd.idDepartamento = d.idDepartamento;

-- consulta para  listar departamento que trabaja el personal  esta bien ;

SELECT  CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) estudiante,
g.nombre as gestion,d.nombre as departamento,a.nombre as area,pre.precio as precio,CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) personal
FROM rol r INNER JOIN personal p 
ON r.idRol = P.idRol
INNER JOIN personalDepartamento pd 
ON p.idPersonal = pd.idPersonal 
INNER JOIN departamento d 
ON d.idDepartamento = pd.idDepartamento
INNER JOIN Area a 
ON d.idDepartamento = a.idDepartamento
INNER JOIN solicitudBecaInstitucional sbi 
ON a.idArea = sbi.idArea
INNER JOIN asignacionBecaInstitucional abi 
ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional
INNER JOIN  estudiante e 
on e.idEstudiante = abi.idEstudiante
AND e.idEstudiante = 1
INNER JOIN gestion g 
ON g.idGestion = sbi.idGestion
INNER JOIN precio pre 
ON pre.idPrecio = sbi.idPrecio;

SELECT g.nombre,d.nombre Departamento, a.nombre Area,
CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante, 
e.idEstudiante,e.ci
FROM gestion g
INNER JOIN solicitudBecaInstitucional sbi
ON g.idGestion = sbi.idGestion
INNER JOIN asignacionBecaInstitucional abi 
ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional
INNER JOIN estudiante e
ON abi.idEstudiante = e.idEstudiante
AND e.idEstudiante=1
INNER JOIN area a 
ON sbi.idArea = a.idArea 
INNER JOIN departamento d 
ON a.idDepartamento = d.idDepartamento;



SELECT abi.idAsignacionBecaInstitucional,a.nombre,CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante
FROM estudiante e INNER JOIN asignacionBecaInstitucional abi 
ON e.idEstudiante = abi.idEstudiante
INNER JOIN  solicitudBecaInstitucional sbi 
ON abi.idSolicitudBecaInstitucional = sbi.idSolicitudBecaInstitucional
INNER JOIN  area a 
ON sbi.idArea = a.idArea;


SELECT res.fecha
FROM solicitudBecaInstitucional sbi INNER JOIN asignacionBecaInstitucional abi 
ON sbi.idAsignacionBecaInstitucional = abi.idAsignacionBecaInstitucional
INNER JOIN estudiante e 
ON e.idEstudiante = abi.idEstudiante
AND e.idEstudiante=1
INNER JOIN registroEntradaSalida res 
ON abi.idAsignacionBecaInstitucional = res.idAsignacionBecaInstitucional;

--- dada dos fechas
        SELECT res.fecha,res.idAsignacionBecaInstitucional,(res.totalHora*pre.precio) as Total
         FROM registroEntradaSalida res INNER JOIN asignacionBecaInstitucional abi 
         ON res.idAsignacionBecaInstitucional = abi.idAsignacionBecaInstitucional
         AND res.fecha BETWEEN '2021-02-01'  AND '2021-02-26'
         AND res.idAsignacionBecaInstitucional= 1
         INNER JOIN solicitudBecaInstitucional sbi 
         ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional 
         INNER JOIN precio pre 
         ON pre.idPrecio = sbi.idPrecio ;


--
SELECT * 
FROM gestion g  
INNER JOIN solicitudBecaInstitucional sbi
ON g.idGestion = sbi.idGestion
AND g.idGestion = 5;
INNER JOIN 
ON 

--- 
SELECT p.primerNombre,d.nombre
FROM personal p INNER JOIN personalDepartamento pd 
ON p.idPersonal = pd.idPersonal
INNER JOIN departamento d 
ON d.idDepartamento = pd.idDepartamento
AND pd.idPersonal =4
;
--- consulta Mes reporte por asignacionbecainstitucional
        SELECT res.fecha,res.idAsignacionBecaInstitucional,(res.totalHora*pre.precio) as Total
         FROM registroEntradaSalida res INNER JOIN asignacionBecaInstitucional abi 
         ON res.idAsignacionBecaInstitucional = abi.idAsignacionBecaInstitucional
         AND res.fecha BETWEEN '2021-02-01'  AND  '2021-02-26'
         AND res.idAsignacionBecaInstitucional= 1
         INNER JOIN solicitudBecaInstitucional sbi 
         ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional 
         INNER JOIN precio pre 
         ON pre.idPrecio = sbi.idPrecio ;
--  consulta reporte diario por asignacionbecainstitucional

        SELECT res.fecha,res.idAsignacionBecaInstitucional,(res.totalHora*pre.precio) as Total
        ,CONCAT_WS(' ',es.apellidoPaterno,es.apellidoMaterno,es.primerNombre,es.segundoNombre) Estudiante
         FROM registroEntradaSalida res INNER JOIN asignacionBecaInstitucional abi 
         ON res.idAsignacionBecaInstitucional = abi.idAsignacionBecaInstitucional
         AND res.fecha ='2021-02-03'  
         INNER JOIN solicitudBecaInstitucional sbi 
         ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional 
         INNER JOIN estudiante es 
         ON es.idEstudiante = abi.idEstudiante
         INNER JOIN precio pre 
         ON pre.idPrecio = sbi.idPrecio
         INNER JOIN Personal per 
         ON per. 
         ;

        SELECT CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante,
        dep.nombre,a.nombre,res.fecha,res.horaInicio,res.horaFin,(res.totalHora*pre.precio) as Total
        FROM gestion g INNER JOIN solicitudBecaInstitucional sbi
        ON g.idgestion = sbi.idgestion
        INNER JOIN asignacionBecaInstitucional abi 
        ON abi.idSolicitudBecaInstitucional = sbi.idSolicitudBecaInstitucional
        AND abi.idAsignacionBecaInstitucional= 1
        INNER JOIN  estudiante e 
        ON e.idEstudiante = abi.idEstudiante
        INNER JOIN area a 
        ON sbi.idArea = a.idArea
        INNER JOIN departamento dep 
        ON a.idDepartamento = dep.idDepartamento
        INNER JOIN registroEntradaSalida res
        ON abi.idAsignacionBecaInstitucional= res.idAsignacionBecaInstitucional
        AND res.fecha= '2021-02-03'
        INNER JOIN precio pre 
        ON pre.idPrecio = sbi.idPrecio; 

         SELECT res.fecha,res.idAsignacionBecaInstitucional,(res.totalHora*pre.precio) as Total,Sum(res.totalHora*pre.precio) pago
         FROM registroEntradaSalida res INNER JOIN asignacionBecaInstitucional abi 
         ON res.idAsignacionBecaInstitucional = abi.idAsignacionBecaInstitucional
         AND res.fecha BETWEEN '2021-02-01'  AND  '2021-02-26'
         AND res.idAsignacionBecaInstitucional= 1
         INNER JOIN solicitudBecaInstitucional sbi 
         ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional 
         INNER JOIN precio pre 
         ON pre.idPrecio = sbi.idPrecio ;

------------------------------------------------------------------------------
-- HORARIO Estudiante =========================================
SELECT d.dia,CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante,ht.idHoraInicio,ht.idHoraFin
FROM estudiante e INNER JOIN asignacionBecaInstitucional abi 
ON e.idEstudiante = abi.idEstudiante
AND abi.idEstudiante=1
INNER JOIN solicitudBecaInstitucional sbi
ON abi.idSolicitudBecaInstitucional = sbi.idSolicitudBecaInstitucional
INNER JOIN horarioTrabajo ht 
ON ht.idSolicitudBecaInstitucional=sbi.idSolicitudBecaInstitucional
INNER JOIN dia d 
ON d.idDia = ht.idDia;

                        UPDATE registroEntradaSalida
                            SET horaFin = '00:00:20' 
                            WHERE idRegistroEntradaSalida = 48

         SELECT res.fecha,res.idAsignacionBecaInstitucional,(res.totalHora*pre.precio) as Total
         FROM registroEntradaSalida res INNER JOIN asignacionBecaInstitucional abi 
         ON res.idAsignacionBecaInstitucional = abi.idAsignacionBecaInstitucional
         AND res.fecha BETWEEN '2021-02-01'  AND  '2021-02-26'
         AND res.idAsignacionBecaInstitucional= 1
         INNER JOIN solicitudBecaInstitucional sbi 
         ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional 
         INNER JOIN precio pre 
         ON pre.idPrecio = sbi.idPrecio ;

   SELECT res.fecha,res.idAsignacionBecaInstitucional,Sum(res.totalHora*pre.precio) as pago
       FROM registroEntradaSalida res INNER JOIN asignacionBecaInstitucional abi 
       ON res.idAsignacionBecaInstitucional = abi.idAsignacionBecaInstitucional
       AND res.fecha BETWEEN '2021-02-01'  AND  '2021-02-26'
       AND res.idAsignacionBecaInstitucional= 1
       INNER JOIN solicitudBecaInstitucional sbi 
       ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional 
       INNER JOIN precio pre 
       ON pre.idPrecio = sbi.idPrecio ;

            SELECT CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre)  as Estudiante,
            d.nombre Departamento, a.nombre Area, res.fecha,res.horaInicio HoraEntrada, res.horaFin HoraSalida,
            res.totalHora as HorasTrabajadas  
            FROM gestion g
            INNER JOIN solicitudBecaInstitucional sbi
            ON g.idGestion = sbi.idGestion
            AND g.activo=1
            INNER JOIN asignacionBecaInstitucional abi 
            ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional
            AND abi.idAsignacionBecaInstitucional=1
            INNER JOIN estudiante e
            ON abi.idEstudiante = e.idEstudiante
            INNER JOIN area a 
            ON sbi.idArea = a.idArea 
            INNER JOIN departamento d 
            ON a.idDepartamento = d.idDepartamento
            INNER JOIN registroEntradaSalida res
            on abi.idAsignacionBecaInstitucional=res.idAsignacionBecaInstitucional
            and res.fecha BETWEEN '2021-02-01'  and '2021-02-26';


                SELECT res.fecha,res.idAsignacionBecaInstitucional,Sum(res.totalHora*pre.precio) as pago
                        FROM registroEntradaSalida res INNER JOIN asignacionBecaInstitucional abi 
                        ON res.idAsignacionBecaInstitucional = abi.idAsignacionBecaInstitucional
                        AND res.fecha BETWEEN '2021-02-01'  AND  '2021-02-26'
                        AND res.idAsignacionBecaInstitucional= 1
                        INNER JOIN solicitudBecaInstitucional sbi 
                        ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional 
                        INNER JOIN precio pre 
                        ON pre.idPrecio = sbi.idPrecio ;

                    SELECT res.fecha,res.idAsignacionBecaInstitucional,(res.totalHora*pre.precio) as Total
                        FROM registroEntradaSalida res INNER JOIN asignacionBecaInstitucional abi 
                        ON res.idAsignacionBecaInstitucional = abi.idAsignacionBecaInstitucional
                        AND res.fecha BETWEEN '2021-02-01'  AND  '2021-02-26'
                        AND res.idAsignacionBecaInstitucional= 1
                        INNER JOIN solicitudBecaInstitucional sbi 
                        ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional 
                        INNER JOIN precio pre 
                        ON pre.idPrecio = sbi.idPrecio ;


         SELECT f.nombre as facultad,ca.nombre as carrera ,c.montoTotal,c.saldo,s.fecha,s.tipoPago,s.montoParcial
            FROM estudiante e INNER JOIN contrato c 
            ON c.idEstudiante = e.idEstudiante
            AND e.codigoEstudiante= 10
            INNER JOIN saldo s 
            ON s.idContrato=c.idContrato
            INNER JOIN carrera ca 
            ON ca.idCarrera=c.idCarrera
            INNER JOIN facultad f 
            ON f.idFacultad=ca.idFacultad;


               SELECT CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante,
              dep.nombre as departamento,a.nombre as area,res.fecha,res.horaInicio,res.horaFin,(res.totalHora*pre.precio) as Total,res.totalHora,
             res.fecha,di.dia
              FROM gestion g INNER JOIN solicitudBecaInstitucional sbi
              ON g.idgestion = sbi.idgestion
              INNER JOIN asignacionBecaInstitucional abi
              ON abi.idSolicitudBecaInstitucional = sbi.idSolicitudBecaInstitucional
            INNER JOIN horarioTrabajo ht 
            ON ht.idSolicitudBecaInstitucional= sbi.idSolicitudBecaInstitucional
            INNER JOIN dia di
            ON di.idDia = ht.idDia
              INNER JOIN  estudiante e
              ON e.idEstudiante = abi.idEstudiante
            INNER JOIN area a
             ON sbi.idArea = a.idArea
              INNER JOIN departamento dep
             ON a.idDepartamento = dep.idDepartamento
             INNER JOIN registroEntradaSalida res
              ON abi.idAsignacionBecaInstitucional= res.idAsignacionBecaInstitucional
             AND res.fecha BETWEEN '2021-02-01'  AND  '2021-02-26'
              AND res.idAsignacionBecaInstitucional= 1
             INNER JOIN precio pre
              ON pre.idPrecio = sbi.idPrecio;

  --------------------------------- dado un jefe departamento listar sus areas------

  SELECT a.nombre,a.idArea
  FROM personal p INNER JOIN personalDepartamento pd
  ON p.idPersonal = pd.idPersonal
    AND p.idPersonal=10
  INNER JOIN departamento d 
  ON d.idDepartamento = pd.idDepartamento
  INNER JOIN area a 
  ON d.idDepartamento = a.idDepartamento ;

  ------------------------dado un departamento listar sus estudiantes -------------
  SELECT abi.idAsignacionBecaInstitucional,a.nombre,CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante,e.idEstudiante,e.codigoEstudiante
  FROM personal p INNER JOIN personalDepartamento pd
  ON p.idPersonal = pd.idPersonal
    AND p.idPersonal=10
  INNER JOIN departamento d 
  ON d.idDepartamento = pd.idDepartamento
  INNER JOIN area a 
  ON d.idDepartamento = a.idDepartamento 
  INNER JOIN solicitudBecaInstitucional sbi 
  ON a.idArea= sbi.idArea
  INNER JOIN asignacionBecaInstitucional abi
  ON abi.idSolicitudBecaInstitucional = sbi.idSolicitudBecaInstitucional
  INNER JOIN estudiante e 
  ON e.idEstudiante = abi.idSolicitudBecaInstitucional;


       SELECT abi.idAsignacionBecaInstitucional,a.nombre,CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante,e.idEstudiante,e.codigoEstudiante
        FROM estudiante e INNER JOIN asignacionBecaInstitucional abi 
        ON e.idEstudiante = abi.idEstudiante
        INNER JOIN  solicitudBecaInstitucional sbi 
        ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional
        INNER JOIN  area a 
        ON a.idArea = sbi.idArea;

  select * from gestion ORDER BY idGestion Desc;